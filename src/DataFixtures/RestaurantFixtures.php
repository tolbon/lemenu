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

    public const ROSAPARKS = 'rosaparks';
    public const BOSPHORE = 'bosphore';
    public const PIZZA = 'pizza_restaurant';

    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        $pizzeria = new Restaurant();
        $pizzeria->setName('InternalRestaurant Not Visible')
            ->setDescription('A Pizzeria Test')
            ->setCurrency('EUR')
            ->setActivate(true)
            ->setUrlSlug('menuinternals');

        $this->addReference(self::PIZZA, $pizzeria);

        $rosaparks_restaurant = new Restaurant();
        $rosaparks_restaurant->setName('Rosaparks')
            ->setDescription('Rosaparks 3')
            ->setCurrency('EUR')
            ->setActivate(true)
            ->setUrlSlug('rosaparks')
            ->setAddress('10 Rue Alexandre du Sommerard, 10000 Troyes')
            ->setPhone('+33 3 25 79 76 79');
        $this->addReference(self::ROSAPARKS, $rosaparks_restaurant);

        $bosphore_restaurant = new Restaurant();
        $bosphore_restaurant->setName('Le BÔ$phɵǒrœ ȘỚỸßØå')
            ->setDescription('Kébab Frêre Ô$phɵǒrœ ȘỚỸßØå')
            ->setCurrency('EUR')
            ->setActivate(true);
        $this->addReference(self::BOSPHORE, $bosphore_restaurant);

        $manager->persist($pizzeria);
        $manager->persist($rosaparks_restaurant);
        $manager->persist($bosphore_restaurant);

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
