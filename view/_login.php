<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tu Oficina | Login</title>

    <!-- Bootstrap core CSS -->
    <link href="../web/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../web/css/login.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<div class="container">

    <form class="form-signin" method="POST" action="../controller/login.php">

        <h2 class="form-signin-heading">Ingrese sus datos</h2>
        <div class="form-group">
            <label for="inputUser" class="sr-only">Email address</label>
            <input type="text" id="inputUser" class="form-control" name="usuario" placeholder="Tu usuario" required autofocus>
        </div>
       <div class="form-group">
           <label for="inputPassword" class="sr-only">Password</label>
           <input type="password" id="inputPassword" class="form-control" name="passwd" placeholder="Password" required>
       </div>

        <div class="checkbox">
            <label>
                <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Enviar</button>
    </form>

</div> <!-- /container -->
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="../web/js/bootstrap.js"></script>
<script src="../web/js/jquery.min.js"></script>
</body>
</html>
