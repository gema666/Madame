<?php 
	require('conexion.php');
	$query="SELECT * FROM producto";
	$resultado=$mysqli->query($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>REGISTRAR</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Wish shop project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="../styles/bootstrap4/bootstrap.min.css">
<link href="../plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="../styles/checkout.css">
<link rel="stylesheet" type="text/css" href="../styles/checkout_responsive.css">



<script>

function ValidaCampos(valor)
{ 
//comprueba campo teléfono de formulario
//usa el metodo test de expresion regular
	
	if(/^([0-9\+\S\+\-]{10})+$/.test(valor)) {
		//alert("El número telefónico es correcto.");
		return (true);
	}
	else                                                             
	{
		alert('El número de teléfono ingresado no es válido.');
		return false; //no submit
	}
}


//******************************************************


	function validarFormulario(){
		var txtNombreUsuario = document.getElementById('NombreUsuario').value;
		var txtNombre = document.getElementById('Nombre').value;
		var txtApellidoPaterno= document.getElementById('ApellidoPaterno').value;
	 	var txtApellidoMaterno= document.getElementById('ApellidoMaterno').value;
	 	var txtPassword= document.getElementById('Password').value;
	   var txtEmail= document.getElementById('Email').value;
	   var txtTelefono= document.getElementById('Telefono').value;
	   
   
    if( txtNombre == null || txtNombre.length == 0 || 
    	txtPassword == null || txtPassword.length == 0 ||
    	txtNombreUsuario == null || txtNombreUsuario.length == 0 ||
    txtApellidoPaterno == null || txtApellidoPaterno.length == 0 ||
   	txtApellidoMaterno == null || txtApellidoMaterno.length == 0 || 
   	txtPassword == null || txtPassword.length == 0 || 
   	txtEmail == null || txtEmail.length == 0  ) {
    	
      alert('ERROR: LLENA LOS CAMPOS OBLIGATORIOS MARCADOS CON *');
  ValidaCampos(document.Formulario.Telefono.value);
  validarF();
 
      return false;
      
    }else{
    	 ValidaCampos(document.Formulario.Telefono.value);
    	validarF();
    	 return true;
    	
    }
   
 
 	}

	</script>

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
				<li class="menu_mm"><a href="Registrar.php">REGISTRARME</a></li>
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
									<li>Registrar</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Checkout -->

	<div class="checkout">
		<div class="container">
			<div class="row">

				
				<!-- Billing Details -->
				<div class="col-lg-6">
					<div class="billing">
						<form  name="Formulario" action="IngresarUsuario.php" onsubmit="return validarFormulario()" method="POST" id="checkout_form">
						<div class="checkout_title">CREAR NUEVA CUENTA</div>
						<div class="checkout_form_container">
							<input type="text" class="checkout_input" id="NombreUsuario" name="NombreUsuario" placeholder="Nombre de Usuario *" required="required">
								<div class="d-flex flex-lg-row flex-column align-items-start justify-content-between">
								<input type="text" class="checkout_input checkout_input_50" id="Nombre" name="Nombre" placeholder="Nombre *" required="required">
								<input type="text" class="checkout_input checkout_input_50" id="ApellidoPaterno" name="ApellidoPaterno" placeholder="Apellido Paterno * " required="required">
								<input type="text" class="checkout_input checkout_input_50" id="ApellidoMaterno" name="ApellidoMaterno" placeholder="Apellido Materno *" required="required">
									
								</div>
							<input class="checkout_input" id="Password" name="Password" placeholder="Contraseña *" required="required"  type='password'>
									
							<input type="text" class="checkout_input" name="Email" id="Email" placeholder="E-mail *" required="required">
									
							<input type="text" class="checkout_input checkout_input_50" name="Telefono" id="Telefono" placeholder="Numero de telefono" >
							</div>

							<button  class="cart_total_button">Registrar</button>
							

							
							</form>
							</div>
						</div>

						<div class="col-lg-6">

					<div class="cart_details">
						<img src="../images/Pantalones para gorditas (tan bonitos) que te harán lucir mas delgada.jpg" alt="">
					</div></div>

			</div>
		</div>
	</div>

	<!-- Footer -->

		<!-- Footer -->
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

</div>

<script src="../js/jquery-3.2.1.min.js"></script>
<script src="../styles/bootstrap4/popper.js"></script>
<script src="../styles/bootstrap4/bootstrap.min.js"></script>
<script src="../plugins/easing/easing.js"></script>
<script src="../plugins/parallax-js-master/parallax.min.js"></script>
<script src="../js/checkout_custom.js"></script>
</body>
</html>