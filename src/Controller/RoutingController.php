<?php
declare(strict_types=1);

namespace App\Controller;

use App\DTO\FilterMenuDTO;
use App\Entity\Allergy;
use App\Entity\Diet;
use App\Entity\Menu;
use App\Entity\Restaurant;
use App\Form\PropertySearchType;
use App\Service\FilterMenuItem;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;
use function Symfony\Component\String\s;

class RoutingController extends AbstractController
{

    private FilterMenuItem $filterMenuItem;

    public function __construct(FilterMenuItem $filterMenuItem)
    {
        $this->filterMenuItem = $filterMenuItem;
    }

    /**
     * @Route("{restaurantName}", name="restaurant")
     * @param Environment $twig
     * @return Response
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function restaurantPage(string $restaurantName, Environment $twig) {

        $restaurantRepo = $this->getDoctrine()->getRepository(Restaurant::class);

        $restaurant = $restaurantRepo->findOneBy(['urlSlug' => $restaurantName]);

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
    public function menuList(string $restaurantName, Environment $twig) {

        $restaurantRepo = $this->getDoctrine()->getRepository(Restaurant::class);

        $restaurant = $restaurantRepo->findOneBy(['urlSlug' => $restaurantName]);

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
    public function menuPage(string $restaurantName, string $menuName, Environment $twig, Request $request) {
        $restaurantRepo = $this->getDoctrine()->getRepository(Restaurant::class);
        $menuRepo = $this->getDoctrine()->getRepository(Menu::class);
        $allergyRepo = $this->getDoctrine()->getRepository(Allergy::class);
        $dietRepo = $this->getDoctrine()->getRepository(Diet::class);

        $restaurant = $restaurantRepo->findOneBy(['urlSlug' => $restaurantName]);
        /**
         * @var Menu|null $menu
         */
        $menu = $menuRepo->findMyMenu($restaurant, $menuName);

        if ($menu === null) {
            return null;
        }

        $menuItemIds = [];
        foreach($menu->getMenuHasMenuSections() as $menuSection) {
            foreach($menuSection->getMenuItem() as $menuItem) {
                $menuItemIds[] = $menuItem->getId();
            }
        }

        $filterMenu = new FilterMenuDTO();
        $form = $this->createForm(PropertySearchType::class, $filterMenu);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            $filterMenu = $form->getData();
        }

        $this->filterMenuItem->filter($menu, $filterMenu);

        $content = $twig->render('menu.html.twig',
        [
            'restaurant' => $restaurant,
            'menu' => $menu,
            'form' => $form->createView()
        ]);

        return new Response($content);
    }
}