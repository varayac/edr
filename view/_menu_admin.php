<?php
include_once('../model/db.php');
include_once('../model/usuario.php');
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset = "utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Tu Oficina | Main</title>

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

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Tu Oficina S.A.</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="_menu_admin.php">Home</a></li>
                <li><a href="_usuarios_table.php">Usuarios</a></li>
                <li><a href="_productos_table.php">Productos</a></li>
                <li><a href=_compras_table.php>Compras</a></li>
                <li><a href="_ventas_table.php">Ventas</a></li>
                <li><a href="_logout.php">Cerrar Session</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>

<div class="container">
    <?php
        if(isset($_SESSION['nom']) and isset($_SESSION['perf'])) {?>

        <div class="starter-template">
        <h1> BIENVENIDO <?php echo $_SESSION['nom']."<p/>".PHP_EOL;?></h1>
            <h2><?php echo $_SESSION['perf']."<p/>".PHP_EOL;?></h2>
        <p class="lead"></p>
        </div>
        <?php }else
            {header("Refresh: 2;url=_login.php");
            echo
            "<div class=\"alert alert-warning alert-dismissable\">
                <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
                <strong>Oops!</strong> Sesion Expirada.
            </div>";
        } ?>
</div><!-- /.container -->
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="../web/js/jquery.min.js"><\/script>')</script>
<script src="../web/js/bootstrap.min.js"></script>
<script src="../web/js/jquery.min.js"></script>
</body>
</html>