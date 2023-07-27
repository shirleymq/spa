<!DOCTYPE html>
<html>
<head>
	<title>Registro</title>
	<link rel="stylesheet" type="text/css" href="../public/css/css/bootstrap.min.css">
	<link  type="text/css" rel="stylesheet" href="../public/css/estilos.css"/>
	<link type="text/css" rel="stylesheet" href="../public/css/formularios.css"/>
</head>
<body>
	<header>
			<div class="wrapper">
				<h1 class = "logo">AVISERO</h1>

					<nav>
						<a href="../index.php">				Inicio			</a></li>
						
					</nav>
			</div>
	</header>
	<section class="contenido wrapper">
		<h1> Login </h1>

		<fieldset>
			<form action="../controllers/autentificar.php" method="POST">
				<label>Cuenta</label>
				<input type="text" name="cuenta" required>
				<br>

				<label>Contrasenia</label>
				<input type="password" name="contrasenia" required>
				<br>

				<input type="submit" name="auth" value="Ingresar">
			</form>
		</fieldset>
	</section>
</body>
</html>