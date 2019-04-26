<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="shortcut icon" href="../../img/logo_motogp.jpg">
        <title>Control de sesiones</title>
        <link href="../../css/estiloproyecto.css" media="screen" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <header id="index">
            <a href="../../index.php"><img id="logo" src="../../img/buy_tickets.png"></a>
        </header>
        <?php 
            include("./sesion.php");
            session_unset();
            session_destroy();
        ?>
        <article>
            <h1>Sesión cerrada</h1>
            <p><a id='rojo' href="../../index.php">Volver al inicio</a></p>
        </article>
    </body>
    <footer>
        <p><b>Trabajo realizado por Amanda Collado, alumna de ASIR2</b></p>
        <a href="mailto:smr1a03@gmail.com" target="_blank">Contacta con la alumna</a><br>
    </footer>
</html>