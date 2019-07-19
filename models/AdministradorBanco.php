<?php

require $_SERVER['DOCUMENT_ROOT'].'/db/AdministradorBancoQuerties.php';

class AdministradorBanco {

    //Attributes
    private $idAdministrador;
    private $idBanco;
    private $nombres;
    private $apellidos;
    private $hash;

    private $administradores = [];

    //Connection DB
    private $conn;
    private $querties;

    public function __construct($conn){
        $this->conn = $conn;
        $this->querties = new AdministradorBancoQuerties();
    }

    public function listAdministradoresBanco($idBanco){
        $this->setIdBanco($idBanco);
        $res = $this->querties->listAdministradoresBanco($this->conn, $this->idBanco);
        for($i = 0; $i <count($res); $i++){
            $administrador = new AdministradorBanco($this->conn);
            $administrador->setIdAdministrador($res[$i]['idAdministrador']);
            $administrador->setIdBanco($res[$i]['idBanco']);
            $administrador->setNombres($res[$i]['nombres']);
            $administrador->setApellidos($res[$i]['apellidos']);
            $administrador->setHash($res[$i]['hash']);
            $this->administradores[] = $administrador;
        }
        return $this->administradores;
    }

    public function show($idAdministrador){
        $this->setIdAdministrador($idAdministrador);
        $res = $this->querties->getAdministrador($this->conn, $this->idAdministrador);
        if(!empty($res)){
            $this->setIdBanco($res['idBanco']);
            $this->setNombres($res['nombres']);
            $this->setApellidos($res['apellidos']);
            $this->setHash($res['hash']);
        }else{
            echo "El administrador con id ".$idAdministrador." no existe";
        }
    }

    public function create($idAdministrador, $idBanco, $nombres, $apellidos, $password){
        $this->setIdAdministrador($idAdministrador);
        $this->setIdBanco($idBanco);
        $this->setNombres($nombres);
        $this->setApellidos($apellidos);
        $this->createHash($password);
        return $this->querties->insertAdministrador($this->conn, $this->idAdministrador, $this->idBanco, $this->nombres, $this->apellidos, $this->hash);
    }

    public function update($idBanco, $nombres, $apellidos, $password, $idAdministrador){
        $this->setIdBanco($idBanco);
        $this->setNombres($nombres);
        $this->setApellidos($apellidos);
        $this->setIdAdministrador($idAdministrador);
        $this->createHash($password);
        return $this->querties->updateAdministrador($this->conn, $this->idBanco, $this->nombres, $this->apellidos, $this->hash, $this->idAdministrador);
    }

    public function delete($idAdministrador){
        $this->setIdAdministrador($idAdministrador);
        return $this->querties->deleteAdministrador($this->conn, $this->idAdministrador);
    }

    //getters
    public function getIdAdministrador(){
        return $this->idAdministrador;
    }

    public function getIdBanco(){
        return $this->idBanco;
    }

    public function getNombres(){
        return $this->nombres;
    }

    public function getApellidos(){
        return $this->apellidos;
    }

    public function getHash(){
        return $this->hash;
    }

    //setters
    public function setIdAdministrador($idAdministrador){
        $this->idAdministrador = $idAdministrador;
    }

    public function setIdBanco($idBanco){
        $this->idBanco = $idBanco;
    }

    public function setNombres($nombres){
        $this->nombres = $nombres;
    }

    public function setApellidos($apellidos){
        $this->apellidos = $apellidos;
    }

    public function setHash($hash){
        $this->hash = $hash;
    }

    public function createHash($password){
        $this->hash = md5($password);
    }

} 

?>