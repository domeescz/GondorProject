<?php

// src/Controller/NewUserController.php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NewUserController extends AbstractController
{
    /**
     * @Route("/new/user", name="new_user")
     */
    public function index(): Response
    {
        return $this->render('new_user/index.html.twig', [
            'controller_name' => 'NewUserController',
        ]);
    }
}
