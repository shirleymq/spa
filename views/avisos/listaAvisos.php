<?php include('../../controllers/controladorAvisos.php'); ?>
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
        <img src="../../uploads/spa4.png" width="100%" height="" class="d-inline-block align-top" alt="">
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
          <?php
          if (isset($_SESSION['login_nombre'])) {
            ?>
            <a class="nav-item nav-link active" href="nuevoAviso.php" data-toggle="modal" data-target="#modalLogin">
              <button class="btn btn-sm btn-outline-secondary" style="color:white;">
                Nuevo Aviso
              </button>
              <span class="sr-only">(current)</span>
            </a>
            <?php
            if (($_SESSION['login_tipo_usuario']) == "ADMIN") {
              ?>
              <a class="nav-item nav-link active" href="listaAvisosTodo.php" data-toggle="modal" data-target="#modalLogin">
                <button class="btn btn-sm btn-outline-secondary" style="color:white;">
                  Avisos Deshabilitados
                </button>
                <span class="sr-only">(current)</span>
              </a>
            <?php
            }
          }
          ?>
        </div>
      </div>
    </nav>
  </header>

  <section class="contenido wrapper">
    <h1 align="center">Lista Avisos Habilitados</h1>
    <center>
      <div class="col-md-10">
        <table id="customers" border="1" class="table">
          <thead class="thead-dark">
            <tr class="bg-primary">


              <td>Titulo </td>
              <td>Subtitulo </td>
              <td>contenido </td>
              <td>Fecha </td>
              <td>Mostrarse </td>
              <?php
              if (isset($_SESSION['login_nombre'])) { ?>
                <td>Herramientas</td>
              <?php } ?>
            </tr>
          </thead>

          <tbody>
            <?php
            $avisosHab = listaAvisosHab();

            foreach ($avisosHab as $aviso):
              ?>
              <tr>


                <td>
                  <?php echo $aviso['TITULO'] ?>
                </td>
                <td>
                  <?php echo $aviso['SUBTITULO'] ?>
                </td>
                <td>
                  <?php echo $aviso['CONTENIDO'] ?>
                </td>
                <td>
                  <?php echo $aviso['FECHA_HORA'] ?>
                </td>
                <td>
                  <?php
                  $mostrar = $aviso['MOSTRAR'];
                  if ($mostrar == "Si") {
                    echo ("Si");
                  } else {
                    echo ("No");
                  }
                  ?>
                </td>

                <?php
                if (isset($_SESSION['login_nombre'])) { ?>
                  <td>
                    <a href="editar.php?codAviso=<?php echo $aviso['CODAVISO'] ?>"
                      class="btn btn-outline-warning">Editar</a>
                    <p></p>
                    <!--<a href="../../controllers/controladorAvisos.php?
                      codAviso=<?php echo $aviso['CODAVISO'] ?>
                      
                      &eliminar=true" class="btn btn-outline-danger">
                      Eliminar
                      </a>
                    -->

                  </td>

                <?php
                }
                ?>
              </tr>
            <?php
            endforeach;
            ?>

          </tbody>
        </table>
    </center>
  </section>
</body>

</html>