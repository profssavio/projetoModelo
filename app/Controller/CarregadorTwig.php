<?php
namespace App\Controller;

Class CarregadorTwig {

    protected $twig;
    /**
     * Abre o diretorio onde se encontra os templates e carregar o enviroment
     */
    public function __construct() {
        $loader     = new \Twig\Loader\FilesystemLoader( $_ENV['TEMPLATE_DIR'] );
        $this->twig = new \Twig\Environment( $loader );
    }
}