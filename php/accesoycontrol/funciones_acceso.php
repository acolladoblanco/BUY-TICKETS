<?php
function escorrecto() {
    include("./carrito.class.php");
    $conexion = mysql_connect ("localhost", "root") 
        or die ("No se puede conectar con el servidor");
    mysql_select_db ("proyectofinal")
        or die("No se puede seleccionar la base de datos");
    $consulta = mysql_query ("select * from clientes", $conexion);
    $nfilas = mysql_num_rows ($consulta); 
    $correcto=false;
    for ($i=0; $i<$nfilas && $correcto == false; $i++) {
        $fila = mysql_fetch_array ($consulta);
        if($fila['nombre_usuario'] == $_POST['name'] && $fila['contrasenia'] == $_POST['password']){
            if($fila['bloqueado'] == true) {
                echo "Usuario bloqueado. Contacte con el administrador";
                ?>
                <p><a href="../../index.php">Volver</a></p>
                <?php
            }
            else {
                session_start();
                $_SESSION['usuario']=$fila['nombre_usuario'];	
                $_SESSION['carritoprueba'] = new Carrito();
                header("location:../../index.php");
            }
            mysql_close ($conexion);  
            $correcto=true;
        }  
        elseif ($fila['nombre_usuario'] == $_POST['name'] && $fila['contrasenia'] !== $_POST['password']) {
            if($_POST['control'] < 3) { 
                menu(1,$_POST['control']);            
                mysql_close ($conexion);  
                $correcto=true;
            }
            else {
                echo "<p>Lo sentimos, ha sobrepasado el número de intentos. Usuario bloqueado.</p>";
                mysql_query ("update clientes set bloqueado=1 where nombre_usuario=\"".$_POST['name']."\"", $conexion);
                mysql_close ($conexion);
                ?>
                <p><a href="../../index.php">Volver</a></p>
                <?php
                $correcto=true;
            }
        }                  
    }
    if(!$correcto){
        menu(2,0);
        mysql_close ($conexion);
    }
}

function menu($error, $contador) {  ?>
    <h1>Sistema de acceso</h1>
    <p>&nbsp;</p>
    <form action="./acceso.php" method="POST" >
	<p class="titulo">Usuario</p>
	<input type="text" id="name" name="name">
            <?php if($error == 2) { ?>
                <p>¡El usuario no es correcto!</p>
            <?php }?>
	<p class="titulo">Contraseña</p>
        <input type="password" id="password" name="password">
            <?php if($error == 1) { ?>
                <p>¡La contraseña no es correcta!</p>
            <?php 
                $contador=$contador+1;
            }?>
        <p><input name="enviar" type="submit" value="Acceder" class="buttom">  <input name="registro" type="submit" value="Registrarse" class="buttom"></p>
            <?php
                echo "<input type=\"hidden\" id=\"control\" name=\"control\" value=\"$contador\">";
            ?>
    </form>
<?php } ?>