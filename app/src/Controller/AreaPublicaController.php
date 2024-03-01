<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

class AreaPublicaController extends AbstractController
{
    #[Route('/area-publica', name: 'app_area_publica')]
    public function index(): JsonResponse
    {
        return $this->json([
            'message' => 'Bem-vindo a área pública!'
        ]);
    }
}
