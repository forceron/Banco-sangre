<?php

require $_SERVER['DOCUMENT_ROOT'].'/models/Capacidad.php';

class CapacidadController{

    private $conn;
    private $capacidad;

    public function __construct($conn){
        $this->conn = $conn;
        $this->capacidad = new Capacidad($this->conn);
    }

    public function listCapacidad($idBanco){
        return $this->capacidad->listCapacidadBanco($idBanco);
    }

    public function show($idCapacidad){
        $this->capacidad->show($idCapacidad);
        return $this->capacidad;
    }

    public function create($idBanco, $max, $min, $idRH){
        return $this->capacidad->create($idBanco, $max, $min, $idRH);
    }

    public function update($idBanco, $max, $min, $idRH, $idCapacidad){
        return $this->capacidad->update($idBanco, $max, $min, $idRH, $idCapacidad);
    }
}

?>