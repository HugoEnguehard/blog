<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Article;
use App\Form\CreerArticleType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;

class CreerArticleController extends AbstractController
{
    /**
     * @Route("/CreerArticle", name="creer_article")
     */
    public function index(Request $request): Response
    {
        $article = new Article();
        $article->setNom("J'aime le pain");
        $article->setSlug("article-pain");
        $article->setContenu("J'aime le pain");

        $form = $this->createForm(CreerArticleType::class, $article);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $article = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();

            $entityManager->persist($article);
            $entityManager->flush();

            return $this->redirectToRoute('taskSuccess');
        }

        return $this->render('pages/creer_article.html.twig', [
            'name' => 'Hugo',
            'form' => $form->createView()
        ]); 
    }

    /**
     * @Route("/CreerArticle/taskSuccess", name="taskSuccess")
     */
    public function taskSuccess(): Response
    {
        return $this->render('pages/success.html.twig', [
            "success" => true,
        ]);
    }
}
