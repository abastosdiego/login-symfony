<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

class AreaLogadaController extends AbstractController
{
    #[Route('/api/area-logada', name: 'app_area_logada', methods: ['GET'])]
    public function index(): JsonResponse
    {
        return $this->json([
            'message' => 'Bem-vindo a área logada do sistema!'
        ]);
    }
}
