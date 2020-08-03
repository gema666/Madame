

<?php

SESSION_START();
error_reporting(0);
//echo '<script>alert (" BInevenida de nuevo '.$_SESSION['usuario'].' ");</script>';


$varsesion=$_SESSION['usuario'];

	

if($varsesion==null || $varsesion=''){
	echo '<script>alert("usted no tiene autorizacion")</script>';
	die();
}

?>


<!DOCTYPE html>
<head>
<title>MADAME.com</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Wish shop project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="../../styles/bootstrap4/bootstrap.min.css">
<link href="../../plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="../../styles/checkout.css">
<link rel="stylesheet" type="text/css" href="../../styles/checkout_responsive.css">
<link rel="stylesheet" href="../../styles/StyleTablacatalogo.css">

</head>
<body>

<div class="super_container">
	
	<!-- Header -->

	<header class="header">
		<div class="header_inner d-flex flex-row align-items-center justify-content-start">
			<div class="logo"><img src="../../images/logo.png"></a></div><h3><br>
																		</h3>
			<nav class="main_nav">
				<ul>
					<li><a href="IndexCliente.php">
						<div class="avatar">
							<img src="../../images/home.png" alt="">INICIO
						</div></a></li>

					<li><a href="Ropa.php">
						<div class="avatar">
							<img src="../../images/ves.png" alt="">ROPA
						</div></a></li>

					<li><a href="Accesorios.php">
						<div class="avatar">
							<img src="../../images/acce.png" alt="">ACCESORIOS
						</div></a></li>


				<li><a href="Calzado.php">
						<div class="avatar">
							<img src="../../images/Articu.png" alt="">CALZADO
						</div></a></li>

					<li><a href="Nuevos.php">
						<div class="avatar">
							<img src="../../images/flor.png" alt="">NUEVOS
						</div></a></li>
					<li><a href="Ofertas.php">
						<div class="avatar">
							<img src="../../images/ofer.png" alt="">OFERTAS
						</div></a></li>

					<li><a href="../CerrarSesion.php">
						<div class="avatar">
							<img src="../../images/avatar.svg" alt="">CERRAR SESION

						</div></a></li>

				</ul>
			</nav>
			<div class="shopping">
					<!-- Cart -->
					<a href="verCarrito.php">
						<div class="cart">
							<img src="../../images/option_2.png" width="25em">Carro
							
						</div>
					</a>
					<!-- Star -->
					
				</div>
	<div class="burger_container d-flex flex-column align-items-center justify-content-around menu_mm"><div></div><div></div><div></div></div>
		</div>
	</header>


	<div class="menu d-flex flex-column align-items-end justify-content-start text-right menu_mm trans_400">
		<div class="menu_close_container"><div class="menu_close"><div></div><div></div></div></div>
		<div class="logo menu_mm"><a href="#">MADAME.com</a></div>

		<div class="search">
			
		</div>
		<nav class="menu_nav">
			<ul class="menu_mm">
				<li class="menu_mm"><a href="IndexCliente.php">INICIO</a></li>
				<li class="menu_mm"><a href="Ropa.php">ROPA</a></li>
				<li class="menu_mm"><a href="Accesorios.php">ACCESORIOS</a></li>
				<li class="menu_mm"><a href="Calzado.php">CALZADO</a></li>
				<li class="menu_mm"><a href="Ofertas.php">OFERTAS</a></li>
				<li class="menu_mm"><a href="Nuevos.php">NUEVOS ARTICULOS</a></li>
			</ul>
		</nav>
	</div>
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
									<li><a href="IndexCliente.php">Catalogo</a></li>
									
									
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- Home -->

	<!-- Checkout -->

	<div class="checkout">
		<div class="container">
			<div class="row">
				<!-- Billing Details -->
				<div class="col-lg-6">





				<div class="billing">
				<div class="checkout_title">CATALOGO </div>


							<div class="product_name">
					<?php			

require('../conexion.php');
//require('conexion_invitado.php');
$query="SELECT IdArticulo, Nombre,  Precio,Oferta, Descripcion FROM Articulo";	


$resultado=$mysqli->query($query);

?>
	
							</div>
							
							<table>
							

							<thead>
								
							
							    <th colspan="3"></th>
							    <th colspan="3">Nombre</th>
							    <th colspan="3">Precio</th>
							  <th colspan="3"></th>
							   <th colspan="3"></th>
							    <th colspan="3"></th>

							</thead>

							  <tbody>
							  
<?php							
while ($fila=$resultado -> fetch_assoc()) {
	# code... 		 

?>
	<tr>

		<td colspan="3">
			<a href="VerArticulo.php ?IdArticulo=<?php echo $fila['IdArticulo']; ?>">
			<img src="../../images/Articulo/<?php echo $fila['IdArticulo'];?>.jpg"  width="300em" height="300em"> </td>
		<td colspan="3">  
		<div class="product_name"><?php echo $fila['Nombre'];?><br><h5><?php echo $fila['Descripcion'];?></h5> </div> </td>
		<td colspan="3"><h3><?php echo $fila['Precio'];?>$</h3><br>
				<?php echo $fila['Oferta'];?>% de descuento<br>
			</td>
		<td colspan="3"><a href="VerArticulo.php ?IdArticulo=<?php echo $fila['IdArticulo']; ?>"><h1>ver detalles<h1></a>
		
	</tr>
<?php
}
?>
							  
							    </tbody>
						</table></div>
							</div>
					
					
			</div>
		</div>
	</div>

<script src="../../js/jquery-3.2.1.min.js"></script>
<script src="../../styles/bootstrap4/popper.js"></script>
<script src="../../styles/bootstrap4/bootstrap.min.js"></script>
<script src="../../plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="../../plugins/easing/easing.js"></script>
<script src="../../plugins/parallax-js-master/parallax.min.js"></script>
<script src="../../plugins/colorbox/jquery.colorbox-min.js"></script>
<script src="../../js/custom.js"></script>
</body>
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
</html>