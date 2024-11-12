<?php session_start();

require 'config.php';
require '../functions.php';

$conexion = conexion($bd_config);
      if(!$conexion){
          header('Location: ../error.php');
        }

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $documento =limpiarDatos($_POST['documento']);
    $nombre = limpiarDatos($_POST['nombre']);
    $apellidos = limpiarDatos($_POST['apellidos']);
    $telefono = limpiarDatos($_POST['telefono']);
    $direccion = limpiarDatos($_POST['direccion']);
	  $usuario = filter_var(strtolower($_POST['usuario']), FILTER_SANITIZE_STRING); // Esta linea impide que inyecten codigo
	  $password = limpiarDatos($_POST['password']);
    $password2 = limpiarDatos($_POST['password2']);
    $imagen = $_FILES['imagen']['tmp_name'];
    $archivo_subido = '../' . $blog_config['carpeta_imagenes'] . $_FILES['imagen']['name'];
    move_uploaded_file($imagen, $archivo_subido);  
    //echo "$usuario . $password . $password2 ";
    $errores = '';

    if (empty($documento) or empty($nombre) or empty($apellidos) or empty($telefono) 
    or empty($direccion)  or empty($usuario) or empty($password) or empty($password2)) {
      $errores .= '<li> Por favor rellena todos los datos correctamente</li>';
    } else {
    	$statement = $conexion->prepare('SELECT * FROM usuarios WHERE documento = :documento LIMIT 1');
    	$statement->execute(array(':documento' => $documento));
    	$resultado = $statement->fetch(); 

    	if($resultado != false) {
          $errores .= '<li>El Numero de documento ya existe</li>';
    	}
    	//Metodo para encriptar el password por seguridad de los datos
        $password = hash('sha512', $password );
        $password2 = hash('sha512', $password2);
        if($password != $password2) {
           $errores .= '<li>Las contraseñas no son iguales</li>';
        }     
      }
     
   if ($errores == '') {
      $statement = $conexion->prepare(
     'INSERT INTO usuarios (id_usuarios, documento, nombre, apellidos, telefono, direccion, usuario, pass, imagen) 
      VALUES (null, :documento, :nombre, :apellidos, :telefono, :direccion, :usuario, :pass, :imagen)'
      );
      $statement->execute(array(
        ':documento' => $documento,
        ':nombre' => $nombre,
        ':apellidos' => $apellidos,
        ':telefono' => $telefono,
        ':direccion' => $direccion,
      	':usuario' => $usuario, 
      	':pass' => $password,
        ':imagen' => $_FILES['imagen']['name']
      ));

      header('Location:' . RUTA . '/admin');

   }    
}

 require '../views/insertar.view.php';

?>
