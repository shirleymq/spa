<?php session_start();?>
<?php include('../../controllers/controladorUsuarios.php'); ?>
<!DOCTYPE html>
<html>
    <head>

        <title>Usuarios</title>
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
                <?php
                  if(($_SESSION['login_tipo_usuario'])=="ADMIN"){
                ?>
                  <a class="nav-item nav-link active" href="nuevoUsuario.php" data-toggle="modal" data-target="#modalLogin">
                    <button class="btn btn-sm btn-outline-secondary" style="color:white;">Nuevo Usuario</button>
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
          <h1 align="center">Lista Usuarios</h1>
          <center>
            <div class="col-md-10">
          <table id="customers" border="1" class="table">
            <thead class="thead-dark">
              <tr class="bg-primary">

                <td width="40%">Nombre completo</td>
                <td width="15%">Login          </td>
                <td width="10%">Tipo           </td>
                <td width="10%">Habilitado     </td>
                <?php
                if(($_SESSION['login_tipo_usuario'])=="ADMIN"){?>
                  <!--herramientas-->
                  <td width="15%">Herramientas       </td>
                <?php }?>
              </tr>
            </thead>

            <tbody>
              <?php
                $usuarios = listaUsuarios();


                foreach ($usuarios as $usuario):  
              ?>
              <tr>
                
                <td><?php echo $usuario['NOMBREU'].' '.$usuario['APELLIDOU']?></td>
                <td><?php echo $usuario['USERNAME'] ?></td>
                <td><?php echo $usuario['CODTIPO'] ?></td>
                <td><?php echo $usuario['HABILITADO'] ?></td>
                <?php
                  if (isset($_SESSION['login_nombre'])){?>
                  <!--<td>
                    <a href="habilitar.php?idUsuario=<?php echo $usuario['IDUSUARIO'] ?>" class="btn btn-outline-warning">Habilitar</a>
                  </td>-->
                  <?php if ($usuario['HABILITADO']=='SI'){?>
                    <td>
                      <a href="../../controllers/controladorUsuarios.php?idUsuario=<?php echo $usuario['IDUSUARIO']?>&deshabilitar=true" class="btn btn-outline-danger">Deshabilitar</a>
                    </td>
                  <?php }else{?>
                    <td>
                    <a href="../../controllers/controladorUsuarios.php?idUsuario=<?php echo $usuario['IDUSUARIO']?>&habilitar=true" class="btn btn-outline-success">Habilitar</a>
                  </td>
                <?php }} ?>
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