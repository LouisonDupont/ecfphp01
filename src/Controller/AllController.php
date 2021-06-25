<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AllController extends AbstractController
{
    /**
     * @Route("/admin/all", name="all")
     * * @IsGranted("ROLE_ADMIN")
     */
    public function index(): Response
    {

        return $this->render('all/index.html.twig', [
            'controller_name' => 'AllController',
        ]);
    }
}
