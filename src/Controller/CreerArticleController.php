<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CreerArticleController extends AbstractController
{
    /**
     * @Route("/CreerArticle", name="creer_article")
     */
    public function index(): Response
    {
        return $this->render('pages/creer_article.html.twig', [
            'name' => 'Hugo',
        ]);
    }
}
