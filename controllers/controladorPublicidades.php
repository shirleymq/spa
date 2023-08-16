<?php 
if(session_status() == PHP_SESSION_NONE){
    session_start();
}?>
<?php
	require_once('conexionDB.php');

	if (isset($_REQUEST['registrar'])) {
		$titulo		    = $_REQUEST['titulo'];
		$ubicacion		= cargarArchivo();

		if (strpos($ubicacion, 'Error') !== false) {
			$_SESSION['error_upload'] = $ubicacion;
			header('Location: ../views/publicidades/nuevaPublicidad.php');
			exit;
		}
		registrarImagen($titulo, $ubicacion);
		header('Location: ../');
	}

	if (isset($_REQUEST['eliminar'])) {
		$id_imagen = $_REQUEST['id_imagen'];

		eliminarImagen($id_imagen);

		header('Location: ../views/publicidades/listaPublicidades.php');
	}

	if (isset($_REQUEST['deshabilitar'])) {
		$id_aviso = $_REQUEST['id_aviso'];

		deshabilitarAviso($id_aviso);
		header('Location: ../views/publicidades/listaPublicidades.php');
	}

	if (isset($_REQUEST['habilitar'])) {
		$id_aviso = $_REQUEST['id_aviso'];

		habilitarAviso($id_aviso);
		header('Location: ../views/publicidades/listaPublicidades.php');
	}

	function eliminarImagen($id_imagen) {
		global $conexion;

		$query = "DELETE FROM publicidad WHERE id_imagen=$id_imagen";

		mysqli_query($conexion, $query)
		or die('Revise su consulta DELETE');
		mysqli_close($conexion);
	}

	function registrarImagen($titulo, $ubicacion) {
		global $conexion;

		$query = "INSERT INTO publicidad (titulo, ubicacion, fecha_hora) 
		          VALUES('$titulo', '$ubicacion', now())";

		echo "$titulo";
		mysqli_query($conexion, $query) or die('Revise su consulta de insercion');
		//mysqli_close($conexion);
	}

	function listaImagenes() {
		global $conexion;

		$query     = 'SELECT * FROM publicidad';
		$res_query = mysqli_query($conexion, $query)
		  					   or die('Revise su consulta SELECT');
		//mysqli_close($conexion);

		$num_reg = mysqli_num_rows($res_query);

		for ($i = 0; $i < $num_reg; $i++) { 
			$lista[$i] = mysqli_fetch_array($res_query, MYSQLI_ASSOC);
		}

		return $lista;
	}



	function cargarArchivo() {
		if (!empty($_FILES['archivo']['name'])) {
			$ruta_archivos  = '../uploads/img_publicidad/';
			$ext_permitidas = ['jpg', 'jpeg', 'png'];
			$nombre         = $_FILES['archivo']['name'];
			$nombre_tmp     = $_FILES['archivo']['tmp_name'];
			$tipo           = $_FILES['archivo']['type'];
			$tamaño         = $_FILES['archivo']['size']/1024;

			$partes_nombre  = explode('.', $nombre);
			$ext_archivo    = end($partes_nombre);
			$ext_correcta   = in_array($ext_archivo, $ext_permitidas);
			$tam_max        = 1.5 * 1024;

			if (!$ext_correcta) {
				return 'Error de extension: seleccione un archivo con extension: jpg, jpeg, png';
			}

			if($tamaño > $tam_max){
				return 'Error de tamaño: el tamaño maximo permitido es de 1.5 MB.';
			}
	
			if ($_FILES['archivo']['error'] > 0) {
				return "Error: ". $_FILES['archivo']['error'];
			}
	
			if (file_exists($ruta_archivos.$nombre)) {
				return 'Error al cargar el archivo, ya existe un archivo con el mismo nombre';
			}
	
			move_uploaded_file($nombre_tmp, $ruta_archivos.$nombre);
			return 'uploads/img_publicidad/'.$nombre;

		} else {
			header('Location: ../views/publicidades/nuevaPublicidad.php');
		}
	}

	function deshabilitarAviso($id_aviso){
		global $conexion;

		$query = "UPDATE publicidad SET HABILITADO='NO' WHERE id_imagen = '$id_aviso'";
		$res_query = mysqli_query($conexion, $query)
		  					   or die('Revise su consulta UPDATE');
		mysqli_close($conexion);
	}

	function habilitarAviso($id_aviso){
		global $conexion;

		$query = "UPDATE publicidad SET HABILITADO='SI' WHERE id_imagen = '$id_aviso'";
		$res_query = mysqli_query($conexion, $query)
		  					   or die('Revise su consulta UPDATE');
		mysqli_close($conexion);
	}
?>