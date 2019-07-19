<?php
  require $_SERVER['DOCUMENT_ROOT'].'/db/DBConn.php';
  require $_SERVER['DOCUMENT_ROOT'].'/controllers/DonacionController.php';
  $conn = create_connection();
  $administradorController = new DonacionController($conn);
  $idDonante = $_POST['DonanteDonacion'];
  $idProveedor = $_POST['proveedorlist'];
  $fecha = $_POST['FechaDonacion'];
  $cantidad = $_POST['CantidadDonacion'];
  //$telefono = $_POST['TelDonante'];
  if($administradorController->create($idDonante, $idProveedor, $fecha, $cantidad)){
    echo "<h1>Hola mundo</h1>";
    header("location: ../../index.php");
    echo "<h1>Hola mundo</h1>";
  }else{
    echo "Fallo al crear donante";
    header("location: ../../index.php");
    }
?>
