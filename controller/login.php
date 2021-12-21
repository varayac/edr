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
include_once("../model/db.php");
include_once("../model/usuario.php");

session_start();
if (isset($_POST['usuario']) && isset($_POST['passwd'])) {
    $user = $_POST['usuario'];
    $pass = md5($_POST['passwd']);

    $usuario = new usuario();
    $query = $usuario->login($user, $pass);

    $row = mysqli_fetch_array($query);
    $_SESSION['nom'] = $row[2];
    $_SESSION['perf'] = $row[7];

    if($_SESSION['perf'] == 'admin')
    {header("location:../view/_menu_admin.php");
    }elseif($_SESSION['perf'] == 'vendedor')
        {header("location: ../view/_menu_vendedor.php");
        }else {
        header("Refresh: 60;url=../view/_login.php");
        echo
        "<div class=\"alert alert-warning alert-dismissable\">
                <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
                <strong>Oops!</strong> Datos incorrectos.
            </div>";
    }
}
?>
<script src="../web/js/bootstrap.min.js"></script>
<script src="../web/js/jquery.min.js"></script>
</body>
</html>