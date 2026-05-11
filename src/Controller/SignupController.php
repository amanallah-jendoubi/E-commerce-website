<?php

/// src/Controller/SignUpController.php
namespace App\Controller;

use App\Entity\User;
use App\Form\SignUpType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SignupController extends AbstractController
{
    #[Route('/signUp', name: 'app_signUp', methods: ['GET', 'POST'])]
    public function showFormAction(
        Request $request,
        UserRepository $userRepository,
        EntityManagerInterface $em
    ): Response {

        $user = new User();
        $form = $this->createForm(SignUpType::class, $user);//Creates a form instance by binding two things the entity and the form type class
        $form->handleRequest($request); // binds submitted POST data to the form

        if ($form->isSubmitted() && $form->isValid()) {

            // Check if email already exists in DB
            $existing = $userRepository->findOneBy(['email' => $user->getEmail()]);
            if ($existing) {
                $this->addFlash('error', 'Email already in use.');
                return $this->redirectToRoute('app_signUp');   //user already registred in db
            }

            // Persist user
            $em->persist($user);
            $em->flush();
            dump($user);

            // Log user in directly after signup
            $request->getSession()->set('user_id', $user->getId()); //create session holding UID

            return $this->redirectToRoute('app_home');
        }

        return $this->render('signup/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
