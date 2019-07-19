<?php

require $_SERVER['DOCUMENT_ROOT'].'/models/HistorialRegistro.php';

class HistorialRegistroController{

    private $conn;
    private $historialRegistro;

    public function __construct($conn){
        $this->conn = $conn;
        $this->historialRegistro = new HistorialRegistro($this->conn);
    }

    public function listHistorialRegistro($idRegistro){
        return $this->historialRegistro->listHistorialRegistro($idRegistro);
    }

    public function show($idHistorial){
        $this->historialRegistro->show($idHistorial);
        return $this->historialRegistro;
    }

    public function create($idEstado, $idRegistro, $fecha, $idAdministrador){
        return $this->historialRegistro->create($idEstado, $idRegistro, $fecha, $idAdministrador);
    }

    public function delete($idHistorial){
        return $this->historialRegistro->delete($idHistorial);
    }
}

?>