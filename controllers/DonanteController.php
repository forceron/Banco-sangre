<?php

require $_SERVER['DOCUMENT_ROOT'].'/models/Donante.php';

class DonanteController{

    private $conn;
    private $donante;

    public function __construct($conn){
        $this->conn = $conn;
        $this->donante = new Donante($this->conn);
    }

    public function list(){
        return $this->donante->list();
    }

    public function show($cedula){
        $this->donante->show($cedula);
        return $this->donante;
    }
    public function donanteExists(){
        if(($this->donante->getNombres()!=null)){
            return true;
        }else{
            return false;
        }
    }

    public function create($cedula, $nombres, $apellidos, $idRH, $correo, $direccion){
        return $this->donante->create($cedula, $nombres, $apellidos, $idRH, $correo, $direccion);
    }

    public function update($nombres, $apellidos, $idRH, $correo, $direccion, $cedula){
        return $this->donante->update($nombres, $apellidos, $idRH, $correo, $direccion, $cedula);
    }

    public function delete($cedula){
        return $this->donante->delete($cedula);
    }
}

?>