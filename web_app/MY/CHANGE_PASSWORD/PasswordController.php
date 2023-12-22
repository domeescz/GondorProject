<?php

// src/Controller/PasswordController.php

namespace App\Controller;

use App\Entity\User;
use App\Form\ChangePasswordType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class PasswordController extends AbstractController
{
    /**
     * @Route("/user/change-password", name="user_change_password")
     */
    public function changePassword(Request $request, UserPasswordEncoderInterface $passwordEncoder): Response
    {
        $user = $this->getUser(); // Získání aktuálně přihlášeného uživatele
        $form = $this->createForm(ChangePasswordType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Změna hesla
            $user->setPassword(
                $form->get('newPassword')->getData(),
                $passwordEncoder
            );

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            // Přesměrování nebo zobrazení zprávy o úspěchu
            return $this->redirectToRoute('some_route');
        }

        return $this->render('password/change.html.twig', [
            'changePasswordForm' => $form->createView(),
        ]);
    }
}
