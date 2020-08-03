
<?php

SESSION_START();

require('../conexion.php');
//echo '<script>alert (" BInevenidooooo '.$_SESSION['usuario'].' ");</script>';
error_reporting(0);
$varsesion=$_SESSION['usuario'];
//

//$IdArticulo=$_REQUEST['IdArticulo'];

$CodigoPostal=$_POST ['CodigoPostal'];
$Pais=$_POST ['Pais'];
$Estado=$_POST ['Estado'];
$Municipio=$_POST ['Municipio'];
$Localidad=$_POST ['Localidad'];
$Calle=$_POST ['Calle'];
$NoExterior=$_POST ['NoExterior'];
$NoInterior=$_POST ['NoInterior'];
$Indi=$_POST['IndicacionesGenerales'];

////////////////////////ID USUARIO CONSULTA

$query3="SELECT IdUsuario FROM Login WHERE usuario='$varsesion'";
    $resultado3=$mysqli->query($query3);
      $fila3=$resultado3-> fetch_assoc();
    $IdUsuario=$fila3['IdUsuario'];
//echo '<script>alert (" user '.$IdUsuario.' ");</script>';


//////////INSERTAR Compra
  $query2="SELECT MAX(IdDireccion) as ultimoid_direccion FROM direccion";
    $resultado2=$mysqli->query($query2);
    $fila2=$resultado2-> fetch_assoc();
    $ultimoid_direccion=$fila2['ultimoid_direccion'];
    $corte_iddireccion=substr($ultimoid_direccion, 2);
    $nuevo_iddireccion=$corte_iddireccion+1;
    $final_iddireccion="D-".$nuevo_iddireccion;




    $queryI="INSERT INTO direccion (IdDireccion, CodigoPostal, Pais, Estado, Municipio, Localidad, Calle, NoExterior, NoInterior, IndicacionesGenerales) VALUES 
    ('$final_iddireccion','$CodigoPostal', '$Pais', '$Estado', '$Municipio',  '$Localidad', '$Calle','$NoExterior', '$NoInterior', '$Indi')";
    
echo '<script>alert (" user '.$queryI.' ");</script>';

    $resultadoI=$mysqli->query($queryI);

    $queryA="INSERT INTO usuario_direccion (IdUsuario, IdDireccion) VALUES ('$IdUsuario', '$final_iddireccion');";
    $resultadoA=$mysqli->query($queryA);

    if(($resultadoI>0) && ($resultadoA>0) ){ 
        
          echo '<script>alert ("Direccion ingresada");</script>';
        
    echo "<script>location.href='Tarjeta.php'</script>";


    }else 

    {
      echo '<script>alert ("error");</script>';

      }
      
    //echo "<script>location.href='Direccion.php'</script>";

    


  
?>
        

