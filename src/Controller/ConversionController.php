<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\Converter;

class ConversionController extends AbstractController
{
    private $converter;

    public function __construct(Converter $converter) {

        $this->converter = $converter;

    }

    /**
     * @Route("/conversion/celcius/{value}", name="conversions_celcius")
     * @param int $value
     * @return Response
     */
    public function celcius(int $value = 0): Response
    {

        return $this->render('conversion/conversion.html.twig', [
            "base" => $value,
            "result" => $this->converter->celciustoFar($value),
            "ValueStr" => "Fahrenheit",
            "ValueGoalStr" => "Celcius"
            ]);
    }

    /**
     * @Route("/conversion/metre/{value}", name="conversions_metre")
     * @param int $value
     * @return Response
     */
    public function meter(int $value = 0): Response
    {

        return $this->render('conversion/conversion.html.twig', [
            "base" => $value,
            "result" => $this->converter->meterToStep($value),
            "ValueStr" => "metres",
            "ValueGoalStr" => "pieds"
        ]);
    }

    /**
     * @Route("/conversion/kilo/{value}", name="conversions_kilo")
     * @param int $value
     * @return Response
     */
    public function kilo(int $value = 0): Response
    {

        return $this->render('conversion/conversion.html.twig', [
            "base" => $value,
            "result" => $this->converter->kiloTolivre($value),
            "ValueStr" => "kilos",
            "ValueGoalStr" => "livres"
        ]);
    }




}
