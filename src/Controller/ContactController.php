<?php

namespace App\Controller;

use App\Form\ContactType;
use App\Service\MailerService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact', methods: ['GET', 'POST'])]
    public function index(Request $request, MailerService $mailerService): Response
    {
        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();//fetching data out of the form

            $mailerService->sendContactEmail(
                $data['email'],
                $data['firstName'],
                $data['lastName'],
                $data['subject'],
                $data['message']
            );

            return $this->redirectToRoute('app_home');
        }
        //happens when get request (just render)
        return $this->render('contact/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
