<?php
namespace app\traits;

use Twig\Extra\Intl\IntlExtension;

trait View {
    protected $twig;

    protected function twig() {
        $loader     = new \Twig\Loader\FilesystemLoader( __DIR__ . '/../views' );
        $this->twig = new \Twig\Environment( $loader, [
            'debug' => true,
        ] );
    }

    protected function global () {
        $this->twig->addGlobal( 'base_adminlte', $_ENV['BASE_URL'] . "/vendor/almasaeed2010/adminlte" );
        $this->twig->addGlobal( 'base_url', $_ENV["BASE_URL"] );
    }

    public function extension() {
        $this->twig->addExtension( new IntlExtension() );
        $this->twig->getExtension( \Twig\Extension\CoreExtension::class )->setTimezone( 'America/Sao_Paulo' );
    }

    protected function load(): void {
        $this->twig();
        $this->global();
        $this->extension();
    }

    protected function view( $view, $dados ): string {
        $this->load();
        return $this->twig->render( $view, $dados );
    }
}