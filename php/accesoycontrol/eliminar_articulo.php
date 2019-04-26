<?php
include("./carrito.class.php");
$_SESSION['carritoprueba']->remove_producto($_GET['producto']);
header("location:../menu/carrito.php");
?>