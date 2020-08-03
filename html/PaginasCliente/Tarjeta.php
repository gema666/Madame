<?php

SESSION_START();

require('../conexion.php');
//echo '<script>alert (" BInevenidooooo '.$_SESSION['usuario'].' ");</script>';
error_reporting(0);
$varsesion=$_SESSION['usuario'];

//echo '<script>alert (" BInevenidooooo '.$varsesion.' ");</script>';

$query3="SELECT IdUsuario FROM Login WHERE usuario='$varsesion'";
    $resultado3=$mysqli->query($query3);
      $fila3=$resultado3-> fetch_assoc();
    $IdUsuario=$fila3['IdUsuario']; 

//echo '<script>alert (" BInevenidooooo '.$query3.' ");</script>';

$query5="SELECT NoTarjeta, TipoTarjeta,FechaVencimiento, CVV  FROM cuenta_tarjeta WHERE IdUsuario='$IdUsuario'"; 

$resultado5=$mysqli->query($query5); 
$fila5=$resultado5->fetch_assoc(); 
//echo '<script>alert (" BInevenidooooo '.$query5.' ");</script>';
?>

<!DOCTYPE html>
<html>

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
              <img src="../../images/option_2.png" width="25em">Ver
              
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
                  
                  <li><a href="Tarjeta.php">Cuenta Tarjeta</a></li>
                  
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Checkout -->


  <div class="checkout">
    <div class="container">
      <div class="row">
        <!-- Billing Details -->
        <div class="col-lg-6">
          <div class="billing">
        <div class="checkout_title">Tarjeta</div><br>

        Verifica o agrega tus datos
        <form  method="POST" action="TarjetaAñadir.php"  >
       

<p class="statement"> 
<div id="container"  >
  Numero de tarjeta

   <input type="text" class="checkout_input" size="25" id="userNum" name="NoTarjeta"  maxlength="16"  minlength="16" value="<?php echo $fila5['NoTarjeta'];?>"/>
   Tipo de tarjeta
                 <SELECT class="checkout_input" name="TipoTarjeta" id="TipoTarjeta">
                   <option value="Credito">Credito</option>
                   <OPTION  value="Debito">Debito</OPTION>
                 </SELECT>   <br>
                 Fecha de vencimiento
              <input type="date" class="checkout_input" name="FechaVencimiento" id="FechaVencimiento"  placeholder="Fecha Vencimiento" required value="<?php echo $fila5['FechaVencimiento'];?>">
              Codigo de seguridad (Ultimos 3 digitos de tu tarjeta)
              <input type="text" class="checkout_input"  name="CVV" id="CVV" placeholder="Codigo de seguridad. Ultimos tres numeros de tu tarjeta*" required 
              value="<?php echo $fila5['CVV'];?>">
  
</div>

</p><br />

<H3 strong>RESPUESTA VALIDACION:<H3>
<div id="resultDiv"> <label>-</label></div></H1>
 <input class="cart_total_button" type="submit" value="Validar Y CONTINUAR" id="submitBtn" />
</form>





<script type="text/javascript">
var userNumInput = document.getElementById("userNum");

function getUserInput(){
   return userNumInput.value;  
}

function luhnCheck(){
  var ccNum = getUserInput(), ccNumSplit = ccNum.split(""), sum = 0;
  var singleNums = [], doubleNums = [], finalArry = undefined;
  var validCard = false;
  
  if((!/\d{15,16}(~\W[a-zA-Z])*$/g.test(ccNum)) || (ccNum.length > 16)){
     return false;  
  }

  if(ccNum.length === 15){  //american express 
     for(var i = ccNumSplit.length-1; i>=0; i--){
        if(i % 2 === 0){
           singleNums.push(ccNumSplit[i]);
        }else{
           doubleNums.push((ccNumSplit[i] * 2).toString());
        }
     }
  }else if(ccNum.length === 16){
     for(var i = ccNumSplit.length-1; i>=0; i--){
        if(i % 2 !== 0){
           singleNums.push(ccNumSplit[i]);
        }else{
           doubleNums.push((ccNumSplit[i] * 2).toString());
        }
     }
  }
  //joining makes an array to a string and I split them up again
  //so that every number is a single digit and convert back to array
  
  doubleNums = doubleNums.join("").split("");  
  finalArry = doubleNums.concat(singleNums);
  
  for(var j = 0; j<finalArry.length; j++){
     sum += parseInt(finalArry[j]);
  }
  
  if(sum % 10 === 0){
     validCard = true;
  }
  
  console.log(sum);
  return validCard;
}

function whatCard(){
   
}

document.getElementById("submitBtn").addEventListener("click", function(){  document.getElementById("resultDiv").innerHTML = luhnCheck(); }, false);

</script>

</script>
</div></form> 
          

    </div>
  </div>

          

</div>



</body>
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