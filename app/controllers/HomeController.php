<?php
namespace app\controllers;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class HomeController extends Controller {

    public function index( ServerRequestInterface $request, ResponseInterface $response, array $dados ): ResponseInterface {
        $dados["titulo"] = "Pagina inicial";
        $body            = $this->view( 'Main.index.html', $dados );
        $response->getBody()->write( $body );
        return $response;
    }
}