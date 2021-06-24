<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class ProfilController extends AbstractController
{
    private EntityManagerInterface $entityManager;
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/profil", name="profil")
     */
    public function index(): Response
    {
        return $this->render('profil/index.html.twig', [
            'controller_name' => 'ProfilController',
        ]);
    }

    /**
     * @Route("/profil/show/{id}", name="show")
     */
    public function show($id): Response
    {
        $user = $this->entityManager->getRepository(User::class)->find($id);

        return $this->render('profil/show.html.twig', [
            'controller_name' => 'ProfilController',
            'user' => $user
        ]);
    }

    /**
     * @Route("/register/{id}/edit", name="edit")
     */
    public function edit(User $profil, Request $request, UserPasswordEncoderInterface $passwordEncoder)
    : Response {
        $form = $this->createForm(UserType::class, $profil);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $profil = $form->getData();
            $profil->setPassword($passwordEncoder->encodePassword($profil, $profil->getPassword()));
            $this->entityManager->persist($profil);
            $this->entityManager->flush();
            return $this->redirectToRoute('profil');
        }
        return $this->render(
            'register/index.html.twig',
            ['form_register' => $form->createView()]
        );
    }




}
