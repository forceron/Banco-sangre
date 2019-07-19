<?php
require $_SERVER['DOCUMENT_ROOT'].'/db/DBConn.php';
require $_SERVER['DOCUMENT_ROOT'].'/controllers/DonanteController.php';
$conn = create_connection();
$administradorController = new DonanteController($conn);

if(isset($_POST['CedulaDonante'])){
    $cedula = $_POST['CedulaDonante'];
    $nombres = $_POST['NombresDonante'];
    $apellidos = $_POST['ApellidosDonante'];
    $idRH = $_POST['rhlist'];
    $correo = $_POST['emailDonante'];
    $direccion = $_POST['DireccionDonante'];
    //$telefono = $_POST['TelDonante'];
    $_SESSION['cedulaDon'] = $cedula;    
    if($administradorController->create($cedula, $nombres, $apellidos, $idRH, $correo, $direccion)){
      echo "Creado correctamente";
      Header("Location: ../ceduladonante.html");  
      
    }else{
      echo "Fallo al crear donante";
      Header("Location: ../ceduladonante.html"); 
    }
}else{    
    echo "Campo obligatorio";
}
?>


