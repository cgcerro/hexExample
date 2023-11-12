<?php

namespace App\Infraestructure\Adapter\Memory;

use App\Domain\Contract\UserRepositoryInterface;
use App\Domain\Entity\User;

class UserMemoryAdapter implements UserRepositoryInterface
{
    private $users = [];

    public function get(string $uuid): ?User
    {
        return $this->users[$uuid] ?? null;
    }

    public function create(User $user): void
    {
        $this->users[$user->getUuid()] = $user;
    }
}