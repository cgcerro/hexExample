<?php

namespace App\Infraestructure\Controller;

use App\Application\CreateUserUseCase;
use App\Application\GetUserUseCase;
use App\Domain\Entity\User;
use App\Infraestructure\Dto\UserCreateDTO;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Uid\Uuid;

class CreateUserController extends AbstractController
{
    private CreateUserUseCase $createUserUseCase;

    public function __construct(CreateUserUseCase $createUserUseCase)
    {
        $this->createUserUseCase = $createUserUseCase;
    }

    #[Route('/user', name: 'app_create_user', methods: 'POST')]
    public function __invoke(
        #[MapRequestPayload()] UserCreateDTO $userDto
    ): JsonResponse
    {
       
        $user = new User();
        $user->setUuid(Uuid::v4());
        $user->setName($userDto->name);
        $user->setEmail($userDto->email);

        ($this->createUserUseCase)($user);

        return $this->json([
            'uuid' => $user->getUuid(),
            'name' => $user->getName(),
            'email' => $user->getEmail()
        ]);
    }
}
