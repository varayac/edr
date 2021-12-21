<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset = "utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Tu Oficina | Productos</title>

    <!-- Bootstrap core CSS -->
    <link href="../web/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="../web/css/starter-template.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<div class="container">
<?php
include_once ('../model/db.php');

if(isset($_POST['b'])) {

    $buscar = $_POST['b'];

    if (!empty($buscar)) {
        buscar($buscar);
    }
}

function buscar($b) {
    $db = new db();
    $q = "SELECT * FROM producto WHERE NOMBRE LIKE '%".$b."%' AND ACTIVO =1 LIMIT 10";

    $result = $db->conexion->query($q);

    $contar = mysqli_num_rows($result);

    if($contar == 0){
        echo "No se han encontrado resultados para '<b>".$b."</b>'.";
    }else{
        echo "
    <table class='table table-responsive'>
        <thead>
        <tr>
            <th>Nombre</th>
            <th>Codigo</th>
            <th>Precio</th>
            <th>Cantidad</th>
        </tr>
        </thead>";

        while($row = mysqli_fetch_array($result)){ ?>
            <tbody>
    <tr>
        <td>
           <?php echo $nombre = $row['NOMBRE'];?>
        </td>
        <td>
            <?php echo $codigo = $row['CODIGO'];?>
        </td>
        <td>
            <?php echo $precio = $row['PRECIO'];?>
        </td>
        <td>
            <?php echo $precio = $row['CANTIDAD'];?>
        </td>
    </tr>
    <?php }  ?>
            </tbody>
    </table>
<?php
    }
}
?>
</div><!-- /.container -->

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script>window.jQuery || document.write('<script src="../web/js/jquery.min.js"><\/script>')</script>
<script src="../web/js/bootstrap.min.js"></script>
<script src="../web/js/jquery.min.js"></script>
<script src="../web/js/buscar.js"></script>
</body>
</html>