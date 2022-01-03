<?php

namespace App\Controller\Admin;

use App\Entity\Annonces;
use App\Entity\Categorie;
use App\Entity\Contact;
use App\Entity\Sejours;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractDashboardController
{
    /**
     * @Route("/admin")
     */
    public function index(): Response
    {



    $this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'User tried to access a page without having ROLE_ADMIN');
        $routeBuilder = $this->get(AdminUrlGenerator::class);
        $url = $routeBuilder->setController(UserCrudController::class)->generateUrl();

        return $this->redirect($url);

    }


    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Rochellengue');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Categorie', 'fas fa-map-marker-alt', Categorie::class);
        yield MenuItem::linkToCrud('Contact', 'fas fa-comments', Contact::class);
        yield MenuItem::linkToCrud('Sejours', 'fas fa-map-marker-alt', Sejours::class);
        yield MenuItem::linkToCrud('Annonces', 'fas fa-comments', Annonces::class);
    }
}
