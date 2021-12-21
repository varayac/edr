<?php
include_once('../model/db.php');
include_once('../model/producto.php');
include_once ('../model/compra.php');
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset = "utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Tu Oficina | Compras</title>

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
        <?php if($_SESSION['perf'] == 'admin')
        { ?>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="_menu_admin.php">Home</a></li>
                    <li><a href="_usuarios_table.php">Usuarios</a></li>
                    <li><a href="_productos_table.php">Productos</a></li>
                    <li><a href="_compras_table.php">Compras</a></li>
                    <li><a href="_ventas_table.php">Ventas</a></li>
                    <li><a href="_logout.php">Cerrar Session</a></li>
                </ul>
            </div>
        <?php }else{ ?>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="_menu_vendedor.php">Home</a></li>
                    <li><a href="_productos_table.php">Productos</a></li>
                    <li><a href="_compras_table.php">Compras</a></li>
                    <li><a href="_ventas_table.php">Ventas</a></li>
                    <li><a href="_logout.php">Cerrar Session</a></li>
                </ul>
            </div>
        <?php } ?>
    </div>
</nav>
<?php
$row = 0;
$compras = new compra();
$list = $compras->listaCompras(); ?>
<div class="container">
    <br><br>
    <table class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>#</th>
            <th>N° Factura</th>
            <th>Proveedor</th>
            <th>Rut</th>
            <th>Total</th>
            <th colspan="2" style="text-align: center">Actions</th>
        </tr>
        </thead>
        <?php while($res = mysqli_fetch_array($list))
        { $row ++;
        ?>
        <tbody>
        <tr>
            <th scope="row"><?php echo $row ?></th>
            <td><?php echo $res[0]?></td>
            <td><?php echo $res[1]?></td>
            <td><?php echo $res[2]?></td>
            <td><?php echo $res[3]?></td>
            <td>
                <a class="btn btn-success" href="_edit_venta_form.php?id=<?php echo $res['0'];?>">Editar</a>
            </td>
            <td>
                <a onclick="javascript: if (confirm('SEGURO DESEA ELIMINAR?')){location.href='#?id=<?php echo $res[0];?>';}"class="btn btn-danger">Eliminar</a>
            </td>
        </tr>
        <?php } ?>
        </tbody>
    </table>

    <a class="btn btn-info" data-toggle="modal" data-target="#myModal" >Nuevo</a>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3>Nueva Compra</h3>
                </div>
                <div class="modal-body">
                    <form class="form-group-lg" method="post" action="../controller/insertaCompra.php">
                        <div class="form-group">
                            <label for="inputRut" class="sr-only">Rut</label>
                            <input type="text" id="inputRut" class="form-control" name="rut" placeholder="Rut Proveedor" required autofocus>
                        </div>

                        <div class="form-group">
                            <label for="inputCodigo" class="sr-only">Codigo</label>
                            <input type="text" id="inputCodigo" class="form-control" name="codigo" placeholder="Codigo Producto" required autofocus>
                        </div>

                        <div class="form-group">
                            <label for="inputPrecio" class="sr-only">Precio</label>
                            <input type="number" id="inputPrecio" class="form-control" min="0" name="precio" placeholder="Precio" required autofocus>
                        </div>

                        <div class="form-group">
                            <label for="inputCantidad" class="sr-only">Cantidad</label>
                            <input type="number" id="inputCantidad" class="form-control" name="cantidad" placeholder="Cantidad" required>
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