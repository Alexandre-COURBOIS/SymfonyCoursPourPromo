<?php

namespace App\Controller;

use App\Entity\Maire;
use App\Entity\Ville;
use App\Form\VilleFormType;
use App\Repository\DepartementRepository;
use App\Repository\MaireRepository;
use App\Repository\VilleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VilleController extends AbstractController
{


    /**
     * @Route("/villes", name="ville")
     * @return Response
     */
    public function getCitys(VilleRepository $villeRepository): Response
    {

        $citys = $villeRepository->findAll();

        return $this->render('ville/citys.html.twig', [
            'citys' => $citys
        ]);
    }

    /**
     * @Route("/ville/codeCommune/{codeCommune}", name="ville_codeCommune", requirements={"codeCommune"="\d+"})
     * @param Ville $ville
     * @return Response
     */
    public function searchCommuneByCodeCommune(Ville $ville): Response
    {

        return $this->render('ville/codeCommune.twig', [
            'city' => $ville
        ]);
    }

    /**
     * @Route("/ville/tempmax/{temp}", name="ville_temp_max", requirements={"codeCommune"="\d+"})
     * @param VilleRepository $villeRepository
     * @param $temp
     * @return Response
     */
    public function searchCommuneByTempMax(VilleRepository $villeRepository, $temp): Response
    {

        $ville = $villeRepository->findByTempMax($temp);
        return $this->render('ville/tempCity.html.twig', [
            'citys' => $ville
        ]);
    }

    /**
     * @Route("/villes/departement/{departement}", name="ville_dpt")
     * @return Response
     */
    public function getCityByDpt(VilleRepository $villeRepository, DepartementRepository $departementRepository, $departement): Response
    {

        $dpt = $departementRepository->findOneBy(['nom' => $departement]);

        $citys = $villeRepository->findBy(['departement' => $dpt]);

        return $this->render('ville/cityOfDepartment.html.twig', [
            'citys' => $citys,
            'dpt' => $dpt
        ]);
    }

    /**
     * @Route("/ville/new", name="ville_new")
     * @param Request $request
     * @param EntityManagerInterface $manager
     * @param MaireRepository $maireRepository
     * @param DepartementRepository $departementRepository
     * @return Response
     */
    public function newCity(Request $request, EntityManagerInterface $manager, MaireRepository $maireRepository, DepartementRepository $departementRepository)
    {
        $ville = new Ville();

        $form = $this->createForm(VilleFormType::class, $ville);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {

            $departement = $departementRepository->findOneBy(['id' => 50]);

            $maire = new Maire();
            $maire->setNom("Michel");
            $maire->setPrenom("Michel");

            $manager->persist($maire);

            $ville->setMaire($maire);
            $ville->setDepartement($departement);

            $manager->persist($ville);
            $manager->flush();

           return $this->redirectToRoute("ville");
        }

        return $this->render('ville/newCity.html.twig',[
            'form' => $form->createView()
        ]);
    }



}

