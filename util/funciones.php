<?php
function validarSesion()
{
  if (!isset($_SESSION['login_nombre'])) {
    header('Location: ../../index.php');
  }
}
?>