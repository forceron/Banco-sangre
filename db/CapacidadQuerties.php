<?php

class CapacidadQuerties {

    function listCapacidadBanco($conn, $idBanco){
        $stmt = $conn->prepare("SELECT * FROM Capacidad WHERE idBanco = ?; ");
        $stmt->bind_param("i", $idBanco);
        $stmt->execute();
        $result = $stmt->get_result();
        $capacidad = [];
        while ($row = $result->fetch_assoc()) {
            $capacidad[] = $row;
        }
        return $capacidad;
    }

    function getCapacidad($conn, $idCapacidad){
        $stmt = $conn->prepare("SELECT * FROM Capacidad WHERE idCapacidad = ?; ");
        $stmt->bind_param("i", $idCapacidad);
        $stmt->execute();
        $result = $stmt->get_result();
        $capacidad = [];
        while ($row = $result->fetch_assoc()) {
            $capacidad = $row;
        }
        return $capacidad;
    }

    function insertCapacidad($conn, $idBanco, $max, $min, $idRH) {
        $stmt = $conn->prepare("INSERT INTO Capacidad (idBanco, max, min, idRH) VALUES (?, ?, ?, ?);");
        if (
            $stmt &&
            $stmt->bind_param("iddi", $idBanco, $max, $min, $idRH) &&
            $stmt->execute()
        ) {
            echo "New Capacidad created successfully<br>";
            return true;
        } else {
            echo "Error: $conn->error";
            return false;
        }
    }

    function updateCapacidad($conn, $idBanco, $max, $min, $idRH, $idCapacidad){
        $stmt = $conn->prepare("UPDATE Capacidad SET idBanco = ?, max = ?, min = ?, idRH = ? WHERE idCapacidad = ?;");
        if (
            $stmt &&
            $stmt->bind_param("iddii", $idBanco, $max, $min, $idRH, $idCapacidad) &&
            $stmt->execute()
        ) {
            echo "Capacidad Updated<br>";
            return true;
        } else {
            echo "Error: $conn->error";
            return false;
        }
    }
}

?>