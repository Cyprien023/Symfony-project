<?php

namespace App\Controller;

use App\Entity\Content;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class ContentController extends AbstractController
{
    #[Route('/contenu/liste', name: 'content_list')]

    public function list(EntityManagerInterface $entityManager, LoggerInterface $logger): Response
    {
        $contenus = $entityManager->getRepository(Content::class)->findAll();

        if (!$contenus) {
            throw $this->createNotFoundException('Content not found');
        }

        return $this->render('content/liste.html.twig', ['contenus' => $contenus]);
    }
}
