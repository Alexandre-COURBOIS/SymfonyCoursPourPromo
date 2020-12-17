<?php

namespace App\Controller;

use App\Entity\Ville;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VilleController extends AbstractController
{
    /**
     * @Route("/ville/codeCommune/{codeCommune}", name="ville_codeCommune")
     * @param Ville $ville
     * @return Response
     */
    public function index(Ville $ville): Response
    {

        return $this->render('ville/codeCommune.twig', [
            'city' => $ville
        ]);
    }
}
