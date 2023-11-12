<?php

namespace App\Infraestructure\Dto;

class UserCreateDTO
{
    public function __construct(
        
        public string $name,

        public string $email
    ) {
    }
}