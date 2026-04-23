<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class SignupController extends AbstractController
{
    #[Route('/signUp', name: 'app_signUp')]
    public function index(): Response
    {
        return $this->render('signUp/index.html.twig', [
            'controller_name' => 'SignupController',
        ]);
    }
}
