<?php

require $_SERVER['DOCUMENT_ROOT'].'/models/Donacion.php';

class DonacionController{

    private $conn;
    private $donacion;

    public function __construct($conn){
        $this->conn = $conn;
        $this->donacion = new Donacion($this->conn);
    }

    public function listDonacionesProveedor($idProveedor){
        return $this->donacion->listDonacionesProveedor($idProveedor);
    }

    public function listDonacionesDonante($idDonante){
        return $this->donacion->listDonacionesDonante($idDonante);
    }

    public function show($idDonacion){
        $this->donacion->show($idDonacion);
        return $this->donacion;
    }

    public function create($idDonante, $idProveedor, $fecha, $cantidad){
        return $this->donacion->create($idDonante, $idProveedor, $fecha, $cantidad);
    }

    public function update($idDonante, $idProveedor, $fecha, $cantidad, $idDonacion){
        return $this->donacion->update($idDonante, $idProveedor, $fecha, $cantidad, $idDonacion);
    }

    public function delete($idDonacion){
        return $this->donacion->delete($idDonacion);
    }
}

?>