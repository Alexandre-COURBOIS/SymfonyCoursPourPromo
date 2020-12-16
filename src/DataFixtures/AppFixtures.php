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
                $dpt->setNom("departement".$i);
            $dpt->setCp("76000");
            $dpt->setPopulation(rand(100000,500000));
            $dpt->setSuperficie(rand(0,125000));
            $manager->persist($dpt);
        }

        $manager->flush();
    }
}
