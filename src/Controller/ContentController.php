<?php


namespace App\Controller;

use App\Entity\Content;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContentController extends AbstractController
{
    #[Route('/contenu/liste', name: 'content_list')]
    public function liste(): Response
    {
        $contenus = $this->getDoctrine()->getRepository(Content::class)->findAll();

        return $this->render('content/liste.html.twig', ['contenus' => $contenus]);
    }
}


