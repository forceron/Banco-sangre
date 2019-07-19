<?php

require $_SERVER['DOCUMENT_ROOT'].'/db/RHQuerties.php';

class RH {

    //attributes
    private $idRH;
    private $tipo;
    private $factor;

    private $RHs = [];

    //Connection DB
    private $conn;
    private $querties;

    //constructor definition
    public function __construct($conn){
        $this->conn = $conn;
        $this->querties = new RHQuerties();
    }

    public function list(){
        $res = $this->querties->listRH($this->conn);
        for($i = 0; $i <count($res); $i++){
            $RH = new RH($this->conn);
            $RH->setIdRH($res[$i]['idRH']);
            $RH->setTipo($res[$i]['tipo']);
            $RH->setFactor($res[$i]['factor']);
            $this->RHs[] = $RH;
        }
        return $this->RHs;
    }

    public function show($idRH){
        $this->setIdRH($idRH);
        $res = $this->querties->getRH($this->conn, $this->idRH);
        if(!empty($res)){
            $this->setTipo($res['tipo']);
            $this->setFactor($res['factor']);
        }else{
            echo "El RH no existe";
        }
    }

    public function create($tipo, $factor){
        $this->setTipo($tipo);
        $this->setFactor($factor);
        return $this->querties->insertRH($this->conn, $this->tipo, $this->factor);
    }

    public function update($tipo, $factor, $idRH){
        $this->setTipo($tipo);
        $this->setFactor($factor);
        $this->setIdRH($idRH);
        return $this->querties->updateRH($this->conn, $this->tipo, $this->factor, $this->idRH);
    }

    public function delete($idRH){
        $this->setIdRH($idRH);
        return $this->querties->deleteRH($this->conn, $this->idRH);
    }

    //getters    
    public function getIdRH(){
        return $this->idRH;
    }

    public function getTipo(){
        return $this->tipo;
    }

    public function getFactor(){
        return $this->factor;
    }

    //setters
    public function setIdRH($idRH){
        $this->idRH = $idRH;
    }

    public function setTipo($tipo){
        $this->tipo = $tipo;
    }

    public function setFactor($factor){
        $this->factor = $factor;
    }
}

?>
