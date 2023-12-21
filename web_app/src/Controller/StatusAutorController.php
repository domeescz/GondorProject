<?php

namespace App\Controller;

use App\Entity\StatusAutor;
use App\Form\StatusAutorType;
use App\Repository\StatusAutorRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/status/autor')]
class StatusAutorController extends AbstractController
{
    #[Route('/', name: 'app_status_autor_index', methods: ['GET'])]
    public function index(StatusAutorRepository $statusAutorRepository): Response
    {
        return $this->render('status_autor/index.html.twig', [
            'status_autors' => $statusAutorRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_status_autor_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $statusAutor = new StatusAutor();
        $form = $this->createForm(StatusAutorType::class, $statusAutor);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($statusAutor);
            $entityManager->flush();

            return $this->redirectToRoute('app_status_autor_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('status_autor/new.html.twig', [
            'status_autor' => $statusAutor,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_status_autor_show', methods: ['GET'])]
    public function show(StatusAutor $statusAutor): Response
    {
        return $this->render('status_autor/show.html.twig', [
            'status_autor' => $statusAutor,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_status_autor_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, StatusAutor $statusAutor, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(StatusAutorType::class, $statusAutor);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_status_autor_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('status_autor/edit.html.twig', [
            'status_autor' => $statusAutor,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_status_autor_delete', methods: ['POST'])]
    public function delete(Request $request, StatusAutor $statusAutor, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$statusAutor->getId(), $request->request->get('_token'))) {
            $entityManager->remove($statusAutor);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_status_autor_index', [], Response::HTTP_SEE_OTHER);
    }
}
