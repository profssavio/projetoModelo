<?php
namespace App\Controller;

Class CarregadorTwigController {

    protected $twig;
    /**
     * Abre o diretorio onde se encontra os templates e carregar o enviroment
     */
    public function __construct() {
        $loader     = new \Twig\Loader\FilesystemLoader( $_ENV['TEMPLATE_DIR'] );
        $this->twig = new \Twig\Environment( $loader );
        $this->setGlobal();
    }

    public function setGlobal() {
        $this->twig->addGlobal( 'base_adminlte', $_ENV['BASE_URL'] . "/vendor/almasaeed2010/adminlte" );
        $this->twig->addGlobal( 'base_url', $_ENV["BASE_URL"] );
    }
}