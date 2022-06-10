<?php
namespace App\Controller;

use App\Model\Dao\ServidorDAO;

class ServidorController extends CarregadorTwigController {

    private ServidorDAO $servidorDAO;

    public function __construct() {
        parent::__construct();
        $this->servidorDAO = new ServidorDAO();
    }

    public function index( array $dados ) {
        $dados["titulo"]     = "Listar Servidores";
        $dados["servidores"] = $this->servidorDAO->findAll();
        echo $this->twig->render( "Servidor.index.html", $dados );
    }
}