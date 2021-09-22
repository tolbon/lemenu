<?php

namespace App\DataFixtures;

use App\Entity\Allergy;
use App\Entity\Menu;
use App\Entity\Restaurant;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class RestaurantFixtures extends Fixture implements DependentFixtureInterface
{

    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        $r1 = new Restaurant();
        $r1->setName('InternalRestaurant Not Visible')
            ->setCurrency('EUR')
            ->setActivate(true)
            ->setUrlSlug('menuinternals');


        $r2 = new Restaurant();
        $r2->setName('Rosaparks')
            ->setDescription('Rosaparks 3')
            ->setCurrency('EUR')
            ->setActivate(true)
            ->setUrlSlug('rosaparks')
            ->setAddress('10 Rue Alexandre du Sommerard, 10000 Troyes')
            ->setPhone('+33 3 25 79 57 79');

        $m = new Menu();
        $m->setName('Menu')
            ->setRestaurant($r2)
            ->setDescription('Menu du 22/07/2021')
            ->setActivate(true)
            ->setUrlSlug('menu')
            ->setInsertDateAt(new \DateTimeImmutable('2021-07-25 21:34:49'));

        $r3 = new Restaurant();
        $r3->setName('Le BÔ$phɵǒrœ ȘỚỸßØå')
            ->setDescription('Kébab Frêre Ô$phɵǒrœ ȘỚỸßØå')
            ->setCurrency('EUR')
            ->setActivate(true);

        $m1 = new Menu();
        $m->setName('Menu Ô$phɵǒrœ ȘỚỸßØå')
            ->setRestaurant($r3)
            ->setDescription('Ô$phɵǒrœ ȘỚỸßØå')
            ->setActivate(true)
            ->setInsertDateAt(new \DateTimeImmutable('2021-07-25 21:34:49'));

        $m2 = new Menu();
        $m->setName('Menu2')
            ->setRestaurant($r3)
            ->setDescription('Desactivate Menu')
            ->setActivate(false)
            ->setUrlSlug('menu2')
            ->setInsertDateAt(new \DateTimeImmutable('2021-07-25 21:34:49'));

        $manager->persist($r1);
        $manager->persist($r2);
        $manager->persist($r3);

        $manager->persist($m);
        $manager->persist($m2);
        $manager->persist($m2);


        $manager->persist($m);
        $manager->persist($m2);
        $manager->persist($m2);

        $manager->flush();
    }


    public function getDependencies()
    {
        return [
            AllergyFixtures::class,
            DietFixtures::class,
            UserFixtures::class,
        ];
    }
}
