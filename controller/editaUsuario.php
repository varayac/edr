<?php
/**
 * Created by PhpStorm.
 * User: redrum
 * Date: 31/07/16
 * Time: 20:16
 */
include_once('../model/db.php');
include_once('../model/usuario.php');
$usuario = new usuario();
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
<?php   $id = $_POST['id'];
        $nombre = $_POST['usuario'];
        $perfil = $_POST['perfil'];
        $pass = $_POST['passwd'];
        $pass2 = $_POST['passwd2'];
        $updated_at = date("Y-m-d H:m:s");

        $result = $usuario->editaUsuario($nombre, $perfil, $pass, $updated_at, $id);

        if($result>0){
            echo "<div class=\"alert alert-success alert-dismissable\">
                      <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
                      <strong>OK!</strong> Usuario .'$nombre'. actualizado!.
                      </div>";
            header("Refresh: 2;url= ../view/_usuarios_table.php");
        }else
               echo "<div class=\"alert alert-warning alert-dismissable\">
                      <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
                      <strong>ERROR!</strong> NO se ha actualizado :(
                      </div>";
                header("Refresh: 2;url= ../view/_usuarios_table.php");
?>
<script src="../web/js/bootstrap.min.js"></script>
<script src="../web/js/jquery.min.js"></script>
</body>
</html>
