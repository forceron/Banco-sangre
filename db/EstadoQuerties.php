<?php

class EstadoQuerties{

    function listEstados($conn){
        $stmt = $conn->prepare("SELECT * FROM Estado; ");
        $stmt->execute();
        $result = $stmt->get_result();
        $estados = [];
        while ($row = $result->fetch_assoc()) {
            $estados[] = $row;
        }
        return $estados;
    }

    function getEstado($conn, $idEstado){
        $stmt = $conn->prepare("SELECT * FROM Estado WHERE idEstado = ?");
        $stmt->bind_param("i", $idEstado);
        $stmt->execute();
        $result = $stmt->get_result();
        $estado = [];
        while ($row = $result->fetch_assoc()) {
            $estado = $row;
        }
        return $estado;
    }

    function insertEstado($conn, $nombre) {
        $stmt = $conn->prepare("INSERT INTO Estado (nombre) VALUES (?);");
        if (
            $stmt &&
            $stmt->bind_param("s", $nombre) &&
            $stmt->execute()
        ) {
            echo "New Estado created successfully<br>";
            return true;
        } else {
            echo "Error: $conn->error";
            return false;
        }
    }

    function updateEstado($conn, $nombre, $idEstado) {
        $stmt = $conn->prepare("UPDATE Estado SET nombre = ? WHERE idEstado = ?;");
        if (
            $stmt &&
            $stmt->bind_param("si", $nombre, $idEstado) &&
            $stmt->execute()
        ) {
            echo "Estado updated successfully<br>";
            return true;
        } else {
            echo "Error: $conn->error";
            return false;
        }
    }

    function deleteEstado($conn, $idEstado) {
        $stmt = $conn->prepare("DELETE FROM Estado WHERE idEstado = ?;");
        if (
            $stmt &&
            $stmt->bind_param("i", $idEstado) &&
            $stmt->execute()
        ) {
            echo "Estado Deleted successfully<br>";
            return true;
        } else {
            echo "Error: $conn->error";
            return false;
        }
    }

}

?>