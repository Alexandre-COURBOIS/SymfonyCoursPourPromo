<?php

namespace App\DataFixtures;

use App\Entity\Departement;
use App\Entity\Maire;
use App\Entity\Ville;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        for ($i = 0; $i < 10; $i++) {

            $dpt = new Departement();
            $dpt->setNom("departement" . $i);
            $dpt->setCp("76000");
            $dpt->setPopulation(rand(100000, 500000));
            $dpt->setSuperficie(rand(0, 125000));

            $manager->persist($dpt);

        }

        for ($j = 0; $j < 10; $j++){

            $maire = new Maire();
            $maire->setPrenom("toto".$j);
            $maire->setNom("JeCePa".$j);

            $city = new Ville();
            $city->setNom("Ville" . $j);
            $city->setCodeCommune($j);
            $city->setGentile("gensVille" . $j);
            $city->setRecordTempChaleur(rand(20,55));
            $city->setRecordTempFroid($j +2 * - 5);
            $city->setDepartement($dpt);
            $city->setMaire($maire);

            $manager->persist($maire);
            $manager->persist($city);
        }

        $manager->flush();
    }
}