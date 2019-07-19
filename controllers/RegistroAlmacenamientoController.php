<?php

require $_SERVER['DOCUMENT_ROOT'].'/models/RegistroAlmacenamiento.php';

class RegistroAlmacenamientoController{

    private $conn;
    private $registroAlmacenamiento;

    public function __construct($conn){
        $this->conn = $conn;
        $this->registroAlmacenamiento = new RegistroAlmacenamiento($this->conn);
    }

    public function listRegistroAlmacenamientoBanco($idBanco){
        return $this->registroAlmacenamiento->listRegistroAlmacenamientoBanco($idBanco);
    }

    public function show($idRegistro){
        $this->registroAlmacenamiento->show($idRegistro);
        return $this->registroAlmacenamiento;
    }
    public function obtenerRegistro($idDonacion){
        return $this->registroAlmacenamiento->obtenerRegistro($idDonacion);
    }

    public function create($idDonacion, $idBanco){
        return $this->registroAlmacenamiento->create($idDonacion, $idBanco);
    }

    public function delete($idRegistro){
        return $this->registroAlmacenamiento->delete($idRegistro);
    }
}

?>