<?php

namespace App\Controller;


use App\DTO\Menu;
use App\DTO\MenuItem;
use App\DTO\MenuSection;
use App\DTO\Restaurant;
use App\Form\PropertySearchType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

class RoutingController extends AbstractController
{
    /**
     * @Route("{restaurantName}", name="restaurantDesc")
     * @param Environment $twig
     * @return Response
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function restaurantPage(Environment $twig) {

        $restaurant = new Restaurant();
        $restaurant->name = 'Le BÔ$phɵǒrœ ȘỚỸßØå';

        $menu = new Menu();
        $menu->name = "Menu 12/03";
        $menu->hasMenuItem = [];

        $menuSection = new MenuSection();
        $menuSection->name = 'Coucou';

        $menuSection2 = new MenuSection();
        $menuSection2->name = 'Coucou 2';
        $menuSection2->hasMenuSection = [];


        $menuSection2_1 = new MenuSection();
        $menuSection2_1->name = 'Coucou 2-1';
        $menuSection2_1->hasMenuItem = [];

        $menuItem = new MenuItem();
        $menuItem->name = "Kebab";
        $menuItem->description = "De la viande Hallal";

        $menuItem2 = new MenuItem();
        $menuItem2->name = "KPop";
        $menuItem2->description = "Viande Coreene";

        $menuSection2->hasMenuItem[] = $menuItem2;

        $menuSection2_1->hasMenuItem[] = $menuItem;

        $menuSection2->hasMenuSection[] = $menuSection2_1;


        $restaurant->hasMenu = $menu;
        $menu->hasMenuSection[] = $menuSection;
        $menu->hasMenuSection[] = $menuSection2;
        $menu->hasMenuSection[] = new MenuSection();

        $content = $twig->render('restaurant.html.twig',
            [
                'restaurant' => $restaurant
            ]);

        return new Response($content);
    }

    /**
     * @Route("{restaurantName}/menus", name="menu_list")
     * @param Environment $twig
     * @return Response
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function menuList(Environment $twig) {

        $restaurant = new Restaurant();
        $restaurant->name = 'Le BÔ$phɵrœ';

        $menu = new Menu();
        $menu->name = "Menu 12/03";
        $menu->hasMenuItem = [];

        $restaurant->hasMenu = [$menu];

        $content = $twig->render('menuList.html.twig',
            [
                'restaurant' => $restaurant
            ]);

        return new Response($content);
    }


    /**
     * @Route("{restaurantName}/{menuName}", name="menu")
     * @param Environment $twig
     * @return Response
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function menuPage(Environment $twig) {

        $restaurant = new Restaurant();
        $restaurant->name = 'MacDo';

        $menu = new Menu();
        $menu->name = "Produits";
        $menu->hasMenuItem = [];

        $menuSection = new MenuSection();
        $menuSection->name = 'Des trucs';

        $menuSection2 = new MenuSection();
        $menuSection2->name = 'Nos Menus';
        $menuSection2->description = '';
        $menuSection2->hasMenuSection = [];


        $menuSection2_1 = new MenuSection();
        $menuSection2_1->name = 'Le Menu Maxi BEST OF';
        $menuSection2_1->description = '1 sandwich + 1 frites
         + 1 bouteille';
        $menuSection2_1->price = 10.0;
        $menuSection2_1->hasMenuItem = [];

        $menuItem = new MenuItem();
        $menuItem->name = "Texas Cheese 🍕";
        $menuItem->description = "Sauce Tomate, Mozzarella, Chorizo, Fromage de chèvre, Tomates fraîches";

        $menuItem2 = new MenuItem();
        $menuItem2->name = "Harlem Margherita";
        $menuItem2->description = "Sauce Tomate, Mozzarella";
        $menuItem2->price = 12.5;

        $menuSection2->hasMenuItem[] = $menuItem2;

        $menuSection2_1->hasMenuItem[] = $menuItem;

        $menuSection2->hasMenuSection[] = $menuSection2_1;


        $restaurant->hasMenu = [$menu];
        $menu->hasMenuSection[] = $menuSection;
        $menu->hasMenuSection[] = $menuSection2;
        $menu->hasMenuSection[] = new MenuSection();

        $form = $this->createForm(PropertySearchType::class, []);

        $content = $twig->render('menu.html.twig',
            [
                'restaurant' => $restaurant,
                'form' => $form->createView()
            ]);

        return new Response($content);
    }
}