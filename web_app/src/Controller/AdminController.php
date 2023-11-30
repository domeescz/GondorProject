<?php

namespace App\Controller;

use App\Entity\Uzivatel;
use phpDocumentor\Reflection\Types\This;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use function PHPUnit\Framework\throwException;

class AdminController extends AbstractController
{
    #[Route('/admin', name: 'app_admin')]
    public function index(): Response
    {
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }

    #[Route('/admin/users', name: 'prehled_uzivatelu')]
    public function show(EntityManagerInterface $entityManager): Response
    {
        $uzivatele = $entityManager->getRepository(Uzivatel::class)->findAll();

        if(!$uzivatele){
            $roles = [];
        }

        return $this->render('admin/users.html.twig', [
            'uzivatele' => $uzivatele
        ]);
        #return new Response('Check the roles: '.$roles->getRoles());
    }
}
