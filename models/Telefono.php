<?php

require $_SERVER['DOCUMENT_ROOT'].'/db/TelefonoQuerties.php';

class Telefono {

    //Attributes
    private $idTelefono;
    private $donanteAsociado;
    private $numero;
    private $tipo;

    
    private $telefonos = [];

    //Connection DB
    private $conn;
    private $querties;

    //constructor definition
    public function __construct($conn){
        $this->conn = $conn;
        $this->querties = new TelefonoQuerties();
    }

    public function listTelefonosDonante($donanteAsociado){
        $this->setDonanteAsociado($donanteAsociado);
        $res = $this->querties->listTelefonosDonante($this->conn, $this->donanteAsociado);
        for($i = 0; $i <count($res); $i++){
            $telefono = new Telefono($this->conn);
            $telefono->setIdTelefono($res[$i]['idTelefono']);
            $telefono->setDonanteAsociado($res[$i]['donanteAsociado']);
            $telefono->setNumero($res[$i]['numero']);
            $telefono->setTipo($res[$i]['tipo']);
            $this->telefonos[] = $telefono;
        }
        return $this->telefonos;
    }

    public function show($idTelefono){
        $this->setIdTelefono($idTelefono);
        $res = $this->querties->getTelefono($this->conn, $this->idTelefono);
        if(!empty($res)){
            $this->setDonanteAsociado($res['donanteAsociado']);
            $this->setNumero($res['numero']);
            $this->setTipo($res['tipo']);
        }else{
            echo "El Telefono no existe";
        }
    }

    public function create($donanteAsociado, $numero, $tipo){
        $this->setDonanteAsociado($donanteAsociado);
        $this->setNumero($numero);
        $this->setTipo($tipo);
        return $this->querties->insertTelefono($this->conn, $this->donanteAsociado, $this->numero, $this->tipo);
    }

    public function update($donanteAsociado, $numero, $tipo, $idTelefono){
        $this->setDonanteAsociado($donanteAsociado);
        $this->setNumero($numero);
        $this->setTipo($tipo);
        $this->setIdTelefono($idTelefono);
        return $this->querties->updateTelefono($this->conn, $this->donanteAsociado, $this->numero, $this->tipo, $this->idTelefono);
    }

    public function delete($idTelefono){
        $this->setIdTelefono($idTelefono);
        return $this->querties->deleteTelefono($this->conn, $this->idTelefono);
    }

    //getters
    public function getIdTelefono(){
        return $this->idTelefono;
    }

    public function getDonanteAsociado(){
        return $this->donanteAsociado;
    }

    public function getNumero(){
        return $this->numero;
    }

    public function getTipo(){
        return $this->tipo;
    }

    //setters
    public function setIdTelefono($idTelefono){
        $this->idTelefono = $idTelefono;
    }

    public function setDonanteAsociado($donanteAsociado){
        $this->donanteAsociado = $donanteAsociado;
    }

    public function setNumero($numero){
        $this->numero = $numero;
    }

    public function setTipo($tipo){
        $this->tipo = $tipo;
    }
} 

?>