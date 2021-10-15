<?php

namespace App\DataFixtures;

use App\Entity\MenuItem;
use App\Entity\Restaurant;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class MenuItemFixtures extends Fixture implements DependentFixtureInterface
{

    public const ROSPARKS_BURGER1 = 'rosaparks_burger1';
    public const ROSPARKS_BURGER2 = 'rosaparks_burger2';
    public const ROSPARKS_BURGER3 = 'rosaparks_burger3';
    public const ROSPARKS_CHAMPIGNONS = 'rosaparks_champi';
    public const ROSPARKS_FRITES = 'rosaparks_frites';

    public const PIZZERIA_PIZZA1 = 'pizzeria_pizza';
    public const BOSPHORE_BURGER1 = 'bosphore_burger';

    public function load(ObjectManager $manager)
    {
        $pizzeria = $this->getReference(RestaurantFixtures::PIZZA);
        $rosaparks_restaurant = $this->getReference(RestaurantFixtures::ROSAPARKS);
        $bosphore_restaurant = $this->getReference(RestaurantFixtures::BOSPHORE);

        $mi = new MenuItem();
        $mi->setRestaurant($rosaparks_restaurant);
        $mi->setName('Classic')
        ->setDescription("Boeuf, comté affiné 18 mois, laitue iceberg,
cornichons, oignons caramélisés & notre sauce signature.")
        ->setPrice1(9.4);
        $this->addReference(self::ROSPARKS_BURGER1, $mi);

        $mi2 = new MenuItem();
        $mi2->setRestaurant($rosaparks_restaurant);
        $mi2->setName('Nine(9)')
            ->setDescription("Boeuf, comté affiné 18 mois, laitue iceberg,
cornichons, oignons caramélisés & notre sauce signature.")
            ->setPrice1(9.4);
        $this->addReference(self::ROSPARKS_BURGER2, $mi2);

        $mi11 = new MenuItem();
        $mi11->setRestaurant($rosaparks_restaurant)
            ->setName('CHAMPIGNON PORTOBELLO')
            ->setDescription("Boeuf, comté affiné 18 mois, laitue iceberg,
cornichons, oignons caramélisés & notre sauce signature.")
            ->setPrice1(null);
        $this->addReference(self::ROSPARKS_CHAMPIGNONS, $mi11);

        $mi3 = new MenuItem();
        $mi3->setRestaurant($rosaparks_restaurant)
            ->setName('frites')
            ->setDescription("Frites fraiches, coupées et blanchies avant chaque service.")
            ->setPrice1(3.0);
        $this->addReference(self::ROSPARKS_FRITES, $mi3);

        $mi4 = new MenuItem();
        $mi4->setName('Menu Ô$phɵǒrœ ȘỚỸßØå')
            ->setRestaurant($bosphore_restaurant)
            ->setDescription('Ô$phɵǒrœ ȘỚỸßØå')
            ->setPrice1(9.4);
        $this->addReference(self::BOSPHORE_BURGER1, $mi4);


        $mi5 = new MenuItem();
        $mi5->setName('Reine')
            ->setRestaurant($pizzeria)
            ->setDescription('tomates, ');
        $mi5->setPrice1(9.4);
        $mi5->setPrice2(10.90);
        $this->addReference(self::PIZZERIA_PIZZA1, $mi5);

        $manager->persist($mi);
        $manager->persist($mi11);
        $manager->persist($mi2);
        $manager->persist($mi3);
        $manager->persist($mi4);
        $manager->persist($mi5);

        $manager->flush();
    }


    public function getDependencies()
    {
        return [
            MenuFixtures::class
        ];
    }
}