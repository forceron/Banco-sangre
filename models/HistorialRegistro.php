<?php

require $_SERVER['DOCUMENT_ROOT'].'/db/HistorialRegistroQuerties.php';

class HistorialRegistro{

    //Attributes
    private $idHistorial;
    private $idEstado;
    private $idRegistro;
    private $fecha;
    private $idAdministrador;

    private $historiales = [];

    //Connection DB
    private $conn;
    private $querties;

    //constructor definition
    public function __construct($conn){
        $this->conn = $conn;
        $this->querties = new HistorialRegistroQuerties();
    }

    public function listHistorialRegistro($idRegistro){
        $this->setIdRegistro($idRegistro);
        $res = $this->querties->listHistorialRegistro($this->conn, $this->idRegistro);
        for($i = 0; $i < count($res); $i++){
            $historial = new HistorialRegistro($this->conn);
            $historial->setIdHistorial($res[$i]['idHistorial']);
            $historial->setIdEstado($res[$i]['idEstado']);
            $historial->setIdRegistro($res[$i]['idRegistro']);
            $historial->setFecha($res[$i]['fecha']);
            $historial->setIdAdministrador($res[$i]['idAdministrador']);
            $this->historiales[] = $historial;
        }
        return $this->historiales;
    }

    public function show($idHistorial){
        $this->setIdHistorial($idHistorial);
        $res = $this->querties->getHistorialRegistro($this->conn, $this->idHistorial);
        if(!empty($res)){
            $this->setIdEstado($res['idEstado']);
            $this->setIdRegistro($res['idRegistro']);
            $this->setFecha($res['fecha']);
            $this->setIdAdministrador($res['idAdministrador']);
        }else{
            echo "El registro no existe";
        }
    }

    public function create($idEstado, $idRegistro, $fecha, $idAdministrador){
        $this->setIdEstado($idEstado);
        $this->setIdRegistro($idRegistro);
        $this->setFecha($fecha);
        $this->setIdAdministrador($idAdministrador);
        return $this->querties->insertHisotrialRegistro($this->conn, $this->idEstado, $this->idRegistro, $this->fecha, $this->idAdministrador);
    }

    public function delete($idHistorial){
        $this->setIdHistorial($idHistorial);
        return $this->querties->deleteHisotrialRegistro($this->conn, $this->idHistorial);
    }

    //getters
    public function getIdHistorial(){
        return $this->idHistorial;
    }

    public function getIdEstado(){
        return $this->idEstado;
    }

    public function getIdRegistro(){
        return $this->idRegistro;
    }

    public function getFecha(){
        return $this->fecha;
    }

    public function getIdAdministrador(){
        return $this->idAdministrador;
    }

    //setters
    public function setIdHistorial($idHistorial){
        $this->idHistorial = $idHistorial;
    }

    public function setIdEstado($idEstado){
        $this->idEstado = $idEstado;
    }

    public function setIdRegistro($idRegistro){
        $this->idRegistro = $idRegistro;
    }

    public function setFecha($fecha){
        $this->fecha = $fecha;
    }

    public function setIdAdministrador($idAdministrador){
        $this->idAdministrador = $idAdministrador;
    }
}


?>