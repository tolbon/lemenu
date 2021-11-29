<?php
declare(strict_types=1);

namespace App\Controller;

use App\DTO\FilterMenuDTO;
use App\DTO\MenuDTO;
use App\DTO\Output\MenuOutput;
use App\Entity\Allergy;
use App\Entity\Diet;
use App\Entity\Menu;
use App\Entity\MenuItem;
use App\Entity\Restaurant;
use App\Entity\User;
use App\Form\PropertySearchType;
use App\Service\FilterMenuItem;
use App\Service\TransformService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;
use Twig\Environment;
use function Symfony\Component\String\s;

class RoutingController extends AbstractController
{

    private FilterMenuItem $filterMenuItem;
    private TransformService $tranfertObject;

    public function __construct(FilterMenuItem $filterMenuItem, TransformService $tranfertObject)
    {
        $this->filterMenuItem = $filterMenuItem;
        $this->tranfertObject = $tranfertObject;
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

        if ($restaurant === null) {
            //404
            return new Response(null, 404);
        }

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

        if ($restaurant === null) {
            //404
            return new Response(null, 404);
        }

        $content = $twig->render('menuList.html.twig',
            [
                'restaurant' => $restaurant
            ]);

        return new Response($content);
    }

    /**
     * @Route("{restaurantName}/menus/{menuName}.json", name="menuJson")
     * @param Environment $twig
     * @return Response
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function menuJsonPage(string $restaurantName, string $menuName, Environment $twig, Request $request) {
        $restaurantRepo = $this->getDoctrine()->getRepository(Restaurant::class);
        $restaurant = $restaurantRepo->findOneBy(['urlSlug' => $restaurantName]);

        if ($restaurant === null) {
            //404
            return new Response(null, 404);
        }

        $menu = $this->findMyMenu($restaurant, $menuName);

        $menuDTO = new MenuDTO($menu);

        return new JsonResponse($menu);
    }

    /**
     * @Route("{slugRestaurantName}/menus/{slugMenuName}", name="menu")
     * @param Environment $twig
     * @return Response
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function menuPage(string $slugRestaurantName, string $slugMenuName, Environment $twig, Request $request) {
        $restaurantRepo = $this->getDoctrine()->getRepository(Restaurant::class);
        $restaurant = $restaurantRepo->findOneBy(['urlSlug' => $slugRestaurantName]);

        if ($restaurant === null) {
            //404
            return new Response(null, 404);
        }

        $menu = $this->findMyMenu($restaurant, $slugMenuName);

        $filterMenu = new FilterMenuDTO();

        $user = $this->getUser();
        if ($user !== null) {
            $userRepo = $this->getDoctrine()->getRepository(User::class);
            $userEntity = $userRepo->findOneBy(['email' => $user->getUserIdentifier()]);
            $filterMenu->diet = array_map(function ($d) {
                    return $d->getName();
            }, $userEntity->getDiets()->toArray());
            $filterMenu->allergy = array_map(function ($a) {
                return $a->getName();
            }, $userEntity->getAllergies()->toArray());
        }

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



    private function findMyMenu(Restaurant $restaurant, string $menuName) : ?MenuOutput {
        $menuRepo = $this->getDoctrine()->getRepository(Menu::class);
        $allergyRepo = $this->getDoctrine()->getRepository(Allergy::class);
        $dietRepo = $this->getDoctrine()->getRepository(Diet::class);

        $menuItemRepo = $this->getDoctrine()->getRepository(MenuItem::class);

        /**
         * @var Menu|null $menu
         */
        $menu = $menuRepo->findMyMenu($restaurant, $menuName);

        if ($menu === null) {
            return null;
        }

        $menuItemIds = [];
        foreach($menu->getMenuMenuSections() as $hasMenuSection) {
            foreach($hasMenuSection->getMenuSection()->getMenuSectionMenuItems() as $menuSectionMenuItems) {
                $menuItemIds[] = $menuSectionMenuItems->getMenuItem()->getId();
            }
        }
        $allergies = [];
        $diets = [];
        if ($menuItemIds !== []) {
            $allergies = $menuItemRepo->findAllAllergyOfIds($menuItemIds);
            $diets = $dietRepo->findAllDietOfIds($menuItemIds);
        }

        return $this->tranfertObject->menuEntity2MenuOutput($menu, $allergies, $diets);
    }
}