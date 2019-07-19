<?php

class TelefonoQuerties{

    function listTelefonosDonante($conn, $cedula){
        $stmt = $conn->prepare("SELECT * FROM Telefono WHERE donanteAsociado = ?; ");
        $stmt->bind_param("i", $cedula);
        $stmt->execute();
        $result = $stmt->get_result();
        $telefono = [];
        while ($row = $result->fetch_assoc()) {
            $telefono[] = $row;
        }
        return $telefono;
    }

    function getTelefono($conn, $idTelefono){
        $stmt = $conn->prepare("SELECT * FROM Telefono WHERE idTelefono = ?");
        $stmt->bind_param("i", $idTelefono);
        $stmt->execute();
        $result = $stmt->get_result();
        $telefono = [];
        while ($row = $result->fetch_assoc()) {
            $telefono = $row;
        }
        return $telefono;
    }

    function insertTelefono($conn, $donanteAsociado, $numero, $tipo) {
        $stmt = $conn->prepare("INSERT INTO Telefono (donanteAsociado, numero, tipo) VALUES (?, ?, ?);");
        if (
            $stmt &&
            $stmt->bind_param("iss", $donanteAsociado, $numero, $tipo) &&
            $stmt->execute()
        ) {
            echo "New Telefono created successfully<br>";
            return true;
        } else {
            echo "Error: $conn->error";
            return false;
        }
    }

    function updateTelefono($conn, $donanteAsociado, $numero, $tipo, $idTelefono) {
        $stmt = $conn->prepare("UPDATE Telefono SET donanteAsociado = ?, numero = ?, tipo = ? WHERE idTelefono = ?;");
        if (
            $stmt &&
            $stmt->bind_param("issi", $donanteAsociado, $numero, $tipo, $idTelefono) &&
            $stmt->execute()
        ) {
            echo "Telefono updated successfully<br>";
            return true;
        } else {
            echo "Error: $conn->error";
            return false;
        }
    }

    function deleteTelefono($conn, $idTelefono) {
        $stmt = $conn->prepare("DELETE FROM Telefono WHERE idTelefono = ?;");
        if (
            $stmt &&
            $stmt->bind_param("i", $idTelefono) &&
            $stmt->execute()
        ) {
            echo "Telefono Deleted successfully<br>";
            return true;
        } else {
            echo "Error: $conn->error";
            return false;
        }
    }

}

?>