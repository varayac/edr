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

    <title>Tu Oficina | Usuarios</title>

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
                <span> class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Tu Oficina S.A.</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="_usuarios_table.php">Usuarios</a></li>
                <li><a href="_productos_table.php">Productos</a></li>
                <li><a href="_compras_table.php">Compras</a></li>
                <li><a href="_ventas_table.php">Ventas</a></li>
                <li><a href="_logout.php">Cerrar Session</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>
<?php
$row = 0;
$usuario = new usuario();
$list = $usuario->listarUsuarios();

$db = new db();
$db->cerrar();

?>
<div class="container">
    <br><br>
    <table class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>#</th>
            <th>Nombre Usuario</th>
            <th>Perfil</th>
            <th>Fecha Creacion</th>
            <th>Updated_at</th>
            <th colspan="2" style="text-align: center" >Actions</th>
        </tr>
        </thead>
       <?php while($user = mysqli_fetch_array($list))
       { $row ++;
       ?>
        <tbody>
        <tr>
            <th scope="row"><?php echo $row ?></th>
            <td><?php echo $user[2]?></td>
            <td><?php echo $user[7]?></td>
            <td><?php echo $user[5]?></td>
            <td><?php echo $user[6]?></td>
            <td>
                <a class="btn btn-success" href="_edit_usuario_form.php?id=<?php echo $user['ID_USUARIO'];?>">Editar</a>
            </td>
            <td>
                <a onclick="javascript: if (confirm('SEGURO DESEA ELIMINAR?')){location.href='../controller/eliminaUsuario.php?id=<?php echo $user['ID_USUARIO'];?>';}"class="btn btn-danger">Eliminar</a>
            </td>
        </tr>
        <?php } ?>
        </tbody>
    </table>
    <?php $perfil = array(
        "0"=>"Seleccione Perfil","Admin"=>"admin","Vendedor"=>"vendedor"
    )?>
    <a class="btn btn-info" data-toggle="modal" data-target="#myModal" >Nuevo</a>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3>Nuevo usuario</h3>
                </div>
                <div class="modal-body">
                    <form class="form-group-lg" method="post" action="../controller/insertaUsuario.php">
                        <div class="form-group">
                            <label for="inputUser" class="sr-only">User</label>
                            <input type="text" id="inputUser" class="form-control" name="usuario" placeholder="Nombre usuario" required autofocus>
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
                            <input type="password" id="inputPassword" class="form-control" name="passwd" placeholder="Password" required>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword2" class="sr-only">Password2</label>
                            <input type="password" id="inputPassword2" class="form-control" name="passwd2" placeholder="Repita Password" required>
                        </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-lg btn-primary btn-block" type="submit">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
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