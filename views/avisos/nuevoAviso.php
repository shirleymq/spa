<?php include ("../../controllers/controladorAvisos.php");?>

<!DOCTYPE html>
<html>
    <head>
      <meta charset="utf-8">
      <link rel="stylesheet" type="text/css" href="../../public/css/css/bootstrap.min.css">
   
        <title>Nuevo</title>

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
                <a class="nav-item nav-link active" href="listaAvisos.php">
                  <button class="btn btn-sm btn-outline-secondary" style="color:white;">
                    Avisos
                  </button>
                  <span class="sr-only">(current)</span>
                </a>
                    
              </div>
            </div>
          </nav>
        </header>

        <section class="container">
          <h1 align="center">NUEVO AVISO</h1><br/>

           
            <form action="../../controllers/controladorAvisos.php" method="POST" enctype="multipart/form-data">

              
              <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Titulo: </label>
                    <input type="text" class="form-control" name="titulo" required>
                </div>
              
                <div class="form-group col-md-6">
                  <label>Autor: </label>
                  <input type="text" class="form-control" placeholder= "Opcional" name="subtitulo">
                </div>
              </div>


              <div class="form-row">
                <div class="form-group col-md-6">
                
                      <label>Docente: </label>
                      <select class="form-control" name="docente">

                        <?php
                        $docentes = listaDocentes();
                       foreach ($docentes as $docente):
                       ?>
                            <option value="<?php echo $docente['IDDOC'] ?>"><?php echo $docente['APELLIDODOC'].' '.$docente['NOMBREDOC'] ?></option>
                       <?php endforeach; ?>
                      </select>
                </div>  
                <div class="form-group col-md-6">

                     <label>Materia: </label>
                      <select class="form-control" name="materia">
            
                        <?php
                          $materias = listaMaterias();
                          foreach ($materias as $materia):
                        ?>
                            <!--<td><?php echo $materia['NOMBREMAT'] ?></td>-->
                            <option value="<?php echo $materia['CODMAT']?>"> <?php echo $materia['NOMBREMAT'] ?> </option>
                       <?php endforeach; ?>
                      </select>
                      </div>
                 </div>


              <div class="form-row">
                <div class="form-group col-md-12"> 
                  <label>Contenido: </label>
                  <textarea class="form-control" name="descripcion" rows="5" required=""></textarea>
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
              <input type="submit" name="guardar" value="Guardar" class="btn btn-outline-success">

            </form>
        </section>

    </body>
</html>