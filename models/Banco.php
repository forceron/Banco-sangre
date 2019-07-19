<?php 

require $_SERVER['DOCUMENT_ROOT'].'/db/BancoQuerties.php';

class Banco {
    //attributes
    private $idBanco;
    private $nombre;
    private $direccion;
    private $bancos = [];

    //Connection DB
    private $conn;
    private $querties;

    //constructor definition
    public function __construct($conn){
        $this->conn = $conn;
        $this->querties = new BancoQuerties();
    }

    public function list(){
        $res = $this->querties->listBancos($this->conn);
        for($i = 0; $i <count($res); $i++){
            $banco = new Banco($this->conn);
            $banco->setIdBanco($res[$i]['idBanco']);
            $banco->setNombre($res[$i]['nombre']);
            $banco->setDireccion($res[$i]['direccion']);
            $this->bancos[] = $banco;
        }
        return $this->bancos;
    }

    public function show($idBanco){
        $this->setIdBanco($idBanco);
        $res = $this->querties->getBanco($this->conn, $this->idBanco);
        if(!empty($res)){
            $this->setNombre($res['nombre']);
            $this->setDireccion($res['direccion']);
        }else{
            echo "El banco con id ".$idBanco." no existe";
        }
    }

    public function create($nombre, $direccion){
        $this->setNombre($nombre);
        $this->setDireccion($direccion);
        return $this->querties->insertBanco($this->conn, $this->nombre, $this->direccion);
    }

    public function update($nombre, $direccion, $idBanco){
        $this->setNombre($nombre);
        $this->setDireccion($direccion);
        $this->setIdBanco($idBanco);
        return $this->querties->updateBanco($this->conn, $this->nombre, $this->direccion, $this->idBanco);
    }

    //getters
    public function getIdBanco(){
        return $this->idBanco;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function getDireccion(){
        return $this->direccion;
    }

    //setters
    public function setIdBanco($idBanco){
        $this->idBanco = $idBanco;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function setDireccion($direccion){
        $this->direccion = $direccion;
    }


    
}
