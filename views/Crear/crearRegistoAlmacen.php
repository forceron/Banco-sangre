<?php
require $_SERVER['DOCUMENT_ROOT'].'/db/DBConn.php';
require $_SERVER['DOCUMENT_ROOT'].'/controllers/RegistroAlmacenamientoController.php';
$conn = create_connection();
$administradorController = new RegistroAlmacenamientoController($conn);
$idDonacion = $_POST['doacionlist'];
$idBanco = $_POST['bancoDes'];
//$telefono = $_POST['TelDonante'];
//$_SESSION['cedulaDon'] = $cedula;
//
if($administradorController->create($idDonacion, $idBanco)){
  require $_SERVER['DOCUMENT_ROOT'].'/controllers/HistorialRegistroController.php';
  $administradorEstado = new HistorialRegistroController($conn);
  $idEstado=1; 
  $idRegistro = $administradorController->obtenerRegistro($idDonacion);
  $fecha = '2019-06-06';
  session_start();
  $idAdministrador = $_SESSION['user'];
  if($administradorEstado->create($idEstado, $idRegistro, $fecha, $idAdministrador)){
    echo "Creado correctamente";
    Header("Location: RegistroAlmancenView.php");
  }else{
    echo "Fallo al crear estado";
  }


}else{
echo "Fallo al registro almacen";
Header("Location: RegistroAlmancenView.php");
}
?>