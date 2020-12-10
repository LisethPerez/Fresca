<?php

//include 'conexionGene.php';
//$dato = $_GET['var'];
session_start();

$id_fact = $_GET['fac'];
$id_Sede = $_SESSION['idSede'];
$dato = $_POST['var'];
$fecha = date('Y-m-d H:i:s');
$datos = json_decode(json_encode($dato),true);
$tipo_pago = $_POST['tipo_pago'];

include 'conexionBD.php';
$consultaExi = "SELECT COUNT(*) contar, SUM(total) cant FROM detalle_factura WHERE factura_id_factura='{$id_fact}'";
$sqlExi = mysqli_query($conn,$consultaExi) or die(mysqli_error($conn));
if($num = $sqlExi->num_rows>0){
    $resultExi = $sqlExi->fetch_assoc();

    $cantidadProductos =  $resultExi['contar'];
    $totalPro = $resultExi['cant'];

    $consultPago= "SELECT * FROM tipo_pago WHERE nombre='{$tipo_pago}'";
    $sqlPago = mysqli_query($conn,$consultPago) or die(mysqli_error($conn));
    $resulPago = $sqlPago->fetch_object();
    $pagoId = $resulPago->id_tpago;

    $consultaModi = "UPDATE factura SET pago_total='{$totalPro}', noproductos='{$cantidadProductos}', fecha='{$fecha}', facturapaga=0, anulacion=1, tipo_pago_id_tpago='{$pagoId}' WHERE id_factura={$id_fact}";
    $sqlMoodi = mysqli_query($conn,$consultaModi) or die(mysqli_error($conn));

    if($sqlMoodi){
        echo "Factura anulada";
    }else{
        echo "No se anulo la factura";
    }

}

/*foreach ($datos as $product) {

    $nombre_producto = $product['producto'];
    $cantidad_pro = $product['cantidad'];
    $peso = $product['peso'];

   // print_r($product);
   include 'conexionGene.php';
    $consulta = "SELECT * FROM producto WHERE nombre='{$nombre_producto}'";
    $sql = mysqli_query($conn,$consulta) or die(mysqli_error($conn));

    if($numFilas = $sql->num_rows>0){
        $result = $sql->fetch_object();
        $id = $result->id_producto;
    }
    include 'conexionBD.php';
    $consult = "SELECT * FROM stock WHERE producto_id_producto='{$id}' AND sede_id_sede='{$id_Sede}'";
    $sql1 = mysqli_query($conn,$consult) or die(mysqli_error($conn));
    if($numFilas1 = $sql1->num_rows>0){
        $result1 = $sql1->fetch_object();
        $cantidad = $result1->cantidad;
     
        if($peso == 'NaN'){
            $cantidad = $cantidad + $cantidad_pro;
        }
        if($cantidad_pro == 'NaN'){
            $cantidad = $cantidad + $peso;
        }

    }

    $consult1 = "UPDATE stock SET cantidad={$cantidad} WHERE producto_id_producto='{$id}' AND sede_id_sede='{$id_Sede}'";
    $sql2 = mysqli_query($conn,$consult1) or die(mysqli_error($conn));

    /*if($sql2){
        $mensaje = "Adicción realizada";
    }else{
        $mensaje =  "No se realizaron cambios";
    }
}*/

//echo $mensaje;

?>