<?php

class ProveedorQuerties{

    function listProveedores($conn){
        $stmt = $conn->prepare("SELECT * FROM Proveedor; ");
        $stmt->execute();
        $result = $stmt->get_result();
        $proveedor = [];
        while ($row = $result->fetch_assoc()) {
            $proveedor[] = $row;
        }
        return $proveedor;
    }

    function getProveedor($conn, $nit){
        $stmt = $conn->prepare("SELECT * FROM Proveedor WHERE nit = ?");
        $stmt->bind_param("i", $nit);
        $stmt->execute();
        $result = $stmt->get_result();
        $proveedor = [];
        while ($row = $result->fetch_assoc()) {
            $proveedor = $row;
        }
        return $proveedor;
    }

    function insertProveedor($conn, $nit, $razonSocial, $direccion, $numeroContacto, $limiteAcreditacion, $hash) {
        $stmt = $conn->prepare("INSERT INTO Proveedor VALUES (?, ?, ?, ?, ?, ?);");
        if (
            $stmt &&
            $stmt->bind_param("isssss", $nit, $razonSocial, $direccion, $numeroContacto, $limiteAcreditacion, $hash) &&
            $stmt->execute()
        ) {
            echo "New Proveedor created successfully<br>";
            return true;
        } else {
            echo "Error: $conn->error";
            return false;
        }
    }

    function updateProveedor($conn, $razonSocial, $direccion, $numeroContacto, $limiteAcreditacion, $hash, $nit) {
        $stmt = $conn->prepare("UPDATE Proveedor SET razonSocial = ?, direccion = ?, numeroContacto = ?, limiteAcreditacion = ?, hash = ? WHERE nit = ?;");
        if (
            $stmt &&
            $stmt->bind_param("sssssi", $razonSocial, $direccion, $numeroContacto, $limiteAcreditacion, $hash, $nit) &&
            $stmt->execute()
        ) {
            echo "Proveedor updated successfully<br>";
            return true;
        } else {
            echo "Error: $conn->error";
            return false;
        }
    }

    function deleteProveedor($conn, $nit) {
        $stmt = $conn->prepare("DELETE FROM Proveedor WHERE nit = ?;");
        if (
            $stmt &&
            $stmt->bind_param("i", $nit) &&
            $stmt->execute()
        ) {
            echo "Proveedor Deleted successfully<br>";
            return true;
        } else {
            echo "Error: $conn->error";
            return false;
        }
    }

}

?>