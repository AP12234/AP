<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no,
	initial-scale=1.0, maximun-scale=1.0, minimum-scale=1.0">
	<link href='https:fonts.googleapis.com/css?family=Raleway:400,300' rel='stylesheet' type='text/css'>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
     <link rel="stylesheet" href="<?php echo RUTA; ?>Estilos/estilos.css">
	<title>Registrate</title>
</head>
<body>
     <div class="contenedor">
     	<h1 class="titulo">Registrate</h1> 
          <hr class="border">

          <!--  Formulario -->

          <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data" class="formulario" name="login">
          <div class="from-group">
               <i class="icono izquierda fa fa-file"></i><input type="text" name="documento" class="documento" placeholder="Ingrese su Documento">
          </div>
          
          <div class="from-group">
               <i class="icono izquierda fa fa-user"></i><input type="text" name="nombre" class="nombre"  placeholder="Ingrese su Nombre">
          </div>

          <div class="from-group">
               <i class="icono izquierda fa fa-user"></i><input type="text" name="apellidos" class="apellidos"  placeholder="Ingrese sus Apellidos">
          </div>

          <div class="from-group">
               <i class="icono izquierda fa fa-phone"></i><input type="text" name="telefono" class="telefono" placeholder="Ingrese sus Telefono">
          </div>

          <div class="from-group">
               <i class="icono izquierda fa fa-map-marker"></i><input type="text" name="direccion" class="direccion"  placeholder="Ingrese sus Direccion">
          </div>
          
          <div class="from-group">
               <i class="icono izquierda fa fa-user"></i><input type="text" name="usuario" class="usuario" placeholder="Ingrese su usuario">
          </div>

          <div class="from-group">
               <i class="icono izquierda fa fa-lock"></i><input type="password" name="password" class="password" placeholder="Contraseña">
          </div>

          <div class="from-group">  
               <i class="icono izquierda fa fa-lock"></i><input type="password" name="password2" class="password_btn" placeholder="Repetir Contraseña">
               <i class="submit-btn fa fa-arrow-right" onclick="login.submit()" ></i>
          </div>

          <div class="from-group">  
               <i class="icono izquierda fa fas fa-image"></i><input type="file" name="imagen" class="imagen" placeholder="Seleccione una imagen">
          </div>

          <?php  if(!empty($errores)): ?> 
             <div class="error">
                  <ul>
                       <?php echo $errores; ?>
                  </ul>

             </div>
          <?php  endif; ?>



        </form>

      </div>
   </body>
</html>