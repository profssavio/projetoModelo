<?php
namespace App\Model\Dao;

use App\config\Conexao;
use App\Model\Entity\Servidor;
use PDO;
use PDOException;

class ServidorDAO {

    private PDO $pdo;

    public function __construct() {
        $this->pdo = Conexao::getInstance();
    }

    public function findAll() {
        try {
            $sql  = "SELECT * FROM tb_servidor";
            $stmt = $this->pdo->prepare( $sql );
            $stmt->execute();
            return $stmt->fetchAll( PDO::FETCH_CLASS, Servidor::class );
        } catch ( PDOException $e ) {
            echo $e->getMessage();
        }
    }
}