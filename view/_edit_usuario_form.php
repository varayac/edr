<?php
include_once('../model/db.php');
//include_once('../controller/login.php');
include_once('../model/usuario.php');
$perfil = array(
    "0"=>"Seleccione Perfil","Admin"=>"admin","Vendedor"=>"vendedor"
);
$usuario = new usuario();
$id = $_GET['id'];
$result = $usuario->usuarioPorId($id);
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
    <form class="form-signin" method="POST" action="../controller/editaUsuario.php">
        <h2 class="form-signin-heading">Editando usuario <?php echo $row[2];?></h2>

        <input type="hidden" name="id" value="<?php echo $id; ?>">
        
        <div class="form-group">
            <label for="inputUser" class="sr-only">User</label>
            <input type="text" id="inputUser" class="form-control" name="usuario" placeholder="Nombre usuario" value="<?php echo $row[2];?>" required autofocus>
        </div>
        <div class="form-group">
            <label for="sel1" class="sr-only">Perfil</label>
            <select class="form-control" id="sel1" name="perfil" required>
                <option value="0"><?php echo $perfil["0"];?></option>
                <option value="1"><?php echo $perfil["Admin"];?></option>
                <option value="2"><?php echo $perfil["Vendedor"];?></option>
            </select>
        </div>
        <div class="form-group">
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="inputPassword" class="form-control" name="passwd" placeholder="Password" value="<?php echo $row[3];?>">
        </div>
        <div class="form-group">
            <label for="inputPassword2" class="sr-only">Password2</label>
            <input type="password" id="inputPassword2" class="form-control" name="passwd2" placeholder="Repita Password" value="<?php echo $row[3];?>">
        </div>

        <button class="btn btn-lg btn-primary btn-block" type="submit">Guardar</button>
        <a class="btn btn-lg btn-primary btn-block" href="_usuarios_table.php">Volver</a>
    </form>
</div> <!-- /container -->
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="../web/js/bootstrap.js"></script>
<script src="../web/js/jquery.min.js"></script>
</body>
</html>
