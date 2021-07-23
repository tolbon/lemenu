<?php
declare(strict_types=1);

namespace App\Controller;

use App\DTO\FilterMenuDTO;
use App\Entity\Restaurant;
use App\Form\PropertySearchType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

class RoutingController extends AbstractController
{

    public function __construct()
    {
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

        $restaurant = $restaurantRepo->findOneBy(['id' => 1]);

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

        $restaurant = $restaurantRepo->findOneBy(['id' => 1]);

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

        $restaurant = $restaurantRepo->findOneBy(['id' => 1]);
        $menus = $restaurant->getHasMenu();
        foreach ($menus as $menu) {
            $menuSection = $menu->getHasMenuSection();
        }

        $filterMenu = new FilterMenuDTO();
        $form = $this->createForm(PropertySearchType::class, $filterMenu);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            $filterMenu = $form->getData();
        }

        $content = $twig->render('menu.html.twig',
        [
            'restaurant' => $restaurant,
            'form' => $form->createView()
        ]);

        return new Response($content);
    }
}