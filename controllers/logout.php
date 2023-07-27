<?php 
	session_start();

	if (isset($_SESSION['login_nombre'])) {
			session_destroy();

			header('Location: ../index.php');
		} else {
			header('Location: ../index.php');
		}
?>