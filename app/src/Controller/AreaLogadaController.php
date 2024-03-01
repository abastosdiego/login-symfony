<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

class AreaLogadaController extends AbstractController
{
    #[Route('/area-logada', name: 'app_area_logada')]
    public function index(): JsonResponse
    {
        return $this->json([
            'message' => 'Bem-vindo a área logada do sistema!'
        ]);
    }
}
