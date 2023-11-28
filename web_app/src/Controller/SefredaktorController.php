<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SefredaktorController extends AbstractController
{
    #[Route('/sefredaktor', name: 'app_sefredaktor')]
    public function index(): Response
    {
        return $this->render('sefredaktor/index.html.twig', [
            'controller_name' => 'SefredaktorController',
        ]);
    }
}
