<?php
require('../../fpdf/fpdf.php');
$conexion = mysql_connect ("localhost", "root") 
    or die ("No se puede conectar con el servidor");
mysql_query("SET NAMES 'utf8'");
mysql_select_db ("proyectofinal")
    or die("No se puede seleccionar la base de datos");
$consulta = mysql_query ("select * from ventas, entradas, espectaculos, clientes where id_entrada=entrada and espectaculo=nombre_espectaculo and usuario=nombre_usuario and id_venta=\"".$_GET['id']."\"", $conexion);
$fila = mysql_fetch_array ($consulta);
class PDF extends FPDF
{
   //Columna actual
   var $col=0;
   //Ordenada de comienzo de la columna
   var $y=0;
// Cabecera de pagina
function Header()
{
	// Logo
	$this->Image('../../img/buy-tickets.png',10,8,33);
	// Arial bold 15
	$this->SetFont('Arial','B',15);
	// Movernos a la derecha
	$this->Cell(80);
	// T�tulo
	$this->Cell(30,10,' Factura ',1,0,'C');
	// Salto de l�nea
	$this->Ln(20);
}

// Pie de p�gina
function Footer()
{
	// Posici�n: a 1,5 cm del final
	$this->SetY(-15);
	// Arial italic 8
	$this->SetFont('Arial','I',8);
	// N�mero de p�gina
	$this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
}
function SetCol($col)
{
//Establecer la posición de una columna dada
$this->col=$col;
$x=10+$col*75;
$this->SetLeftMargin($x);
$this->SetX($x);
}
function AcceptPageBreak()
{
//Método que acepta o no el salto automático de página
if($this->col<2)
{
//Ir a la siguiente columna
$this->SetCol($this->col+1);
//Establecer la ordenada al principio
$this->SetY($this->y0);
//Seguir en esta página
return false;
}
else
{
//Volver a la primera columna
$this->SetCol(0);
//Salto de página
return true;
}
}
}

//Recibir detalles de factura
$id_factura = $fila['id_venta'];

//Recibir los datos de la empresa
$nombre_tienda = "BuyTickets";
$telefono_tienda = "666666666";
$identificacion_fiscal_tienda = "B01234578";

//Recibir los datos del cliente
$usuario_cliente = $fila['nombre_usuario'];
$nombre_cliente = $fila['nombre'];
$apellidos_cliente = $fila['apellidos'];
$email_cliente = $fila['email'];

//Recibir los datos de los productos
$iva = "0";
$gastos_de_envio = "0";
$unidades = $fila['cantidad_venta'];
$productos = $fila['nombre_espectaculo'];
$precio_unidad = $fila['precio'];

//variable que guarda el nombre del archivo PDF
$archivo="factura-$id_factura.pdf";



$pdf=new FPDF();  //crea el objeto
$pdf->AddPage();  //a�adimos una p�gina. Origen coordenadas, esquina superior izquierda, posici�n por defeto a 1 cm de los bordes.


//logo de la tienda
	$pdf->Image('../../img/buy-tickets.png',10,8,33);

// Encabezado de la factura
$pdf->SetFont('Arial','B',14);
$pdf->Cell(190, 10, "FACTURA", 0, 2, "C");
$pdf->SetFont('Arial','B',10);
$pdf->MultiCell(190,5, "Numero de factura: $id_factura", 0, "C", false);
$pdf->Ln(2);

// Datos de la tienda
$pdf->SetFont('Arial','B',12);
$top_datos=45;
$pdf->SetXY(40, $top_datos);
$pdf->Cell(190, 10, "Datos de la tienda:", 0, 2, "J");
$pdf->SetFont('Arial','',9);
$pdf->MultiCell(190, //posici�n X
5, //posici�n Y
$nombre_tienda."\n".
"Telefono: ".$telefono_tienda."\n".
"Indentificacion Fiscal: ".$identificacion_fiscal_tienda,
 0, // bordes 0 = no | 1 = si
 "J", // texto justificado 
 false);


// Datos del cliente
$pdf->SetFont('Arial','B',12);
$pdf->SetXY(125, $top_datos);
$pdf->Cell(190, 10, "Datos del cliente:", 0, 2, "J");
$pdf->SetFont('Arial','',9);
$pdf->MultiCell(
190, //posici�n X
5, //posicion Y
"Nombre de usuario: ".$usuario_cliente."\n".
"Nombre: ".$nombre_cliente."\n".
"Apellidos: ".$apellidos_cliente."\n".
"Email: ".$email_cliente, 
0, // bordes 0 = no | 1 = si
"J", // texto justificado
false);

//Salto de l�nea
$pdf->Ln(2);



// extracci�n de los datos de los productos a trav�s de la funci�n explode
$e_productos = explode(",", $productos);
$e_unidades = explode(",", $unidades);
$e_precio_unidad = explode(",", $precio_unidad);

//Creaci�n de la tabla de los detalles de los productos productos
$top_productos = 110;
    $pdf->SetXY(45, $top_productos);
    $pdf->Cell(40, 5, 'UNIDADES', 0, 1, 'C');
    $pdf->SetXY(80, $top_productos);
    $pdf->Cell(40, 5, 'PRODUCTOS', 0, 1, 'C');
    $pdf->SetXY(115, $top_productos);
    $pdf->Cell(40, 5, 'PRECIO UNIDAD', 0, 1, 'C');    
 
$precio_subtotal = 0; // variable para almacenar el subtotal
$y = 115; // variable para la posici�n top desde la cual se empezar�n a agregar los datos
$x=0;
while($x <= count($e_productos) - 1)
{
$pdf->SetFont('Arial','',8);
       
   $pdf->SetXY(45, $y);
    $pdf->Cell(40, 5, $e_unidades[$x], 0, 1, 'C');
    $pdf->SetXY(80, $y);
    $pdf->Cell(40, 5, $e_productos[$x], 0, 1, 'C');
    $pdf->SetXY(115, $y);
    $pdf->Cell(40, 5, $e_precio_unidad[$x]." euros", 0, 1, 'C');

//C�lculo del subtotal 	
$precio_subtotal += $e_precio_unidad[$x] * $e_unidades[$x];
$x++;

// aumento del top 5 cm
$y = $y + 5;
}

//C�lculo del Impuesto
$add_iva = $precio_subtotal * $iva / 100;

//C�lculo del precio total
$total_mas_iva = round($precio_subtotal + $add_iva + $gastos_de_envio, 2);

$pdf->Ln(15);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(190, 5, "Gastos de envio: $gastos_de_envio ", 0, 1, "C");
$pdf->Cell(190, 5, "I.V.A INCLUIDO", 0, 1, "C");
/* $pdf->Cell(190, 5, "Subtotal: $precio_subtotal euros", 0, 1, "C"); */
$pdf->Cell(190, 5, "TOTAL: ".$total_mas_iva." euros", 0, 1, "C");

$pdf->Output();


