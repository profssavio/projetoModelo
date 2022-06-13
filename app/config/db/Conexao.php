<?php
namespace app\config\db;

use PDO;
use PDOException;

abstract class Conexao {

    private static PDO $instance;

    public static function getInstance(): PDO {
        try {
            if ( !isset( self::$instance ) ) {
                self::$instance = new PDO( $_ENV['DB_URL'], $_ENV['DB_USER'], $_ENV['DB_PASSWORD'] );
                self::$instance->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
            }
            return self::$instance;
        } catch ( PDOException $e ) {
            echo "Falha ao conectar no banco de dados " . $e->getMessage();
        }
    }

}