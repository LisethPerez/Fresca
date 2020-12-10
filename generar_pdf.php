<?php

session_start();
require('fpdf/fpdf.php');
require 'conexionBD.php';

$id_usuario = $_SESSION['idUser'];
$idFac = $_POST['var'];
$valorIngre = $_POST['var2'];
//echo $idFac;
// Tamaño tickt 80mm x 150 mm (largo aprox)

$pdf = new FPDF($orientation='P',$unit='mm', array(80,350));
$pdf->AddPage();
$pdf->SetFont('Helvetica','',11);
$pdf->Cell(60,4,'INVERSIONES AGROINDUSTRIALES',0,1,'C');
$pdf->Cell(60,4,'COSECHA FRESCA SAS',0,1,'C');
$pdf->SetFont('Helvetica','',8);
$pdf->Cell(60,4,'NIT 901 274 543-1',0,1,'C');
$pdf->Cell(60,4,'CALLE 109 # 18-8 58',0,1,'C');
$pdf->Ln(2);
$pdf->Cell(60,4,'RES N. 18764000999047 FECHA:2020/07/18',0,1,'C');
$pdf->Cell(60,4,'DEL N. P20001 AL N. P50000',0,1,'C');

$consulEmple = "SELECT * FROM empleado WHERE user_id_user={$id_usuario}";
$sqlEmple = mysqli_query($conn,$consulEmple) or die(mysqli_error($conn));
$resulEmple = $sqlEmple->fetch_assoc();
$nombreEmple = $resulEmple['nombre'];
$idEmpleado = $resulEmple['id_empleado'];
$str = utf8_decode($nombreEmple);


/*$consultt = "SELECT * FROM factura WHERE empleado_id_empleado='{$idEmpleado}' ORDER BY id_factura DESC LIMIT 1 ";
$sqll = mysqli_query($conn,$consultt) or die(mysqli_error($conn));
$fac = $sqll->fetch_object();
$idFactu = $fac->id_factura;
$total = $fac->pago_total;*/

$consultFact = "SELECT * FROM factura WHERE id_factura={$idFac}";
$sqlFact = mysqli_query($conn,$consultFact) or die(mysqli_error($conn));
$resulFact = $sqlFact->fetch_object();
$fechaFac = $resulFact->fecha;
$total = $resulFact->pago_total;
$idCliente = $resulFact->cliente_id_cliente;


$consulCliente = "SELECT * FROM cliente WHERE id_cliente={$idCliente}";
$sqlCliente = mysqli_query($conn,$consulCliente) or die(mysqli_error($conn));
$resulCliente = $sqlCliente->fetch_object();
$nombreCliente = $resulCliente->nombre;
$str1 = utf8_decode($nombreCliente);

$pdf->Ln(5);
$pdf->Cell(30,4,'FECHA: ',0,0);
$pdf->Cell(30,4,$fechaFac,0,1,'L',0);
$pdf->Cell(30,4,'FACTURA DE VENTA: ',0,0);
$pdf->Cell(30,4,$idFac,0,1,'L',0);
$pdf->Cell(30,4,'NIT:',0,0);
$pdf->Cell(30,4,'123456779',0,1,'L',0);
$pdf->Cell(30,4,'CLIENTE:',0,0);
$pdf->Cell(30,4,$str1,0,1,'L',0);
$pdf->Cell(30,4,'CAJERO:',0,0);
$pdf->Cell(30,4,$str,0,1,'L',0);

$pdf->SetFont('Arial','I', 7);
$pdf->Cell(30, 10, 'Detalle', 0);
$pdf->Cell(5, 10, 'Cantidad',0,0,'R');
$pdf->Cell(10, 10, 'Valor',0,0,'R');
$pdf->Cell(15, 10, 'Iva',0,0,'R');
$pdf->Ln(8);
$pdf->Cell(60,0,'','T');
$pdf->Ln(0);


$consult = "SELECT * FROM detalle_factura WHERE factura_id_factura={$idFac}";
$sqlDeta = mysqli_query($conn,$consult) or die(mysqli_error($conn));

if($num = $sqlDeta->num_rows>0){

require 'conexionGene.php';
    while($row = mysqli_fetch_assoc($sqlDeta)){
    $idDescuento = $row['descuento_id_descuento'];
        $idImpuesto =  $row['impuesto_id_impuestos'];
        $idProducto =  $row['stock_id_stock'];

        

        $consulDescu = "SELECT * FROM descuento WHERE id_descuento={$idDescuento}";
        $sqlDescu = mysqli_query($conn,$consulDescu) or die(mysqli_error($conn));
        $resulDescu = $sqlDescu->fetch_assoc();
        $nombreDescu = $resulDescu['valor_descuento'];

        $consulImpuesto = "SELECT * FROM impuestos WHERE id_impuestos={$idImpuesto}";
        $sqlImpuesto = mysqli_query($conn,$consulImpuesto) or die(mysqli_error($conn));
        $resulImpuesto = $sqlImpuesto->fetch_assoc();
        $nombreImpuesto = $resulImpuesto['valor_impuesto'];

        $consulProducto = "SELECT * FROM producto WHERE id_producto={$idProducto}";
        $sqlProducto = mysqli_query($conn,$consulProducto) or die(mysqli_error($conn));
        $resulProducto = $sqlProducto->fetch_assoc();
        $nombreProducto = $resulProducto['nombre'];


        $pdf->Cell(30, 10,$nombreProducto,0,0,'L',0);
        $pdf->Cell(5, 10,$row['cantidad'],0,0,'L',0);
        $pdf->Cell(10, 10,$row['total'],0,0,'C',0);
        $pdf->Cell(15, 10,$nombreImpuesto,0,1,'C',0);

    }

$vueltas=$valorIngre-$total;

$pdf->Cell(60,0,'','T');
$pdf->Ln(2);   
$pdf->Cell(30,4,'TOTAL A PAGAR: ',0,0);
$pdf->Cell(30,4,$total,0,1,'L',0);
$pdf->Cell(30,4,'RECIBIDO: ',0,0);
$pdf->Cell(30,4,$valorIngre,0,1,'L',0);
$pdf->Cell(30,4,'CAMBIO: ',0,0);
$pdf->Cell(30,4,$vueltas,0,1,'L',0);
}

header('Content-type: application/pdf');
$pdf->Output('D','Factura.pdf','UTF-8');

//echo $pdf;
?>