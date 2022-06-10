<?php
namespace App\Model\Entity;

class Servidor {

    private int $id;
    private string $matricula;
    private string $nome;
    private string $situacao;
    private Cargo $cargo;

    public function getId(): int {
        return $this->id;
    }

    public function setId( int $id ): Servidor {
        $this->id = $id;
        return $this;
    }

    public function getMatricula(): string {
        return $this->matricula;
    }

    public function setMatricula( string $matricula ): Servidor {
        $this->matricula = $matricula;
        return $this;
    }

    public function getNome(): string {
        return $this->nome;
    }

    public function setNome( string $nome ): Servidor {
        $this->nome = $nome;
        return $this;
    }

    public function getSituacao(): string {
        return $this->situacao;
    }

    public function setSituacao( string $situacao ): Servidor {
        $this->situacao = $situacao;
        return $this;
    }

    public function getCargo(): Cargo {
        return $this->cargo;
    }

    public function setCargo( Cargo $cargo ) {
        $this->cargo = $cargo;
        return $this;
    }
}