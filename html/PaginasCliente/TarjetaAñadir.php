
<?php

SESSION_START();

require('../conexion.php');
//echo '<script>alert (" BInevenidooooo '.$_SESSION['usuario'].' ");</script>';
error_reporting(0);
$varsesion=$_SESSION['usuario'];

$NoTarjeta=$_POST ['NoTarjeta'];
$TipoTarjeta=$_POST ['TipoTarjeta'];
$FechaVencimiento=$_POST ['FechaVencimiento'];
$CVV=$_POST ['CVV'];



$query3="SELECT IdUsuario FROM Login WHERE usuario='$varsesion'";
		$resultado3=$mysqli->query($query3);
	    $fila3=$resultado3-> fetch_assoc();
		$IdUsuario=$fila3['IdUsuario'];	

//////////INSERTAR Tarjeta
	$query2="SELECT MAX(IdTarjeta) as ultimoid_tarjeta FROM cuenta_tarjeta";
		$resultado2=$mysqli->query($query2);
	    $fila=$resultado2-> fetch_assoc();
		$ultimoid_tarjeta=$fila['ultimoid_tarjeta'];
		$corte_idtarjeta=substr($ultimoid_tarjeta, 2);
		$nuevo_idtarjeta=$corte_idtarjeta+1;
		$final_idtarjeta="T-" .$nuevo_idtarjeta;

		$query="INSERT INTO cuenta_tarjeta (IdTarjeta,NoTarjeta,TipoTarjeta,FechaVencimiento,CVV,IdUsuario) VALUES ('$final_idtarjeta','$NoTarjeta','$TipoTarjeta','$FechaVencimiento','$CVV','$IdUsuario') ";
$resultado=$mysqli->query($query);

if(($resultado>0) ){  
	      

    echo "<script>location.href='ComprarArticulo.php'</script>";

}


	
?>


