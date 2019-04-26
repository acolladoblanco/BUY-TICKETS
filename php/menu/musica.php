<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Musica</title>
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
                        $consulta = mysql_query ("select * from espectaculos where categoria='Musica'", $conexion);
                        $nfilas = mysql_num_rows ($consulta);
                        if ($nfilas > 0) { ?>
                            <table id="tablas">
                                <tr><th></th><th></th></tr>
                            <?php
                            for ($i=0; $i<$nfilas; $i++) {
                                $fila = mysql_fetch_array ($consulta);
                                echo "<tr><td><a href='./entrada.php?espec=".$fila['nombre_espectaculo']."'><img src=".$fila['imagen_espectaculo']."></a></td><td>".$fila['nombre_espectaculo']."</td></tr>";
                            }
                        }  ?>
                            </table>
                    </article>
                    <?php mysql_close ($conexion); ?>
        </body>    
        <footer>
            <p><b>Trabajo realizado por Amanda Collado, alumna de ASIR2</b></p>
            <a href="mailto:smr1a03@gmail.com" target="_blank">Contacta con la alumna</a><br>
        </footer>
</html>