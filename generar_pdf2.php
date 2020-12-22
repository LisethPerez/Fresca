<?php

session_start();
require('fpdf/fpdf.php');
require 'conexionBD.php';

$id_usuario = $_SESSION['idUser'];
$idFac = $_POST['var'];
//echo $idFac;
// Tamaño tickt 80mm x 150 mm (largo aprox)

$consultTama = "SELECT COUNT(*) cantidad FROM detalle_factura WHERE factura_id_factura={$idFac}";
$sqlTama = mysqli_query($conn,$consultTama) or die(mysqli_error($conn));
$resulTama = $sqlTama->fetch_assoc();
$tama = $resulTama['cantidad'];
$nuevo = $tama*8;

$x=60;
$pdf = new FPDF($orientation='P',$unit='mm', array(80,$x+$nuevo));
$pdf->AddPage();
//$pdf->Image('./images/logoCo1.png',15,4,50,25);
$pdf->SetFont('Helvetica','',11);
$pdf->Cell(60,4,'INVERSIONES AGROINDUSTRIALES',0,1,'C');
$pdf->Cell(60,4,'COSECHA FRESCA SAS',0,1,'C');
$pdf->SetFont('Helvetica','',8);
$pdf->Cell(60,4,'NIT 901.274.543-1',0,1,'C');
$pdf->Cell(60,4,'CRA 5 # 71-45 LOCAL 103',0,1,'C');
$pdf->Ln(2);
$pdf->Cell(60,4,'RES N. 18764000999047 FECHA:2020/07/18',0,1,'C');
$pdf->Cell(60,4,'DEL N. P00001 AL N. P50000',0,1,'C');

/*$consulEmple = "SELECT * FROM empleado WHERE user_id_user={$id_usuario}";
$sqlEmple = mysqli_query($conn,$consulEmple) or die(mysqli_error($conn));
$resulEmple = $sqlEmple->fetch_assoc();
$nombreEmple = $resulEmple['nombre'];
$idEmpleado = $resulEmple['id_empleado'];
$str = utf8_decode($nombreEmple);


$consultt = "SELECT * FROM factura WHERE empleado_id_empleado='{$idEmpleado}' ORDER BY id_factura DESC LIMIT 1 ";
$sqll = mysqli_query($conn,$consultt) or die(mysqli_error($conn));
$fac = $sqll->fetch_object();
$idFactu = $fac->id_factura;
$total = $fac->pago_total;*/

$consultFact = "SELECT *, empleado.nombre AS nombreEmple, cliente.nombre AS nombreCliente FROM factura INNER JOIN empleado ON empleado.id_empleado=factura.empleado_id_empleado INNER JOIN cliente ON cliente.id_cliente=factura.cliente_id_cliente WHERE id_factura={$idFac}";
$sqlFact = mysqli_query($conn,$consultFact) or die(mysqli_error($conn));
$resulFact = $sqlFact->fetch_assoc();
$fechaFac = $resulFact['fecha'];
$total = $resulFact['pago_total'];
$idCliente = $resulFact['nombreCliente'];
$idEmple = $resulFact['nombreEmple'];

$str1 = utf8_decode($idEmple);
$str = utf8_decode($idCliente);

$pdf->Ln(5);
$pdf->Cell(14,3,'FECHA: ',0,0);
$pdf->Cell(30,3,$fechaFac,0,1,'L',0);
$pdf->Cell(30,3,'FACTURA DE VENTA: ',0,0);
$pdf->Cell(30,3,$idFac,0,1,'L',0);
$pdf->Cell(14,3,'NIT:',0,0);
$pdf->Cell(30,3,'123456779',0,1,'L',0);
$pdf->Cell(14,3,'CLIENTE:',0,0);
$pdf->Cell(30,3,$str1,0,1,'L',0);
$pdf->Cell(14,3,'CAJERO:',0,0);
$pdf->Cell(30,3,$str,0,1,'L',0);

$pdf->SetFont('Arial','B', 6.5);
$pdf->Cell(45, 10, 'DETALLE',0,0,'C');
$pdf->Cell(9, 10, 'CANT.',0,0,'L');
$pdf->Cell(8, 10, 'VALOR',0,0,'C');
$pdf->Cell(3, 10, 'IVA',0,0,'L');
$pdf->Ln(8);
$pdf->Cell(65,0,'','T');
$pdf->Ln(0);


$consult = "SELECT * FROM detalle_factura WHERE factura_id_factura={$idFac}";
$sqlDeta = mysqli_query($conn,$consult) or die(mysqli_error($conn));

if($num = $sqlDeta->num_rows>0){

    while($row = mysqli_fetch_assoc($sqlDeta)){
        
        $idDescuento = $row['descuento_id_descuento'];
        $idImpuesto =  $row['impuesto_id_impuestos'];
        $idStock =  $row['stock_id_stock'];

        require 'conexionGene.php';

        $consulDescu = "SELECT * FROM descuento WHERE id_descuento={$idDescuento}";
        $sqlDescu = mysqli_query($conn,$consulDescu) or die(mysqli_error($conn));
        $resulDescu = $sqlDescu->fetch_assoc();
        $nombreDescu = $resulDescu['valor_descuento'];

        $consulImpuesto = "SELECT * FROM impuestos WHERE id_impuestos={$idImpuesto}";
        $sqlImpuesto = mysqli_query($conn,$consulImpuesto) or die(mysqli_error($conn));
        $resulImpuesto = $sqlImpuesto->fetch_assoc();
        $nombreImpuesto = $resulImpuesto['valor_impuesto'];

        $consulProducto = "SELECT * FROM producto WHERE id_producto={$idStock}";
        $sqlProducto = mysqli_query($conn,$consulProducto) or die(mysqli_error($conn));
        $resulProducto = $sqlProducto->fetch_assoc();
        $nombreProducto = $resulProducto['nombre'];

        $pdf->SetFont('Arial','I', 5);
        $pdf->Cell(50, 3,$nombreProducto,0,0,'L',0);
        $pdf->Cell(3, 3,$row['cantidad'],0,0,'L',0);
        $pdf->Cell(9, 3,"$ ".number_format($row['total']),0,0,'C',0);
        $pdf->Cell(3, 3,$nombreImpuesto,0,1,'C',0);
        
        /*$pdf->SetFont('Arial','I', 5);
        $pdf->Cell(50, 5,$nombreProducto,1,0,'L',0);
        $pdf->Cell(3, 5,$row['cantidad'],1,0,'L',0);
        $pdf->Cell(9, 5,"$ ".number_format($row['total']),1,0,'C',0);
        $pdf->Cell(3, 5,$nombreImpuesto,1,1,'C',0);*/
        

    }

//$vueltas=$valorIngre-$total;

$pdf->Cell(65,0,'','T');
$pdf->Ln(2);   
$pdf->SetFont('Arial','B', 6.5);
$pdf->Cell(25,2,'TOTAL A PAGAR: ',0,0,'R');
$pdf->Cell(25,2,"$ ".number_format($total),0,1,'L',0);

}

header('Content-type: application/pdf');
$pdf->Output('D','Factura.pdf','UTF-8');

//echo $pdf;
?>