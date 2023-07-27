<?php session_start();?>
<?php include('../../controllers/controladorUsuarios.php'); ?>
<!DOCTYPE html>
<html>
    <head>

        <title>Registro</title>
         <link rel="stylesheet" type="text/css" href="../../public/bootstrap/bootstrap.min.css">
          <link type="text/css" rel="stylesheet" href="../../public/css/tablas.css"/>
    </head>

    <body>
        <header>
          <nav class="navbar navbar-expand-lg navbar-dark bg-dark position-sticky">
            <a class="navbar-brand" href="#">
              <img src="../../uploads/spa4.png" width="100%" class="d-inline-block align-top" alt="">
            </a>
                
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">

              <span class="navbar-toggler-icon"></span>

            </button>

            <div class="collapse navbar-collapse position-sticky" id="navbarNavAltMarkup">
              <div class="navbar-nav" >
                <a class="nav-item nav-link active" href="../../index.php">
                  <button class="btn btn-sm btn-outline-secondary" style="color:white;">Inicio</button>
                  <span class="sr-only">(current)</span>
                </a>
              </div>
            </div>
          </nav>
        </header>

        <section class="contenido wrapper">
          <h1 align="center">Registrar Usuario</h1>
          <br>
          <div class="row">
          <div class="col-md-4 offset-md-4" align="center">
            <h3 align="left">Datos Personales</h3>
           
            <form action="../../controllers/controladorUsuarios.php" method="POST">
             
              <input type="hidden" name="codTipo" value="USER">

              <label>Nombres:</label>
              <input type="text" name="nombres" required><br>

              <label>Apellidos:</label>
              <input type="text" name="apellidos" required><br>

              <label>Login:</label>
              <input type="text" name="login" required><br>

              <label>Contrasenia:</label>
              <input type="password" name="contrasenia" required><br>

              <input type="submit" name="registrar" value="Registrar" class="btn btn-outline-success">
            </form>
          </div>
          </div>
        </section>
    </body>
</html>