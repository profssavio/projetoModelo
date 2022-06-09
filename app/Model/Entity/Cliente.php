<?php
namespace App\Model\Entity;

class Cliente {

    private int $id;
    private string $nome;
    private string $sobrenome;

    public function getId(): int {
        return $this->id;
    }

    public function setId( int $id ): Cliente {
        $this->id = $id;
        return $this;
    }

    public function getSobrenome(): string {
        return $this->sobrenome;
    }

    public function setSobrenome( string $sobrenome ): Cliente {
        $this->sobrenome = $sobrenome;
        return $this;
    }

    public function getNome(): string {
        return $this->nome;
    }

    public function setNome( string $nome ): Cliente {
        $this->nome = $nome;
        return $this;
    }

}