<?php

namespace App\Controller\Admin;

use App\Entity\Category;
use App\Entity\Competences;
use App\Entity\Mission;
use App\Entity\User;
use App\Repository\CompetencesRepository;
use App\Repository\UserRepository;
use EasyCorp\Bundle\EasyAdminBundle\Config\Assets;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserDashboardController extends AbstractDashboardController
{


    private UserRepository $userRepository;
    private CompetencesRepository $CompetencesRepository ;

    // Ici je dit quelle entité je souhaite utilisé, ici, la userRepository

    public function __construct(UserRepository $userRepository, CompetencesRepository $CompetencesRepository){
        $this -> userRepository = $userRepository;
        $this -> CompetencesRepository = $CompetencesRepository;
    }



    /**
     * @IsGranted("ROLE_USER")
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
//        return $this->render("dashboard_view/User_dashboard.html.twig", ["user"=>$this->userRepository->findByProut('Dupont')]);


        $categories = $this->getDoctrine()->getRepository(Category::class)->count([]);
        $competences = $this->getDoctrine()->getRepository(Competences::class)->count([]);
        $missions = $this->getDoctrine()->getRepository(Mission::class)->count([]);

        return $this->render('dashboard_view/User_dashboard.html.twig', [
            'categories' => $categories,
            'competences' => $competences,
            'competenceDis' => $this -> CompetencesRepository -> findAll(),
            'Missions' => $missions,
            'user' =>$this->userRepository->findById(),
            'userlist' => $this->userRepository ->findAll(),
            'lastUser'  => $this->userRepository ->findByLastUser()
        ]);
    }

    public function configureAssets(): Assets
    {
        return Assets::new()->addCssFile('css/admin.css');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Alderaan');
    }

    public function configureMenuItems(): iterable
    {

        $user = $this->container->get('security.token_storage')->getToken()->getUser();

        yield MenuItem::linktoDashboard('Tableau de bord', 'fa fa-home');
        yield MenuItem::linkToCrud('Mon profil', 'fas fa-list', User::class)
            ->setAction('edit')
            ->setEntityId($user->getId())
        ;
        yield MenuItem::linkToCrud('Utilisateur', 'fas fa-list', User::class)
        ->setPermission("ROLE_COMMERCIAL")
        ;
        yield MenuItem::linkToCrud('Missions', 'fas fa-list', Mission::class)
        ->setPermission("ROLE_ADMIN")
        ;
        yield MenuItem::linkToCrud('Compétences', 'fas fa-list', Competences::class)
        ->setPermission("ROLE_ADMIN")
        ;
        yield MenuItem::linkToCrud('Catégorie', 'fas fa-list', Category::class)
        ->setPermission("ROLE_ADMIN")
        ;
    }
}
