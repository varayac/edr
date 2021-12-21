<?php
include_once('../model/db.php');
include_once('../model/producto.php');
include_once('../model/venta.php');

$prod = new producto();
$id = $_GET['id'];
$result = $prod->productoPorId($id);
$row = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tu Oficina | Edit Producto</title>

    <!-- Bootstrap core CSS -->
    <link href="../web/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../web/css/registro.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<div class="container">
    <form class="form-signin" method="POST" action="../controller/editaProducto.php">
        <h2 class="form-signin-heading">Editando Producto <?php echo $row[1];?></h2>

        <input type="hidden" name="id" value="<?php echo $id; ?>">

        <div class="form-group">
            <label for="inputUser" class="sr-only">Nombre</label>
            <input type="text" id="inputNombre" class="form-control" name="nombre" placeholder="Nombre Producto" value="<?php echo $row[1];?>" required autofocus>
        </div>
        <div class="form-group">
            <label for="inputCodigo" class="sr-only">Codigo</label>
            <input type="text" id="inputcodigo" class="form-control" name="codigo" placeholder="Codigo" value="<?php echo $row[2];?>">
        </div>
        <div class="form-group">
            <label for="inputPrecio" class="sr-only">Precio</label>
            <input type="number" id="inputPrecio" class="form-control" min="0" name="precio" placeholder="Precio" value="<?php echo $row[3];?>">
        </div>
        <div class="form-group">
            <label for="inputCantidad" class="sr-only">Cantidad</label>
            <input type="number" id="inputCantidad" class="form-control" name="cantidad" placeholder="Cantidad" value="<?php echo $row[4];?>">
        </div>

        <button class="btn btn-lg btn-primary btn-block" type="submit">Guardar</button>
        <a class="btn btn-lg btn-primary btn-block" href="_ventas_table.php">Volver</a>
    </form>
</div> <!-- /container -->
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="../web/js/bootstrap.js"></script>
<script src="../web/js/jquery.min.js"></script>
</body>
</html>