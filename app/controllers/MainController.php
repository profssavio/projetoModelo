<?php
namespace App\Controller;

class MainController extends CarregadorTwigController {

    public function index( array $dados ) {
        $dados["titulo"]   = "Pagina inicial";
        $dados["conteudo"] = "Conteudo da pagina";
        echo $this->twig->render( "Main.index.html", $dados );
    }

}