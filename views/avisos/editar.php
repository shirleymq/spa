<?php include ("../../controllers/controladorAvisos.php");?>
<?php include ("../../util/funciones.php");?>
<?php
  validarSesion();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Editar</title>

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
                  Inicio
                  <span class="sr-only">(current)</span>
                </a>

                <a class="nav-item nav-link active" href="listaAvisos.php">
                  Avisos
                  <span class="sr-only">(current)</span>
                </a>
                    
              </div>
            </div>
          </nav>
        </header>

        <section class="container">
          <h1 align="center">EDITAR AVISO</h1><br/>

            <?php
            $aviso = obtenerAviso($_REQUEST['codAviso']);
            ?>
           
            <form action="../../controllers/controladorAvisos.php" method="POST" enctype="multipart/form-data" class="form-horizontal">
              <div class="form-row">
                  
                    <div class="form-group col-md-6">
                      <label>Titulo: </label>
                      <input type="text" class="form-control" name="titulo" value="<?php echo $aviso['TITULO']?>" required>
                      <div id="error-message-titulo" style="display: none; color: red;">El título no debe tener más de 45 caracteres</div>
                    </div>

                  
                    <div class="form-group col-md-6">
                      <label>Autor: </label>
                      <input type="text" class="form-control" placeholder= "Opcional" name="subtitulo" value="<?php echo $aviso['SUBTITULO']?>">
                      <div id="error-message-autor" style="display: none; color: red;">El título no debe tener más de 35 caracteres</div>
                    </div>
              </div>

              <div class="form-row">
                      <div class="form-group col-md-6">
                        <label>Docente: </label>
                        <select class="form-control" name="docente">
                            <option value="<?php echo $aviso['IDDOC']?>"><?php echo $aviso['APELLIDODOC'].' '.$aviso['NOMBREDOC']?></option>
  
                          <?php
                          $docentes = listaDocentes();
                         foreach ($docentes as $docente):
                         ?>
                              <option value="<?php echo $docente['IDDOC'] ?>"><?php echo $docente['APELLIDODOC'].' '.$docente['NOMBREDOC'] ?></option>
                         <?php endforeach; ?>
                        </select>
                      </div>

                  <div class="form group col-md-6">
                    <!--<input type="text" class="form-control" name="materia" value="<?php echo $aviso['CODMAT']?>"><br>-->
                    <label>Materia: </label>
                    <select class="form-control" name="materia" >
                            <option value="<?php echo $aviso['CODMAT']?>"><?php echo $aviso['NOMBREMAT']?></option>
                             
                        <?php
                          $materias = listaMaterias();
                          foreach ($materias as $materia):
                        ?>
                          <option value="<?php echo $materia['CODMAT']?>"> <?php echo $materia['NOMBREMAT'] ?> </option>
                       <?php endforeach; ?>
                      </select>
                  </div>

                 </div>

              <div class="form-row">
                  
                  <div class="form-group col-md-12">
                      <label>Contenido: </label>
                      <textarea class="form-control" name="descripcion" rows="5" cols="75" required=""><?php echo $aviso['CONTENIDO']?></textarea>
                      <div id="error-message-contenido" style="display: none; color: red;">El contenido no debe tener más de 280 caracteres</div>
                    </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-4"> 
                  <label>Mostrarse: </label>
                  <select class="form-control" name="mostrar">
        
                    <option value="Si">Si</option>
                    <option value="No">No</option>  

                  </select>
                </div> 
              </div>

              <input type="hidden" name="idUser" value="<?php echo $_SESSION['login_id']?>">

              <input type="hidden" name="fecha" value="<?php echo $aviso['FECHA_HORA']?>">

              <input type="hidden" name="codAviso" value="<?php echo $aviso['CODAVISO']?>">


              <input type="submit" name="editar" value="Guardar" class="btn btn-success">
            </form>
        </section>

        <script src="../../public/js/jquery.min.js"></script>
        <script>
          $(document).ready(function() {
            $("form").on('submit', function(event) {
              var titulo = $("input[name='titulo']").val();
              if(titulo.length > 45){
                event.preventDefault(); 
                $("#error-message-titulo").show();
              } else {
                $("#error-message-titulo").hide();
              }

              var descripcion = $("textarea[name='descripcion']").val();
              if(descripcion.length > 280){
                event.preventDefault(); 
                $("#error-message-contenido").show();
              } else {
                $("#error-message-contenido").hide();
              }

              var autor = $("input[name='subtitulo']").val();
              if(autor.length > 35){
                event.preventDefault(); 
                $("#error-message-autor").show();
              } else {
                $("#error-message-autor").hide();
              }
            });
          });
        </script>
    </body>
</html>