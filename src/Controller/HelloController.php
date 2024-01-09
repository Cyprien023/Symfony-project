<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HelloController extends AbstractController
{
    #[Route('/hello')]
    public function hello(): Response
    {
        $villesParPays = [
            'France' => ['Paris', 'Marseille', 'Lyon'],
            'Allemagne' => ['Berlin', 'Hamburg', 'Munich'],
            'Italie' => ['Rome', 'Milan', 'Venice'],
        ];

        return $this->render('hello/index.html.twig', [
            'villesParPays' => $villesParPays,
        ]);
    }
}
