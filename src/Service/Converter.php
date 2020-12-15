<?php


namespace App\Service;


class Converter
{

    public function celciustoFar(float $value) : ? float {
        $fahrenheit = $value - 32;
        $result = $fahrenheit / 1.8;

        return $result;
    }

    public function meterToStep(float $value) : ? float {

        $result = $value * 3.2808;

        return $result;
    }

    public function kiloTolivre( float $value) : ? float {

        $result = $value * 2.205;

        return $result;
    }

}