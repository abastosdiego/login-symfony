<?php

namespace App\Controller;

use App\Entity\Usuario;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\CurrentUser;

class AreaLogadaController extends AbstractController
{
    #[Route('/area-logada', name: 'app_area_logada', methods: ['GET'])]
    public function index(#[CurrentUser] ?Usuario $usuario): JsonResponse
    {
        return $this->json([
            'message' => $usuario->getNip() . ' ,bem-vindo a área logada do sistema!'
        ]);
    }
}
