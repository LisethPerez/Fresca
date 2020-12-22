<?php
$sipaga = $_POST['var'];
$tipoPa = $_POST['var2'];
$referencia = $_POST['var3'];
$idFac = $_POST['var4'];

include 'conexionBD.php';
if($tipoPa=="Efectivo"){
    $ModiFac = "UPDATE factura SET facturapaga='{$sipaga}', tipo_pago_id_tpago='{$tipoPa}' WHERE id_factura='{$idFac}'";
}else{
   
    $ModiFac = "UPDATE factura SET referencia_pago='{$referencia}',facturapaga='{$sipaga}', tipo_pago_id_tpago='{$tipoPa}' WHERE id_factura='{$idFac}'";
}

$sql = $sqlMoodi = mysqli_query($conn, $ModiFac) or die(mysqli_error($conn));
if($sql){
    echo "Modificación de estado de la factura correcta";
}else{
    echo "Modificación de estado de la factura incorrecta";
}
?>
