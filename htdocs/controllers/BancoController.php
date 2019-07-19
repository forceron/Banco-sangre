<?php

require $_SERVER['DOCUMENT_ROOT'].'/models/Banco.php';

class BancoController{

    private $conn;
    private $banco;

    public function __construct($conn){
        $this->conn = $conn;
        $this->banco = new Banco($this->conn);
    }

    public function list(){
        return $this->banco->list();
    }

    public function show($idBanco){
        $this->banco->show($idBanco);
        return $this->banco;
    }

    public function create($nombre, $direccion){
        return $this->banco->create($nombre, $direccion);
    }

    public function update($nombre, $direccion, $idBanco){
        return $this->banco->update($nombre, $direccion, $idBanco);
    }

}

?>