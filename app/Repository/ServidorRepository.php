<?php
namespace app\Repository;

use app\config\db\Conexao;
use PDO;
use PDOException;

class ServidorRepository implements IServidorRepository {

    private PDO $pdo;

    public function __construct() {
        $this->pdo = Conexao::getInstance();
    }

    public function findAll(): array{
        try {
            $sql = "SELECT servidor.id, servidor.matricula , servidor.nome, servidor.situacao, servidor.data_admissao, cargo.cargo "
                . "FROM tb_servidor as servidor "
                . "INNER JOIN tb_cargo as cargo ON servidor.cargo = cargo.id";
            $stmt = $this->pdo->prepare( $sql );
            $stmt->execute();
            return $stmt->fetchAll( PDO::FETCH_ASSOC );
        } catch ( PDOException $e ) {
            echo $e->getMessage();
        }
    }
}