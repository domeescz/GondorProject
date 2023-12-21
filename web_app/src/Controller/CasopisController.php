<?php

namespace App\Controller;

use App\Entity\Casopis;
use App\Form\CasopisType;
use App\Repository\CasopisRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/casopis')]
class CasopisController extends AbstractController
{
    #[Route('/', name: 'app_casopis_index', methods: ['GET'])]
    public function index(CasopisRepository $casopisRepository): Response
    {
        return $this->render('casopis/index.html.twig', [
            'casopis' => $casopisRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_casopis_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $casopi = new Casopis();
        $form = $this->createForm(CasopisType::class, $casopi);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($casopi);
            $entityManager->flush();

            return $this->redirectToRoute('app_casopis_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('casopis/new.html.twig', [
            'casopi' => $casopi,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_casopis_show', methods: ['GET'])]
    public function show(Casopis $casopi): Response
    {
        return $this->render('casopis/show.html.twig', [
            'casopi' => $casopi,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_casopis_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Casopis $casopi, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(CasopisType::class, $casopi);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_casopis_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('casopis/edit.html.twig', [
            'casopi' => $casopi,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_casopis_delete', methods: ['POST'])]
    public function delete(Request $request, Casopis $casopi, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$casopi->getId(), $request->request->get('_token'))) {
            $entityManager->remove($casopi);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_casopis_index', [], Response::HTTP_SEE_OTHER);
    }
}
