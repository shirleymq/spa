<?php
	$servidor 	= 'localhost';
	#$username 	= 'informaciones';
	#$password 	= '8F]xHlovS#D+7:W';
	#$db			= 'informaciones_db';
	$username = 'root';
	$password = '';
	$db = 'informaciones_db3';
	
	$conexion = mysqli_connect($servidor, $username, $password, $db)
			or die ('Error en la conexion de BD:'.mysqli_connect_error());
?>