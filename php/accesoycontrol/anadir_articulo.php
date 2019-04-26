<?php
include("./carrito.class.php");
$conexion = mysql_connect ("localhost", "root") 
    or die ("No se puede conectar con el servidor");
mysql_query("SET NAMES 'utf8'");
mysql_select_db ("proyectofinal")
    or die("No se puede seleccionar la base de datos");
$consulta = mysql_query ("select * from entradas where id_entrada=".$_POST['id']."", $conexion);
$fila = mysql_fetch_array ($consulta);
        $articulo = array(
		"id"			=>		$fila['id_entrada'],
		"cantidad"		=>		$_POST['cant'],
		"precio"		=>		$fila['precio'],
		"nombre"		=>		$fila['espectaculo']
	);
$_SESSION['carritoprueba']->add($articulo);
mysql_close ($conexion);
header("location:../menu/carrito.php");
?>