<?php
require("./carrito.class.php");
$conexion = mysql_connect ("localhost", "root") 
    or die ("No se puede conectar con el servidor");
mysql_query("SET NAMES 'utf8'");
mysql_select_db ("proyectofinal")
    or die("No se puede seleccionar la base de datos");
$carro = $_SESSION['carritoprueba']->get_content();
        if($carro) { 
	foreach($carro as $producto)
	{
            mysql_query ("insert into ventas values (NULL,".$producto['id'].",".$producto['cantidad'].",\"".$_SESSION['usuario']."\")", $conexion)
            or die("No se puede insertar en la base de datos");
            $can = $producto['cantidad'];
            mysql_query ("UPDATE entradas SET cantidad= cantidad-".$can." WHERE id_entrada=".$producto['id']."", $conexion)
            or die("No se puede actualizar la tabla entradas");
        } } 
$_SESSION['carritoprueba']->destroy();
$_SESSION['carritoprueba'] = new Carrito();
            mysql_close ($conexion);
header("location:../menu/compras.php");
?>