<?php

class DonacionQuerties {

    function listDonacionesProveedor($conn, $idProveedor){
        $stmt = $conn->prepare("SELECT * FROM Donacion WHERE idProveedor = ?; ");
        $stmt->bind_param("i", $idProveedor);
        $stmt->execute();
        $result = $stmt->get_result();
        $donaciones = [];
        while ($row = $result->fetch_assoc()) {
            $donaciones[] = $row;
        }
        return $donaciones;
    }

    function listDonacionesDonante($conn, $idDonante){
        $stmt = $conn->prepare("SELECT * FROM Donacion WHERE idDonante = ?; ");
        $stmt->bind_param("i", $idDonante);
        $stmt->execute();
        $result = $stmt->get_result();
        $donaciones = [];
        while ($row = $result->fetch_assoc()) {
            $donaciones[] = $row;
        }
        return $donaciones;
    }

    function getDonacion($conn, $idDonacion){
        $stmt = $conn->prepare("SELECT * FROM Donacion WHERE idDonacion = ?");
        $stmt->bind_param("i", $idDonacion);
        $stmt->execute();
        $result = $stmt->get_result();
        $donacion = [];
        while ($row = $result->fetch_assoc()) {
            $donacion = $row;
        }
        return $donacion;
    }

    function insertDonacion($conn, $idDonante, $idProveedor, $fecha, $cantidad) {
        $stmt = $conn->prepare("INSERT INTO Donacion (idDonante, idProveedor, fecha, cantidad) VALUES (?, ?, ?, ?);");
        if (
            $stmt &&
            $stmt->bind_param("iisd", $idDonante, $idProveedor, $fecha, $cantidad) &&
            $stmt->execute()
        ) {
            echo "New Donacion created successfully<br>";
            return true;
        } else {
            echo "Error: $conn->error";
            return false;
        }
    }

    function updateDonacion($conn, $idDonante, $idProveedor, $fecha, $cantidad, $idDonacion) {
        $stmt = $conn->prepare("UPDATE Donacion SET idDonante = ?, idProveedor = ?, fecha = ?, cantidad = ? WHERE idDonacion = ?;");
        if (
            $stmt &&
            $stmt->bind_param("iisdi", $idDonante, $idProveedor, $fecha, $cantidad, $idDonacion) &&
            $stmt->execute()
        ) {
            echo "Donacion updated successfully<br>";
            return true;
        } else {
            echo "Error: $conn->error";
            return false;
        }
    }

    function deleteDonacion($conn, $idDonacion) {
        $stmt = $conn->prepare("DELETE FROM Donacion WHERE idDonacion = ?;");
        if (
            $stmt &&
            $stmt->bind_param("i", $idDonacion) &&
            $stmt->execute()
        ) {
            echo "Donacion Deleted successfully<br>";
            return true;
        } else {
            echo "Error: $conn->error";
            return false;
        }
    }

}

?>