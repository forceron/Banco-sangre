<?php

require $_SERVER['DOCUMENT_ROOT'].'/db/DonacionQuerties.php';

class Donacion {

    //Attributes
    private $idDonacion;
    private $idDonante;
    private $idProveedor;
    private $fecha;
    private $cantidad;

    
    private $donacionesD = [];
    private $donacionesP = [];

    //Connection DB
    private $conn;
    private $querties;

    //constructor definition
    public function __construct($conn){
        $this->conn = $conn;
        $this->querties = new DonacionQuerties();
    }

    public function listDonacionesProveedor($idProveedor){
        $this->setIdProveedor($idProveedor);
        $res = $this->querties->listDonacionesProveedor($this->conn, $this->idProveedor);
        for($i = 0; $i <count($res); $i++){
            $donacion = new Donacion($this->conn);
            $donacion->setIdDonacion($res[$i]['idDonacion']);
            $donacion->setIdDonante($res[$i]['idDonante']);
            $donacion->setIdProveedor($res[$i]['idProveedor']);
            $donacion->setFecha($res[$i]['fecha']);
            $donacion->setCantidad($res[$i]['cantidad']);
            $this->donacionesP[] = $donacion;
        }
        return $this->donacionesP;
    }

    public function listDonacionesDonante($idDonante){
        $this->setIdDonante($idDonante);
        $res = $this->querties->listDonacionesDonante($this->conn, $this->idDonante);
        for($i = 0; $i <count($res); $i++){
            $donacion = new Donacion($this->conn);
            $donacion->setIdDonacion($res[$i]['idDonacion']);
            $donacion->setIdDonante($res[$i]['idDonante']);
            $donacion->setIdProveedor($res[$i]['idProveedor']);
            $donacion->setFecha($res[$i]['fecha']);
            $donacion->setCantidad($res[$i]['cantidad']);
            $this->donacionesD[] = $donacion;
        }
        return $this->donacionesD;
    }

    public function show($idDonacion){
        $this->setIdDonacion($idDonacion);
        $res = $this->querties->getDonacion($this->conn, $this->idDonacion);
        if(!empty($res)){
            $this->setIdDonante($res['idDonante']);
            $this->setIdProveedor($res['idProveedor']);
            $this->setFecha($res['fecha']);
            $this->setCantidad($res['cantidad']);
        }else{
            echo "La donacion no existe";
        }
    }

    public function create($idDonante, $idProveedor, $fecha, $cantidad){
        $this->setIdDonante($idDonante);
        $this->setIdProveedor($idProveedor);
        $this->setFecha($fecha);
        $this->setCantidad($cantidad);
        return $this->querties->insertDonacion($this->conn, $this->idDonante, $this->idProveedor, $this->fecha, $this->cantidad);
    }

    public function update($idDonante, $idProveedor, $fecha, $cantidad, $idDonacion){
        $this->setIdDonante($idDonante);
        $this->setIdProveedor($idProveedor);
        $this->setFecha($fecha);
        $this->setCantidad($cantidad);
        $this->setIdDonacion($idDonacion);
        return $this->querties->updateDonacion($this->conn, $this->idDonante, $this->idProveedor, $this->fecha, $this->cantidad, $this->idDonacion);
    }

    public function delete($idDonacion){
        $this->setIdDonacion($idDonacion);
        return $this->querties->deleteDonacion($this->conn, $this->idDonacion);
    }

    //getters
    public function getIdDonacion(){
        return $this->idDonacion;
    }

    public function getIdDonante(){
        return $this->idDonante;
    }

    public function getIdProveedor(){
        return $this->idProveedor;
    }

    public function getFecha(){
        return $this->fecha;
    }

    public function getCantidad(){
        return $this->cantidad;
    }

    //setters
    public function setIdDonacion($idDonacion){
        $this->idDonacion = $idDonacion;
    }

    public function setIdDonante($idDonante){
        $this->idDonante = $idDonante;
    }

    public function setIdProveedor($idProveedor){
        $this->idProveedor = $idProveedor;
    }

    public function setFecha($fecha){
        $this->fecha = $fecha;
    }

    public function setCantidad($cantidad){
        $this->cantidad = $cantidad;
    }

} 

?>