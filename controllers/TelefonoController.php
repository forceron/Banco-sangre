<?php

require $_SERVER['DOCUMENT_ROOT'].'/models/Telefono.php';

class TelefonoController{

    private $conn;
    private $telefono;

    public function __construct($conn){
        $this->conn = $conn;
        $this->telefono = new Telefono($this->conn);
    }

    public function listTelefonosDonante($cedula){
        return $this->telefono->listTelefonosDonante($cedula);
    }

    public function show($idTelefono){
        $this->telefono->show($idTelefono);
        return $this->telefono;
    }

    public function create($donanteAsociado, $numero, $tipo){
        return $this->telefono->create($donanteAsociado, $numero, $tipo);
    }

    public function update($donanteAsociado, $numero, $tipo, $idTelefono){
        return $this->telefono->update($donanteAsociado, $numero, $tipo, $idTelefono);
    }

    public function delete($idTelefono){
        return $this->telefono->delete($idTelefono);
    }
}

?>