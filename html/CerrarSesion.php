<?php 
session_start();
session_destroy();
echo '<script>alert("HASTA LUEGO");</script>';
header("Location:../Index.html");
?>