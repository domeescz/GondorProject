<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;


class PublicController extends AbstractController
{
    #[Route('/public', name: 'app_public')]
    public function index(): Response
    {
        return $this->render('public/index.html.twig', [
            'controller_name' => 'PublicController',
        ]);
    }
    #[Route('/public/getNews', name:'get_news_n')]
    public function getNews(): JsonResponse
    {
        $articles=['Article'=>"None",'ShortText'=>"Loremi ipsum",'Link'=>"",'Date'=>"2021-01-01",'Author'=>"None"];
        return new JsonResponse($articles);
    }
    #[Route('/public/getRecomendation', name:'get_recommendation_n')]
    public function getRecomendation(): JsonResponse
    {
        $articles=['Article'=>"None",'ShortText'=>"Loremi ipsum",'Link'=>"",'Date'=>"2021-01-01",'Author'=>"None"];
        return new JsonResponse($articles);
    }

    #[Route('/public/getPrepare', name:'get_prepare_n')]
    public function getPrepare(): JsonResponse
    {
        $articles=['Article'=>"None",'ShortText'=>"Loremi ipsum",'Link'=>"",'Date'=>"2021-01-01",'Author'=>"None"];
        return new JsonResponse($articles);
    }
}
