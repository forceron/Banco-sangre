<?php

require $_SERVER['DOCUMENT_ROOT'].'/models/AdministradorBanco.php';

class AdministradorBancoController{

    private $conn;
    private $administradorBanco;

    public function __construct($conn){
        $this->conn = $conn;
        $this->administradorBanco = new AdministradorBanco($this->conn);
    }

    public function listAdministradoresBanco($idBanco){
        return $this->administradorBanco->listAdministradoresBanco($idBanco);
    }

    public function show($idAdministrador){
        $this->administradorBanco->show($idAdministrador);
        return $this->administradorBanco;
    }

    public function create($idAdministrador, $idBanco, $nombres, $apellidos, $password){
        return $this->administradorBanco->create($idAdministrador, $idBanco, $nombres, $apellidos, $password);
    }

    public function update($idBanco, $nombres, $apellidos, $password, $idAdministrador ){
        return $this->administradorBanco->update($idBanco, $nombres, $apellidos, $password, $idAdministrador);
    }

    public function delete($idAdministrador){
        return $this->administradorBanco->delete($idAdministrador);
    }

}

?>