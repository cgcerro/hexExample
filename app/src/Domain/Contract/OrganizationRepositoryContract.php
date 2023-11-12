<?php

namespace App\Domain\Contract;

use App\Domain\Entity\Organization;

interface OrganizationRepositoryContract
{
    public function find(string $uuid): ?Organization;
    
    public function create(Organization $user): void;
}
