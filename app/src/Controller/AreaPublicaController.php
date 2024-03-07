<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/area-publica')]
class AreaPublicaController extends AbstractController
{
    #[Route('', name: 'app_area_publica')]
    public function index(): JsonResponse
    {
        return $this->json([
            'message' => 'Bem-vindo a área pública!'
        ]);
    }

    #[Route('/hello', name: 'app_area_publica')]
    public function hello(): JsonResponse
    {
        return $this->json([
            'message' => 'Hello!'
        ]);
    }
}
