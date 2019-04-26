<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Menú principal</title>
		<link rel="shortcut icon" href="./img/buy_tickets.png">
		<link href="./css/estiloproyecto.css" media="screen" rel="stylesheet" type="text/css" />
                <link href="./css/style.css" media="screen" rel="stylesheet" type="text/css" />
                 <?php 
                 include("./php/accesoycontrol/carrito.class.php");
                 include("./php/accesoycontrol/funciones_control.php"); ?>
        </head>
	<body>
	<?php menuppal(); ?>
            <div class="contenedor2">
                <div id="slider-container">
                    <div id="slider-box">
			<div class="slider-element">
                            <a href='./php/menu/entrada.php?espec=Malu "Tour Caos"'>
                            <article class="element-uno">
                            </article>
                            </a>
			</div>
			<div class="slider-element">
                            <a href='./php/menu/entrada.php?espec=El Rey Leon (Musical)'>
                            <article class="element-dos">
                            </article>
                            </a>
			</div>
			<div class="slider-element">
                            <a href='./php/menu/entrada.php?espec=fib 2016'>
                            <article class="element-tres">
                            </article>
                            </a>
			</div>
                    </div>
                </div>
            </div>
            <article>
            <h1>Últimas entradas:</h1>
            <?php $conexion = mysql_connect ("localhost", "root") 
                or die ("No se puede conectar con el servidor");
            mysql_query("SET NAMES 'utf8'");
            mysql_select_db ("proyectofinal")
                or die("No se puede seleccionar la base de datos");
            $consulta = mysql_query ("select * from entradas, espectaculos, lugares where lugar=nombre_lugar and nombre_espectaculo=espectaculo and cantidad<10 and cantidad>0 and fecha>=CURDATE() order by fecha", $conexion);
                                    $nfilas = mysql_num_rows ($consulta);
                        if ($nfilas > 0) { ?>
                            <table id="tablas">
                                <tr><th></th><th></th><th></th><th></th><th></th><th></th><th></th></tr>
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
   	$fechacorrec= $diasemana.", <br>".$dia." de ".$mes." de ".$ano;
                                echo "<tr><td><a href='./php/menu/entrada.php?id=".$fila['id_entrada']."'><img src=./php/menu/".$fila['imagen_espectaculo']."></a></td><td>".$fila['espectaculo']."</td><td>".$fila['lugar']." <br>(".$fila['ciudad'].")</td><td>".$fechacorrec."</td><td><a id='rojo' href='./php/menu/entrada.php?id=".$fila['id_entrada']."'>¡Quedan ".$fila['cantidad']." entradas!</td></tr>";
                            }
                        }  ?>
                            </table>
            </article>
        </body>
        <footer>
            <p><b>Trabajo realizado por Amanda Collado, alumna de ASIR2</b></p>
            <a href="mailto:smr1a03@gmail.com" target="_blank">Contacta con la alumna</a><br>
        </footer>
</html>