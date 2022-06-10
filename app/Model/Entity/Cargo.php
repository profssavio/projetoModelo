<?php
namespace App\Model\Entity;

class Cargo {

    private int $id;
    private string $cargo;

    public function getId(): int {
        return $this->id;
    }

    public function setId( int $id ) {
        $this->id = $id;
        return $this;
    }

    public function getCargo(): string {
        return $this->cargo;
    }

    public function setCargo( string $cargo ) {
        $this->cargo = $cargo;

        return $this;
    }
}