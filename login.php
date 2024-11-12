<?php 
session_start();

require 'admin/config.php';
require 'functions.php';

if (isset($_SESSION['usuario'])) {
    header('Location: index.php');
}

$errores ='';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	  $usuario = filter_var(strtolower($_POST['usuario']), FILTER_SANITIZE_STRING);
    $password = $_POST['password'];
    $password = hash('sha512', $password);
    $conexion = conexion($bd_config);

$statement = $conexion->prepare('SELECT * FROM usuarios WHERE usuario = :usuario AND pass = :password'
	);   
$statement->execute(array(
	     ':usuario' => $usuario,
       ':password' => $password
     ));

$resultado = $statement->fetch();
if ($resultado !==  false) {
   $_SESSION['usuario'] = $usuario;
   header('Location:'. RUTA . '/admin/contenido.php');
   echo "Datos correctos";
} else {
   $errores .='<li>Datos Incorrectos</li>';
}
// var_dump($resultado);


}

 require 'views/login.view.php';
 
?>