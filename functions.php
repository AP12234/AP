<?php 
//------------------------------------------------------------------------- Conexion a la Base de Datos -------------------------------------------------------------------------------//
function conexion($bd_config){
  try {
     $conexion = new PDO('mysql:host=localhost;dbname='.$bd_config['basedatos'] , $bd_config['usuario'], $bd_config['pass']);
      return $conexion;
      $options = [
              PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
              PDO::ATTR_EMULATE_PREPARES   => false,
                 ];
            $pdo = new PDO($connection, $bd_config['usuario'], $bd_config['pass'], $options);
            return $pdo;
      } catch (PDOException $e) {	
        print_r('Error connection: ' . $e->getMessage());
        return false;
      }
}

//------------------------------------------------------------------------- Metodo para limpiar Datos y encriptar -------------------------------------------------------------------------------//
function limpiarDatos($datos){
    $datos = trim($datos);
    $datos = stripslashes($datos); 
    $datos = htmlspecialchars($datos);
    return $datos; 
}

//------------------------------------------------------------------------- Consulta todos los usuarios  -------------------------------------------------------------------------------//
function pagina_actual(){
  return isset($_GET['p']) ? (int)$_GET['p'] : 1;
}

function obtener_post($post_por_pagina, $conexion){
  $inicio = (pagina_actual() > 1) ? pagina_actual() * $post_por_pagina - $post_por_pagina : 0;
  $sentencia = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM usuarios LIMIT $inicio, $post_por_pagina");
  $sentencia->execute();
  return $sentencia->fetchAll();

}


function id_usuario($id_usuario){
  return (int)limpiarDatos($id_usuario);
}

function obtener_post_por_id($conexion , $id_usuario){
 $resultado = $conexion->query("SELECT * FROM usuarios WHERE id_usuario = $id_usuario LIMIT 1");
 $resultado = $resultado->fetchAll();
 return ($resultado) ? $resultado : false;
}


//------------------------------------------------------------------------- Consulta todos los estudiantes  -------------------------------------------------------------------------------//



?>