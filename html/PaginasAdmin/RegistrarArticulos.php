
<?php
error_reporting(0);
SESSION_START();

//echo '<script>alert (" BInevenidooooo '.$_SESSION['usuario'].' ");</script>';
$varsesion=$_SESSION['usuario'];
if($varsesion==null || $varsesion=''){
	echo '<script>alert("usted no tiene autorizacion")</script>';
	die();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Registrar Articulos</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Wish shop project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="../../styles/bootstrap4/bootstrap.min.css">
<link href="../../plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="../../styles/checkout.css">
<link rel="stylesheet" type="text/css" href="../../styles/checkout_responsive.css">
<link rel="stylesheet" href="../../styles/styleTable.css">

<script>
			function validarFormulario(){
			var txtNombre = document.getElementById('Nombre').value;
			var txtTipo = document.getElementById('Tipo').value;
			var txtTalla = document.getElementById('Talla').value;
			var txtColor = document.getElementById('Color').value;
			var txtStock = document.getElementById('Stock').value;
			var txtPrecio = document.getElementById('Precio').value;
			var txtDescripcion = document.getElementById('Descripcion').value;

		    if(txtNombre == null || txtNombre.length == 0 || txtTipo == null || txtTipo.length == 0 ||txtTipo == null || txtTipo.length == 0 || txtTalla == null || txtTalla.length == 0 || txtColor== null || txtColor.length == 0 || txtStock== null || txtStock.length == 0 || || /^\s+$/.test(txtPrecio) || txtDescripcion == null || txtDescripcion.length == 0 ||
		    txtPrecio== null || txtPrecio == 0 || /^\s+$/.test(txtPrecio)
		     ) {
		    	
		      alert('ERROR: Llene los campos obligatorios marcados con * ');
		      return false;
		    }else{
		    return true;
		     
		 }
		 	
		 </script>
</head>
<body>

<div class="super_container">
	
	<!-- Header -->

	<header class="header">
		<div class="header_inner d-flex flex-row align-items-center justify-content-start">
			<div class="logo"><a href="../../Index.html"><img src="../../images/logo.png"></a></div>
			<nav class="main_nav">

				<ul>
					
					<li>
					<a href="../../IndexAdmin.html">
						<div class="avatar">
							<img src="../../images/home.png" alt="">INICIO
						</div>
					</a></li>
				
				<li>
					<div class="shopping">
					<!-- Avatar -->
					<a href="Ventas.php">
						<div class="avatar">
							<img src="../../images/option_1.png" alt="">Ventas
						</div>
					</a>
				</div>
			</li>

				<li>
					<div class="shopping">
					<!-- Avatar -->
					<a href="Articulos.php">
						<div class="avatar">
							<img src="../../images/flor.png" alt="">Articulos
						</div>
					</a>
				</div></li>
				<li>
					<a href="../CerrarSesion.php">
						<div class="avatar">
							<img src="../../images/avatar.svg" alt="">CERRAR SESION
						</div>
					</a></li>
				</ul>
			</nav>
	

			<div class="burger_container d-flex flex-column align-items-center justify-content-around menu_mm"><div></div><div></div><div></div></div>
		</div>
	</header>

	<!-- Menu -->

	
		<!-- Menu -->

	<div class="menu d-flex flex-column align-items-end justify-content-start text-right menu_mm trans_400">
		<div class="menu_close_container"><div class="menu_close"><div></div><div></div></div></div>
		<div class="logo menu_mm"><a href="#">MADAME.com</a></div>
		<div class="search">
			
		</div>
		<nav class="menu_nav">
			<ul class="menu_mm">
				<li class="menu_mm"><a href="IndexAdmin.html">Inicio</a></li>	

			</ul>
			<ul class="menu_mm">
				<li class="menu_mm"><a href="Ventas.php">VENTAS</a></li>	

			</ul>
			<ul class="menu_mm">
				<li class="menu_mm"><a href="Articulos.php">ARTICULOS</a></li>			
			</ul>
			<ul class="menu_mm">
				<li class="menu_mm"><a href="../CerrarSesion.php">CERRAR SESION</a></li>			
			</ul>
			
		</nav>
	</div>
	<!-- Home -->
	<div class="home">
		<div class="home_background parallax-window" data-parallax="scroll" data-image-src="../../images/un.jpg" data-speed="0.8"></div>
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="home_container">
						<div class="home_content">
							<div class="home_title">Navegar</div>
							<div class="breadcrumbs">
								<ul>
									<li><a href="../../Index.html">Inicio</a></li>
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
					<form onsubmit="return validarFormulario()" action="NuevoArticulo.php"  method="POST" enctype="multipart/form-data" id="checkout_form">
						<div class="checkout_title">INGRESA UN NUEVO ARTICULO</div>
						<div class="checkout_form_container">
							<input type="text" class="checkout_input" name="Nombre" id="Nombre"  placeholder="Nombre *">
							<select name="Tipo" id="Tipo" class="country_select checkout_input">
									<option value="Ropa">Ropa</option>
									<option value="Joyeria">Joyeria</option>
									<option value="Accesorio">Accesorio</option>
									<option value="Calzado">Calzado</option>
								</select>
							<input type="text" class="checkout_input"  name="Talla" id="Talla" placeholder="Talla">
							<input type="text" class="checkout_input"  name="Color" id="Color" placeholder="Color">
							<input type="text" class="checkout_input"  name="Stock" id="Stock" placeholder="Cantidad disponible *">
							<input type="text" class="checkout_input"  name="Precio" id="Precio" placeholder="Precio *">	
							<label for="imagen">Seleccionar Imagen</label>	
							<input type="file" class="checkout_input"  name="archivo" id="archivo" accept="image/*">
								
								<textarea class="checkout_comment" name="Descripcion" id="Descripcion"  placeholder="Descripcion del articulo"></textarea>
						</div>
							<button  class="cart_total_button">Registrar</button>
					</form>
							</div>
						</div>

						<div class="col-lg-6">

					<div class="cart_details">
						<img src="../../images/Looks alternativos que deberías poner en práctica de vez en cuando.jpg" alt="">
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

<script src="../../js/jquery-3.2.1.min.js"></script>
<script src="../../styles/bootstrap4/popper.js"></script>
<script src="../../styles/bootstrap4/bootstrap.min.js"></script>
<script src="../../plugins/easing/easing.js"></script>
<script src="../../plugins/parallax-js-master/parallax.min.js"></script>
<script src="../../js/checkout_custom.js"></script>
</body>
</html>