<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class RegionController
 * @package App\Controller
 * @Route("/region", name="region_")
 */
class RegionController extends AbstractController
{
    /**
     * @Route("/regions", name="all_regions")
     */
    public function regionHome(): Response
    {

        $json = file_get_contents("https://geo.api.gouv.fr/regions");
        $regions = json_decode($json);

        return $this->render('region/regions.html.twig', [
            'regions' => $regions
        ]);
    }
}
