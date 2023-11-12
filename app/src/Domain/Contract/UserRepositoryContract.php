<?php

namespace App\Domain\Contract;

use App\Domain\Entity\User;

interface UserRepositoryInterface
{
    public function get(string $uuid): ?User;
    
    public function create(User $user): void;
}
