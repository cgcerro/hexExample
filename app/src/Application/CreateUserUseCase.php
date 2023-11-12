<?php

namespace App\Application;

use App\Domain\Contract\UserRepositoryInterface;
use App\Domain\Entity\User;

class CreateUserUseCase
{
    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function __invoke(User $user)
    {
        $this->userRepository->create($user);
    }
}