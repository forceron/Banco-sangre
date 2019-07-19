<?php
include 'db.php';

//  include 'controllers/user.php';
class User extends DB{
    private $idAdm;
    private $idBanco;
    private $nombres;
    private $apellidos;
    private $username;
    public function userExists($user, $pass){
        $md5pass = md5($pass);
        $query = $this->connect()->prepare('SELECT * FROM administradorbanco WHERE idAdministrador = :user AND hash = :pass');
        $query->execute(['user' => $user, 'pass' => $md5pass]);
        if($query->rowCount()){
            return true;
        }else{
            return false;
        }
    }
    public function setUser($user){
        $query = $this->connect()->prepare('SELECT * FROM administradorbanco WHERE idAdministrador = :user');
        $query->execute(['user' => $user]);
        
        foreach ($query as $currentUser) {
            $this->idAdm = $currentUser['idAdministrador'];
            $this->idBanco = $currentUser['idBanco'];
            $this->nombres = $currentUser['nombres'];
            $this->apellidos = $currentUser['apellidos'];
        }
    }
    public function getNombre(){
        return $this->nombres;
    }
    public function getApellidos(){
        return $this->apellidos;
    }
    public function getInfo(){
        return ($this->nombres.'  '.$this->apellidos);

    }
}
?>