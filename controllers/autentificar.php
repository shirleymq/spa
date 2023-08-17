<?php
require_once('conexionDB.php');

session_start();

if (isset($_REQUEST['auth'])) {

	$cuenta = $_REQUEST['cuenta'];
	$contrasenia = $_REQUEST['contrasenia'];

	if (!empty($cuenta) && !empty($contrasenia)) {
		autentificarUsuario($cuenta, $contrasenia);
	} else {
		header('Location: ../index.php');
	}

}

function autentificarUsuario($cuenta, $contrasenia)
{
	global $conexion;

	$query = "	SELECT *
					FROM 	usuario
					WHERE 	USERNAME 	= '$cuenta'
					AND 	PASSWORD 	= '$contrasenia'";

	$res_query = mysqli_query($conexion, $query);
	$nfilas = mysqli_num_rows($res_query);

	if ($nfilas == 1) {

		$usuario = mysqli_fetch_array($res_query, MYSQLI_ASSOC);

		if ($usuario['HABILITADO'] == 'SI') {
			$_SESSION['login_nombre'] = $usuario['NOMBREU'];
			$_SESSION['login_apellido'] = $usuario['APELLIDOU'];
			$_SESSION['login_tipo_usuario'] = $usuario['CODTIPO'];
			$_SESSION['login_id'] = $usuario['IDUSUARIO'];

			header('Location: ../index.php');
		} else {
			header('Location: ../index.php');
		}

	} else {
		header('Location: ../index.php');
	}
}
?>