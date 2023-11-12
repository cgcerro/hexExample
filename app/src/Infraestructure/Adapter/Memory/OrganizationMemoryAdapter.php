<?php

use App\Domain\Contract\OrganizationRepositoryContract;
use App\Domain\Entity\Organization;

class OrganizationMemoryAdapter implements OrganizationRepositoryContract
{
    private $organizations = [];

    public function find(string $uuid): ?Organization
    {
        return $this->organizations[$uuid] ?? null;
    }

    public function create(Organization $user): void
    {
        $this->organizations[$user->getUuid()] = $user;
    }
}