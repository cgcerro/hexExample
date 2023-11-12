<?php

namespace App\Application;

use App\Domain\Contract\UserRepositoryInterface;
use App\Domain\Entity\User;

class GetUserUseCase
{
    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function __invoke(string $uuid): ?User
    {
        return $this->userRepository->get($uuid);
    }
}