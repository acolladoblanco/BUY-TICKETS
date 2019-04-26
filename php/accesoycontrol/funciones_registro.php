<?php
function menu5($error) {
?>
    <h1>Registro</h1>
    <p>&nbsp;</p>
    <form action="./acceso.php" method="POST" >
        <table id="tablas">
            <tr><td>Nombre de usuario:</td><td><input type="text" id="name" name="namenew" required></td></tr>
            <?php if($error == 1) {
              echo"¡El usuario ya existe!";
            }?>
            <tr><td>Nombre:  </td><td><input type="text" id="name" name="nombre" required></td></tr>
        <tr><td>Apellidos:  </td><td><input type="text" id="name" name="apellidos" required></td></tr>
        <tr><td>Email:  </td><td><input type="email" id="name" name="email" required></td></tr>
        <tr><td>Contraseña:  </td><td><input type="password" id="password" name="passwordnew1" maxlength="8" required></td></tr>
        <tr><td>Vuelva a introducir la contraseña:</td><td><input type="password" id="password" name="passwordnew2" maxlength="8" required></td></tr>
        </table>
             <?php if($error == 2) {
              echo"¡Las contraseñas introducidas no coinciden!";
            }?>
        <p><input name="registrarse" type="submit" value="Registrarse" class="buttom"></p>
    </form>
<?php 
}

function registro() {
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
        if($fila['nombre_usuario'] == $_POST['namenew']){
            menu5(1);
            mysql_close ($conexion);  
            $correcto=true;
        }  
    }
    if(!$correcto) {
        if($_POST['passwordnew1'] !== $_POST['passwordnew2']) {
            menu5(2);
            mysql_close ($conexion);  
        }
        else {
            mysql_query ("insert into clientes value(\"".$_POST['namenew']."\",\"".$_POST['passwordnew1']."\",\"".$_POST['nombre']."\",\"".$_POST['apellidos']."\",\"".$_POST['email']."\",\"false\")", $conexion)
                or die ("No se puede insertar el usuario");
            session_start();
            $_SESSION['usuario']= $_POST['namenew'];
            $_SESSION['carritoprueba'] = new Carrito();
            header("location:../../index.php");
            mysql_close ($conexion);
        }
    }  
}?>