<?php

require $_SERVER['DOCUMENT_ROOT'].'/db/ProveedorQuerties.php';

class Proveedor {

    //Attributes
    private $nit;
    private $razonSocial;
    private $direcccion;
    private $numeroContacto;
    private $limiteAcreditacion;
    private $hash;

    private $proveedores = [];

    //ConnectionDB
    private $conn;
    private $querties;

    //Constructor Definition
    public function __construct($conn)    {
        $this->conn = $conn;
        $this->querties = new ProveedorQuerties();
    }

    public function list(){
        $res = $this->querties->listProveedores($this->conn);
        for($i = 0; $i <count($res); $i++){
            $proveedor = new Proveedor($this->conn);
            $proveedor->setNit($res[$i]['nit']);
            $proveedor->setRazonSocial($res[$i]['razonSocial']);
            $proveedor->setDireccion($res[$i]['direccion']);
            $proveedor->setNumeroContacto($res[$i]['numeroContacto']);
            $proveedor->setLimiteAcreditacion($res[$i]['limiteAcreditacion']);
            $proveedor->setHash($res[$i]['hash']);
            $this->proveedores[] = $proveedor;
        }
        return $this->proveedores;
    }

    public function show($nit){
        $this->setNit($nit);
        $res = $this->querties->getProveedor($this->conn, $this->nit);
        if(!empty($res)){
            $this->setRazonSocial($res['razonSocial']);
            $this->setDireccion($res['direccion']);
            $this->setNumeroContacto($res['numeroContacto']);
            $this->setLimiteAcreditacion($res['limiteAcreditacion']);
            $this->setHash($res['hash']);
        }else{
            echo "El estado no existe";
        }
    }

    public function create($nit, $razonSocial, $direccion, $numeroContacto, $limiteAcreditacion, $password){
        $this->setNit($nit);
        $this->setRazonSocial($razonSocial);
        $this->setDireccion($direccion);
        $this->setNumeroContacto($numeroContacto);
        $this->setLimiteAcreditacion($limiteAcreditacion);
        $this->createHash($password);
        return $this->querties->insertProveedor($this->conn, $this->nit, $this->razonSocial, $this->direcccion, $this->numeroContacto, $this->limiteAcreditacion, $this->hash);
    }

    public function update($razonSocial, $direccion, $numeroContacto, $limiteAcreditacion, $password, $nit){
        $this->setRazonSocial($razonSocial);
        $this->setDireccion($direccion);
        $this->setNumeroContacto($numeroContacto);
        $this->setLimiteAcreditacion($limiteAcreditacion);
        $this->createHash($password);
        $this->setNit($nit);
        return $this->querties->updateProveedor($this->conn, $this->razonSocial, $this->direcccion, $this->numeroContacto, $this->limiteAcreditacion, $this->hash, $this->nit);
    }

    public function delete($nit){
        $this->setNit($nit);
        return $this->querties->deleteProveedor($this->conn, $this->nit);
    }



    //Getters

    public function getNit(){
        return $this->nit;
    }

    public function getRazonSocial(){
        return $this->razonSocial;
    }

    public function getDireccion(){
        return $this->direcccion;
    }

    public function getNumeroContacto(){
        return $this->numeroContacto;
    }

    public function getLimiteAcreditacion(){
        return $this->limiteAcreditacion;
    }

    public function getHash(){
        return $this->hash;
    }

    //Setters

    public function setNit($nit){
        $this->nit = $nit;
    }

    public function setRazonSocial($razonSocial){
        $this->razonSocial = $razonSocial;
    }

    public function setDireccion($direccion){
        $this->direcccion = $direccion;
    }

    public function setNumeroContacto($numeroContacto){
        $this->numeroContacto = $numeroContacto;
    }

    public function setLimiteAcreditacion($limiteAcreditacion){
        $this->limiteAcreditacion = $limiteAcreditacion;
    }

    public function setHash($hash){
        $this->hash = $hash;
    }

    public function createHash($password){
        $this->hash = md5($password);
    }

}

?>
