<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\Converter;

class ConversionController extends AbstractController
{

    /**
     * @Route("/conversion/celcius/{value}", name="conversions_celcius")
     * @param int $value
     * @param Converter $converter
     * @return Response
     */
    public function celcius(int $value = 0,Converter $converter): Response
    {

        return $this->render('conversion/conversion.html.twig', [
            "base" => $value,
            "result" => $converter->celciustoFar($value),
            "ValueStr" => "Fahrenheit",
            "ValueGoalStr" => "Celcius"
            ]);
    }

    /**
     * @Route("/conversion/metre/{value}", name="conversions_metre")
     * @param int $value
     * @param Converter $converter
     * @return Response
     */
    public function meter(int $value = 0,Converter $converter ): Response
    {

        return $this->render('conversion/conversion.html.twig', [
            "base" => $value,
            "result" => $converter->meterToStep($value),
            "ValueStr" => "metres",
            "ValueGoalStr" => "pieds"
        ]);
    }

    /**
     * @Route("/conversion/kilo/{value}", name="conversions_kilo")
     * @param int $value
     * @param Converter $converter
     * @return Response
     */
    public function kilo(int $value = 0,Converter $converter): Response
    {

        return $this->render('conversion/conversion.html.twig', [
            "base" => $value,
            "result" => $converter->kiloTolivre($value),
            "ValueStr" => "kilos",
            "ValueGoalStr" => "livres"
        ]);
    }


}
