<?php
  include('conexion.php');				 
		  $Nombre=$_POST['Nombre'];
		  $ApellidoPaterno=$_POST['ApellidoPaterno'];
		  $ApellidoMaterno=$_POST['ApellidoMaterno'];
		  $Telefono=$_POST['Telefono'];
		  $Email=$_POST['Email'];

		  $NombreUsuario=$_POST['NombreUsuario'];
		  $Password=$_POST['Password'];
		  $PasswordEncriptada=sha1($Password);
		  
		  $Telefono=$_POST['Telefono'];

		  
		  
		  
		
	//*	  $regular_radio=$_POST['regular_radio'];
		 



 //************************************USUARIO
		 $queryC2="SELECT MAX(IdUsuario) as ultimoid_usuario FROM usuario";
    
	     $resultadoC2=$mysqli->query($queryC2);

	     $filaC=$resultadoC2-> fetch_assoc();
	     $ultimoid_usuario=$filaC['ultimoid_usuario'];

	     $corte_idusuario=substr($ultimoid_usuario,2);
	     $nuevo_idusuario=$corte_idusuario+1;
	     $final_idusuario="U-".$nuevo_idusuario;

	     $queryC="INSERT INTO usuario (IdUsuario, Nombre, ApellidoPaterno, ApellidoMaterno, Email, Telefono)VALUES('$final_idusuario','$Nombre','$ApellidoPaterno','$ApellidoMaterno','$Email','$Telefono')";

	     $resultadoC=$mysqli->query($queryC);


//************************************ LOGIN
		 $queryR2="SELECT MAX(IdLogin) as ultimoid_login FROM login";

	     $resultadoR2=$mysqli->query($queryR2);

	     $filaR=$resultadoR2-> fetch_assoc();

	     $ultimoid_login=$filaR['ultimoid_login'];

	     $corte_idlogin=substr($ultimoid_login,2);
	     $nuevo_idlogin=$corte_idlogin+1;
	     $final_idlogin="L-".$nuevo_idlogin;

	     $queryR="INSERT INTO login (IdLogin, usuario, Password, Status, IdUsuario) VALUES('$final_idlogin','$NombreUsuario','$PasswordEncriptada','Cliente','$final_idusuario')";

	     $resultadoR=$mysqli->query($queryR);


     ?>
  
<!DOCTYPE html>
<html lang="en">
<head>
<title>Ingresar Usuario</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Wish shop project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="../styles/bootstrap4/bootstrap.min.css">
<link href="../plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="../styles/checkout.css">
<link rel="stylesheet" type="text/css" href="../styles/checkout_responsive.css">
<HEAD>
  <title>Ingresar usuario</title>
  </head>

</head>

<body>

<!-- Header -->

	<header class="header">
		<div class="header_inner d-flex flex-row align-items-center justify-content-start">
			<div class="logo"><a href="../Index.html"><img src="../images/logo.png"></a></div>
			<nav class="main_nav">

				<ul>
					
					<li>
					<a href="../Index.html">
						<div class="avatar">
							<img src="../images/home.png" alt="">INICIO
						</div>
					</a></li>
				
				
					<li>
					<a href="Login.html">
						<div class="avatar">
							<img src="../images/avatar.svg" alt="">INICIAR SESION
						</div>
					</a></li>
				</ul>
			</nav>
	

			<div class="burger_container d-flex flex-column align-items-center justify-content-around menu_mm"><div></div><div></div><div></div></div>
		</div>
	</header>

	
	<div class="menu d-flex flex-column align-items-end justify-content-start text-right menu_mm trans_400">
		<div class="menu_close_container"><div class="menu_close"><div></div><div></div></div></div>
		<div class="logo menu_mm"><a href="../Index.html">MADAME.com</a></div>
		<div class="search">
			
		</div>
		<nav class="menu_nav">
			<ul class="menu_mm">

				<li class="menu_mm"><a href="../Index.html">INICIO</a></li>
				<li class="menu_mm"><a href="Login.html">INICIAR SESION</a></li>
				
			</ul>
		</nav>
	</div>

	<!-- Home -->
	<div class="home">
		<div class="home_background parallax-window" data-parallax="scroll" data-image-src="../images/hile.jpg" data-speed="0.8"></div>
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="home_container">
						<div class="home_content">
							<div class="home_title">Navegar</div>
							<div class="breadcrumbs">
								<ul>
									<li><a href="../Index.html">Inicio</a></li>
									<li><a href="Login.html">Iniciar Sesion</a></li>
									<li><a href="Registrar.php">Registrar</li>
									<li><a >Registrado</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<div class="col-lg-6">
					<div class="billing">
     <center><H1>

      <?php if(($resultadoC>0) && ($resultadoR>0) ){ 
      	function mostrarTexto($texto){
      		echo $texto;
      		echo "<strong>CORRECTAMENTE</strong>";
      	}

      	mostrarTexto("TU CUENTA SE HA CREADO");
 		}else 

 		{
 			function mostrarTexto ($texto){
 				echo $texto;
 				echo "<strong >INCORRECAMENTE</strong>";
 			}
 			mostrarTexto("EL USUARIO AGREGADO");
 		} 		  ?>
 		
<br><button  onclick="window.location.href='Registrar.php'" class="cart_total_button">REGRESAR</button>
   <H1>  </center></div></div>

<footer class="footer">
		<div class="container">
			<div class="row">
				<div class="col text-center">
					<div class="footer_logo"><a href="#"></a></div>
					
					<div class="copyright"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved MADAME.com </a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></div>
				</div>
			</div>
		</div>
	</footer>
  </body>!-- Footer -->

		<!-- Footer -->


</div>

<script src="../js/jquery-3.2.1.min.js"></script>
<script src="../styles/bootstrap4/popper.js"></script>
<script src="../styles/bootstrap4/bootstrap.min.js"></script>
<script src="../plugins/easing/easing.js"></script>
<script src="../plugins/parallax-js-master/parallax.min.js"></script>
<script src="../js/checkout_custom.js"></script>
</body>
</html>