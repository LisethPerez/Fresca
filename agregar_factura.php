<?php 
include 'conexionBD.php';

$id_fact = $_POST['id'];
$total = 0;

$fecha = date('Y/m/d H:i:s');
$tipo_pago = $_POST['tipo_pago'];
$tipo_domi = $_POST['var2'];


if($tipo_pago != "Efectivo"){
    $referencia = $_POST['refe'];
}else{
    $referencia = 0;
}

if($tipo_domi!="Presencial"){
    $empleado = $_POST['var3'];
    
    $consultEmple= "SELECT * FROM empleado WHERE nombre='{$empleado}'";
    $sqlEmple = mysqli_query($conn,$consultEmple) or die(mysqli_error($conn));
    $resulEmple = $sqlEmple->fetch_object();
    $EmpleId = $resulEmple->id_empleado; 
}else{
    $empleado = 0;
}

//Consulta para obtener todos los productos asociados al identificador de la factura 
$consultaExi = "SELECT COUNT(*) contar, SUM(total) cant FROM detalle_factura WHERE factura_id_factura='{$id_fact}'";
$sqlExi = mysqli_query($conn,$consultaExi) or die(mysqli_error($conn));

if($num = $sqlExi->num_rows>0){
   $resultExi = $sqlExi->fetch_assoc();
    //Cunsulta para obtener el id_pago de la base de datos dependiendo del tipo de pago seleccionado por el cliente
    $consultPago= "SELECT * FROM tipo_pago WHERE nombre='{$tipo_pago}'";
    $sqlPago = mysqli_query($conn,$consultPago) or die(mysqli_error($conn));
    $resulPago = $sqlPago->fetch_object();
    $pagoId = $resulPago->id_tpago; //Validar el tipo de pago 
  
    //Obtener la cantidad de productos y el total 
    $cantidadProductos =  $resultExi['contar'];
    $totalPro = $resultExi['cant'];

    if($tipo_domi=="Presencial"){
        if($tipo_pago == "Efectivo"){
            $consultaModi = "UPDATE factura SET pago_total='{$totalPro}', noproductos='{$cantidadProductos}', fecha='{$fecha}', facturapaga=1, tipo_pago_id_tpago='{$pagoId}' WHERE id_factura='{$id_fact}'";
        }else{
            $consultaModi = "UPDATE factura SET referencia_pago='{$referencia}', pago_total='{$totalPro}', noproductos='{$cantidadProductos}', fecha='{$fecha}', facturapaga=1, tipo_pago_id_tpago='{$pagoId}' WHERE id_factura='{$id_fact}'";
        }
    }else if($tipo_domi=="Domicilios"){
        $consultaModi = "UPDATE factura SET empleado_id_domiciliario='{$EmpleId}', pago_total='{$totalPro}', noproductos='{$cantidadProductos}', fecha='{$fecha}', tipo_pago_id_tpago='{$pagoId}' WHERE id_factura='{$id_fact}'";
    }
    
    /*if($tipo_pago == "Efectivo"){
        $consultaModi = "UPDATE factura SET pago_total='{$totalPro}', noproductos='{$cantidadProductos}', fecha='{$fecha}', facturapaga=1, tipo_pago_id_tpago='{$pagoId}' WHERE id_factura='{$id_fact}'";
    }else{
        $consultaModi = "UPDATE factura SET referencia_pago='{$referencia}', pago_total='{$totalPro}', noproductos='{$cantidadProductos}', fecha='{$fecha}', facturapaga=1, tipo_pago_id_tpago='{$pagoId}' WHERE id_factura='{$id_fact}'";
    }*/
    
    //Consulta para la modificación de los datos de la factura creda por defecto con anterioridad
  
    $sqlMoodi = mysqli_query($conn,$consultaModi) or die(mysqli_error($conn));
    if($sqlMoodi){
        echo "Cambios relizados ";
    }
    else{
        echo "No se hicieron cambios";
    }
}else{
    echo "No hay detalle de venta";
}

?>
