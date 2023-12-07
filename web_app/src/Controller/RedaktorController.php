<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\FileUploader;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\String\Slugger\SluggerInterface;
use App\Entity\Files;
use App\Form\UploadFilesType;



class RedaktorController extends AbstractController
{
    #[Route('/redaktor', name: 'app_redaktor')]
    public function index(): Response
    {
        return $this->render('redaktor/index.html.twig', [
            'controller_name' => 'RedaktorController',
        ]);
    }
	
	#[Route('/redaktor/uploadfiles', name: 'uploadfiles')]
    public function uploadfiles(Request $request, SluggerInterface $slugger): Response
    {
        $files = new Files();
        $form = $this->createForm(UploadFilesType::class, $files);
        $form->handleRequest($request);
		
		
		if ($form->isSubmitted() && $form->isValid()) {
            /** @var UploadedFile $filesFile */
            $filesFile = $form->get('filename')->getData();

            // this condition is needed because the 'files' field is not required
            // so the PDF file must be processed only when a file is uploaded
            if ($filesFile) {
                $originalFilename = pathinfo($filesFile->getClientOriginalName(), PATHINFO_FILENAME);
                // this is needed to safely include the file name as part of the URL
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename.'-'.uniqid().'.'.$filesFile->guessExtension();

                // Move the file to the directory where filess are stored
                try {
                    $filesFile->move(
                        $this->getParameter('article_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                    // ... handle exception if something happens during file upload
                }

                // updates the 'filesFilename' property to store the PDF file name
                // instead of its contents
                $files->setFileName($newFilename);
            }

            return $this->redirectToRoute('redaktor');
        }

        return $this->render('redaktor/uploadfiles.html.twig', [
            'form' => $form->createView(),
        ]);
    }
	


}
