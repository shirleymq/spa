<?php
// Inicia la sesión
session_start();

// Imprime todas las variables de la sesión
echo '<pre>';
print_r($_SESSION);
echo '</pre>';
?>