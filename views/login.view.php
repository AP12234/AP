<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no,
	initial-scale=1.0, maximun-scale=1.0, minimum-scale=1.0">
	<link href='https:fonts.googleapis.com/css?family=Raleway:400,300' rel='stylesheet' type='text/css'>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="Estilos/estilos.css">
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link href="https://fonts.googleapis.com/css2?family=Bona+Nova+SC:ital,wght@0,400;0,700;1,400&family=Rubik+Distressed&display=swap" rel="stylesheet">
     <link rel="preconnect" href="https://fonts.googleapis.com">
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link href="https://fonts.googleapis.com/css2?family=Bona+Nova+SC:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">

	<title>Iniciar Sesión</title>
</head>
<body class="main-content">
     <div class="contenedor">
     	<h1 class="titulo">Iniciar Sesión</h1> 
          <hr class="border">

          <!--  Formulario -->

          <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="formulario" name="login">
          <div class="from-group">
               <i class="icono izquierda fa fa-user"></i><input type="text" name="usuario" class="usuario" placeholder="Usuario">
          </div>

          <div class="from-group">
               <i class="icono izquierda fa fa-lock"></i><input type="password" name="password" class="password_btn" placeholder="Contraseña">
               <i class="submit-btn fa fa-arrow-right" onclick="login.submit()" ></i>

          </div>

           <?php if(!empty($errores)): ?> 
             <div class="error">
                  <ul>
                       <?php echo $errores; ?>
                  </ul>
             </div> 
          <?php  endif; ?>
        </form>

        <p class="texto-registrate">
             ¿ Aun no tienes cuenta ?
          <a href="registrate.php">Registrate</a> <br>
          <a href="index.html">Regresa a la pagina principal</a>
        </p>


      </div>
   </body>
</html>