
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
$IdArticulo=$_POST ['IdArticulo'];
$Nombre=$_POST ['Nombre'];
$Tipo=$_POST ['Tipo'];
$Talla=$_POST ['Talla'];
$Color=$_POST ['Color'];
$Stock=$_POST ['Stock'];
$Precio=$_POST ['Precio'];
$Oferta=$_POST ['Oferta'];
$Descripcion=$_POST ['Descripcion'];
require('../conexion.php');
    $query="UPDATE articulo SET Nombre= '$Nombre', Tipo='$Tipo', Talla='$Talla', Color='$Color', Stock='$Stock', Precio='$Precio', Oferta='$Oferta', Descripcion='$Descripcion' WHERE IdArticulo ='$IdArticulo' ";
    $resultado=$mysqli->query($query);
?>


<!DOCTYPE html>
<html>
<head>
<title>Eliminar Venta</title><meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Wish shop project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="../../styles/bootstrap4/bootstrap.min.css">
<link href="../../plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="../../styles/checkout.css">
<link rel="stylesheet" type="text/css" href="../../styles/checkout_responsive.css">
<link rel="stylesheet" href="../../styles/styleTable.css">

      <Tittle>Modificar Articulo</Tittle>
    </head>
    <body>

<div class="super_container">
  
  <!-- Header -->

  <header class="header">
    <div class="header_inner d-flex flex-row align-items-center justify-content-start">
      <div class="logo"><a href="../../Index.html"><img src="../../images/logo.png"></a></div>
      <nav class="main_nav">

        <ul>
          
          <li>
          <a href="IndexAdmin.html">
            <div class="avatar">
              <img src="../../images/home.png" alt="">INICIO
            </div>
          </a></li>
        
        <li>
          <div class="shopping">
          <!-- Avatar -->
          <a href="Ventas.php">
            <div class="avatar">
              <img src="../../images/option_1.png" alt="">Ventas
            </div>
          </a>
        </div>
      </li>

        <li>
          <div class="shopping">
          <!-- Avatar -->
          <a href="Articulos.php">
            <div class="avatar">
              <img src="../../images/flor.png" alt="">Articulos
            </div>
          </a>
        </div></li>
        <li>
          <a href="../CerrarSesion.php">
            <div class="avatar">
              <img src="../../images/avatar.svg" alt="">CERRAR SESION
            </div>
          </a></li>
        </ul>
      </nav>
  

      <div class="burger_container d-flex flex-column align-items-center justify-content-around menu_mm"><div></div><div></div><div></div></div>
    </div>
  </header>

  <!-- Menu -->

  
    <!-- Menu -->

  <div class="menu d-flex flex-column align-items-end justify-content-start text-right menu_mm trans_400">
    <div class="menu_close_container"><div class="menu_close"><div></div><div></div></div></div>
    <div class="logo menu_mm"><a href="#">MADAME.com</a></div>
    <div class="search">
      
    </div>
    <nav class="menu_nav">
      <ul class="menu_mm">
        <li class="menu_mm"><a href="IndexAdmin.html">Inicio</a></li> 

      </ul>
      <ul class="menu_mm">
        <li class="menu_mm"><a href="Ventas.php">VENTAS</a></li>  

      </ul>
      <ul class="menu_mm">
        <li class="menu_mm"><a href="Articulos.html">ARTICULOS</a></li>     
      </ul>
      <ul class="menu_mm">
        <li class="menu_mm"><a href="../CerrarSesion.php">CERRAR SESION</a></li>     
      </ul>
      
    </nav>
  </div>
  <!-- Home -->
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
                  <li><a href="IndexAdmin.html">Inicio</a></li>

                  <li><a href="Articulos.php">Administrar Articulos</a></li>
                  
                  <li><a href="">Configurar Articulo</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="checkout">
    <div class="container">
      <div class="row">
        <!-- Billing Details -->
        <div class="col-lg-6">
        <div class="billing">
          <div  align="center" class="checkout_title">Modificar Articulos</div>
      <center><P>
        <?php if($resultado>0){ ?>
        <h3>Producto modificado exitosamente</h3>
        <?php } else { ?>
        <h3>Error al guardar</h3>
        <?php } ?>
        <p></p>
       <button type="submit"  onclick="window.location.href='Articulos.php'" class="cart_total_button">REGRESAR</button> 
      </center> 
</div></div></div></div></div></div>   


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