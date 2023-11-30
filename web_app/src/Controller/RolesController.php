<?php

namespace App\Controller;

use App\Entity\Uzivatel;
use App\Form\UzivatelType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class RolesController extends AbstractController
{
    #[Route('/uzivatel/{id}/edit', name: 'uzivatel_edit')]
    public function edit(EntityManagerInterface $entityManager, Request $request, int $id): Response
    {
        $uzivatel = $entityManager->getRepository(Uzivatel::class)->find($id);

        if (!$uzivatel) {
            throw $this->createNotFoundException('Uživatel s ID ' . $id . ' nebyl nalezen.');
        }

        $form = $this->createForm(UzivatelType::class, $uzivatel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $entityManager->flush();

            $this->addFlash('success', 'Role byly aktualizovány.');

            return $this->redirectToRoute('uzivatel_show', ['id' => $uzivatel->getId()]);
        }

        return $this->render('roles/edit.html.twig', [
            'uzivatel' => $uzivatel,
            'form' => $form->createView(),
        ]);
    }
}