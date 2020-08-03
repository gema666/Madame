
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
$IdArticulo=$_REQUEST ['IdArticulo'];
require('../conexion.php');
    $query="SELECT IdArticulo, Nombre, Tipo, Talla, Color, Stock, Precio, Oferta, Descripcion FROM articulo WHERE IdArticulo='$IdArticulo' ";
    $resultado=$mysqli->query($query);
?>

<html>
		<!DOCTYPE html>
<html lang="en">
<head>
<title>Modificar </title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Wish shop project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="../../styles/bootstrap4/bootstrap.min.css">
<link href="../../plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="../../styles/checkout.css">
<link rel="stylesheet" type="text/css" href="../../styles/checkout_responsive.css">
<link rel="stylesheet" href="../../styles/styleTable.css">

<script>
      function validarFormulario(){
      var txtNombre = document.getElementById('Nombre').value;
      var txtTipo = document.getElementById('Tipo').value;
      var txtStock = document.getElementById('Stock').value;
      var txtPrecio = document.getElementById('Precio').value;
      

        if(txtNombre == null || txtNombre.length == 0 ||
        txtTipo == null || txtTipo == 0 || /^\s+$/.test(Stock) ||
        txtStock == null || txtStock == 0 || /^\s+$/.test(Precio) || txtPrecio == 0 || txtPrecio == null

         ) {
          
          alert('ERROR: Llene los campos obligatorios marcados con * ');
          return false;
        }
        return true;
     
      }
    </script>

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
  </header>
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
                  <li><a href="Ventas.php">Ventas</a></li>
                  <li><a href="">Modificar Ventas</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Checkout -->


		</head>
<body><br>
 
  <div class="checkout">
    <div class="container">
      <div class="row">
        <!-- Billing Details -->
        <div class="col-lg-6">
        <div class="billing">
        <div class="checkout_title">VENTAS</div>
          

     
      <br>
			<form onsubmit="return validarFormulario()" name ="Modificar" method="POST" action="modificarArticulo2.php">
			Clave del Articulo <input type="text" name="IdArticulo" value="<?php echo $IdArticulo; ?>" readonly><br><br>
			<h3>Ingresa los nuevos datos</h3><br>

  <table>
          <tr>
            <th>Nombre *</th>
             <th>Tipo *</th>
            <th>Talla</th>
            <th>Color</th>
            <th>Stock *</th>
            <th>Precio *</th>
            <th>Descuento</th>
            <th>Descripcion</th>
          
          </tr>
           <?php 
            while($fila=$resultado->fetch_assoc()) {
             ?>
          
          <tr>
            <td><input type="text"  id="Nombre" name="Nombre" value="<?php echo $fila['Nombre']; ?>"> </td>
            <td><input type="text " id="Tipo" name="Tipo" value="<?php echo $fila['Tipo']; ?>"></td>
            <td> <input type="text" id="Talla" name="Talla" value="<?php echo $fila['Talla']; ?>"></td>
            <td><input type="text" id="Color" name="Color" value="<?php echo $fila['Color']; ?>"></td>
             <td><input type="text" id="Stock" name="Stock" value="<?php echo $fila['Stock']; ?>"></td>
             <td><input type="text"  id="Precio" name="Precio" value="<?php echo $fila['Precio']; ?>"></td>

             <td><input type="text"  id="Oferta" name="Oferta" value="<?php echo $fila['Oferta']; ?>"></td>
              <td><input type="text"  id="Descripcion" name="Descripcion" value="<?php echo $fila['Descripcion']; ?>"></td>
          </tr>
           <?php  } ?>
          
         </table>
        <input class="cart_total_button" type="submit" value="Modificar" name="B1"> 
       </Form>
    </table>  </div></form></div></div></div></div></div></body>

<!-- Footer -->

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

