<?php

class RHQuerties{

    function listRH($conn){
        $stmt = $conn->prepare("SELECT * FROM RH; ");
        $stmt->execute();
        $result = $stmt->get_result();
        $RH = [];
        while ($row = $result->fetch_assoc()) {
            $RH[] = $row;
        }
        return $RH;
    }

    function getRH($conn, $idRH){
        $stmt = $conn->prepare("SELECT * FROM RH WHERE idRH = ?");
        $stmt->bind_param("i", $idRH);
        $stmt->execute();
        $result = $stmt->get_result();
        $RH = [];
        while ($row = $result->fetch_assoc()) {
            $RH = $row;
        }
        return $RH;
    }

    function insertRH($conn, $tipo, $factor) {
        $stmt = $conn->prepare("INSERT INTO RH (tipo, factor) VALUES (?, ?);");
        if (
            $stmt &&
            $stmt->bind_param("ss", $tipo, $factor) &&
            $stmt->execute()
        ) {
            echo "New RH created successfully<br>";
            return true;
        } else {
            echo "Error: $conn->error";
            return false;
        }
    }

    function updateRH($conn, $tipo, $factor, $idRH) {
        $stmt = $conn->prepare("UPDATE RH SET tipo = ?, factor = ? WHERE idRH = ?;");
        if (
            $stmt &&
            $stmt->bind_param("ssi", $tipo, $factor, $idRH) &&
            $stmt->execute()
        ) {
            echo "RH updated successfully<br>";
            return true;
        } else {
            echo "Error: $conn->error";
            return false;
        }
    }

    function deleteRH($conn, $idRH) {
        $stmt = $conn->prepare("DELETE FROM RH WHERE idRH = ?;");
        if (
            $stmt &&
            $stmt->bind_param("i", $idRH) &&
            $stmt->execute()
        ) {
            echo "RH Deleted successfully<br>";
            return true;
        } else {
            echo "Error: $conn->error";
            return false;
        }
    }

}

?>