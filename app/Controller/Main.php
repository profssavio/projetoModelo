<?php
namespace App\Controller;

class Main extends CarregadorTwig {

    public function index( array $dados ) {
        $dados["titulo"]        = "Pagina inicial";
        $dados["base_adminlte"] = $_ENV['BASE_URL'] . "/vendor/almasaeed2010/adminlte";
        $dados["conteudo"]      = "Conteudo da pagina";
        echo $this->twig->render( "Main.index.html", $dados );
    }

}