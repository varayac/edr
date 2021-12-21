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
<?php
include_once('../model/db.php');
include_once('../model/usuario.php');

$user = new usuario();

$usuario = $_POST['usuario'];
$perfil = $_POST['perfil'];
$pass = $_POST['passwd'];
$pass2 = $_POST['passwd2'];

if(isset($usuario) && isset($perfil) && isset($pass) && isset($pass2)) {
    if($pass != $pass2) {
        echo "<div class=\"alert alert-warning alert-dismissable\">
                      <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
                      <strong>Oops!</strong> Passwords no coincide.
                      </div>";
        header("Refresh: 3;url= ../view/_usuarios_table.php");
    }elseif ($user->existeUsuario($usuario) > 1){
        echo "<div class=\"alert alert-warning alert-dismissable\">
                      <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
                      <strong>Oops!</strong> Usuario ya Existe.
                      </div>";
        header("Refresh: 3;url= ../view/_usuarios_table.php");
    }else{
        $user->crearUsuario($usuario, $pass, $perfil);
        echo "<div class=\"alert alert-success alert-dismissable\">
                      <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
                      <strong>OK!</strong> Usuario creado exitosamente!.
                      </div>";
        header("Refresh: 2;url= ../view/_usuarios_table.php");
    }
}
?>
<script src="../web/js/bootstrap.min.js"></script>
<script src="../web/js/jquery.min.js"></script>
</body>
</html>
