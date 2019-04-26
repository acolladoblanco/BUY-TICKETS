<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Ciudades</title>
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
            ?>
                    <article>
                        <?php
                        $consulta2 = mysql_query ("select DISTINCT ciudad from lugares", $conexion);
                        $nfilas = mysql_num_rows ($consulta2); ?>
                        <form action="./ciudades.php" method="POST" >
                        <p>Busca tu ciudad:&nbsp;&nbsp;
                            <input type='radio' name="ciudad" value="TODAS"> TODAS &nbsp;&nbsp;
                                <?php if ($nfilas > 0) {
                                    for ($i=0; $i<$nfilas; $i++) {
                                        $fila = mysql_fetch_array ($consulta2);
                                        echo "<input type='radio' name='ciudad' value=".$fila['ciudad']."> ".$fila['ciudad']."&nbsp;&nbsp;";
                                    }
                                }  ?>
                                </select></p>
                            <p><input name="buscar" type="submit" value="BUSCAR" class="boton"></p>
                        </form>
                    </article>
            <?php if (!empty($_POST['ciudad'])) { ?>
                    <article>
                        <?php
                        if ($_POST['ciudad'] == 'TODAS') {
                            $consulta = mysql_query ("select * from lugares order by ciudad", $conexion);
                        } 
                        else {
                        $consulta = mysql_query ("select * from lugares where ciudad='".$_POST['ciudad']."'", $conexion);
                        }
                        $nfilas = mysql_num_rows ($consulta);
                        if ($nfilas > 0) { ?>
                            <table id="tablas">
                                <tr><th></th><th></th><th></th></tr>
                            <?php
                            for ($i=0; $i<$nfilas; $i++) {
                                $fila = mysql_fetch_array ($consulta);
                                echo "<tr><td><a href='./entrada.php?lugar=".$fila['nombre_lugar']."'><img src=".$fila['imagen_lugar']."></td><td>".$fila['nombre_lugar']."</td><td>".$fila['ciudad']."</td></tr>";
                            }
                        }  ?>
                            </table>
                    </article>
            <?php } 
             mysql_close ($conexion); ?>
        </body>    
        <footer>
            <p><b>Trabajo realizado por Amanda Collado, alumna de ASIR2</b></p>
            <a href="mailto:smr1a03@gmail.com" target="_blank">Contacta con la alumna</a><br>
        </footer>
</html>