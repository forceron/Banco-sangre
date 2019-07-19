<?php
require $_SERVER['DOCUMENT_ROOT'].'/db/DBConn.php';
require $_SERVER['DOCUMENT_ROOT'].'/controllers/ProveedorController.php';
$conn = create_connection();
$administradorController = new ProveedorController($conn);
$nit = $_POST['NitProv'];
$razonSocial = $_POST['RazonProv'];
$direccion = $_POST['DireccionProv'];
$numeroContacto = $_POST['NumeroProv'];
$limiteAcreditacion = $_POST['LimProv'];
$password = $_POST['passProv'];
if($administradorController->create($nit, $razonSocial, $direccion, $numeroContacto, $limiteAcreditacion, $password)){
echo "Creado correctamente";
Header("Location: ../../index.php");

}else{
echo "Fallo al crear donante";
Header("Location: ../ceduladonante.html");
}
?>