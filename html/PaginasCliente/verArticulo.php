
<?php

SESSION_START();
error_reporting(0);
$varsesion=$_SESSION['usuario'];
$IdArticulo=$_REQUEST['IdArticulo'];		

require('../conexion.php');
//consulta usuario actual

$query3="SELECT IdUsuario FROM Login WHERE usuario='$varsesion'";
		$resultado3=$mysqli->query($query3);
	    $fila3=$resultado3-> fetch_assoc();
		$IdUsuario=$fila3['IdUsuario'];	

///consulta opinion

$query="SELECT opinion.IdArticulo, usuario.Nombre as NombreUsuario, usuario.ApellidoPaterno,usuario.ApellidoMaterno , opinion.Opinion, opinion.Puntuacion, opinion.FechaOpinion FROM opinion INNER JOIN usuario ON usuario.Idusuario=opinion.IdUsuario INNER JOIN articulo ON opinion.IdArticulo=articulo.IdArticulo WHERE opinion.IdArticulo='$IdArticulo'";	

$resultado=$mysqli->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>VENTAS</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Wish shop project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="../../styles/bootstrap4/bootstrap.min.css">
<link href="../../plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="../../styles/checkout.css">
<link rel="stylesheet" type="text/css" href="../../styles/checkout_responsive.css">
<link rel="stylesheet" href="../../styles/StyleTablacatalogo.css">


<script>
		function validarBuscar(){
			var txtBuscaP= document.getElementById('Busca').value;
					

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

					<li><a href="../../Index.html">
						<div class="avatar">
							<img src="../../images/avatar.svg" alt="">CERRAR SESION
						</div></a></li>

				</ul>
			</nav>
			<div class="shopping">
					<!-- Cart -->
					<a href="verCarrito.php">
						<div class="cart">
							<img src="../../images/option_2.png" width="25em">Ver
							
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
				<li class="menu_mm"><a href="Nuevos.php">NUEVOS ARTICULOS</a></li
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

	<!-- Checkout -->


	<div class="checkout">
		<div class="container">
			<div class="row">
				<!-- Billing Details -->
				<div class="col-lg-6">

				<div class="billing">
				<div class="checkout_title">Articulo</div>


					<?php			

require('../conexion.php');
//require('conexion_invitado.php');


$query2="SELECT IdArticulo, Nombre,  Precio, Oferta, Stock,Talla, Descripcion FROM Articulo WHERE IdArticulo='$IdArticulo'";	


$resultado2=$mysqli->query($query2);

?>
	
							</div>
							
							<table><form name ="AñadirCarrito" method="POST" action="Carrito.php">
							

							<thead>
								
							
							    <th colspan="3"></th>
							    <th colspan="3">Detalles:</th>
							  
							   

							</thead>

							  <tbody>
							  
<?php							
while ($fila2=$resultado2 -> fetch_assoc()) {
	# code... 		 

?>
	<tr>

		<td colspan="3">
			<a href="VerArticulo.php ?IdArticulo=<?php echo $fila2['IdArticulo']; ?> ">
			<img src="../../images/Articulo/<?php echo $fila2['IdArticulo'];?>.jpg"  width="300em" height="300em"> </td>

		<td colspan="3">  
			<input type="hidden"  id="IdArticulo" name="IdArticulo" value="<?php echo $fila2['IdArticulo'];?>" readonly>
			<input type="text" size="30" id="Nombre" name="Nombre" value="<?php echo $fila2['Nombre']; ?> "  readonly>
			<?php echo $fila2['Descripcion'];?><br>
			<input type="text"  id="Precio" name="Precio" value="<?php echo $fila2['Precio']; ?> $" readonly>
			<input type="text"  id="Oferta" name="Oferta" value="<?php echo $fila2['Oferta']; ?>" readonly>%Descuento<BR>
 			Cantidad de productos
 			<input placeholder="Escribe cantidad" required type="number" min="1" min="1"  id="Cantidad" name="Cantidad" value="<?php echo $fila2['CantidadProducto']; ?>"><BR>
            Talla
            <input placeholder="Escribe cantidad" required type="number" min="20" max="38"  id="Talla" name="Talla" value="<?php echo $fila2['CantidadProducto']; ?>"><BR>
          
							
		
				<BR><button class="cart_total_button"  type="submit" value="añadir" name="B1">AÑADIR A CARRITO</button></BR>
		 </td>
	</tr>
<?php
}
?>
							  
							    </tbody>
						</table>
</Form>


					</div>
							</div>





							</div>
							
							<table>
							

							<thead>
								
							<tr>
							    <th colspan="3">Opiniones</th>
							   
							 </tr>
							</thead>

							  <tbody>
							  
<?php							
while ($fila=$resultado -> fetch_assoc()) {
		?>
	<tr>
		<td colspan="3"><?php echo $fila['NombreUsuario'];?> <?php echo $fila['ApellidoPaterno'];?> <?php echo $fila['ApellidoMaterno'];?> 
			<br> <h4>Comentario:<?php echo $fila['Opinion'];?>    <?php echo $fila['FechaOpinion'];?>
			<br>Puntuacion: <?php echo $fila['Puntuacion'];?></h4>

		</td>
		

	</tr>
<?php
		# code...
}
?>
							  
							    </tbody>
						</table>

						<button  onclick="window.location.href='IndexCliente.php'" class="cart_total_button">REGRESAR</button>
							</div>
					
					
			</div>

		</div>
	</div>

					

</div>



</body>
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