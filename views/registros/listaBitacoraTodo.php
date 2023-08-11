<?php include('../../controllers/controladorAvisos.php'); ?>
<?php include("../../util/funciones.php"); ?>
<?php
validarSesion();
?>

<!DOCTYPE html>
<html>

<head>
  <title>Avisos</title>
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
            <button class="btn btn-sm btn-outline-secondary" style="color:white;">Inicio</button>
            <span class="sr-only">(current)</span>
          </a>

          <a class="nav-item nav-link active" href="listaBitacora.php">
            <button class="btn btn-sm btn-outline-secondary" style="color:white;">
              Bitacora Mes
            </button>
            <span class="sr-only">(current)</span>
          </a>

        </div>
      </div>
    </nav>
  </header>

  <section class="contenido wrapper">
    <h1 align="center">Registro de Actividades</h1>
    <center>
      <div class="col-md-10">
        <table id="customers" border="1" class="table-danger">
          <thead>
            <tr class="bg-danger">
              <td>Usuario </td>
              <td>Accion </td>
              <td>Contenido Antiguo </td>
              <td>Contenido Nuevo </td>
              <td>Fecha </td>

            </tr>
          </thead>

          <tbody>
            <?php
            $bitacoras = listaBitacorasCompleta();
            foreach ($bitacoras as $bitacora):
              ?>
              <tr>

                <td>
                  <?php echo $bitacora['IDUSUARIO'] ?>
                </td>
                <td>
                  <?php echo $bitacora['ACCION'] ?>
                </td>
                <td>
                  <?php echo $bitacora['ANTIGUO'] ?>
                </td>
                <td>
                  <?php echo $bitacora['NUEVO'] ?>
                </td>
                <td>
                  <?php echo $bitacora['FECHA'] ?>
                </td>

              </tr>
            <?php
            endforeach;
            ?>
          </tbody>
        </table>
      </div>
    </center>
  </section>

  <script src="../../public/js/jquery.js"></script>
  <script src="../../public/js/bootstrap.js"></script>

</body>

</html>