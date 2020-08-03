<?php

SESSION_START();
error_reporting(0);
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
<title>ARTICULOS</title>
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
		function validarBuscar(){
			var txtBuscaP= document.getElementById('BuscaArticulo').value;
					

		    if(txtBuscaP == null || txtBuscaP == 0 || /^\s+$/.test(txtBuscaP)
		     ) {
		    	
		      alert('ERROR: Escriba el nombre del producto');
		      return false;
		    }
		    return true;
		 
		 	}
</script>

</head>
<body>

<div class="super_container">
	
	<!-- Header -->

	<header class="header">
		<div class="header_inner d-flex flex-row align-items-center justify-content-start">
			<div class="logo"><img src="../../images/logo.png"></a></div>
			<nav class="main_nav">

				<ul>
					
					<li>
					<a href="IndexAdmin.html">
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
				<li class="menu_mm"><a href="Articulos.html">ARTICULOS</a></li>			
			</ul>
			<ul class="menu_mm">
				<li class="menu_mm"><a href="../CerrarSesion.php">CERRAR SESION</a></li>			
			</ul>
			
		</nav>
	</div>
	<!-- Home -->
	<div class="home">
		<div class="home_background parallax-window" data-parallax="scroll" data-image-src="../../images/un.jpg" data-speed="0.8"> </div>
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="home_container">
						<div class="home_content">
							<div class="home_title">Navegar</div>
							<div class="breadcrumbs">
								<ul>
									<li><a href="IndexAdmin.html">Inicio</a></li>
									<li><a href="">Administrar Articulos</a></li>
									
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
				<div class="checkout_title">ADMINISTRAR ARTICULOS</div>
					<form name="BuscarArticulo" onsubmit="return validarBuscar()" method="POST" action="resultado_busquedaArticulo.php" autocomplete="off">
						<input type="search" name="BuscaArticulo"  id="BuscaArticulo" maxlength="20" class="search_input" placeholder="Nombre" >
						<button type="submit" class="cart_total_button">BUSCAR</button> 
					</form>
<button type="submit" onclick="window.location.href='RegistrarArticulos.php'" class="cart_total_button">AGREGAR ARTICULOS</button>
					<?php			

require('../conexion.php');
//require('conexion_invitado.php');
$query="SELECT IdArticulo, Nombre, Tipo, Talla, Color, Stock, Precio, Oferta, Descripcion FROM Articulo";	

$resultado=$mysqli->query($query);

?>
	
							</div>
							
							<table>
							

							<thead>
								
							<tr>
							    <th colspan="3">Clave del articulo</th>
							    <th colspan="3">Nombre</th>
							    <th colspan="3">Tipo</th>
							    <th colspan="3">Talla</th>
							    <th colspan="3">Color</th>
							    <th colspan="3">Cantidad Disponible</th>
							    <th colspan="3">Precio</th>
							     <th colspan="3">Descripcion</th>
							     <th colspan="3">Descuento</th>

							     <th colspan="3">Imagen</th>
							    <th colspan="3">Eliminar articuulo</th>
							    <th colspan="3">Editar articulo</th>
							    <th colspan="3">Ver opiniones del articulo</th>
							 </tr>
							</thead>

							  <tbody>
							  
<?php							
while ($fila=$resultado -> fetch_assoc()) {
	# code...
?>
	<tr>
		<td colspan="3">  <?php echo $fila['IdArticulo'];?> </td>
		<td colspan="3"> <?php echo $fila['Nombre'];?> </td>
		<td colspan="3"><?php echo $fila['Tipo'];?></td>
		<td colspan="3"><?php echo $fila['Talla'];?></td>
		<td colspan="3"><?php echo $fila['Color'];?></td>
		<td colspan="3"><?php echo $fila['Stock'];?></td>
		<td colspan="3"><?php echo $fila['Precio'];?></td>
		 <td colspan="3"><?php echo $fila['Oferta'];?></td>
		 <td colspan="3"><?php echo $fila['Descripcion'];?></td>
		 <td colspan="3"><img src="../../images/Articulo/<?php echo $fila['IdArticulo'];?>.jpg" width="100em" height="100em"> </td>
		<td colspan="3"><a href="eliminarArticulo.php ?IdArticulo=<?php echo $fila['IdArticulo']; ?> "><img src="../../images/TRA.png" width="30" height="30"> </a></td>
		<td colspan="3"><a href="modificarArticulo.php ?IdArticulo=<?php echo $fila['IdArticulo']; ?> "><img src="../../images/EDI.png" width="30" height="30"></a></td>

		<td colspan="3"><a href="verArticulo.php ?IdArticulo=<?php echo $fila['IdArticulo']; ?> "><img src="../../images/eye.png" width="30" height="30">  </a></td>
	</tr>
<?php
}
?>
							  
							    </tbody>
						</table>
							</div>
					
					
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