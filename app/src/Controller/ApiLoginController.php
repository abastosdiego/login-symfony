<?php

namespace App\Controller;

use App\Entity\Usuario;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\CurrentUser;

class ApiLoginController extends AbstractController
{
    public function __construct(private EntityManagerInterface $entityManager) {}

    #[Route('/api/register', name: 'api_register', methods: ['POST'])]
    public function register(Request $request, UserPasswordHasherInterface $passwordHasher): Response
    {
        $inputData = $request->toArray();
        // ... e.g. get the user data from a registration form
        $usuario = new Usuario($inputData['nip']);

        // hash the password (based on the security.yaml config for the $user class)
        $hashedPassword = $passwordHasher->hashPassword(
            $usuario,
            $inputData['senha']
        );
        $usuario->setPassword($hashedPassword);

        // Informa ao Doctrine que você deseja salvar esse novo objeto, quando for efetuado o flush.
        $this->entityManager->persist($usuario);

        // Efetua as alterações no banco de dados
        $this->entityManager->flush();

        return $this->json([
            'message'  => 'Usuário cadastrado com sucesso!',
            'id' => $usuario->getId(),
        ]);
    }

    #[Route('/api/login', name: 'api_login', methods: ['POST'])]
    public function login(#[CurrentUser] ?Usuario $user): Response
    {
        if (null === $user) {
            return $this->json([
                'message' => 'missing credentials',
            ], Response::HTTP_UNAUTHORIZED);
        }

        //$token = ...; // somehow create an API token for $user
        
        $token = '';

        return $this->json([
            'user'  => $user->getUserIdentifier(),
            'token' => $token,
        ]);
    }


}
