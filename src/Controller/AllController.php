<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AllController extends AbstractController
{
    private EntityManagerInterface $entityManager;
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/admin/all", name="all")
     * * @IsGranted("ROLE_ADMIN")
     */
    public function index(): Response
    {

        $user = $this->entityManager->getRepository(User::class)->findAll();

        return $this->render('all/index.html.twig', [
            'controller_name' => 'AllController',
            'user' => $user
        ]);
    }
}
