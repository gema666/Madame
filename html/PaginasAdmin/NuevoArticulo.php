
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
<?php
require('../conexion.php');
$Nombre=$_POST ['Nombre'];
$Tipo=$_POST['Tipo'];
$Talla=$_POST ['Talla'];
$Color=$_POST ['Color'];
$Stock=$_POST ['Stock'];
$Precio=$_POST ['Precio'];
$Descripcion=$_POST ['Descripcion'];



$hoy = date("Y") ."-". date("m")."-".date("d");


	$query2="SELECT MAX(IdArticulo) as ultimoid_articulo FROM articulo";
		$resultado2=$mysqli->query($query2);
	    $fila=$resultado2-> fetch_assoc();
		$ultimoid_articulo=$fila['ultimoid_articulo'];
		$corte_idarticulo=substr($ultimoid_articulo, 2);
		$nuevo_idarticulo=$corte_idarticulo+1;
		$final_idarticulo="A-" .$nuevo_idarticulo;

	$query="INSERT INTO articulo (IdArticulo, Nombre, Tipo,Talla, Color,Stock, Precio, Descripcion, FechaRegistro) VALUES ('$final_idarticulo','$Nombre','$Tipo' ,'$Talla', '$Color','$Stock', '$Precio',  '$Descripcion', '$hoy')";
	$resultado=$mysqli->query($query);

	$nombre_temporal=$_FILES['archivo']['tmp_name'];
	//$nombreA=$_FILES['archivo']['name'];
	//move_uploaded_file(($nombre_temporal), '../../images/Articulo/'.$nombreA);
	$urlnuevo='../../images/Articulo/'.$final_idarticulo.".jpg";

	if(is_uploaded_file($nombre_temporal)){
		copy($nombre_temporal,$urlnuevo);
	//move_uploaded_file(($nombre_temporal), '../../images/Articulo/'.$nombreA);
	}else{

	}

	?>
	<html>
		<head>
		 	<Tittle>Guardar Producto </Tittle>
		 	
    </div>
		</head>
		<body>
			<center>
				<?php if($resultado>0){ ?>
							
				<h1>Producto Guardado</h1>
				<?php } else { ?>
				<h1>Error al guardar</h1>
				<?php } ?>
				<p></p>
				<a href="RegistrarArticulos.php">REGRESAR</a>
			</center>	
		</body>
	</html>