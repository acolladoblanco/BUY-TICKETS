<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Entradas</title>
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
                    if (!empty($_GET['id'])) {
                    $consultavideo = mysql_query ("select * from entradas, espectaculos, lugares where lugar=nombre_lugar and espectaculo=nombre_espectaculo and id_entrada=".$_GET['id']."", $conexion);
                        }
                    elseif (!empty($_GET['espec'])) {
                    $consultavideo = mysql_query ("select * from entradas, espectaculos, lugares where lugar=nombre_lugar and espectaculo=nombre_espectaculo and espectaculo='".$_GET['espec']."'", $conexion);
                        }
                    elseif (!empty($_GET['lugar'])) {
                    $consultavideo = mysql_query ("select * from entradas, espectaculos, lugares where lugar=nombre_lugar and espectaculo=nombre_espectaculo and lugar='".$_GET['lugar']."'", $conexion);
                        }
                    $filavideo = mysql_fetch_array ($consultavideo);
                    if ($filavideo['nombre_espectaculo'] == 'Malu "Tour Caos"') { ?>
                            <article><iframe width="560" height="315" src="https://www.youtube.com/embed/ujCIHk9v18A" frameborder="0" allowfullscreen></iframe></article> 
                    <?php }  
                    elseif ($filavideo['nombre_espectaculo'] == 'El Rey Leon (Musical)') { ?>
                            <article><iframe width="560" height="315" src="https://www.youtube.com/embed/bszUmtKRE40" frameborder="0" allowfullscreen></iframe></article>
                    <?php }     
                    elseif ($filavideo['nombre_espectaculo'] == 'Alejandro Sanz "Gira Sirope Vivo"') { ?>
                            <article><iframe width="560" height="315" src="https://www.youtube.com/embed/kIQtB8uRc2E" frameborder="0" allowfullscreen></iframe></article>
                    <?php }  
                    elseif ($filavideo['nombre_espectaculo'] == 'FIB 2016') { ?>
                            <article><iframe width="560" height="315" src="https://www.youtube.com/embed/VBETINHIJEo" frameborder="0" allowfullscreen></iframe></article>
                    <?php }  
                    elseif ($filavideo['nombre_espectaculo'] == 'Supersubmarina Tour 2016') { ?>
                            <article><iframe width="560" height="315" src="https://www.youtube.com/embed/iem0Lw1t-_Q" frameborder="0" allowfullscreen></iframe></article>
                    <?php } 
                    elseif ($filavideo['nombre_espectaculo'] == 'Dreambeach Villaricos 2016') { ?>
                            <article><iframe width="560" height="315" src="https://www.youtube.com/embed/XOWYkQ6zWNQ" frameborder="0" allowfullscreen></iframe></article>
                    <?php } 
                        if (!empty($_GET['id'])) {
                        $consulta = mysql_query ("select * from entradas, espectaculos, lugares where lugar=nombre_lugar and espectaculo=nombre_espectaculo and fecha>=CURDATE() and id_entrada=".$_GET['id']."", $conexion);
                        }
                        elseif (!empty($_GET['espec'])) {
                        $consulta = mysql_query ("select * from entradas, espectaculos, lugares where lugar=nombre_lugar and espectaculo=nombre_espectaculo and fecha>=CURDATE() and espectaculo='".$_GET['espec']."' order by fecha", $conexion);
                        }
                        elseif (!empty($_GET['lugar'])) {
                        $consulta = mysql_query ("select * from entradas, espectaculos, lugares where lugar=nombre_lugar and espectaculo=nombre_espectaculo and fecha>=CURDATE() and lugar='".$_GET['lugar']."' order by fecha", $conexion);
                        }
                        $nfilas = mysql_num_rows ($consulta);
                        if ($nfilas > 0) { ?>
                            <?php
                            if (!empty($_SESSION['usuario'])) {
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
                                echo "<article><table id='tablas'>";
                                echo "<tr><th></th><th>Espectáculo</th><th>Lugar</th><th>Fecha</th><th>Hora</th></tr>";
                                echo "<tr><td><img src=".$fila['imagen_espectaculo']."></td><td>".$fila['nombre_espectaculo']."</td><td>".$fila['lugar']."<br>(".$fila['ciudad'].")</td><td>".$fechacorrec."</td><td>".$fila['hora']."</td></tr>";
                                echo "<tr><td></td><td><b>Precio: ".$fila['precio']." €</b></td>";
                                echo "<form action='../accesoycontrol/anadir_articulo.php' method='POST' >";
                                        if ($fila['cantidad'] == 0) {
                                            echo "<td><span id=rojo>Entradas agotadas</span></td></tr>";
                                        }
                                        elseif ($fila['cantidad'] > 10) {
                                            echo "<td><span id=verde>Entradas disponibles</span></td><td>Cantidad:  ";
                                            echo "<select name='cant' id='cantidad' size='1' >";
                                            for ($l=1; $l<6; $l++) {
                                                    echo "<option value=".$l.">".$l."</option>";
                                            }
                                                    echo "</select>";
                                                    echo "<input type=\"hidden\" id=\"id\" name=\"id\" value='".$fila['id_entrada']."'>";
                                                    echo "</td><td><input name='anadir' type='submit' value='Añadir' class='boton'></td></tr>";
                                        }
                                        elseif ($fila['cantidad'] > 4) {
                                            echo "<td><span id=rojo>¡Quedan ".$fila['cantidad']." entradas!</span></td><td>Cantidad:  ";
                                            echo "<select name='cant' id='cantidad' size='1' >";
                                            for ($l=1; $l<6; $l++) {
                                                    echo "<option value=".$l.">".$l."</option>";
                                            }
                                                    echo "</select>";
                                                    echo "<input type=\"hidden\" id=\"id\" name=\"id\" value='".$fila['id_entrada']."'>";
                                                    echo "</td><td><input name='anadir' type='submit' value='Añadir' class='boton'></td></tr>";
                                        }
                                        else {
                                            echo "<td><span id=rojo>¡Quedan ".$fila['cantidad']." entradas!</span></td><td>Cantidad:  ";
                                            echo "<select name='cant' id='cantidad' size='1' >";
                                            for ($l=1; $l=$fila['cantidad']; $l++) {
                                                    echo "<option value=".$l.">".$l."</option>";
                                            }
                                                    echo "</select>";
                                                    echo "<input type=\"hidden\" id=\"id\" name=\"id\" value='".$fila['id_entrada']."'>";
                                                    echo "</td><td><input name='anadir' type='submit' value='Añadir' class='boton'></td></tr>";
                                        }
                                echo "</form></table></article>";
                            } 
                            } 
                            else {
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
                                echo "<article><table id='tablas'>";
                                echo "<tr><th></th><th>Espectáculo</th><th>Lugar</th><th>Fecha</th><th>Hora</th></tr>";
                                echo "<tr><td><img src=".$fila['imagen_espectaculo']."></td><td>".$fila['nombre_espectaculo']."</td><td>".$fila['lugar']."<br>(".$fila['ciudad'].")</td><td>".$fechacorrec."</td><td>".$fila['hora']."</td></tr>";
                                echo "</table><p><a id='rojo' href='../accesoycontrol/acceso.php'>Accede a tu cuenta o registrate para poder comprar entradas</a></p>";
                                echo "</article>";
        }
                        } }
                        else { ?>
                                <article><p>Lo sentimos, no hay entradas disponibles</p></article>
                        
                        <?php }
                        ?>
                    <?php mysql_close ($conexion); ?>
        </body>    
        <footer>
            <p><b>Trabajo realizado por Amanda Collado, alumna de ASIR2</b></p>
            <a href="mailto:smr1a03@gmail.com" target="_blank">Contacta con la alumna</a><br>
        </footer>
</html>