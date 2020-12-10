<?php
session_start();

$id_Sede = $_SESSION['idSede'];
$id_usuario = $_SESSION['idUser'];
$dato = $_POST['var'];
$datos = json_decode(json_encode($dato),true);
$fecha = date('Y-m-d H:i:s');
$cedula = $_GET['cliente'];

include 'conexionBD.php';

//Consulta para obtener el id del cliente en la base de datos
$consultCliente= "SELECT * FROM cliente WHERE documento='{$cedula}'";
$sqlCliente = mysqli_query($conn,$consultCliente) or die(mysqli_error($conn));
$resulCliente = $sqlCliente->fetch_object();
$clienteId = $resulCliente->id_cliente;

//Consulta para obtener el id del empleados en la base de datos 
$consultEmple = "SELECT * FROM empleado WHERE user_id_user='{$id_usuario}'";
$sqlUser = mysqli_query($conn,$consultEmple) or die(mysqli_error($conn));
$resultadoUser = $sqlUser->fetch_object();
$idEmple = $resultadoUser->id_empleado;

//Creación de la factura con la mayoria de campos por defecto
$consultaFac = "INSERT INTO factura (id_factura_web,pago_total,noproductos,fecha,facturapaga,tipo_pago_id_tpago,empleado_id_empleado,cliente_id_cliente,sede_id_sede,anulacion,referencia_pago) VALUES (0,0,0,'{$fecha}',0,1,'{$idEmple}','{$clienteId}','{$id_Sede}',0,'NULL')";
$sqlFact = mysqli_query($conn,$consultaFac) or die(mysqli_error($conn));

//Obtención del id de la factura generada anteriormente para la asignación de los productos del dettalle
$consultt = "SELECT * FROM factura ORDER BY id_factura DESC LIMIT 1";
$sqll = mysqli_query($conn,$consultt) or die(mysqli_error($conn));
$fac = $sqll->fetch_object();
$idFactu = $fac->id_factura;

foreach ($datos as $product) {
    //Guardar cada una de los datos del JSON del detalle de productos
    $nombre_producto = $product['producto'];
    $cantidad_pro = $product['cantidad'];
    $precio = $product['precio'];
    $peso = $product['peso'];
    $impuesto = $product['impuesto'];
    $descuento = $product['descuento'];
    $total = $product['total'];

    //Consulta para la obtención del id del producto desde la base de datos mediante el nombre del producto
   include 'conexionGene.php';
    $consulta = "SELECT * FROM producto WHERE nombre='{$nombre_producto}'";
    $sql = mysqli_query($conn,$consulta) or die(mysqli_error($conn));

    if($numFilas = $sql->num_rows>0){
        $result = $sql->fetch_object();
        $id = $result->id_producto;
    }

    //consulta para obtener la cantidad y posterior descuento del stock por medio del id anterior del producto y a la sede a la que pertenece el empleado
    /*include 'conexionBD.php';
    $consult = "SELECT * FROM stock WHERE producto_id_producto='{$id}' AND sede_id_sede='{$id_Sede}'";
    $sql1 = mysqli_query($conn,$consult) or die(mysqli_error($conn));
    if($numFilas1 = $sql1->num_rows>0){
        $result1 = $sql1->fetch_object();
        $cantidad = $result1->cantidad;
        
        if($peso == 'NaN'){
            $cantidad = $cantidad - $cantidad_pro;
        }
        if($cantidad_pro == 'NaN'){
            $cantidad = $cantidad - $peso;
        }    
    }*/

    //Modificar información del stock existente de los productos 
    /*$consult1 = "UPDATE stock SET cantidad={$cantidad} WHERE producto_id_producto='{$id}' AND sede_id_sede='{$id_Sede}'";
    $sql2 = mysqli_query($conn,$consult1) or die(mysqli_error($conn));*/
   
    //Validación de campos para la creación del detalle de factura según los productos ingresados por el empleado
        /*if($peso=='NaN'){
            $consult3 ="INSERT INTO detalle_factura (cantidad,precio_venta,total_descuento,total_impuesto,total,factura_id_factura,stock_id_stock,descuento_id_descuento,impuesto_id_impuestos,fecha,empleado_id_empleado) VALUES ('{$cantidad_pro}','{$precio}','{$descuento}','{$impuesto}','{$total}','{$idFactu}','{$result1->id_stock}','{$result->descuento_id_descuento}','{$result->impuestos_id_impuestos}','{$fecha}','{$idEmple}')";
        } 
        if($cantidad_pro=='NaN'){
            $consult3 ="INSERT INTO detalle_factura (cantidad,precio_venta,total_descuento,total_impuesto,total,factura_id_factura,stock_id_stock,descuento_id_descuento,impuesto_id_impuestos,fecha,empleado_id_empleado) VALUES ('{$peso}','{$precio}','{$descuento}','{$impuesto}','{$total}','{$idFactu}','{$result1->id_stock}','{$result->descuento_id_descuento}','{$result->impuestos_id_impuestos}','{$fecha}','{$idEmple}')";
        }*/
        include 'conexionBD.php';
        
        if($peso=='NaN'){
            $consult3 ="INSERT INTO detalle_factura (cantidad,precio_venta,total_descuento,total_impuesto,total,factura_id_factura,stock_id_stock,descuento_id_descuento,impuesto_id_impuestos,fecha,empleado_id_empleado) VALUES ('{$cantidad_pro}','{$precio}','{$descuento}','{$impuesto}','{$total}','{$idFactu}','{$id}','{$result->descuento_id_descuento}','{$result->impuestos_id_impuestos}','{$fecha}','{$idEmple}')";
        } 
        if($cantidad_pro=='NaN'){
            $consult3 ="INSERT INTO detalle_factura (cantidad,precio_venta,total_descuento,total_impuesto,total,factura_id_factura,stock_id_stock,descuento_id_descuento,impuesto_id_impuestos,fecha,empleado_id_empleado) VALUES ('{$peso}','{$precio}','{$descuento}','{$impuesto}','{$total}','{$idFactu}','{$id}','{$result->descuento_id_descuento}','{$result->impuestos_id_impuestos}','{$fecha}','{$idEmple}')";
        }
    
        $sqlFact = mysqli_query($conn,$consult3) or die(mysqli_error($conn));
}

//Devuelve el id factura creado con anterior, para su posterior modificación de su anulación o pago
echo $idFactu;

?>