<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no,
	initial-scale=1.0, maximun-scale=1.0, minimum-scale=1.0">
	<link href='https:fonts.googleapis.com/css?family=Raleway:400,300' rel='stylesheet' type='text/css'>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="Estilos/estilos.css">
	<title>Registrate</title>
</head>
<body>
     <div class="contenedor">
     	<h1 class="titulo">Registrate</h1> 
          <hr class="border">

          <!--  Formulario -->

          <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="formulario" name="login">
          <div class="from-group">
               <i class="icono izquierda fa fa-user"></i><input type="text" name="usuario" class="usuario" placeholder="Usuario">
          </div>

          <div class="from-group">
               <i class="icono izquierda fa fa-lock"></i><input type="password" name="password" class="password" placeholder="Contraseña">
          </div>

          <div class="from-group">  
               <i class="icono izquierda fa fa-lock"></i><input type="password" name="password2" class="password_btn" placeholder="Repetir Contraseña">
               <i class="submit-btn fa fa-arrow-right" onclick="login.submit()" ></i>
          </div>

          <?php  if(!empty($errores)): ?> 
             <div class="error">
                  <ul>
                       <?php echo $errores; ?>
                  </ul>

             </div>
          <?php  endif; ?>



        </form>

        <p class="texto-registrate">
             ¿Ya tienes cuenta ?
          <a href="login.php">Iniciar Sesión</a>
        </p>


      </div>
   </body>
</html>