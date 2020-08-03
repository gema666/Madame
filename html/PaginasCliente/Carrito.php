
<?php

SESSION_START();

require('../conexion.php');
//echo '<script>alert (" BInevenidooooo '.$_SESSION['usuario'].' ");</script>';
error_reporting(0);
$varsesion=$_SESSION['usuario'];


//

$IdArticulo=$_REQUEST['IdArticulo'];
$Nombre=$_POST ['Nombre'];
$Precio=$_POST ['Precio'];
$Oferta=$_POST ['Oferta'];
$Cantidad=$_POST ['Cantidad'];
$Talla=$_POST ['Talla'];
$Stock=$_POST ['Stock'];

//CONSULTA ARTICULO
//echo '<script>alert (" '.$PrecioSuma.' ");</script>';

$PrecioSuma=$Cantidad*$Precio;

//echo '<script>alert (" '.$PrecioSuma.' ");</script>';

//echo '<script>alert (" '.$Oferta.' ");</script>';

$Porcentaje=$Oferta/100;

//echo '<script>alert (" '.$Porcentaje.' ");</script>';

$Descuento=$PrecioSuma*$Porcentaje;

//echo '<script>alert (" '.$Descuento.' ");</script>';

$TotalCDescuento=$PrecioSuma-$Descuento;

//echo '<script>alert (" '.$TotalCDescuento.' ");</script>';

//$IdArticulo=$_REQUEST ['IdArticulo'];
//query4="SELECT Precio FROM articulo WHERE IdArticulo='$IdArticulo'";
	//	$resultado4=$mysqli->query($query4);
	  //  $fila4=$resultado4-> fetch_assoc();
		//$Precio=$fila4['Precio'];		

//echo '<script>alert (" articulo '.$IdArticulo.' ");</script>';
//echo '<script>alert (" articulo '.$Precio.' ");</script>';


////////////////////////ID USUARIO CONSULTA

$query3="SELECT IdUsuario FROM Login WHERE usuario='$varsesion'";
		$resultado3=$mysqli->query($query3);
	    $fila3=$resultado3-> fetch_assoc();
		$IdUsuario=$fila3['IdUsuario'];
//echo '<script>alert (" user '.$IdUsuario.' ");</script>';


//////////INSERTAR CARRO
	$query2="SELECT MAX(IdCarro) as ultimoid_carro FROM carro";
		$resultado2=$mysqli->query($query2);
	    $fila=$resultado2-> fetch_assoc();
		$ultimoid_carro=$fila['ultimoid_carro'];
		$corte_idcarro=substr($ultimoid_carro, 2);
		$nuevo_idcarro=$corte_idcarro+1;
		$final_idcarro="CA" .$nuevo_idcarro;



$queryD="INSERT INTO carro (IdCarro,Talla, CantidadProducto, PrecioSuma, IdUsuario) VALUES ('$final_idcarro', '$Talla','$Cantidad', '$TotalCDescuento','$IdUsuario')";
		 $resultadoD=$mysqli->query($queryD);



//INSERTAR CARRO ARTICULO


	$query="INSERT INTO carro_articulo (IdArticulo, IdCarro) VALUES ('$IdArticulo', '$final_idcarro')";
	$resultado=$mysqli->query($query);

if(($resultadoD>0) && ($resultado>0) ){ 
      	
      		echo '<script>alert ("articulo añadido al carrito");</script>';
      		echo "<script>location.href='IndexCliente.php'</script>";
      	

 		}else 

 		{
 			echo '<script>alert ("error al añadir articulo al carrito");</script>';
 			echo "<script>location.href='IndexCliente.php'</script>";

 			}
 			
 		
	
?>