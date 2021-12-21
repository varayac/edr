<?php
include_once('../model/db.php');
include_once('../model/producto.php');
$prod = new producto();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset = "utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../web/css/bootstrap.min.css" rel="stylesheet">
    <link href="../web/css/starter-template.css" rel="stylesheet">
</head>
<body>
<?php   $id = $_GET['id'];

$result = $prod->eliminaProducto($id);

if($result>0){
    echo "<div class=\"alert alert-success alert-dismissable\">
                      <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
                      <span style='align-text:center'><strong>OK!</strong> Producto Eliminado!.</span>
                      </div>";
    header("Refresh: 2;url= ../view/_productos_table.php");
}else
    echo "<div class=\"alert alert-warning alert-dismissable\">
                      <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
                      <strong>ERROR!</strong> NO se ha podido eliminar :(
                      </div>";
header("Refresh: 2;url= ../view/_productos_table.php");
?>
<script src="../web/js/bootstrap.min.js"></script>
<script src="../web/js/jquery.min.js"></script>
</body>
</html>
