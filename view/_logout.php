<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset = "utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Tu Oficina | LogOut</title>

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
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="../web/js/jquery.min.js"><\/script>')</script>
<script src="../web/js/bootstrap.min.js"></script>
<script src="../web/js/jquery.min.js"></script>
</body>
</html>
<?php
include_once('../model/db.php');
session_start();
echo "<div class='alert alert-warning alert-dismissable'>
      <button type='button' class='close' data-dismiss='alert'>&times;</button>
      <strong>Adios!</strong> Saliendo del Sistema...
  </div>";
$log = new db();
$log->cerrar();
session_destroy();
header("Refresh:2; url=_login.php");