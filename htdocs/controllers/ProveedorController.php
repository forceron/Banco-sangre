<?php

require $_SERVER['DOCUMENT_ROOT'].'/models/Proveedor.php';

class ProveedorController{

    private $conn;
    private $proveedor;

    public function __construct($conn){
        $this->conn = $conn;
        $this->proveedor = new Proveedor($this->conn);
    }

    public function list(){
        return $this->proveedor->list();
    }

    public function show($nit){
        $this->proveedor->show($nit);
        return $this->proveedor;
    }

    public function create($nit, $razonSocial, $direccion, $numeroContacto, $limiteAcreditacion, $password){
        return $this->proveedor->create($nit, $razonSocial, $direccion, $numeroContacto, $limiteAcreditacion, $password);
    }

    public function update($razonSocial, $direccion, $numeroContacto, $limiteAcreditacion, $password, $nit){
        return $this->proveedor->update($razonSocial, $direccion, $numeroContacto, $limiteAcreditacion, $password, $nit);
    }

    public function delete($nit){
        return $this->proveedor->delete($nit);
    }
}

?>