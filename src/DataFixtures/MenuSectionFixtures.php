<?php

namespace App\DataFixtures;

use App\Entity\Menu;
use App\Entity\MenuSection;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class MenuSectionFixtures extends Fixture implements DependentFixtureInterface
{

    public const MENUSECTION_ROOT_PIZZA = 'menu_section_root_pizza';
    public const MENUSECTION_PIZZA = 'menu_section_pizza';

    public const ROSAPARKS_MENUSECTION_ROOT = 'rosaparks_menu_section_root';
    public const ROSAPARKS_MENUSECTION_BURGER = 'rosaparks_menu_section1_rosaparks';
    public const ROSAPARKS_MENUSECTION_BURGER_SOUSSECTION = 'rosaparks_menu_section11_rosaparks';
    public const ROSAPARKS_MENUSECTION_BURGER_SOUSSECTION2 = 'rosaparks_menu_section12_rosaparks';
    public const ROSAPARKS_MENUSECTION_COMBO = 'rosaparks_menu_section2_rosaparks';
    public const ROSAPARKS_MENUSECTION_EXTRAS = 'rosaparks_menu_section_extras';
    public const ROSAPARKS_MENUSECTION_ACCOMPAGNEMENT = 'rosaparks_menu_section_accompagnements_rosaparks';
    public const ROSAPARKS_MENUSECTION_DESSERTS = 'rosaparks_menu_section_dessert_rosaparks';
    public const ROSAPARKS_MENUSECTION_BOISSONS = 'rosaparks_menu_section_boisson_rosaparks';

    public const MENUSECTION_ROOT_BOSPHORE = 'menu_section_root_bosphore';
    public const MENUSECTION_BOSPHORE = 'menu_section_bosphore';


    public function load(ObjectManager $manager)
    {
        /** @var Menu $pizzeria_restaurant */
        $pizzeria_restaurant = $this->getReference(RestaurantFixtures::PIZZA);
        /** @var Menu $rosaparks_restaurant */
        $rosaparks_restaurant = $this->getReference(RestaurantFixtures::ROSAPARKS);
        /** @var Menu $bosphore_restaurant */
        $bosphore_restaurant = $this->getReference(RestaurantFixtures::BOSPHORE);

        $rosaparks_menusection_root = new MenuSection();
        $rosaparks_menusection_root->setName('Root')
            ->setDescription('No display it')
            ->setRestaurant($rosaparks_restaurant)
            ->setDisplayChildrenSectionAfterMenuItems(true)
            ->setDisplayCurrencyOnChildren(true)
            ->setDisplayCurrencySymbolOnTitle(true);
        $this->addReference(self::ROSAPARKS_MENUSECTION_ROOT, $rosaparks_menusection_root);

        $rosa_burger = new MenuSection();
        $rosa_burger->setName('nos burgers')
            ->setDescription('Nos viandes* sont cuites à point, n’hésitez pas à préciser votre cuisson ! Steak haché 120gr.')
        ->setRestaurant($rosaparks_restaurant)
        ->setDisplayChildrenSectionAfterMenuItems(true)
        ->setDisplayCurrencyOnChildren(true)
        ->setDisplayCurrencySymbolOnTitle(true);
        $this->addReference(self::ROSAPARKS_MENUSECTION_BURGER, $rosa_burger);

        $rosa_1_vege = new MenuSection();
        $rosa_1_vege->setName('ENVIE D\'UN VÉGÉ ?')
            ->setDescription('2 CHOIX POUR REMPLACER NOTRE STEAK')
            ->setRestaurant($rosaparks_restaurant)
            ->setDisplayChildrenSectionAfterMenuItems(true)
            ->setDisplayCurrencyOnChildren(true)
            ->setDisplayCurrencySymbolOnTitle(true);
        $this->addReference(self::ROSAPARKS_MENUSECTION_BURGER_SOUSSECTION, $rosa_1_vege);

        $rosa_1_faim = new MenuSection();
        $rosa_1_faim->setName('une grosse faim ?')
            ->setDescription('')
            ->setRestaurant($rosaparks_restaurant)
            ->setDisplayChildrenSectionAfterMenuItems(true)
            ->setDisplayCurrencyOnChildren(true)
            ->setDisplayCurrencySymbolOnTitle(true);
        $this->addReference(self::ROSAPARKS_MENUSECTION_BURGER_SOUSSECTION2, $rosa_1_faim);

        $rosa_extras = new MenuSection();
        $rosa_extras->setName('extras')
            ->setDescription('')
            ->setRestaurant($rosaparks_restaurant)
            ->setDisplayChildrenSectionAfterMenuItems(true)
            ->setDisplayCurrencyOnChildren(true)
            ->setDisplayCurrencySymbolOnTitle(true);
        $this->addReference(self::ROSAPARKS_MENUSECTION_EXTRAS, $rosa_extras);

        $rosa_combos = new MenuSection();
        $rosa_combos->setName('Combos')
            ->setDescription('Burger + Accompagnement + Boisson')
            ->setPrice1(3.5)
            ->setRestaurant($rosaparks_restaurant)
            ->setDisplayChildrenSectionAfterMenuItems(true)
            ->setDisplayCurrencyOnChildren(true)
            ->setDisplayCurrencySymbolOnTitle(true);
        $this->addReference(self::ROSAPARKS_MENUSECTION_COMBO, $rosa_combos);

        $rosa_accompagnements = new MenuSection();
        $rosa_accompagnements->setName('accompagnements')
            ->setDescription('')
            ->setRestaurant($rosaparks_restaurant)
            ->setDisplayChildrenSectionAfterMenuItems(true)
            ->setDisplayCurrencyOnChildren(true)
            ->setDisplayCurrencySymbolOnTitle(true);
        $this->addReference(self::ROSAPARKS_MENUSECTION_ACCOMPAGNEMENT, $rosa_accompagnements);

        $rosa_boissons = new MenuSection();
        $rosa_boissons->setName('Boissons')
            ->setDescription('')
            ->setRestaurant($rosaparks_restaurant)
            ->setDisplayChildrenSectionAfterMenuItems(true)
            ->setDisplayCurrencyOnChildren(true)
            ->setDisplayCurrencySymbolOnTitle(true);
        $this->addReference(self::ROSAPARKS_MENUSECTION_BOISSONS, $rosa_boissons);

        $rosa_desserts = new MenuSection();
        $rosa_desserts->setName('DESSERTS (fait-maison) ')
            ->setDescription('')
            ->setRestaurant($rosaparks_restaurant)
            ->setDisplayChildrenSectionAfterMenuItems(true)
            ->setDisplayCurrencyOnChildren(true)
            ->setDisplayCurrencySymbolOnTitle(true);
        $this->addReference(self::ROSAPARKS_MENUSECTION_DESSERTS, $rosa_desserts);


        $manager->persist($rosaparks_menusection_root);
        $manager->persist($rosa_burger);
        $manager->persist($rosa_1_vege);
        $manager->persist($rosa_1_faim);
        $manager->persist($rosa_extras);
        $manager->persist($rosa_combos);
        $manager->persist($rosa_accompagnements);
        $manager->persist($rosa_boissons);
        $manager->persist($rosa_desserts);

        $bosphore_menusection_root = new MenuSection();
        $bosphore_menusection_root->setName('Root')
            ->setDescription('No display it')
            ->setRestaurant($bosphore_restaurant)
            ->setDisplayChildrenSectionAfterMenuItems(true)
            ->setDisplayCurrencyOnChildren(true)
            ->setDisplayCurrencySymbolOnTitle(true);
        $this->addReference(self::MENUSECTION_ROOT_BOSPHORE, $bosphore_menusection_root);

        $ms3 = new MenuSection();
        $ms3->setName('Le BÔ$phɵǒrœ ȘỚỸßØå')
            ->setDescription('Kébab Frêre Ô$phɵǒrœ ȘỚỸßØå')
            ->setRestaurant($bosphore_restaurant)
            ->setDisplayChildrenSectionAfterMenuItems(true)
            ->setDisplayCurrencyOnChildren(true)
            ->setDisplayCurrencySymbolOnTitle(true);
        $this->addReference(self::MENUSECTION_BOSPHORE, $ms3);

        $pizza_menusection_root = new MenuSection();
        $pizza_menusection_root->setName('Root')
            ->setDescription('No display it')
            ->setRestaurant($pizzeria_restaurant)
            ->setDisplayChildrenSectionAfterMenuItems(true)
            ->setDisplayCurrencyOnChildren(true)
            ->setDisplayCurrencySymbolOnTitle(true);
        $this->addReference(self::MENUSECTION_ROOT_PIZZA, $pizza_menusection_root);

        $ms4 = new MenuSection();
        $ms4->setName('Les Pizza a la tomates')
            ->setDescription('')
            ->setRestaurant($pizzeria_restaurant)
            ->setDisplayChildrenSectionAfterMenuItems(true)
            ->setDisplayCurrencyOnChildren(true)
            ->setDisplayCurrencySymbolOnTitle(true);
        $this->addReference(self::MENUSECTION_PIZZA, $ms4);


        $manager->persist($rosaparks_menusection_root);
        $manager->persist($pizza_menusection_root);
        $manager->persist($bosphore_menusection_root);


        $manager->persist($ms3);
        $manager->persist($ms4);

        $manager->flush();
    }


    public function getDependencies()
    {
        return [
            MenuFixtures::class
        ];
    }
}