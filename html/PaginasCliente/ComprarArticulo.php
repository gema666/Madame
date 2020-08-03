
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
$Pagar=$_POST ['Pagar'];
$Estado="Pendiente";
$hoy = date("Y") ."-". date("m")."-".date("d");
//CONSULTA ARTICULO
//echo '<script>alert (" '.$PrecioSuma.' ");</script>';
//$IdArticulo=$_REQUEST ['IdArticulo'];
//query4="SELECT Precio FROM articulo WHERE IdArticulo='$IdArticulo'";
  //  $resultado4=$mysqli->query($query4);
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


//////////INSERTAR Compra
  $query2="SELECT MAX(IdCompra) as ultimoid_compra FROM compra";
    $resultado2=$mysqli->query($query2);
    $fila2=$resultado2-> fetch_assoc();
    $ultimoid_compra=$fila2['ultimoid_compra'];
    $corte_idcompra=substr($ultimoid_compra, 2);
    $nuevo_idcompra=$corte_idcompra+1;
    $final_idcompra="CA" .$nuevo_idcompra;

$query="SELECT articulo.IdArticulo, carro.Talla, carro.IdUsuario , articulo.Nombre, articulo.Precio, articulo.Oferta, articulo.Stock, carro.CantidadProducto, carro.PrecioSuma FROM carro_articulo INNER JOIN articulo ON articulo.IdArticulo=carro_articulo.IdArticulo INNER JOIN carro ON carro_articulo.IdCarro=carro.IdCarro WHERE carro.IdUsuario='$IdUsuario'"; 

$resultado=$mysqli->query($query);
if(($resultado>0) ){  ?>
        
        
<!DOCTYPE html>
<html lang="en">
<head>
<title>MADAME.com</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Wish shop project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="../../styles/bootstrap4/bootstrap.min.css">
<link href="../../plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="../../styles/checkout.css">
<link rel="stylesheet" type="text/css" href="../../styles/checkout_responsive.css">
<link rel="stylesheet" href="../../styles/StyleTablacatalogo.css">
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
              <img src="../../images/option_2.png" width="25em">Carro
              
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
                  <li><a href="ComprarArticulo.php">Compra</a></li>
                  
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- Home -->
  <div class="checkout">
    <div class="container">
      <div class="row">
        <!-- Billing Details -->
        <div class="col-lg-6">





        <div class="billing">
        <div class="checkout_title">COMPRAR</div>
          
        <div class="product_name">


      <form  name ="Modificar" method="POST" action="AñadirCompra.php" >
        <!--action="Pedido.php-->
        <!-- <label> Usuario <?php echo $varsesion; ?><br><br>-->
      

  <table>
          <tr>
            <th  colspan="3">Datos del Producto</th><br>
             
           </tr>

         
            
          </tr>
           <?php 
            while($fila=$resultado->fetch_assoc()) {
             ?>
          
          <tr>
            <td  colspan="3">Articulo
              <input type="text"  id="Nombre" name="Nombre" value="<?php echo $fila['Nombre']; ?> " readonly><br>
            Cantidad<input readonly type="number" min="1" min="1"  id="CantidadProducto" name="CantidadProducto" value="<?php echo $fila['CantidadProducto']; ?>">
            </td  colspan="3">

          
           <td></td>
           <?php
           $Pagar= $fila['PrecioSuma']+ $Pagar;
           ?>
          </td>
          </tr>

           <?php  } ?>
         </table>
          <H3><STRONG>TOTAL A PAGAR $<input type="text"  id="Pagar" name="Pagar" value="<?php echo $Pagar;?>" readonly></STRONG><H3><br>
                 Metodo de envio
                 <SELECT class="checkout_input" name="MetodoEnvio" id="MetodoEnvio">
                   <option value="FedEx">FedEx</option>
                   <OPTION  value="DHL">DHL</OPTION>
                   <OPTION  value="Estafeta">Estafeta</OPTION>
                 </SELECT>                  
          </form>

    <input class="cart_total_button" type="submit" value="SIGUIENTE >" name="B1">
       </Form></div>
          
        <input class="cart_total_button" onclick="window.location.href='IndexCliente.php'" type="submit" value="< REGRESAR" name="B1">
          
      </div>
    </div>
  </div>

<script src="../../js/jquery-3.2.1.min.js"></script>
<script src="../../styles/bootstrap4/popper.js"></script>
<script src="../../styles/bootstrap4/bootstrap.min.js"></script>
<script src="../../plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="../../plugins/easing/easing.js"></script>
<script src="../../plugins/parallax-js-master/parallax.min.js"></script>
<script src="../../plugins/colorbox/jquery.colorbox-min.js"></script>
<script src="../../js/custom.js"></script>
</body>
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


</html>
          
<?php
    }else 

    {
      echo '<script>alert ("No hay articulos en el carrito");</script>';
      }
?>
