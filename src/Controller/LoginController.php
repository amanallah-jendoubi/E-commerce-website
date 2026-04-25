<?php

namespace App\Controller;

use App\Form\LoginType;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class LoginController extends AbstractController
{
    #[Route('/login', name: 'app_login', methods: ['GET', 'POST'])]
    public function showFormAction(
        Request $request,
        UserRepository $userRepository
    ): Response {

        $form = $this->createForm(LoginType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();

            // 1. Find user by email
            $user = $userRepository->findOneBy(['email' => $data['email']]);

            // 2. Check user exists + password matches
            if (!$user || $user->getPassword() !== $data['password']) {
                $this->addFlash('error', 'Invalid credentials.');
                return $this->redirectToRoute('app_login');
            }

            // 3.  create session, redirect to home (for identified user)
            $session = $request->getSession();
            $session->set('user_id', $user->getId());
            $session->set('user_email', $user->getEmail());
            return $this->redirectToRoute('app_home');
        }

        return $this->render('login/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
