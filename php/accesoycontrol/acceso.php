<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="shortcut icon" href="../../img/buy_tickets.png">
        <title>Acceso a BUYTickets</title>
        <link href="../../css/estiloproyecto.css" media="screen" rel="stylesheet" type="text/css" />
        <?php include("./funciones_acceso.php"); 
              include("./funciones_registro.php");
        ?>
    </head>
    <body>
        <header id="index">
            <a href="../../index.php"><img id="logo" src="../../img/buy_tickets.png"></a>
        </header>
        <article id="inicio">
            <?php
            if(isset($_POST['enviar'])) {
                escorrecto(); 
            }
            elseif(isset($_POST['registro'])) {
                menu5(0); 
            }
            elseif(isset($_POST['registrarse'])) {
                registro(); 
            }
            else {
                menu(0,1);
            }?>
        </article>
    </body>
    <footer>
        <p><b>Trabajo realizado por Amanda Collado, alumna de ASIR2</b></p>
        <a href="mailto:smr1a03@gmail.com" target="_blank">Contacta con la alumna</a><br>
    </footer>
</html>