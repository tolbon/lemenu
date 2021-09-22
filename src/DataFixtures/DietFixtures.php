<?php

namespace App\DataFixtures;

use App\Entity\Diet;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class DietFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $tDiet = [
            ['name' => 'DiabeticDiet', 'desc' => 'A diet appropriate for people with diabetes.'],
            ['name' => 'GlutenFreeDiet', 'desc' =>	'A diet exclusive of gluten.'],
            ['name' => 'HalalDiet', 'desc' => 'A diet conforming to Islamic dietary practices.'],
            ['name' => 'HinduDiet', 'desc' => 'A diet conforming to Hindu dietary practices, in particular, beef-free.'],
            ['name' => 'KosherDiet', 'desc' => 'A diet conforming to Jewish dietary practices'],
            ['name' => 'LowCalorieDiet', 'desc' => 'A diet focused on reduced calorie intake'],
            ['name' => 'LowFatDiet', 'desc' => 'A diet focused on reduced fat and cholesterol intake'],
            ['name' => 'LowLactoseDiet', 'desc' => 'A diet appropriate for people with lactose intolerance'],
            ['name' => 'LowSaltDiet', 'desc' => 'A diet focused on reduced sodium intake'],
            ['name' => 'VeganDiet', 'desc' => 'A diet exclusive of all animal products'],
            ['name' => 'VegetarianDiet', 'desc' => 'A diet exclusive of animal meat'],
            ['name' => 'PorkFreeDiet', 'desc' => 'No pork'],
            ['name' => 'AlcoholFreeDiet', 'desc' =>	'No alcohol'],
        ];

        foreach ($tDiet as $diet) {
            $a = new Diet();
            $a->setName($diet['name'])
                ->setDescription($diet['desc']);
            $manager->persist($a);
        }

        $manager->flush();
    }
}
