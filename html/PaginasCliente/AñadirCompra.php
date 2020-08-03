
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
$CantidadProducto=$_POST ['CantidadProducto'];
$Talla=$_POST ['Talla'];
$Stock=$_POST ['Stock'];
$Pagar=$_POST ['Pagar'];
$MetodoEnvio=$_POST ['MetodoEnvio'];
$Estado="Pendiente";
$hoy = date("Y") ."-". date("m")."-".date("d");

////////////////////////ID USUARIO CONSULTA

$query3="SELECT IdUsuario FROM Login WHERE usuario='$varsesion'";
    $resultado3=$mysqli->query($query3);
      $fila3=$resultado3-> fetch_assoc();
    $IdUsuario=$fila3['IdUsuario'];
echo '<script>alert (" user '.$IdUsuario.' ");</script>';


//////////INSERTAR Compra
  $query2="SELECT MAX(IdCompra) as ultimoid_compra FROM compra";
    $resultado2=$mysqli->query($query2);
    $fila2=$resultado2-> fetch_assoc();
    $ultimoid_compra=$fila2['ultimoid_compra'];
    $corte_idcompra=substr($ultimoid_compra, 2);
    $nuevo_idcompra=$corte_idcompra+1;
    $final_idcompra="CO".$nuevo_idcompra;

$query="SELECT articulo.IdArticulo, carro.Talla, carro.IdUsuario , articulo.Nombre, articulo.Precio, articulo.Oferta, articulo.Stock, carro.CantidadProducto, carro.PrecioSuma FROM carro_articulo INNER JOIN articulo ON articulo.IdArticulo=carro_articulo.IdArticulo INNER JOIN carro ON carro_articulo.IdCarro=carro.IdCarro WHERE carro.IdUsuario='$IdUsuario'"; 

$resultado=$mysqli->query($query);

if(($resultado>0) ){ 



  while($fila=$resultado->fetch_assoc()) {




  $IdArticulo=$fila['IdArticulo'];
  $CantidadProducto= $fila['CantidadProducto'];
    $Talla= $fila['Talla'];
    
    $queryI="INSERT INTO compra (IdCompra, FechaCompra, PrecioTotal, MetodoEnvio, Estado, IdUsuario) VALUES ('$final_idcompra', '$hoy', '$Pagar', '$MetodoEnvio',  'Pendiente', '$IdUsuario');";
    $resultadoI=$mysqli->query($queryI);
    $queryA="INSERT INTO compra_articulo (IdArticulo, IdCompra, Talla, CantidadProducto) VALUES ('$IdArticulo', '$final_idcompra', '$Talla', '$CantidadProducto');";
    $resultadoA=$mysqli->query($queryA);

 $queryU="SELECT Stock WHERE IdArticulo='$IdArticulo'";
    $resultadoU=$mysqli->query($queryU);
    $filaU=$resultadoU-> fetch_assoc();
    $Stock=$filaU['Stock'];
    $StockFinal=$Stock-$CantidadProducto;

$query="UPDATE articulo SET Stock = '$StockFinal' WHERE articulo.IdArticulo = '$IdArticulo'"; 

$resultado=$mysqli->query($query);

if(($resultado>0) ){ 




     $queryD="DELETE FROM carro where IdUsuario='$IdUsuario'";
    $resultadoD=$mysqli->query($queryD);
     echo '<script>alert ("Se ha procesado tu compra ");</script>';
    echo "<script>location.href='ComprobanteCompra.php'</script>";

   
    }
}

  
?>
        

