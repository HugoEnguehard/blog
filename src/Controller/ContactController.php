<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ContactRepository;

class ContactController extends AbstractController
{
    /**
     * @var ContactRepository
     */
    private $contactRepository;

    public function __construct(ContactRepository $contactRepository){
        $this->contactRepository = $contactRepository;
    }


    /**
     * @Route("/contact", name="contact")
     */
    public function index(): Response
    {
        return $this->render('pages/contact.html.twig', [
            'name' => 'Hugo',
            'contacts' => $this->contactRepository->findAll()
        ]);
    }
    

    /**
     * @Route("/contact/{id}", name="contactId")
     */  
    public function ids(string $id): Response
    {
        $contact = $this->contactRepository->find($id);

        if(!$contact){
            $contact = ["prenom" => "default", "nom" => "default"];
        }

        return $this->render('pages/contact.html.twig', [
            'contact' => $contact,
        ]);
    }
}
