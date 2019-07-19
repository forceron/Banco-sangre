<?php
require $_SERVER['DOCUMENT_ROOT'].'/db/DBConn.php';
require $_SERVER['DOCUMENT_ROOT'].'/controllers/DonanteController.php';
$conn = create_connection();
$administradorController = new DonanteController($conn);
//$_SESSION['use'] = "1234";
session_start();
//error_reporting(E_ALL ^ E_NOTICE);
if(isset($_POST['cedulaDonante'])){
    $cedula = $_POST['cedulaDonante'];
    $_SESSION['cedulaDon'] = $cedula;    
    $administradorController->show($cedula);
    if($administradorController->donanteExists()){
      echo "paso";
      include('Crear/DonacionView.html');
    }else{
      include('Crear/DonanteView.html');
    }
}else{
    echo "Campo obligatorio";
}
?>



