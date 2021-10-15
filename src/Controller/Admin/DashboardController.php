<?php

namespace App\Controller\Admin;

use App\Entity\Menu;
use App\Entity\MenuMenuSection;
use App\Entity\MenuSection;
use App\Entity\MenuSectionMenuItem;
use App\Entity\Restaurant;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Lemenu');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Restaurants', 'fas fa-list', Restaurant::class);
        yield MenuItem::linkToCrud('Menus', 'fas fa-list', Menu::class);
        yield MenuItem::linkToCrud('MenuSection', 'fas fa-list', MenuSection::class);
        yield MenuItem::linkToCrud('Menu MenuSection', 'fas fa-list', MenuMenuSection::class);
        yield MenuItem::linkToCrud('MenuSectionMenuItem', 'fas fa-list', MenuSectionMenuItem::class);
        yield MenuItem::linkToCrud('MenuItem', 'fas fa-list', \App\Entity\MenuItem::class);
    }
}
