<?php
	include('controllers/controladorAvisos.php');
	include('controllers/controladorPublicidades.php');
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<script type="text/javascript" src="reloj.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	
	<link rel="stylesheet" type="text/css" href="public/bootstrap/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="public/bootstrap/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="public/css/main2.css">
	<link rel="stylesheet" type="text/css" href="public/fonts/fuentes.css">
	<link rel="stylesheet" type="text/css" href="public/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="public/css/util.css">
	<link rel="stylesheet" type="text/css" href="public/css/main2.css">
	<link rel="stylesheet" type="text/css" href="public/css/main.css">
	<link rel="stylesheet" type="text/css" href="public/fonts/fuentes.css">
	

	<title>Principal</title>

</head>

<body onload="mueveReloj()" style="overflow-x: hidden;">

				<header class="azul">
					<div class="navbar  navbar-expand-lg azul">
						

						<div class="col-md-9" align="center">
							<h1 align="center" class="display-5" style="color: white ; font-family: Georgia; font-weight: bold;" >DEPARTAMENTO DE INFORMATICA Y SISTEMAS</h1>
						</div>

						<div class=" col-md-2 offset-md-0" align="center">

									<form name="form_reloj">
										
    										<input type="text" name="reloj" size="7" class="display-4 text-center" onfocus="window.document.form_reloj.reloj.blur()" style="background-color:   #09073b  ; color: white; border:#1a045a; font-family: Roboto-Bold;">
    										
									</form>
						</div>

						
						
  						<div class="col-md-1" align="right" >

  							<nav>

							<ul style="list-style: none, background: white;">

								<li class="nav-item dropdown">
							        <a class="nav-link dropdown-toggle" style="font-size: 2em" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							         </a>
							        <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="">
							        <?php 
							         	if (!isset($_SESSION['login_nombre'])){?>
							        	<li><a class="dropdown-item " data-toggle="modal" data-target="#modalLogin" style="color: #6145a5; font-family: Roboto-Light"><b>Sesion</b></a></li>
							        <div class="dropdown-divider"></div>
							        <?php } ?>
							          	<li><a class="dropdown-item " href="views/avisos/listaAvisos.php" style="color:  #6145a5; font-family: Roboto-Light"><b>Avisos<b></a></li>
							          	<li><a class="dropdown-item " href="views/publicidades/listaPublicidades.php" style="color: #6145a5; font-family: Roboto-Light"><b>Anuncios</b></a></li>
							         <?php 
							         	if (isset($_SESSION['login_nombre'])){
							         		if(($_SESSION['login_tipo_usuario'])=="ADMIN"){
							         ?>
							         <div class="dropdown-divider"></div>
							         	<li><a class="dropdown-item " href="views/registros/listaBitacora.php" style="color: #6145a5; font-family: Roboto-Light"><b>Bitacora</b></a></li>
							         	<li><a class="dropdown-item " href="views/usuarios/listaUsuarios.php" style="color: #6145a5; font-family: Roboto-Light"><b>Usuarios</b></a></li>
							         		<?php } ?>
							         <div class="dropdown-divider"></div>
							          	<li><a class="dropdown-item " href="controllers/logout.php" style="color: #6145a5; font-family: Roboto-Light"><b>Logout</b></a></li>

							      	<?php } ?>

							        </ul>
							    </li>

							</ul>
							</nav>
						</div>

							<div class="modal fade " id="modalLogin" role="dialog">
								<div class="modal-dialog">
									<div class="modal-content fondoSesion">
										<div class="moddal-header">
											<button type="button" class="close" data-dismiss="modal" style="padding-right: 1.5rem;padding-top: 1rem;">&times;</button>
										</div>
										<div class="modal-body" >
											<span class="login100-form-title p-b-55">
														Iniciar sesion
													</span>
											<div class="wrap-login100 p-l-50 p-r-50 p-t-77 p-b-30">
												<form class="login100-form validate-form" action="controllers/autentificar.php" method="POST">	

													<div class="wrap-input100 validate-input m-b-16">
														<input class="input100" type="text" name="cuenta" placeholder="Email">
														<span class="focus-input100"></span>
														<span class="symbol-input100">
															<span class="lnr lnr-envelope"></span>
														</span>
													</div>

													<div class="wrap-input100 validate-input m-b-16" data-validate = "Password is required">
														<input class="input100" type="password" name="contrasenia" placeholder="Password" required="">
														<span class="focus-input100"></span>
														<span class="symbol-input100">
															<span class="lnr lnr-lock"></span>
														</span>
													</div>
													
													<div class="container-login100-form-btn p-t-25">
														<button class="login100-form-btn" name="auth">
															Ingresar
														</button>
													</div>

													</form>
													</div>
												
											</div>
											
										</div>
									</div>
								</div>

					</div>
				</header>
			

    <section>

		<div class="row">
 			<div class="col-md-9 col-sm-12 col-xs-12 sin_padding" style="background: white">
    			<div id="carouselExampleControls" class="carousel slide " data-ride="carousel" data-interval="10000">
  					<div class="carousel-inner">
  					 <div class="carousel-item active" style="height: 40em">
  					    <img class="d-block w-100" src="uploads/portada.jpg" width="100%" height="100%">
 					 </div>

 					   
 					   		<?php
								$avisos = listaAvisosMonitor();
    	        	    		foreach ($avisos as $aviso):
	        	    		?>
 					   			<div class="carousel-item" style="height: 40em">
 					   				<div class="contenedor">
 					   					<div class="centralizador">
 
 					   				<table class="table monitor">
 					   					<tr align="right">
        	        						<td colspan="2" style="font-family: Lucida;"><?php echo $aviso['FECHA_HORA'] ?></td> 
	        	      					</tr>
	    	          					<tr align="center" >
            	    						<td colspan="2" style=" text-transform: uppercase; font-family: Georgia ;"><h2 class="display-4"><b><?php echo $aviso['TITULO'] ?></b></h2></td>
										</tr>
										<tr>
											<td></td>
										</tr>
	    		       					<?php
	        	      					if (!empty($aviso['NOMBREDOC']) && !empty($aviso['NOMBREMAT'])) {	
    		        					?>
		        	      					<tr align="center">
        	    	    						<td width="50%"  style="font-family: Georgia; color: #09073b font-weight: bold; ", align="center"><h4><b><?php echo $aviso['NOMBREDOC'].' '.$aviso['APELLIDODOC'] ?></b></h4></td>
            	    							<td style="font-family: Georgia; color: #09073b; font-weight: bold;" align="center"><h4><b><?php echo $aviso['NOMBREMAT'] ?></b></h4></td>
	            		   					</tr>
	            						<?php
	    	      						}
	    		        				?>
    	    	    	   				<tr align="center">
        		        					<td colspan="2" style="font-family: MonotypeCorsiva;"><h3 class="display-4"><?php echo $aviso['CONTENIDO'] ?></h3></td>
	    	        	    			</tr>
	    	        	    			<?php
	        	      					if (!empty($aviso['SUBTITULO'])) {	
    		        					?>
	    	        	    			<tr>
											<td></td>
										</tr>
										<tr>
											<td colspan="2" style="font-family: MonotypeCorsiva;"><h3 class="display-4">Atentamente,</h3></td>
										</tr>
			              				<tr align="center" >
    	    	      						<td colspan="2" style="text-transform: uppercase; font-family: Georgia; color: #640717;"><h2><?php echo $aviso['SUBTITULO'] ?></h2></td>
        	    		  				</tr>
            							<?php
	    	      						}
	    		        				?>
		                				
    	        					</table>

 					   					</div>
 					   				</div>
 					   			</div>
 					   		<?php
		            	endforeach;
        	    		?>
        	    		<?php
   										$imagenes = listaImagenesMonitor();

   										foreach ($imagenes as $imagen):
   									?>
   										<div class="carousel-item">
   											<div class="row">
   												<?php if ($imagen['titulo']!=null){?>
   												<div class="col-md-4">
   													<br/><br/><br/>
   												<table class="table monitor">
   													<tr align="center" >
            	    									<td colspan="2" style="text-transform: uppercase; font-family: Georgia ;"><h2 class="display-4" align="center"><b><?php echo $imagen['titulo'] ?></b></h2>
            	    									</td>
													</tr>
												</table>	
   												</div>
   												<div class="col-md-8" style="height: 40em">
   													<img class="d-block" width="100%" height="650rem" src="<?php echo $imagen['ubicacion']?>">
   												</div>
   											<?php } else{?>
   												<div class="col-md-12" style="height: 40em">
   													<img class="d-block" width="100%" height="650rem" src="<?php echo $imagen['ubicacion']?>">
   												</div>
   											<?php }?>
   											</div>
       									</div>
   									<?php
   										endforeach;
   									?>

 					   	</div>
  					</div>
  						
 					 <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
 					   <span class="carousel-control-prev-icon" aria-hidden="true"></span>
 					   <span class="sr-only">Previous</span>
 					 </a>
 					 <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
 					   <span class="carousel-control-next-icon" aria-hidden="true"></span>
 					   <span class="sr-only">Next</span>
 					 </a>		
  			</div>
  			<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 sin_padding" style="height: 40em; background:  url('uploads/fondoF2.jpg');">
				<br>
				<center><img src="uploads/umss.png" width="80%"></center>
				<center><img src="uploads/infsis-rc.png" width="80%"></center>
			</div>
  		</div>
  

    </section>

    

</body>
<footer>
			

			<div class="footer" style="height: 45px">
				<div class="row">
					<div class="col-md-3 sin_padding" align="center" style="background:  #640717 ; height: 100%  ;">
						
						<div id="TT_yvBgrxtxY2EcfjpANAVzzDDDztaATff2bd1t1cioa1D"></div>
						<script type="text/javascript" src="https://www.tutiempo.net/s-widget/l_yvBgrxtxY2EcfjpANAVzzDDDztaATff2bd1t1cioa1D"></script>

					</div>
					<div class="col-md-9 col-xs-12 sin_padding" style="height: 100%">
						<MARQUEE bgcolor=#ccd1d1 style="height: 45px">
						<h2 style="color:black; font-family:Roboto-Light; font-weight: bold">
							<script>
						
								var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
								var diasSemana = new Array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");
								var f=new Date();
								document.write(diasSemana[f.getDay()] + ", " + f.getDate() + " de " + meses[f.getMonth()] + " de " + f.getFullYear());
									
							</script>

						</h2>
						</MARQUEE>
					</div>
				</div>
			</div>

			
	</footer>

	<script src="public/js/jquery.min.js"></script>
	<script src="public/js/bootstrap.min.js"></script>
</html>
