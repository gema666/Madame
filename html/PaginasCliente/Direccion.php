
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

$query4="SELECT usuario_direccion.IdUsuario, direccion.IdDireccion,direccion.CodigoPostal, direccion.Pais, direccion.Estado, direccion.Municipio, direccion.Localidad, direccion.Localidad, direccion.Calle,direccion.NoExterior, direccion.NoInterior, direccion.IndicacionesGenerales FROM usuario_direccion INNER JOIN direccion  ON  direccion.IdDireccion=usuario_direccion.IdDireccion INNER JOIN usuario ON usuario.Idusuario=usuario_direccion.IdUsuario  WHERE usuario.IdUsuario='$IdUsuario'"; 
$resultado4=$mysqli->query($query4);

$fila4=$resultado4->fetch_assoc(); 
$Indi=$fila4['IndicacionesGenerales'];

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

	<!-- Menu -->

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

	<!-- Checkout -->


	<div class="checkout">
		<div class="container">
			<div class="row">
				<!-- Billing Details -->
				<div class="col-lg-6">

				<div class="billing">
				<div class="checkout_title">Direccion</div><br>
				Verifica o agrega tus datos
				<form name ="Modificar" method="POST" action="AñadirDireccion.php">
            <div class="checkout_form_container">
               <input type="text" class="checkout_input" name="CodigoPostal" id="CodigoPostal"  placeholder="Codigo Postal*" required 
               value="<?php echo $fila4['CodigoPostal'];?>" >

              <input type="text" class="checkout_input" name="Pais" id="Pais"  placeholder="Pais*" required value="<?php echo $fila4['Pais'];?>">
              <input type="text" class="checkout_input"  name="Estado" id="Estado" placeholder="Estado*" required value="<?php echo $fila4['Estado'];?>">
              <input type="text" class="checkout_input"  name="Municipio" id="Municipio" placeholder="Delegacion/Municipio*" required 
              value="<?php echo $fila4['Municipio'];?>"> 
               <input type="text" class="checkout_input"  name="Localidad" id="Localidad" placeholder="Localidad*" required value="<?php echo $fila4['Localidad'];?>">
          

                <div class="d-flex flex-lg-row flex-column align-items-start justify-content-between">
                <input type="text" class="checkout_input checkout_input_50" id="Calle" name="Calle" placeholder="Calle *" required="required" 
                value="<?php echo $fila4['Calle'];?>">

                <input type="text" class="checkout_input checkout_input_50" id="NoExterior" name="NoExterior" placeholder="N° Exterior" value="<?php echo $fila4['NoExterior'];?>">

                <input type="text" class="checkout_input checkout_input_50" id="NoInterior" name="NoInterior" placeholder="N° Interior" 
                value="<?php echo $fila4['NoInterior'];?>">
                  
                </div>                  
                <textarea class="checkout_comment" name="IndicacionesGenerales" id="IndicacionesGenerales"  placeholder="Añade una breve descripcion" 
               >  <?php echo $Indi;?></textarea>

							
					 <input class="cart_total_button" type="submit" value="SIGUIENTE >" name="B1">
					
			</div></form>

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