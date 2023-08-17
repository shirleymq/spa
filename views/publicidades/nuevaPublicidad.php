<?php include("../../controllers/controladorPublicidades.php"); ?>
<?php include("../../util/funciones.php"); ?>
<?php
validarSesion();
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="../../public/css/css/bootstrap.min.css">

  <title>Nuevo</title>

  <link rel="stylesheet" type="text/css" href="../../public/bootstrap/bootstrap.min.css">
  <link type="text/css" rel="stylesheet" href="../../public/css/tablas.css" />

</head>

<body>
  <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark position-sticky">
      <a class="navbar-brand" href="#">
        <img src="../../uploads/spa4.png" width="100%" class="d-inline-block align-top" alt="">
      </a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">

        <span class="navbar-toggler-icon"></span>

      </button>

      <div class="collapse navbar-collapse position-sticky" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-item nav-link active" href="../../index.php">
            <button class="btn btn-sm btn-outline-secondary" style="color:white;">
              Inicio
            </button>
            <span class="sr-only">(current)</span>
          </a>

          <a class="nav-item nav-link active" href="listaPublicidades.php">
            <button class="btn btn-sm btn-outline-secondary" style="color:white;">
              Anuncios
            </button>
            <span class="sr-only">(current)</span>
          </a>

        </div>
      </div>
    </nav>

  </header>

  <section class="container">
    <h1 align="center">NUEVA PUBLICIDAD</h1><br />


    <form action="../../controllers/controladorPublicidades.php" method="POST" enctype="multipart/form-data">


      <div class="form-row">
        <div class="form-group col-md-12">
          <label>Titulo: </label>
          <input type="text" class="form-control" name="titulo">
          <div id="error-message-titulo" style="display: none; color: red;">El título no debe tener más de 42 caracteres
          </div>
        </div>
      </div>

      <label>Imagen: </label>
      <br>
      <input type="file" name="archivo" required>
      <br>
      
      <?php
      if (session_status() == PHP_SESSION_NONE) {
        session_start();
      }

      // Si hay un mensaje de error, lo mostramos
      if (isset($_SESSION['error_upload'])) {
        echo '<div style="color: red;">' . $_SESSION['error_upload'] . '</div>';
        unset($_SESSION['error_upload']); 
      }
      ?>
      <br>
      <input type="submit" name="registrar" value="Guardar" class="btn btn-success">
    </form>
  </section>

  <script src="../../public/js/jquery.min.js"></script>
  <script>
    $(document).ready(function () {
      $("form").on('submit', function (event) {
        var titulo = $("input[name='titulo']").val();
        if (titulo.length > 42) {
          event.preventDefault();
          $("#error-message-titulo").show();
        } else {
          $("#error-message-titulo").hide();
        }
      });
    });
  </script>
</body>

</html>