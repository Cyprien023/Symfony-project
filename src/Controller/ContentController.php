<?php

namespace App\Controller;

use App\Entity\Content;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\PaginatorInterface;

class ContentController extends AbstractController
{
    #[Route('/contenu/liste', name: 'content_list')]

    public function list(
        EntityManagerInterface $entityManager,
        LoggerInterface $logger,
        PaginatorInterface $paginator,
        Request $request
    ): Response {
        $contenus = $entityManager->getRepository(Content::class)->findAll();

        if (!$contenus) {
            throw $this->createNotFoundException('Content not found');
        }

        $pagination = $paginator->paginate(
            $contenus,
            $request->query->getInt('page', 1),
            1
        );

        return $this->render('content/liste.html.twig', ['contenus' => $pagination]);
    }

    #[Route('/contenu/{id}', name: 'content_show')]
    public function show(Content $contenu): Response
    {
        return $this->render('content/show.html.twig', ['contenu' => $contenu]);
    }

}
