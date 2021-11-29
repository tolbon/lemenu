<?php

namespace App\DataFixtures;

use App\Entity\Menu;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class MenuFixtures extends Fixture implements DependentFixtureInterface
{
    public const MENU_ROSAPARKS = 'menu_rosaparks';
    public const MENU_BOSPHORE = 'menu_bosphore';
    public const MENU_PIZZA = 'menu_pizza';
    public const TOUR2PIZZ_MENU_EMPORTER = 'menu_tour2pizz_emporter';
    public const TOUR2PIZZ_MENU_PLACE = 'menu_tour2pizz_place';

    public function load(ObjectManager $manager)
    {
        $pizzeria = $this->getReference(RestaurantFixtures::PIZZA);
        $rosaparks_restaurant = $this->getReference(RestaurantFixtures::ROSAPARKS);
        $bosphore_restaurant = $this->getReference(RestaurantFixtures::BOSPHORE);
        $tour2pizz = $this->getReference(RestaurantFixtures::TOUR2PIZZ);

        $m = new Menu();
        $m->setName('Menu')
            ->setRestaurant($rosaparks_restaurant)
            ->setDescription('Menu du 22/07/2021')
            ->setActivate(true)
            ->setUrlSlug('menu')
            ->setInsertDateAt(new \DateTimeImmutable('2021-07-25 21:34:49'));
        $this->addReference(self::MENU_ROSAPARKS, $m);

        $bosphore_menu = new Menu();
        $bosphore_menu->setName('Menu Ô$phɵǒrœ ȘỚỸßØå')
            ->setRestaurant($bosphore_restaurant)
            ->setDescription('Ô$phɵǒrœ ȘỚỸßØå')
            ->setActivate(true)
            ->setInsertDateAt(new \DateTimeImmutable('2021-07-25 21:34:49'));
        $this->addReference(self::MENU_BOSPHORE, $bosphore_menu);

        $rosaparks_menu = new Menu();
        $rosaparks_menu->setName('Menu2')
            ->setRestaurant($bosphore_restaurant)
            ->setDescription('Desactivate Menu')
            ->setActivate(false)
            ->setUrlSlug('menu2')
            ->setInsertDateAt(new \DateTimeImmutable('2021-07-25 21:34:49'));

        $pizzeria_menu = new Menu();
        $pizzeria_menu->setName('Menu')
            ->setRestaurant($pizzeria)
            ->setDescription('Menu Pizza')
            ->setActivate(true)
            ->setUrlSlug('menu_pizza')
            ->setInsertDateAt(new \DateTimeImmutable('2021-07-25 21:34:49'));
        $this->addReference(self::MENU_PIZZA, $pizzeria_menu);



        $tour2pizz_emporter_menu = new Menu();
        $tour2pizz_emporter_menu->setName('Menu à Emporter')
            ->setRestaurant($tour2pizz)
            ->setDescription('Pizza à Emporter')
            ->setActivate(true)
            ->setUrlSlug('pizza-a-emporter')
            ->setInsertDateAt(new \DateTimeImmutable('2021-07-25 21:34:49'));
        $this->addReference(self::TOUR2PIZZ_MENU_EMPORTER, $tour2pizz_emporter_menu);

        $tour2pizz_place_menu = new Menu();
        $tour2pizz_place_menu->setName('Menu')
            ->setRestaurant($tour2pizz)
            ->setDescription('')
            ->setActivate(true)
            ->setUrlSlug('la-carte')
            ->setInsertDateAt(new \DateTimeImmutable('2021-07-25 21:34:49'));
        $this->addReference(self::TOUR2PIZZ_MENU_PLACE, $tour2pizz_place_menu);

        $manager->persist($m);
        $manager->persist($pizzeria_menu);
        $manager->persist($rosaparks_menu);
        $manager->persist($bosphore_menu);


        $manager->persist($tour2pizz_emporter_menu);
        $manager->persist($tour2pizz_place_menu);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            RestaurantFixtures::class
        ];
    }
}