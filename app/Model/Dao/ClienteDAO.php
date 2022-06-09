<?php
namespace App\Model\Dao;

use App\config\Conexao;
use App\Model\Entity\Cliente;
use PDO;
use PDOException;

class ClienteDAO {

    private PDO $pdo;

    public function __construct() {
        $this->pdo = Conexao::getInstance();
    }

    public function findAll() {
        try {
            $sql  = "SELECT * FROM tb_cliente";
            $stmt = $this->pdo->prepare( $sql );
            $stmt->execute();
            return $stmt->fetchAll( PDO::FETCH_CLASS, Cliente::class );
        } catch ( PDOException $e ) {
            echo $e->getMessage();
        }
    }
}