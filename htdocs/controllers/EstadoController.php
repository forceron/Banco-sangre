<?php

require $_SERVER['DOCUMENT_ROOT'].'/models/Estado.php';

class EstadoController{

    private $conn;
    private $estado;

    public function __construct($conn){
        $this->conn = $conn;
        $this->estado = new Estado($this->conn);
    }

    public function list(){
        return $this->estado->list();
    }

    public function show($idEstado){
        $this->estado->show($idEstado);
        return $this->estado;
    }

    public function create($nombre){
        return $this->estado->create($nombre);
    }

    public function update($nombre, $idEstado){
        return $this->estado->update($nombre, $idEstado);
    }
}

?>