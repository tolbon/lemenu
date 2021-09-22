<?php

namespace App\DataFixtures;

use App\Entity\Allergy;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AllergyFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $tAllergies = [
            'peanut',
            'celery',
            'shellfish',
            'nut',
            'gluten',
            'lactose',
            'lupine',
            'mollusc',
            'mustard',
            'egg',
            'fish',
            'sesame',
            'soy',
            'sulphites',
        ];

        foreach ($tAllergies as $allergy) {
            $a = new Allergy();
            $a->setName($allergy)
                ->setDescription($allergy);
            $manager->persist($a);
        }

        $manager->flush();
    }
}
