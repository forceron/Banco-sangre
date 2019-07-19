<?php

class BancoQuerties {

    function listBancos($conn) {
        $stmt = $conn->prepare("SELECT * FROM Banco; ");
        $stmt->execute();
        $result = $stmt->get_result();
        $banco = [];
        while ($row = $result->fetch_assoc()) {
            $banco[] = $row;
        }
        return $banco;
    }

    function getBanco($conn, $idBanco) {
        $stmt = $conn->prepare("SELECT * FROM Banco WHERE idBanco = ?; ");
        $stmt->bind_param("i", $idBanco);
        $stmt->execute();
        $result = $stmt->get_result();
        $banco = [];
        while ($row = $result->fetch_assoc()) {
            $banco = $row;
        }
        return $banco;
    }

    function insertBanco($conn, $nombre, $direccion) {
        $stmt = $conn->prepare("INSERT INTO Banco (nombre, direccion) VALUES (?, ?);");
        if (
            $stmt &&
            $stmt->bind_param("ss", $nombre, $direccion) &&
            $stmt->execute()
        ) {
            echo "New Banco created successfully<br>";
            return true;
        } else {
            echo "Error: $conn->error";
            return false;
        }
    }

    function updateBanco($conn, $nombre, $direccion, $idBanco){
        $stmt = $conn->prepare("UPDATE Banco SET nombre = ?, direccion = ? WHERE idBanco = ?;");
        if (
            $stmt &&
            $stmt->bind_param("ssi", $nombre, $direccion, $idBanco) &&
            $stmt->execute()
        ) {
            echo "Banco ".$nombre." Updated<br>";
            return true;
        } else {
            echo "Error: $conn->error";
            return false;
        }
    }
}
