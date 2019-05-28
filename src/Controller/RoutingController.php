<?php


namespace App\Controller;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

class RoutingController
{
    /**
     * @Route("/menuList", name="menu_list")
     * @param Environment $twig
     * @return Response
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function menuList(Environment $twig) {
        $content = $twig->render('menu.html.twig', ['menu' => [
            ['name' => 'Coucou', 'sectionList' => []],
            ['name' => 'Coucou2', 'sectionList' => [
                ['name' => 'Coucou2-1', 'sectionList' => []],
            ]]
        ]]);

        return new Response($content);
    }
}