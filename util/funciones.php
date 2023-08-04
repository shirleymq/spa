<?php
function validarSesion(){
  if (!isset($_SESSION['login_nombre'])){
    /**if(($_SESSION['login_tipo_usuario'])!="ADMIN"){
      header('Location: ../../index.php'); 

    }*/
    header('Location: ../../index.php'); 
  }
}

?>