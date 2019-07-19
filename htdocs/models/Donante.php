<?php

require $_SERVER['DOCUMENT_ROOT'].'/db/DonanteQuerties.php';

class Donante {

    //Attributes
    private $cedula;
    private $nombres;
    private $apellidos;
    private $idRH;
    private $correo;
    private $direccion;

    private $donantes = [];

    //ConnectionDB
    private $conn;
    private $querties;
    //Constructor Definition
    public function __construct($conn)    {
        $this->conn = $conn;
        $this->querties = new DonanteQuerties();
    }

    public function list(){
        $res = $this->querties->listDonantes($this->conn);
        for($i = 0; $i <count($res); $i++){
            $donante = new Donante($this->conn);
            $donante->setCedula($res[$i]['cedula']);
            $donante->setNombres($res[$i]['nombres']);
            $donante->setApellidos($res[$i]['apellidos']);
            $donante->setIdRH($res[$i]['idRH']);
            $donante->setCorreo($res[$i]['correo']);
            $donante->setDireccion($res[$i]['direccion']);
            $this->donantes[] = $donante;
        }
        return $this->donantes;
    }

    public function show($cedula){
        $this->setCedula($cedula);
        $res = $this->querties->getDonante($this->conn, $this->cedula);
        if(!empty($res)){
            $this->setNombres($res['nombres']);
            $this->setApellidos($res['apellidos']);
            $this->setIdRH($res['idRH']);
            $this->setCorreo($res['correo']);
            $this->setDireccion($res['direccion']);
        }else{
        }
    }

    public function create($cedula, $nombres, $apellidos, $idRH, $correo, $direccion){
        $this->setCedula($cedula);
        $this->setNombres($nombres);
        $this->setApellidos($apellidos);
        $this->setIdRH($idRH);
        $this->setCorreo($correo);
        $this->setDireccion($direccion);
        return $this->querties->insertDonante($this->conn, $this->cedula, $this->nombres, $this->apellidos, $this->idRH, $this->correo, $this->direccion);
    }

    public function update($nombres, $apellidos, $idRH, $correo, $direccion, $cedula){
        $this->setNombres($nombres);
        $this->setApellidos($apellidos);
        $this->setIdRH($idRH);
        $this->setCorreo($correo);
        $this->setDireccion($direccion);
        $this->setCedula($cedula);
        return $this->querties->updateDonante($this->conn, $this->nombres, $this->apellidos, $this->idRH, $this->correo, $this->direccion, $this->cedula);
    }

    public function delete($cedula){
        $this->setCedula($cedula);
        return $this->querties->deleteDonante($this->conn, $this->cedula);
    }



    //Getters

    public function getCedula(){
        return $this->cedula;
    }

    public function getNombres(){
        return $this->nombres;
    }

    public function getApellidos(){
        return $this->apellidos;
    }

    public function getIdRH(){
        return $this->idRH;
    }

    public function getCorreo(){
        return $this->correo;
    }

    public function getDireccion(){
        return $this->direccion;
    }

    //Setters

    public function setCedula($cedula){
        $this->cedula = $cedula;
    }

    public function setNombres($nombres){
        $this->nombres = $nombres;
    }

    public function setApellidos($apellidos){
        $this->apellidos = $apellidos;
    }

    public function setIdRH($idRH){
        $this->idRH = $idRH;
    }

    public function setCorreo($correo){
        $this->correo = $correo;
    }

    public function setDireccion($direccion){
        $this->direccion = $direccion;
    }

}

?>