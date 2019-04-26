<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Carrito</title>
                <link rel="shortcut icon" href="../../img/buy_tickets.png">
		<link href="../../css/estiloproyecto.css" media="screen" rel="stylesheet" type="text/css" />
                <link href="../../css/style.css" media="screen" rel="stylesheet" type="text/css" />
                 <?php include("../accesoycontrol/carrito.class.php");
                 include("../accesoycontrol/funciones_control.php"); ?>
        </head>
	<body>
        <?php menuppal(); 
        $conexion = mysql_connect ("localhost", "root") 
            or die ("No se puede conectar con el servidor");
        mysql_query("SET NAMES 'utf8'");
        mysql_select_db ("proyectofinal")
            or die("No se puede seleccionar la base de datos");
        $carro = $_SESSION['carritoprueba']->get_content();
        if (empty($carro)) {
            echo "<article><p><h1>Carrito vacio</h1></p></article>";
        }
        else {?>
        <article>
            <h1>Artículos añadidos al carrito:</h1>
            <?php
        if($carro) { ?>
        <table id="tablas">
            <tr><th></th><th></th><th>Cantidad</th><th>Precio</th><th></th></tr>
        <?php
	foreach($carro as $producto)
	{
                $consulta = mysql_query ("select * from entradas, espectaculos where nombre_espectaculo=espectaculo and id_entrada=".$producto['id']."", $conexion);
                $fila = mysql_fetch_array ($consulta);
		echo "<tr><td><img src=".$fila['imagen_espectaculo']."></td>";
                echo "<td>".$producto["nombre"]."</td>";
		echo "<td>".$producto["cantidad"]."</td>";
		echo "<td>".$producto["precio"]." €</td>";
		echo "<td><a href='../accesoycontrol/eliminar_articulo.php?producto=".$producto['unique_id']."'><img style=\"width: 30px; height: 30px;\" src='../../img/papelera.png'></a></td></tr>";
        } } ?>
        </table> 
        </article>
        <article>
            <table id="tablas" >
                <tr><th>Nº Artículos en total</th><th>Precio total</th></tr> 
                <?php echo "<tr><td>".$_SESSION['carritoprueba']->articulos_total()."</td><td>".$_SESSION['carritoprueba']->precio_total()." €</td></tr>"; ?>
            </table>  
        </article>
        <?php mysql_close ($conexion); 
        $content = $_SESSION['carritoprueba']->get_content();
	?>
        <!--entornos producción https://www.paypal.com/cgi-bin/webscr-->
	<form name="cart" action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
	  	<input type="hidden" name="cmd" value="_cart">
        <input type="hidden" name="upload" value="1">
	  	<input type="hidden" name="business" value="smr1a03-facilitator@gmail.com" />
	  	<?php	
	  	if($content)
	  	{
	  		$i = 1;
		  	foreach($content as $producto)
			{
			?>
				<input type="hidden" name="item_name_<?=$i?>" value="<?php echo $producto['nombre'] ?>" />
				<input type="hidden" name="quantity_<?=$i?>" value="<?php echo $producto['cantidad']; ?>">
			  	<input type="hidden" name="item_number_<?=$i?>" value="<?php echo $producto['id'] ?>" />
			  	<input type="hidden" name="amount_<?=$i?>" value="<?php echo $producto['precio'] ?>" />
			<?php
			$i++;
			}
		}
	  	?>
	  	<input type="hidden" name="cn" value="Comentarios" />
	  	<input type="hidden" name="currency_code" value="EUR" />
	  	<input type="hidden" name="lc" value="EU" />
	  	<input type="hidden" name="bn" value="PP-BuyNowBF" />
	  	<input type="hidden" name="rm" value="2">
	  	<input type="hidden" name="return" value="http://localhost/Proyecto/php/accesoycontrol/return.php" />
	  	<input type="hidden" name="cbt" value = "Volver a la tienda" >
                <input type="hidden" name="cancel_return" value = "http://localhost/Proyecto/php/menu/carrito.php" >
	  	<input type="image" id="finalizar" src="../../img/finalizar_compra.png" border="0" name="submit" alt="Finalizar compra" />	  	
	</form>
        <?php } ?>
        </body> 
        <footer>
            <p><b>Trabajo realizado por Amanda Collado, alumna de ASIR2</b></p>
            <a href="mailto:smr1a03@gmail.com" target="_blank">Contacta con la alumna</a><br>
        </footer>
</html>