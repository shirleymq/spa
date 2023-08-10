<?php include('../../controllers/controladorPublicidades.php'); ?>
<!DOCTYPE html>
<html>
  <head>

    <title>Publicidades</title>
    <link rel="stylesheet" type="text/css" href="../../public/bootstrap/bootstrap.min.css">      
    <link type="text/css" rel="stylesheet" href="../../public/css/tablas.css"/>
    <link rel="stylesheet" type="text/css" href="../../public/css/main2.css">
    <link rel="stylesheet" type="text/css" href="../../public/fonts/fuentes.css">


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
            <?php
              if (isset($_SESSION['login_nombre'])){
            ?>
              <a class="nav-item nav-link active" href="nuevaPublicidad.php">
                <button class="btn btn-sm btn-outline-secondary" style="color:white;">Nuevo Anuncio</button>
              <span class="sr-only">(current)</span>
            </a>      
            <?php 
              }
            ?>
                
          </div>
        </div>
      </nav>
    </header>

    <section class="contenido wrapper">
      <h1 align="center">Lista Anuncios</h1>
      <center>
        <div class="col-md-10">
          <table id="customers" border="1" class="table">
            <thead>
              <tr class="bg-primary">

                <td>Titulo</td>
                <td>Imagen</td>
                <td>Fecha </td>
                <?php
                  if (isset($_SESSION['login_nombre'])){?>
                  <td>Acciones</td>
                  
                <?php }?>
              </tr>
            </thead>

            <tbody>
              <?php
                $imagenes = listaImagenes();
                foreach ($imagenes as $imagen):
              ?>
              <tr>
                
                <td><?php echo $imagen['titulo'] ?></td>
                <td><img src="../../<?php echo $imagen['ubicacion']?>" width="40"></td>
                <td><?php echo $imagen['fecha_hora'] ?></td>
                <?php
                  if (isset($_SESSION['login_nombre'])){
                ?>
                    <!--<td><a class="btn btn-outline-danger" href="../../controllers/controladorPublicidades.php?id_imagen=<?php echo $imagen['id_imagen'] ?>&eliminar=true">Eliminar</a></td>-->

                    <?php if ($imagen['HABILITADO']=='SI'){?>
                    <td>
                      <a href="../../controllers/controladorPublicidades.php?id_aviso=<?php echo $imagen['id_imagen']?>&deshabilitar=true" class="btn btn-outline-danger">Deshabilitar</a>
                    </td>
                  <?php }else{?>
                    <td>
                    <a href="../../controllers/controladorPublicidades.php?id_aviso=<?php echo $imagen['id_imagen']?>&habilitar=true" class="btn btn-outline-success">Habilitar</a>
                  </td>

                <?php 
                  } }
                ?>
              </tr>
              <?php 
                endforeach; 
              ?>
            </tbody>
          </table>
        </center>
      </div>
    </section>
  </body>
</html>