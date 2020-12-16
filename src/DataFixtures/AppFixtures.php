<?php

namespace App\DataFixtures;

use App\Entity\Departement;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        for ($i = 0; $i < 10; $i++) {
            $dpt = new Departement();
            $dpt->setNom("toto".$i);
            $dpt->setCp(76000);
            $dpt->setPopulation("6542".$i);
            $dpt->setSuperficie("51564546".$i);
            $manager->persist($dpt);
        }

        $manager->flush();
    }
}
