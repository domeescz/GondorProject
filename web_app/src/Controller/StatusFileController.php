<?php

namespace App\Controller;

use App\Entity\StatusFile;
use App\Form\StatusFileType;
use App\Repository\StatusFileRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/status/file')]
class StatusFileController extends AbstractController
{
    #[Route('/', name: 'app_status_file_index', methods: ['GET'])]
    public function index(StatusFileRepository $statusFileRepository): Response
    {
        return $this->render('status_file/index.html.twig', [
            'status_files' => $statusFileRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_status_file_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $statusFile = new StatusFile();
        $form = $this->createForm(StatusFileType::class, $statusFile);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($statusFile);
            $entityManager->flush();

            return $this->redirectToRoute('app_status_file_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('status_file/new.html.twig', [
            'status_file' => $statusFile,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_status_file_show', methods: ['GET'])]
    public function show(StatusFile $statusFile): Response
    {
        return $this->render('status_file/show.html.twig', [
            'status_file' => $statusFile,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_status_file_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, StatusFile $statusFile, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(StatusFileType::class, $statusFile);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_status_file_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('status_file/edit.html.twig', [
            'status_file' => $statusFile,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_status_file_delete', methods: ['POST'])]
    public function delete(Request $request, StatusFile $statusFile, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$statusFile->getId(), $request->request->get('_token'))) {
            $entityManager->remove($statusFile);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_status_file_index', [], Response::HTTP_SEE_OTHER);
    }
}
