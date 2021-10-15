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

    public const ROSAPARKS_MENUSECTION_ROOT = 'menu_section_root_rosaparks';
    public const ROSAPARKS_MENUSECTION_BURGER = 'menu_section1_rosaparks';
    public const ROSAPARKS_MENUSECTION_BURGER_SOUSSECTION = 'menu_section11_rosaparks';
    public const ROSAPARKS_MENUSECTION_COMBO = 'menu_section2_rosaparks';
    public const ROSAPARKS_MENUSECTION_ACCOMPAGNEMENT = 'menu_section3_rosaparks';

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

        $ms = new MenuSection();
        $ms->setName('burgers')
            ->setDescription('Nos viandes* sont cuites à point, n’hésitez pas à préciser votre cuisson !
Steak haché 120gr.')
        ->setRestaurant($rosaparks_restaurant)
        ->setDisplayChildrenSectionAfterMenuItems(true)
        ->setDisplayCurrencyOnChildren(true)
        ->setDisplayCurrencySymbolOnTitle(true);
        $this->addReference(self::ROSAPARKS_MENUSECTION_BURGER, $ms);

        $ms1 = new MenuSection();
        $ms1->setName('Combos')
            ->setDescription('Nos viandes* sont cuites à point, n’hésitez pas à préciser votre cuisson !
Steak haché 120gr.')
            ->setRestaurant($rosaparks_restaurant)
            ->setDisplayChildrenSectionAfterMenuItems(true)
            ->setDisplayCurrencyOnChildren(true)
            ->setDisplayCurrencySymbolOnTitle(true);
        $this->addReference(self::ROSAPARKS_MENUSECTION_COMBO, $ms1);

        $ms2 = new MenuSection();
        $ms2->setName('accompagnements')
            ->setDescription('Nos viandes* sont cuites à point, n’hésitez pas à préciser votre cuisson !
Steak haché 120gr.')
            ->setRestaurant($rosaparks_restaurant)
            ->setDisplayChildrenSectionAfterMenuItems(true)
            ->setDisplayCurrencyOnChildren(true)
            ->setDisplayCurrencySymbolOnTitle(true);
        $this->addReference(self::ROSAPARKS_MENUSECTION_ACCOMPAGNEMENT, $ms2);


        $ms11 = new MenuSection();
        $ms11->setName('ENVIE D\'UN VÉGÉ ?')
            ->setDescription('2 CHOIX POUR REMPLACER NOTRE STEAK')
            ->setRestaurant($rosaparks_restaurant)
            ->setDisplayChildrenSectionAfterMenuItems(true)
            ->setDisplayCurrencyOnChildren(true)
            ->setDisplayCurrencySymbolOnTitle(true);
        $this->addReference(self::ROSAPARKS_MENUSECTION_BURGER_SOUSSECTION, $ms11);

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

        $manager->persist($ms);
        $manager->persist($ms1);
        $manager->persist($ms11);
        $manager->persist($ms2);
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