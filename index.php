<?php session_start();
  
  if (isset($_SESSION['usuario'])) {
  	header('Location:' . RUTA . '/admin' );
  }else {
  	header('Location: index.html');
  }

?> 