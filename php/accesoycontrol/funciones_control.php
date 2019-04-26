<?php
function menuppal() { ?>
    <header>
                    <div id="login">
                    <img id="logomenu" src="/Proyecto/img/buy_tickets.png">
                    <?php if (empty($_SESSION['usuario'])) { ?>
                    <table id="sesion">
                        <tr><td><a href="/Proyecto/php/accesoycontrol/acceso.php">Identificate</a></td></tr>
                    </table>
                    </div>
                    <?php } else { ?>
                    <table id="sesion">         
                    <?php if(($_SESSION['carritoprueba']->articulos_total()) > 0) {
                        ?><tr><td>Usuario:</td><td><?php echo $_SESSION['usuario']; ?></td><td><a href="/Proyecto/php/accesoycontrol/logout.php"><img class="cerrar" src="/Proyecto/img/cerrar.png"></a><td></tr> 
                    <?php    echo "<tr><td>Articulos: ".$_SESSION['carritoprueba']->articulos_total()."</td><td>Precio total: ".$_SESSION['carritoprueba']->precio_total()." €</td><td><a href='/Proyecto/php/menu/carrito.php'><img class='cerrar' src=\"/Proyecto/img/carrito.png\"></a></td></tr>";
                    } else { ?>
                        <tr><td>Usuario: <?php echo $_SESSION['usuario']; ?></td><td><a href="/Proyecto/php/accesoycontrol/logout.php"><img class="cerrar" src="/Proyecto/img/cerrar.png"></a><td></tr>
                    <?php }?>
                    </table>
                    </div>
                    <?php } ?>
			<nav>
				<ul class="menu">
                                    <li><a href="/Proyecto/index.php"><span class="icon-home2"></span> Inicio</a></li>
				<li><a href="/Proyecto/php/menu/musica.php"><span class="icon-music"></span> Musica</a></li>
				<li><a href="/Proyecto/php/menu/teatro.php"><span class="icon-library"></span> Teatro</a></li>
				<li><a href="/Proyecto/php/menu/ciudades.php"><span class="icon-location"></span> Ciudades</a></li>
                                <?php if (!empty($_SESSION['usuario'])) { ?>
                                <li><a href="/Proyecto/php/menu/carrito.php"><span class="icon-cart"></span> Carrito</a></li> 
                                <li><a href="/Proyecto/php/menu/compras.php"><span class="icon-credit-card"></span> Mis compras</a></li> 
                                <?php } 
                                else { ?>
                                <li><a href="/Proyecto/php/accesoycontrol/acceso.php"><span class="icon-pencil"></span> Registrate</a></li>     
                                <?php } ?>
				</ul>
			</nav>
    </header>
<?php }