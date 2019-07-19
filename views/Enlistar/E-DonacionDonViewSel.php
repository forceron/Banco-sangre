<html>
  <head>
    <meta charset="utf-8">
    <title>administracion UIFI</title>
    <link href="../styles/menu_styles.css" rel="stylesheet">
    <script src="/scripts/menu_script.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <script type="text/javascript" src="//code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <!-- Page content holder -->
  <div class="page-header">
    <div class="p-5" id="content">
      <ul style="background-color:rgba(255, 255, 255, 0.1);"class="nav nav-tabs" role="tablist">
        <li class="nav-item">
          <a href="../../index.php" class="nav-link text-dark font-italic">
            <i class="fa fa-home fa-5x"></i>
          </a>
        </li>
        <li class="nav-item align-middle">
          <h1 class="align-middle p-3">Registro donaciones </h1>
        </li>
      </ul>
    </div>
    <div class="container">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Cedula</th>
            <th scope="col">Proveedor</th>
            <th scope="col">Fecha</th>
            <th scope="col">Cantidad</th>
          </tr>
        </thead>
        <tbody>
          <?php
          require_once $_SERVER['DOCUMENT_ROOT'].'/db/DBConn.php';
          require $_SERVER['DOCUMENT_ROOT'].'/controllers/DonacionController.php';
          $conn = create_connection();
          $administradorController = new DonacionController($conn);
          $donante=$_POST['cedulaDonante'];
          $listaDon=$administradorController->listDonacionesDonante($donante);
          foreach($listaDon as $doncion){
          ?>
          <tr>
            <th scope="row"><?php echo $doncion->getIdDonacion()?></th>
            <td> <?php echo $doncion->getIdDonante()?> </td>
            <td><?php echo $doncion->getIdProveedor()?></td>
            <td><?php echo $doncion->getFecha()?></td>
            <td><?php echo $doncion->getCantidad()?></td>
          </tr>
          <?php
          }
          ?>
        </tbody>
      </table>
      
      
    </div>
  </div>
</html>