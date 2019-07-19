<?php

require $_SERVER['DOCUMENT_ROOT'].'/db/EstadoQuerties.php';

class Estado {

    //Attributes
    private $idEstado;
    private $nombre;

    
    private $estados = [];

    //Connection DB
    private $conn;
    private $querties;

    //constructor definition
    public function __construct($conn){
        $this->conn = $conn;
        $this->querties = new EstadoQuerties();
    }

    public function list(){
        $res = $this->querties->listEstados($this->conn);
        for($i = 0; $i <count($res); $i++){
            $estado = new Estado($this->conn);
            $estado->setIdEstado($res[$i]['idEstado']);
            $estado->setNombre($res[$i]['nombre']);
            $this->estados[] = $estado;
        }
        return $this->estados;
    }

    public function show($idEstado){
        $this->setIdEstado($idEstado);
        $res = $this->querties->getEstado($this->conn, $this->idEstado);
        if(!empty($res)){
            $this->setNombre($res['nombre']);
        }else{
            echo "El estado no existe";
        }
    }

    public function create($nombre){
        $this->setNombre($nombre);
        return $this->querties->insertEstado($this->conn, $this->nombre);
    }

    public function update($nombre, $idEstado){
        $this->setNombre($nombre);
        $this->setIdEstado($idEstado);
        return $this->querties->updateEstado($this->conn, $this->nombre, $this->idEstado);
    }

    public function delete($idEstado){
        $this->setIdEstado($idEstado);
        return $this->querties->deleteEstado($this->conn, $this->idEstado);
    }

    //getters
    public function getIdEstado(){
        return $this->idEstado;
    }

    public function getNombre(){
        return $this->nombre;
    }

    //setters
    public function setIdEstado($idEstado){
        $this->idEstado = $idEstado;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

} 

?>