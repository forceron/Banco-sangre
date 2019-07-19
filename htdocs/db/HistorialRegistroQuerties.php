<?php

class HistorialRegistroQuerties {

    function listHistorialRegistro($conn, $idRegistro){
        $stmt = $conn->prepare("SELECT * FROM HistorialRegistro WHERE idRegistro = ?; ");
        $stmt->bind_param("i", $idRegistro);
        $stmt->execute();
        $result = $stmt->get_result();
        $historialRegistro = [];
        while ($row = $result->fetch_assoc()) {
            $historialRegistro[] = $row;
        }
        return $historialRegistro;
    }

    function getHistorialRegistro($conn, $idHistorial){
        $stmt = $conn->prepare("SELECT * FROM HistorialRegistro WHERE idHistorial = ?; ");
        $stmt->bind_param("i", $idHistorial);
        $stmt->execute();
        $result = $stmt->get_result();
        $registroAlmacenamiento = [];
        while ($row = $result->fetch_assoc()) {
            $registroAlmacenamiento = $row;
        }
        return $registroAlmacenamiento;
    }

    function insertHisotrialRegistro($conn, $idEstado, $idRegistro, $fecha, $idAdministrador) {
        $stmt = $conn->prepare("INSERT INTO HistorialRegistro (idEstado, idRegistro, fecha, idAdministrador) VALUES (?, ?, ?, ?);");
        if (
            $stmt &&
            $stmt->bind_param("iisi", $idEstado, $idRegistro, $fecha, $idAdministrador) &&
            $stmt->execute()
        ) {
            echo "New Historial created successfully<br>";
            return true;
        } else {
            echo "Error: $conn->error";
            return false;
        }
    }

    function deleteHisotrialRegistro($conn, $idHistorial){
        $stmt = $conn->prepare("DELETE FROM HistorialRegistro WHERE idHistorial = ?;");
        if (
            $stmt &&
            $stmt->bind_param("i", $idHistorial) &&
            $stmt->execute()
        ) {
            echo "Historial Deleted<br>";
            return true;
        } else {
            echo "Error: $conn->error";
            return false;
        }
    }

}

?>