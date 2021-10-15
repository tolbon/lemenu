<?php

namespace App\DataFixtures;

use App\Entity\MenuItem;
use App\Entity\MenuMenuSection;
use App\Entity\MenuSection;
use App\Entity\MenuSectionMenuItem;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class GluMenuFixtures  extends Fixture implements DependentFixtureInterface
{

    public function getDependencies()
    {
        return [
            MenuItemFixtures::class,
            RestaurantFixtures::class,
            MenuSectionFixtures::class,
        ];
    }

    public function load(ObjectManager $manager)
    {
        $menu_pizza = $this->getReference(MenuFixtures::MENU_PIZZA);
        $menu_rosaparks = $this->getReference(MenuFixtures::MENU_ROSAPARKS);
        $menu_bosphore = $this->getReference(MenuFixtures::MENU_BOSPHORE);

        $menuSection_root_pizza = $this->getReference(MenuSectionFixtures::MENUSECTION_ROOT_PIZZA);
        $menuSection_pizza = $this->getReference(MenuSectionFixtures::MENUSECTION_PIZZA);
        $rosaparks_menusection_root = $this->getReference(MenuSectionFixtures::ROSAPARKS_MENUSECTION_ROOT);
        $rosaparks_menusection_burger = $this->getReference(MenuSectionFixtures::ROSAPARKS_MENUSECTION_BURGER);
        $rosaparks_menusection_burger_soussection = $this->getReference(MenuSectionFixtures::ROSAPARKS_MENUSECTION_BURGER_SOUSSECTION);
        $rosaparks_menusection_combos = $this->getReference(MenuSectionFixtures::ROSAPARKS_MENUSECTION_COMBO);
        $rosaparks_menusection_accompagnement = $this->getReference(MenuSectionFixtures::ROSAPARKS_MENUSECTION_ACCOMPAGNEMENT);
        $menuSection_root_bosphore = $this->getReference(MenuSectionFixtures::MENUSECTION_ROOT_BOSPHORE);
        $menuSection_bosphore = $this->getReference(MenuSectionFixtures::MENUSECTION_BOSPHORE);


        /** @var MenuItem $pizza_reine */
        $pizza_reine = $this->getReference(MenuItemFixtures::PIZZERIA_PIZZA1);
        /** @var MenuItem $rosaparks_burger1 */
        $rosaparks_burger1 = $this->getReference(MenuItemFixtures::ROSPARKS_BURGER1);
        /** @var MenuItem $rosaparks_burger2 */
        $rosaparks_burger2 = $this->getReference(MenuItemFixtures::ROSPARKS_BURGER2);
        $rosaparks_champignon = $this->getReference(MenuItemFixtures::ROSPARKS_CHAMPIGNONS);
        $rosaparks_frites = $this->getReference(MenuItemFixtures::ROSPARKS_FRITES);
        $bosphore_burger1 = $this->getReference(MenuItemFixtures::BOSPHORE_BURGER1);

        $mms1 = new MenuMenuSection();
        $mms1->setMenu($menu_pizza)
            ->setMenuSection($menuSection_pizza)
            ->setMenuSectionParent($menuSection_root_pizza)
            ->setPosition(1);

        $mms2 = new MenuMenuSection();
        $mms2->setMenu($menu_bosphore)
            ->setMenuSection($menuSection_bosphore)
            ->setMenuSectionParent($menuSection_root_bosphore)
            ->setPosition(1);

        $mms3 = new MenuMenuSection();
        $mms3->setMenu($menu_rosaparks)
            ->setMenuSection($rosaparks_menusection_burger)
            ->setMenuSectionParent($rosaparks_menusection_root)
            ->setPosition(1);

        $mms4 = new MenuMenuSection();
        $mms4->setMenu($menu_rosaparks)
            ->setMenuSectionParent($rosaparks_menusection_burger)
            ->setMenuSection($rosaparks_menusection_burger_soussection)
            ->setPosition(1);

        $mms5 = new MenuMenuSection();
        $mms5->setMenu($menu_rosaparks)
            ->setMenuSection($rosaparks_menusection_combos)
            ->setMenuSectionParent($rosaparks_menusection_root)
            ->setPosition(2);

        $mms6 = new MenuMenuSection();
        $mms6->setMenu($menu_rosaparks)
            ->setMenuSection($rosaparks_menusection_accompagnement)
            ->setMenuSectionParent($rosaparks_menusection_root)
            ->setPosition(3);


        //MENUITEM MENUSECTION

        $msmi1 = new MenuSectionMenuItem();
        $msmi1->setMenuSection($menuSection_pizza)
            ->setMenuItem($pizza_reine)
            ->setPosition(1);

        $msmi2 = new MenuSectionMenuItem();
        $msmi2->setMenuSection($rosaparks_menusection_burger)
            ->setMenuItem($rosaparks_burger1)
            ->setPosition(1);

        $msmi3 = new MenuSectionMenuItem();
        $msmi3->setMenuSection($rosaparks_menusection_burger)
            ->setMenuItem($rosaparks_burger2)
            ->setPosition(2);

        $msmi4 = new MenuSectionMenuItem();
        $msmi4->setMenuSection($rosaparks_menusection_burger_soussection)
            ->setMenuItem($rosaparks_champignon)
            ->setPosition(1);

        $msmi5 = new MenuSectionMenuItem();
        $msmi5->setMenuSection($rosaparks_menusection_accompagnement)
            ->setMenuItem($rosaparks_frites)
            ->setPosition(1);

        $msmi6 = new MenuSectionMenuItem();
        $msmi6->setMenuSection($menuSection_bosphore)
            ->setMenuItem($bosphore_burger1)
            ->setPosition(1);

        $manager->persist($mms1);
        $manager->persist($mms2);
        $manager->persist($mms3);
        $manager->persist($mms4);
        $manager->persist($mms5);
        $manager->persist($mms6);

        $manager->persist($msmi1);
        $manager->persist($msmi2);
        $manager->persist($msmi3);
        $manager->persist($msmi4);
        $manager->persist($msmi5);
        $manager->persist($msmi6);

        $manager->flush();
    }
}