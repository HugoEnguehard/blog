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
        return $this->render('contact/index.html.twig', [
            'name' => 'Hugo',
        ]);
    }

    /**
     * @Route("/contact/{city}", name="contactCity")
     */  
    public function cities(string $city): Response
    {
        
        return $this->render('contact/index.html.twig', [
            'city' => $city,
        ]);
    }
}
