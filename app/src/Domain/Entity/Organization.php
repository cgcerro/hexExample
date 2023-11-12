<?php

namespace App\Domain\Entity;

class Organization {
    private $uuid;
    private $name;

    public function __construct($uuid, $name) {
        $this->uuid = $uuid;
        $this->name = $name;
    }

    public function getUuid() {
        return $this->uuid;
    }

    public function setUuid($uuid) {
        $this->uuid = $uuid;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }
}
