<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Mis compras</title>
                <link rel="shortcut icon" href="../../img/buy_tickets.png">
		<link href="../../css/estiloproyecto.css" media="screen" rel="stylesheet" type="text/css" />
                <link href="../../css/style.css" media="screen" rel="stylesheet" type="text/css" />
                 <?php include("../accesoycontrol/carrito.class.php"); 
                 include("../accesoycontrol/funciones_control.php"); ?>
        </head>
	<body>
        <?php menuppal(); ?>
                    <article>
                        <?php
                        $conexion = mysql_connect ("localhost", "root") 
                            or die ("No se puede conectar con el servidor");
                        mysql_query("SET NAMES 'utf8'");
                        mysql_select_db ("proyectofinal")
                            or die("No se puede seleccionar la base de datos");
                        $consulta = mysql_query ("select * from ventas, entradas, espectaculos, clientes where id_entrada=entrada and espectaculo=nombre_espectaculo and usuario=nombre_usuario and usuario=\"".$_SESSION['usuario']."\" order by id_venta", $conexion);
                        $nfilas = mysql_num_rows ($consulta);
                        if ($nfilas > 0) { ?>
                            <table id="tablas">
                                <tr><th></th><th>Nombre</th><th>Fecha</th><th>Lugar</th><th>Nº Entradas</th></tr>
                            <?php
                            for ($i=0; $i<$nfilas; $i++) {
                                $fila = mysql_fetch_array ($consulta);
                                $fechapri = $fila['fecha'];
                                list($anio, $mes, $dia) = explode('-', $fechapri);
                                $fechabien = date("m/d/Y", mktime(0, 0, 0, $mes, $dia, $anio));
   	$fechanum= strtotime($fechabien); // convierte la fecha de formato mm/dd/yyyy a marca de tiempo 
   	$diasemana=date("w", $fechanum);// optiene el número del dia de la semana. El 0 es domingo 
      	switch ($diasemana) 
      	{ 
      	case "0": 
         	$diasemana="Domingo"; 
         	break; 
      	case "1": 
         	$diasemana="Lunes"; 
         	break; 
      	case "2": 
         	$diasemana="Martes"; 
         	break; 
      	case "3": 
         	$diasemana="Miércoles"; 
         	break; 
      	case "4": 
         	$diasemana="Jueves"; 
         	break; 
      	case "5": 
         	$diasemana="Viernes"; 
         	break; 
      	case "6": 
         	$diasemana="Sábado"; 
         	break; 
      	} 
   	$dia=date("d",$fechanum); // día del mes en número 
   	$mes=date("m",$fechanum); // número del mes de 01 a 12 
      	switch($mes) 
      	{ 
      	case "01": 
         	$mes="Enero"; 
         	break; 
      	case "02": 
         	$mes="Febrero"; 
         	break; 
      	case "03": 
         	$mes="Marzo"; 
         	break; 
      	case "04": 
         	$mes="Abril"; 
         	break; 
      	case "05": 
         	$mes="Mayo"; 
         	break; 
      	case "06": 
         	$mes="Junio"; 
         	break; 
      	case "07": 
         	$mes="Julio"; 
         	break; 
      	case "08": 
         	$mes="Agosto"; 
         	break; 
      	case "09": 
         	$mes="Septiembre"; 
         	break; 
      	case "10": 
         	$mes="Octubre"; 
         	break; 
      	case "11": 
         	$mes="Noviembre"; 
         	break; 
      	case "12": 
         	$mes="Diciembre"; 
         	break; 
      	} 
   	$ano=date("Y",$fechanum); // optenemos el año en formato 4 digitos 
   	$fechacorrec= $diasemana.", ".$dia." de ".$mes." de ".$ano;
                                echo "<tr><td><img src=".$fila['imagen_espectaculo']."></td><td>".$fila['nombre_espectaculo']."</td><td>".$fechacorrec."</td><td>".$fila['lugar']."</td><td>".$fila['cantidad_venta']."</td><td><a target='_blank' href='../accesoycontrol/pdf.php?id=".$fila['id_venta']."'><img class='cerrar' src='../../img/pdf.png'></a></td></tr>";
                            }
                        ?>
                            </table>
                        <?php }
                        else {
                            echo "No has realizado ninguna compra.";
                        } ?>
                    </article>
                    <?php mysql_close ($conexion); ?>
        </body>    
        <footer>
            <p><b>Trabajo realizado por Amanda Collado, alumna de ASIR2</b></p>
            <a href="mailto:smr1a03@gmail.com" target="_blank">Contacta con la alumna</a><br>
        </footer>
</html>