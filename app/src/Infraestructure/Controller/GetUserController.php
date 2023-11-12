<?php

namespace App\Infraestructure\Controller;

use App\Application\GetUserUseCase;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class GetUserController extends AbstractController
{
    private GetUserUseCase $getUserUseCase;

    public function __construct(GetUserUseCase $getUserUseCase)
    {
        $this->getUserUseCase = $getUserUseCase;
    }

    #[Route('/user/{uuid}', name: 'app_get_user')]
    public function __invoke(string $uuid): JsonResponse
    {
        $user = ($this->getUserUseCase)($uuid);
        if (!$user) {
            return $this->json([
                'message' => 'User not found',
            ], 404);
        }

        return $this->json([
            'uuid' => $user->getUuid(),
            'name' => $user->getName(),
            'email' => $user->getEmail()
        ]);
    }
}
