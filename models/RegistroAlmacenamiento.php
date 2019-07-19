<?php

require $_SERVER['DOCUMENT_ROOT'].'/db/RegistroAlmacenamientoQuerties.php';

class RegistroAlmacenamiento {

    //Attributes
    private $idRegistro;
    private $idDonacion;
    private $idBanco;
    
    private $registros = [];

    //Connection DB
    private $conn;
    private $querties;

    //constructor definition
    public function __construct($conn){
        $this->conn = $conn;
        $this->querties = new RegistroAlmacenamientoQuerties();
    }

    public function listRegistroAlmacenamientoBanco($idBanco){
        $this->setIdBanco($idBanco);
        $res = $this->querties->listRegistroAlmacenamientoBanco($this->conn, $this->idBanco);
        for($i = 0; $i <count($res); $i++){
            $registro = new RegistroAlmacenamiento($this->conn);
            $registro->setIdRegistro($res[$i]['idRegistro']);
            $registro->setIdDonacion($res[$i]['idDonacion']);
            $registro->setIdBanco($res[$i]['idBanco']);
            $this->registros[] = $registro;
        }
        return $this->registros;
    }

    public function show($idRegistro){
        $this->setIdRegistro($idRegistro);
        $res = $this->querties->getRegistroAlmacenamiento($this->conn, $this->idRegistro);
        if(!empty($res)){
            $this->setIdDonacion($res['idDonacion']);
            $this->setIdBanco($res['idBanco']);
        }else{
            echo "El registro no existe";
        }
    }

    public function create($idDonacion, $idBanco){
        $this->setIdDonacion($idDonacion);
        $this->setIdBanco($idBanco);
        return $this->querties->insertRegistroAlmacenamiento($this->conn, $this->idDonacion, $this->idBanco);
    }

    public function delete($idRegistro){
        $this->setIdRegistro($idRegistro);
        return $this->querties->deleteRegistroAlmacenamiento($this->conn, $this->idRegistro);
    }

    //getters
    public function getIdRegistro(){
        return $this->idRegistro;
    }

    public function getIdDonacion(){
        return $this->idDonacion;
    }

    public function getIdBanco(){
        return $this->idBanco;
    }

    //setters
    public function setIdRegistro($idRegistro){
        $this->idRegistro = $idRegistro;
    }

    public function setIdDonacion($idDonacion){
        $this->idDonacion = $idDonacion;
    }

    public function setIdBanco($idBanco){
        $this->idBanco = $idBanco;
    }

} 

?>