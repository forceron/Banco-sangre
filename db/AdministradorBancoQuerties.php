<?php

class AdministradorBancoQuerties{

    function listAdministradoresBanco($conn, $idBanco){
        $stmt = $conn->prepare("SELECT * FROM AdministradorBanco WHERE idBanco = ?; ");
        $stmt->bind_param("i", $idBanco);
        $stmt->execute();
        $result = $stmt->get_result();
        $administrador = [];
        while ($row = $result->fetch_assoc()) {
            $administrador[] = $row;
        }
        return $administrador;
    }

    function getAdministrador($conn, $idAdministrador){
        $stmt = $conn->prepare("SELECT * FROM AdministradorBanco WHERE idAdministrador = ?; ");
        $stmt->bind_param("i", $idAdministrador);
        $stmt->execute();
        $result = $stmt->get_result();
        $administrador = [];
        while ($row = $result->fetch_assoc()) {
            $administrador = $row;
        }
        return $administrador;
    }

    function insertAdministrador($conn, $idAdministrador, $idBanco, $nombres, $apellidos, $hash) {
        $stmt = $conn->prepare("INSERT INTO AdministradorBanco VALUES (?, ?, ?, ?, ?);");
        if (
            $stmt &&
            $stmt->bind_param("iisss", $idAdministrador, $idBanco, $nombres, $apellidos, $hash) &&
            $stmt->execute()
        ) {
            echo "New Administrador created successfully<br>";
            return true;
        } else {
            echo "Error: $conn->error";
            return false;
        }
    }

    function updateAdministrador($conn, $idBanco, $nombres, $apellidos, $hash, $idAdministrador){
        $stmt = $conn->prepare("UPDATE AdministradorBanco SET idBanco = ?, nombres = ?, apellidos = ?, hash = ? WHERE idAdministrador = ?;");
        if (
            $stmt &&
            $stmt->bind_param("isssi", $idBanco, $nombres, $apellidos, $hash, $idAdministrador) &&
            $stmt->execute()
        ) {
            echo "Administrador Updated<br>";
            return true;
        } else {
            echo "Error: $conn->error";
            return false;
        }
    }

    function deleteAdministrador($conn, $idAdministrador){
        $stmt = $conn->prepare("DELETE FROM AdministradorBanco WHERE idAdministrador = ?;");
        if (
            $stmt &&
            $stmt->bind_param("i", $idAdministrador) &&
            $stmt->execute()
        ) {
            echo "Administrador Deleted<br>";
            return true;
        } else {
            echo "Error: $conn->error";
            return false;
        }
    }
}

?>