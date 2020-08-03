
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
$Nombre=$_POST['BuscaArticulo'];
require('../conexion.php');
$query="SELECT *
		FROM articulo
		WHERE Nombre='$Nombre'";
		 $resultado=$mysqli->query($query);
?>
<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="description" content="Wish shop project">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" type="text/css" href="../../styles/bootstrap4/bootstrap.min.css">
      <link href="../../plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
      <link rel="stylesheet" type="text/css" href="../../styles/checkout.css">
      <link rel="stylesheet" type="text/css" href="../../styles/checkout_responsive.css">
      <link rel="stylesheet" href="../../styles/styleTable.css">
    </head>
    <body>

  		<h1>Articulos<h1>
        <div id="Formulario">
  			<?php if(!mysqli_num_rows($resultado)){ ?>
  			<h3>EL PRODUCTO NO EXISTE</h3>

  			<?php } else{ ?>
  			<center>
  				<table>
              

              <thead>
                
              <tr>
                  <th colspan="3">Clave</th>
                  <th colspan="3">Nombre</th>
                  <th colspan="3">Tipo</th>
                  <th colspan="3">Talla</th>
                  <th colspan="3">Color</th>
                  <th colspan="3">Stock</th>
                  <th colspan="3">Precio</th>
                   <th colspan="3">Descripcion</th>
               </tr>
              </thead>
  					<?php
  					 while ($fila =$resultado-> fetch_assoc() ) {
  						?>
           <tr>
              <td colspan="3">  <?php echo $fila['IdArticulo'];?> </td>
              <td colspan="3"> <?php echo $fila['Nombre'];?> </td>
              <td colspan="3"><?php echo $fila['Tipo'];?></td>
              <td colspan="3"><?php echo $fila['Talla'];?></td>
              <td colspan="3"><?php echo $fila['Color'];?></td>
              <td colspan="3"><?php echo $fila['Stock'];?></td>
              <td colspan="3"><?php echo $fila['Precio'];?></td>
               <td colspan="3"><?php echo $fila['Descripcion'];?></td>
            </tr>
  					<?php } ?>
  				</table>
  				<?php } ?>
          <a href="Articulos.php">Regresar</a>
        
  			</center></div> 
    </body>
  </html>