<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     */
    public function index(): Response
    {
        $messages = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $messages[] = "Merci pour votre message !";
            return $this->render('contact/new.html.twig', ['messages' => $messages]);
        }
        return $this->render('contact/new.html.twig', ['messages' => $messages]);
    }
}
