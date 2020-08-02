<?php
	$mysqli=new mysqli("localhost", "root","","madame");
		if(mysqli_connect_errno()){
			echo 'conexion fallida:', mysqli_connect_error();

		}
?>