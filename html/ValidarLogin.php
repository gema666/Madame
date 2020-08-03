<?php
require('conexion.php');
$Password=$_POST['Password'];
$usuario=$_POST['usuario'];
SESSION_START();

$_SESSION['usuario']=$usuario;
$PasswordEncriptada=sha1($Password);


$sql2=mysqli_query($mysqli,"SELECT * FROM login WHERE usuario='$usuario'");

$sql3=mysqli_query($mysqli,"SELECT * FROM login WHERE usuario='$usuario' && Status='Administrador' ");
//$sql2=mysqli_query($mysqli,"SELECT * FROM login WHERE Nombre='$Nombre' ");
//$sql2=mysqli_query($mysqli,"SELECT * FROM login WHERE Nombre='$Nombre' ");
//SELECT * FROM login WHERE Nombre='Admin' && Status='Administrador'



if($f3=mysqli_fetch_assoc($sql3)){
	if($f2=mysqli_fetch_assoc($sql2)){

	if($f2['Password']==$PasswordEncriptada){
 	//session_start();
		


	echo '<script>alert (" la contraseña es '.$PasswordEncriptada.' ");</script>';

	echo '<script>alert("BIENVENIDO ADMINISTRADOR")</script>';

	echo "<script>location.href='PaginasAdmin/IndexAdmin.html'</script>";

	}
	else{

	echo '<script>alert("CONTRASEÑA INCORRECTA")</script>';
	echo "<script>location.href='Login.html'</script>";


	}

}

else
{
	
	echo '<script>alert("USUARIO O CONTRASEÑA INCORRECTOS")</script>';
	echo "<script>location.href='Login.html'</script>";

}




}

else
{
	if($f2=mysqli_fetch_assoc($sql2)){

	if($PasswordEncriptada==$f2['Password']){	


//	$_SESSION=$usuario;
	//	$_SESSION['usuario']='Missy';

	echo '<script>alert (" la contraseña es '.$PasswordEncriptada.' ");</script>';
	echo '<script>alert("¿Estas lista para comprar?")</script>';
	
	echo "<script>location.href='PaginasCliente/IndexCliente.php'</script>";

	}
	else{
	echo '<script>alert("CONTRASEÑA INCORRECTA")</script>';
	echo "<script>location.href='Login.html'</script>";

	}

}

else
{
	echo '<script>alert("USUARIO O CONTRASEÑA INCORRECTOS")</script>';
	echo "<script>location.href='Login.html'</script>";

}


	
}


?>

