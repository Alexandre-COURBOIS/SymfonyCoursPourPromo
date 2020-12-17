<?php

namespace App\Controller;

use App\Entity\Ville;
use App\Repository\VilleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VilleController extends AbstractController
{
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

        $ville = $villeRepository->findByTemp($temp);

        dump($ville);

        return $this->render('ville/tempCity.html.twig', [
            'citys' => $ville
        ]);
    }
}
