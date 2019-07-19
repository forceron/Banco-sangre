<?php

require $_SERVER['DOCUMENT_ROOT'].'/models/RH.php';

class RHController{

    private $conn;
    private $RH;

    public function __construct($conn){
        $this->conn = $conn;
        $this->RH = new RH($this->conn);
    }

    public function list(){
        return $this->RH->list();
    }

    public function show($idRH){
        $this->RH->show($idRH);
        return $this->RH;
    }

    public function create($tipo, $factor){
        return $this->RH->create($tipo, $factor);
    }

    public function update($tipo, $factor, $idRH){
        return $this->RH->update($tipo, $factor, $idRH);
    }

    public function delete($idRH){
        return $this->RH->delete($idRH);
    }
}

?>