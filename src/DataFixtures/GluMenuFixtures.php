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
        $rosaparks_menusection_burger_soussection2 = $this->getReference(MenuSectionFixtures::ROSAPARKS_MENUSECTION_BURGER_SOUSSECTION2);
        $rosaparks_menusection_extras = $this->getReference(MenuSectionFixtures::ROSAPARKS_MENUSECTION_EXTRAS);
        $rosaparks_menusection_combos = $this->getReference(MenuSectionFixtures::ROSAPARKS_MENUSECTION_COMBO);
        $rosaparks_menusection_accompagnement = $this->getReference(MenuSectionFixtures::ROSAPARKS_MENUSECTION_ACCOMPAGNEMENT);
        $rosaparks_menusection_boissons = $this->getReference(MenuSectionFixtures::ROSAPARKS_MENUSECTION_BOISSONS);
        $rosaparks_menusection_dessert = $this->getReference(MenuSectionFixtures::ROSAPARKS_MENUSECTION_DESSERTS);
        $menuSection_root_bosphore = $this->getReference(MenuSectionFixtures::MENUSECTION_ROOT_BOSPHORE);
        $menuSection_bosphore = $this->getReference(MenuSectionFixtures::MENUSECTION_BOSPHORE);


        /** @var MenuItem $pizza_reine */
        $pizza_reine = $this->getReference(MenuItemFixtures::PIZZERIA_PIZZA1);
        /** @var MenuItem $rosaparks_burger1 */
        $rosaparks_burger1 = $this->getReference(MenuItemFixtures::ROSPARKS_BURGER1);
        /** @var MenuItem $rosaparks_burger2 */
        $rosaparks_burger2 = $this->getReference(MenuItemFixtures::ROSPARKS_BURGER2);
        $rosaparks_burger3 = $this->getReference(MenuItemFixtures::ROSPARKS_BURGER3);
        $rosaparks_burger4 = $this->getReference(MenuItemFixtures::ROSPARKS_BURGER4);
        $rosaparks_burger5 = $this->getReference(MenuItemFixtures::ROSPARKS_BURGER5);
        $rosaparks_burger6 = $this->getReference(MenuItemFixtures::ROSPARKS_BURGER6);
        $rosaparks_burger7 = $this->getReference(MenuItemFixtures::ROSPARKS_BURGER7);
        $rosaparks_burger8 = $this->getReference(MenuItemFixtures::ROSPARKS_BURGER8);
        $rosaparks_burger9 = $this->getReference(MenuItemFixtures::ROSPARKS_BURGER9);
        $rosaparks_champignon = $this->getReference(MenuItemFixtures::ROSPARKS_CHAMPIGNONS);
        $rosaparks_steak_vege = $this->getReference(MenuItemFixtures::ROSPARKS_STEAK_VEGAN);
        $rosaparks_double_steak = $this->getReference(MenuItemFixtures::ROSPARKS_STEAK_DOUBLE);
        $rosaparks_add_cheese = $this->getReference(MenuItemFixtures::ROSPARKS_ADD_CHEESE);
        $rosaparks_add_ingredients = $this->getReference(MenuItemFixtures::ROSPARKS_ADD_INGREDIENTS);
        $rosaparks_crispychicken = $this->getReference(MenuItemFixtures::ROSPARKS_CRISPY_CHICKEN);
        $rosaparks_freshsalad = $this->getReference(MenuItemFixtures::ROSPARKS_FRESH_SALAD);
        $rosaparks_frites = $this->getReference(MenuItemFixtures::ROSPARKS_FRITES);
        $rosaparks_frites_cheddar = $this->getReference(MenuItemFixtures::ROSPARKS_FRITES_CHEDDAR);
        $rosaparks_frites_cheddar_bacon = $this->getReference(MenuItemFixtures::ROSPARKS_FRITES_CHEDDAR_BACON);
        $rosaparks_boisson_homemade = $this->getReference(MenuItemFixtures::ROSPARKS_BOISSON_HOMEMADE);
        $rosaparks_boisson_naturel = $this->getReference(MenuItemFixtures::ROSPARKS_BOISSON_NATUREL);
        $rosaparks_boisson_classique = $this->getReference(MenuItemFixtures::ROSPARKS_BOISSON_CLASSIQUE);
        $rosaparks_boisson_chaudes = $this->getReference(MenuItemFixtures::ROSPARKS_BOISSON_CHAUDES);
        $rosaparks_dessert_milkshake = $this->getReference(MenuItemFixtures::ROSPARKS_DESSERT_MILKSHAKE);
        $rosaparks_dessert_yaourt = $this->getReference(MenuItemFixtures::ROSPARKS_DESSERT_YAOURT);
        $rosaparks_dessert_cheesecake = $this->getReference(MenuItemFixtures::ROSPARKS_DESSERT_CHEESECAKE);
        $rosaparks_dessert_brownies = $this->getReference(MenuItemFixtures::ROSPARKS_DESSERT_BROWNIES);

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

        $rosa_mms1 = new MenuMenuSection();
        $rosa_mms1->setMenu($menu_rosaparks)
            ->setMenuSection($rosaparks_menusection_burger)
            ->setMenuSectionParent($rosaparks_menusection_root)
            ->setPosition(1);

        $rosa_mms1_1 = new MenuMenuSection();
        $rosa_mms1_1->setMenu($menu_rosaparks)
            ->setMenuSectionParent($rosaparks_menusection_burger)
            ->setMenuSection($rosaparks_menusection_burger_soussection)
            ->setPosition(1);

        $rosa_mms1_2 = new MenuMenuSection();
        $rosa_mms1_2->setMenu($menu_rosaparks)
            ->setMenuSectionParent($rosaparks_menusection_burger)
            ->setMenuSection($rosaparks_menusection_burger_soussection2)
            ->setPosition(2);

        $rosa_mms2 = new MenuMenuSection();
        $rosa_mms2->setMenu($menu_rosaparks)
            ->setMenuSection($rosaparks_menusection_extras)
            ->setMenuSectionParent($rosaparks_menusection_root)
            ->setPosition(2);

        $rosa_mms3 = new MenuMenuSection();
        $rosa_mms3->setMenu($menu_rosaparks)
            ->setMenuSection($rosaparks_menusection_combos)
            ->setMenuSectionParent($rosaparks_menusection_root)
            ->setPosition(3);

        $rosa_mms4 = new MenuMenuSection();
        $rosa_mms4->setMenu($menu_rosaparks)
            ->setMenuSection($rosaparks_menusection_accompagnement)
            ->setMenuSectionParent($rosaparks_menusection_root)
            ->setPosition(4);


        $rosa_mms5 = new MenuMenuSection();
        $rosa_mms5->setMenu($menu_rosaparks)
            ->setMenuSection($rosaparks_menusection_boissons)
            ->setMenuSectionParent($rosaparks_menusection_root)
            ->setPosition(5);



        $rosa_mms6 = new MenuMenuSection();
        $rosa_mms6->setMenu($menu_rosaparks)
            ->setMenuSection($rosaparks_menusection_dessert)
            ->setMenuSectionParent($rosaparks_menusection_root)
            ->setPosition(6);

        $manager->persist($mms1);
        $manager->persist($mms2);
        $manager->persist($rosa_mms1);
        $manager->persist($rosa_mms1_1);
        $manager->persist($rosa_mms1_2);
        $manager->persist($rosa_mms2);
        $manager->persist($rosa_mms3);
        $manager->persist($rosa_mms4);
        $manager->persist($rosa_mms5);
        $manager->persist($rosa_mms6);


        //MENUITEM MENUSECTION

        $msmi1 = new MenuSectionMenuItem();
        $msmi1->setMenuSection($menuSection_pizza)
            ->setMenuItem($pizza_reine)
            ->setPosition(1);

        $msmi6 = new MenuSectionMenuItem();
        $msmi6->setMenuSection($menuSection_bosphore)
            ->setMenuItem($bosphore_burger1)
            ->setPosition(1);


        $rosa_msmi1_1 = new MenuSectionMenuItem();
        $rosa_msmi1_1->setMenuSection($rosaparks_menusection_burger)
            ->setMenuItem($rosaparks_burger1)
            ->setPosition(1);

        $rosa_msmi1_2 = new MenuSectionMenuItem();
        $rosa_msmi1_2->setMenuSection($rosaparks_menusection_burger)
            ->setMenuItem($rosaparks_burger2)
            ->setPosition(2);


        $rosa_msmi1_3 = new MenuSectionMenuItem();
        $rosa_msmi1_3->setMenuSection($rosaparks_menusection_burger)
            ->setMenuItem($rosaparks_burger3)
            ->setPosition(3);


        $rosa_msmi1_4 = new MenuSectionMenuItem();
        $rosa_msmi1_4->setMenuSection($rosaparks_menusection_burger)
            ->setMenuItem($rosaparks_burger4)
            ->setPosition(4);


        $rosa_msmi1_5 = new MenuSectionMenuItem();
        $rosa_msmi1_5->setMenuSection($rosaparks_menusection_burger)
            ->setMenuItem($rosaparks_burger5)
            ->setPosition(5);


        $rosa_msmi1_6 = new MenuSectionMenuItem();
        $rosa_msmi1_6->setMenuSection($rosaparks_menusection_burger)
            ->setMenuItem($rosaparks_burger6)
            ->setPosition(6);

        $rosa_msmi1_7 = new MenuSectionMenuItem();
        $rosa_msmi1_7->setMenuSection($rosaparks_menusection_burger)
            ->setMenuItem($rosaparks_burger7)
            ->setPosition(7);

        $rosa_msmi1_8 = new MenuSectionMenuItem();
        $rosa_msmi1_8->setMenuSection($rosaparks_menusection_burger)
            ->setMenuItem($rosaparks_burger8)
            ->setPosition(8);

        $rosa_msmi1_9 = new MenuSectionMenuItem();
        $rosa_msmi1_9->setMenuSection($rosaparks_menusection_burger)
            ->setMenuItem($rosaparks_burger9)
            ->setPosition(9);

        $rosa_msmi1_1_1 = new MenuSectionMenuItem();
        $rosa_msmi1_1_1->setMenuSection($rosaparks_menusection_burger_soussection)
            ->setMenuItem($rosaparks_champignon)
            ->setPosition(1);

        $rosa_msmi1_1_2 = new MenuSectionMenuItem();
        $rosa_msmi1_1_2->setMenuSection($rosaparks_menusection_burger_soussection)
            ->setMenuItem($rosaparks_steak_vege)
            ->setPosition(2);

        $rosa_msmi1_2_1 = new MenuSectionMenuItem();
        $rosa_msmi1_2_1->setMenuSection($rosaparks_menusection_burger_soussection2)
            ->setMenuItem($rosaparks_double_steak)
            ->setPosition(1);

        $rosa_msmi1_2_2 = new MenuSectionMenuItem();
        $rosa_msmi1_2_2->setMenuSection($rosaparks_menusection_burger_soussection2)
            ->setMenuItem($rosaparks_add_cheese)
            ->setPosition(2);

        $rosa_msmi1_2_3 = new MenuSectionMenuItem();
        $rosa_msmi1_2_3->setMenuSection($rosaparks_menusection_burger_soussection2)
            ->setMenuItem($rosaparks_add_ingredients)
            ->setPosition(3);

        $rosa_msmi_extra_crispychickent = new MenuSectionMenuItem();
        $rosa_msmi_extra_crispychickent->setMenuSection($rosaparks_menusection_extras)
            ->setMenuItem($rosaparks_crispychicken)
            ->setPosition(1);

        $rosa_msmi_extra_freshsalad = new MenuSectionMenuItem();
        $rosa_msmi_extra_freshsalad->setMenuSection($rosaparks_menusection_extras)
            ->setMenuItem($rosaparks_freshsalad)
            ->setPosition(2);

        $rosa_msmi_accompagnement_frites = new MenuSectionMenuItem();
        $rosa_msmi_accompagnement_frites->setMenuSection($rosaparks_menusection_accompagnement)
            ->setMenuItem($rosaparks_frites)
            ->setPosition(1);

        $rosa_msmi_accompagnement_frites_cheese = new MenuSectionMenuItem();
        $rosa_msmi_accompagnement_frites_cheese->setMenuSection($rosaparks_menusection_accompagnement)
            ->setMenuItem($rosaparks_frites_cheddar)
            ->setPosition(2);

        $rosa_msmi_accompagnement_frites_cheese_bacon = new MenuSectionMenuItem();
        $rosa_msmi_accompagnement_frites_cheese_bacon->setMenuSection($rosaparks_menusection_accompagnement)
            ->setMenuItem($rosaparks_frites_cheddar_bacon)
            ->setPosition(3);

        $rosa_msmi_boisson_homemade = new MenuSectionMenuItem();
        $rosa_msmi_boisson_homemade->setMenuSection($rosaparks_menusection_boissons)
            ->setMenuItem($rosaparks_boisson_homemade)
            ->setPosition(1);


        $rosa_msmi_boisson_naturel = new MenuSectionMenuItem();
        $rosa_msmi_boisson_naturel->setMenuSection($rosaparks_menusection_boissons)
            ->setMenuItem($rosaparks_boisson_naturel)
            ->setPosition(2);

        $rosa_msmi_boisson_classique = new MenuSectionMenuItem();
        $rosa_msmi_boisson_classique->setMenuSection($rosaparks_menusection_boissons)
            ->setMenuItem($rosaparks_boisson_classique)
            ->setPosition(3);

        $rosa_msmi_boisson_chaude = new MenuSectionMenuItem();
        $rosa_msmi_boisson_chaude->setMenuSection($rosaparks_menusection_boissons)
            ->setMenuItem($rosaparks_boisson_chaudes)
            ->setPosition(4);


        $rosa_msmi_dessert_milkshake = new MenuSectionMenuItem();
        $rosa_msmi_dessert_milkshake->setMenuSection($rosaparks_menusection_dessert)
            ->setMenuItem($rosaparks_dessert_milkshake)
            ->setPosition(1);

        $rosa_msmi_dessert_yaourt = new MenuSectionMenuItem();
        $rosa_msmi_dessert_yaourt->setMenuSection($rosaparks_menusection_dessert)
            ->setMenuItem($rosaparks_dessert_yaourt)
            ->setPosition(2);

        $rosa_msmi_dessert_cheesecake = new MenuSectionMenuItem();
        $rosa_msmi_dessert_cheesecake->setMenuSection($rosaparks_menusection_dessert)
            ->setMenuItem($rosaparks_dessert_cheesecake)
            ->setPosition(3);

        $rosa_msmi_dessert_brownies = new MenuSectionMenuItem();
        $rosa_msmi_dessert_brownies->setMenuSection($rosaparks_menusection_dessert)
            ->setMenuItem($rosaparks_dessert_brownies)
            ->setPosition(4);

        $manager->persist($msmi1);
        $manager->persist($msmi6);

        $manager->persist($rosa_msmi1_1);
        $manager->persist($rosa_msmi1_2);
        $manager->persist($rosa_msmi1_3);
        $manager->persist($rosa_msmi1_4);
        $manager->persist($rosa_msmi1_5);
        $manager->persist($rosa_msmi1_6);
        $manager->persist($rosa_msmi1_7);
        $manager->persist($rosa_msmi1_8);
        $manager->persist($rosa_msmi1_9);

        $manager->persist($rosa_msmi1_1_1);
        $manager->persist($rosa_msmi1_1_2);
        $manager->persist($rosa_msmi1_2_1);
        $manager->persist($rosa_msmi1_2_2);
        $manager->persist($rosa_msmi1_2_3);

        $manager->persist($rosa_msmi_extra_crispychickent);
        $manager->persist($rosa_msmi_extra_freshsalad);

        $manager->persist($rosa_msmi_accompagnement_frites);
        $manager->persist($rosa_msmi_accompagnement_frites_cheese);
        $manager->persist($rosa_msmi_accompagnement_frites_cheese_bacon);

        $manager->persist($rosa_msmi_boisson_homemade);
        $manager->persist($rosa_msmi_boisson_naturel);
        $manager->persist($rosa_msmi_boisson_classique);
        $manager->persist($rosa_msmi_boisson_chaude);

        $manager->persist($rosa_msmi_dessert_milkshake);
        $manager->persist($rosa_msmi_dessert_yaourt);
        $manager->persist($rosa_msmi_dessert_cheesecake);
        $manager->persist($rosa_msmi_dessert_brownies);

        $manager->flush();
    }
}