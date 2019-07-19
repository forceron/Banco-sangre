<?php

class RegistroAlmacenamientoQuerties {

    function listRegistroAlmacenamientoBanco($conn, $idBanco){
        $stmt = $conn->prepare("SELECT * FROM RegistroAlmacenamiento WHERE idBanco = ?; ");
        $stmt->bind_param("i", $idBanco);
        $stmt->execute();
        $result = $stmt->get_result();
        $registroAlmacenamiento = [];
        while ($row = $result->fetch_assoc()) {
            $registroAlmacenamiento[] = $row;
        }
        return $registroAlmacenamiento;
    }

    function getRegistroAlmacenamiento($conn, $idRegistro){
        $stmt = $conn->prepare("SELECT * FROM RegistroAlmacenamiento WHERE idRegistro = ?; ");
        $stmt->bind_param("i", $idRegistro);
        $stmt->execute();
        $result = $stmt->get_result();
        $registroAlmacenamiento = [];
        while ($row = $result->fetch_assoc()) {
            $registroAlmacenamiento = $row;
        }
        return $registroAlmacenamiento;
    }

    function insertRegistroAlmacenamiento($conn, $idDonacion, $idBanco) {
        $stmt = $conn->prepare("INSERT INTO RegistroAlmacenamiento (idDonacion, idBanco) VALUES (?, ?);");
        if (
            $stmt &&
            $stmt->bind_param("ii", $idDonacion, $idBanco) &&
            $stmt->execute()
        ) {
            echo "New Registro created successfully<br>";
            return true;
        } else {
            echo "Error: $conn->error";
            return false;
        }
    }

    function deleteRegistroAlmacenamiento($conn, $idRegistro){
        $stmt = $conn->prepare("DELETE FROM RegistroAlmacenamiento WHERE idRegistro = ?;");
        if (
            $stmt &&
            $stmt->bind_param("i", $idRegistro) &&
            $stmt->execute()
        ) {
            echo "Registro Deleted<br>";
            return true;
        } else {
            echo "Error: $conn->error";
            return false;
        }
    }

}

?>