<?php 

require $_SERVER['DOCUMENT_ROOT'].'/db/CapacidadQuerties.php';

class Capacidad {
    
    //attributes
    private $idCapacidad;
    private $idBanco;
    private $max;
    private $min;
    private $idRH;

    private $capacidades = [];

    //Connection DB
    private $conn;
    private $querties;

    //Constructor definition
    public function __construct($conn){
        $this->conn = $conn;
        $this->querties = new CapacidadQuerties();
    }

    public function listCapacidadBanco($idBanco){
        $this->setIdBanco($idBanco);
        $res = $this->querties->listCapacidadBanco($this->conn, $this->idBanco);
        for($i = 0; $i <count($res); $i++){
            $capacidad = new Capacidad($this->conn);
            $capacidad->setIdCapacidad($res[$i]['idCapacidad']);
            $capacidad->setIdBanco($res[$i]['idBanco']);
            $capacidad->setMax($res[$i]['max']);
            $capacidad->setMin($res[$i]['min']);
            $capacidad->setIdRH($res[$i]['idRH']);
            $this->capacidades[] = $capacidad;
        }
        return $this->capacidades;
    }

    public function show($idCapacidad){
        $this->setIdCapacidad($idCapacidad);
        $res = $this->querties->getCapacidad($this->conn, $this->idCapacidad);
        if(!empty($res)){
            $this->setIdBanco($res['idBanco']);
            $this->setMax($res['max']);
            $this->setMin($res['min']);
            $this->setIdRH($res['idRH']);
        }else{
            echo "El capacidad indicada existe";
        }
    }

    public function create($idBanco, $max, $min, $idRH){
        $this->setIdBanco($idBanco);
        $this->setMax($max);
        $this->setMin($min);
        $this->setIdRH($idRH);
        return $this->querties->insertCapacidad($this->conn, $this->idBanco, $this->max, $this->min, $this->idRH);
    }

    public function update($idBanco, $max, $min, $idRH, $idCapacidad){
        $this->setIdBanco($idBanco);
        $this->setMax($max);
        $this->setMin($min);
        $this->setIdRH($idRH);
        $this->setIdCapacidad($idCapacidad);
        return $this->querties->updateCapacidad($this->conn, $this->idBanco, $this->max, $this->min, $this->idRH, $this->idCapacidad);
    }

    //getters
    public function getIdCapacidad(){
        return $this->idCapacidad;
    }
    
    public function getIdBanco(){
        return $this->idBanco;
    }

    public function getMax(){
        return $this->max;
    }

    public function getMin(){
        return $this->min;
    }

    public function getIdRH(){
        return $this->idRH;
    }

    //setters
    public function setIdCapacidad($idCapacidad){
        $this->idCapacidad = $idCapacidad;
    }

    public function setIdBanco($idBanco){
        $this->idBanco = $idBanco;
    }

    public function setMax($max){
        $this->max = $max;
    }

    public function setMin($min){
        $this->min = $min;
    }

    public function setIdRH($idRH){
        $this->idRH = $idRH;
    }

    
}

?>