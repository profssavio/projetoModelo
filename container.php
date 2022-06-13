<?php

use app\Repository\IServidorRepository;
use app\Repository\ServidorRepository;
use Twig\Environment;
use Twig\Extra\Intl\IntlExtension;

return [
    Environment::class         => function () {
        $loader = new \Twig\Loader\FilesystemLoader( __DIR__ . '/app/views' );
        $twig   = new \Twig\Environment( $loader );
        $twig->addGlobal( 'base_adminlte', $_ENV['BASE_URL'] . "/vendor/almasaeed2010/adminlte" );
        $twig->addGlobal( 'base_url', $_ENV["BASE_URL"] );
        $twig->addExtension( new IntlExtension() );
        $twig->getExtension( \Twig\Extension\CoreExtension::class )->setTimezone( 'America/Sao_Paulo' );
        return $twig;
    },
    IServidorRepository::class => DI\get( ServidorRepository::class ),
];

?>