<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PresentationController extends AbstractController
{
    /**
     * @Route("/presentation", name="presentation")
     */
    public function index(): Response
    {

        $nom = "Alexandre";
        $age = 25;
        $ville = "Rouen";

        return $this->render('presentation/codeCommune.twig', [
            'controller_name' => 'COUCOU',
            'nom' => $nom,
            'age' => $age,
            'city' => $ville,

        ]);
    }

    /**
     * @Route("/presentation/dynamique/{text}/{age}", name="presDynamique", requirements={"age"="\d+"})
     * @param String $text
     * @param int $age
     * @return Response
     */
    public function dynamique(String $text = "undefined", int $age = 0): Response
    {

        return $this->render('presentation/dynamique.html.twig', [
            "text" => $text,
            "age" => $age
        ]);
    }

    /**
     * @Route("/", name="cv")
     */
    public function cv(): Response
    {
        $nom = "Alexandre";
        $age = 25;
        $ville = "Rouen";


        $users = [
            $array = [
                "nom" => $nom,
                "age" => $age,
                "city" => $ville
            ],
        ];

        $competences = [
            [
                "Programmation" => [
                    "Javascript" => 80,
                    "Css" => 50,
                    "Php" => 50,
                    "Symfony" => 45
                ]
            ],
            [
                "Langues" => [
                    "Anglais" => 70,
                    "Français" => 100,
                    "Russe" => 10
                ]
            ],
            [
                "Musique" => [
                    "Piano" => 80,
                    "Guitare" => 50
                ]
            ]
        ];

        return $this->render('presentation/cv.html.twig', [
            'name' => $nom,
            'users' => $users,
            'competences' => $competences,
        ]);
    }

    /**
     * @Route("/nfactory", name="nfactory")
     */
    public function nfactory(): Response
    {

        $nom = "Nfactory";

        return $this->render('presentation/nfactory.html.twig', [
            'name' => $nom,
        ]);
    }
}
