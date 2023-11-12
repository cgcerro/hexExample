<?php

namespace App\Domain\Entity;

use App\Infraestructure\Adapter\Doctrine\UserDoctrineAdapter as DoctrineUserDoctrineAdapter;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DoctrineUserDoctrineAdapter::class)]
#[ORM\Table(name: '`user`')]
class User {

    #[ORM\Id]
    #[ORM\Column(length: 255)]
    private string $uuid;

    #[ORM\Column(length: 255)]
    private string $name;

    #[ORM\Column(length: 255)]
    private string $email;
    
    public function getUuid() {
        return $this->uuid;
    }
    
    public function getName() {
        return $this->name;
    }
    
    public function getEmail() {
        return $this->email;
    }
    
    public function setUuid($uuid) {
        $this->uuid = $uuid;
    }
    
    public function setName($name) {
        $this->name = $name;
    }
    
    public function setEmail($email) {
        $this->email = $email;
    }
}
