<?php

class DonanteQuerties{

    function listDonantes($conn){
        $stmt = $conn->prepare("SELECT * FROM Donante;");
        $stmt->execute();
        $result = $stmt->get_result();
        $donante = [];
        while ($row = $result->fetch_assoc()) {
            $donante[] = $row;
        }
        return $donante;
    }
    function donanteExists($ced){
        $query = $conn->prepare('SELECT * FROM Donante WHERE cedula = :ced');
        $query->execute(['cedula' => $ced]);
        if($query->rowCount()){
            return true;
        }else{
            return false;
        }
    }

    function getDonante($conn, $cedula){
        $stmt = $conn->prepare("SELECT * FROM Donante WHERE cedula = ?");
        $stmt->bind_param("i", $cedula);
        $stmt->execute();
        $result = $stmt->get_result();
        $donante = [];
        while ($row = $result->fetch_assoc()) {
            $donante = $row;
        }
        return $donante;
    }

    function insertDonante($conn, $cedula, $nombres, $apellidos, $idRH, $correo, $direccion) {
        $stmt = $conn->prepare("INSERT INTO Donante VALUES (?, ?, ?, ?, ?, ?);");
        if (
            $stmt &&
            $stmt->bind_param("ississ", $cedula, $nombres, $apellidos, $idRH, $correo, $direccion) &&
            $stmt->execute()
        ) {
            echo "New Donante created successfully<br>";
            return true;
        } else {
            echo "Error: $conn->error";
            return false;
        }
    }

    function updateDonante($conn, $nombres, $apellidos, $idRH, $correo, $direccion, $cedula) {
        $stmt = $conn->prepare("UPDATE Donante SET nombres = ?, apellidos = ?, idRH = ?, correo = ?, direccion = ? WHERE cedula = ?;");
        if (
            $stmt &&
            $stmt->bind_param("ssissi", $nombres, $apellidos, $idRH, $correo, $direccion, $cedula) &&
            $stmt->execute()
        ) {
            echo "Donante updated successfully<br>";
            return true;
        } else {
            echo "Error: $conn->error";
            return false;
        }
    }

    function deleteDonante($conn, $cedula) {
        $stmt = $conn->prepare("DELETE FROM Donante WHERE cedula = ?;");
        if (
            $stmt &&
            $stmt->bind_param("i", $cedula) &&
            $stmt->execute()
        ) {
            echo "Donante Deleted successfully<br>";
            return true;
        } else {
            echo "Error: $conn->error";
            return false;
        }
    }

}

?>