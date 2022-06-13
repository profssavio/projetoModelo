<?php
namespace app\Service;

use app\Repository\IServidorRepository;

class ServidorService {

    private IServidorRepository $servidorRepository;

    public function __construct( IServidorRepository $servidorRepository ) {
        $this->servidorRepository = $servidorRepository;
    }

    public function findAll() {
        return $this->servidorRepository->findAll();
    }
}

?>