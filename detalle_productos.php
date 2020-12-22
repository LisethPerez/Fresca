<?php 

$id = $_GET['var'];
//echo $id;

include 'conexionBD.php';
//$consult = "SELECT *, empleado.nombre AS nombreEmple FROM detalle_factura  INNER JOIN stock ON detalle_factura.stock_id_stock=stock.id_stock INNER JOIN empleado ON detalle_factura.empleado_id_empleado=empleado.nombre WHERE factura_id_factura={$id}";
//$consult = "SELECT *, empleado.nombre AS nombreEmple, detalle_factura.cantidad AS cantidadd FROM detalle_factura INNER JOIN empleado ON detalle_factura.empleado_id_empleado=empleado.id_empleado INNER JOIN stock ON detalle_factura.stock_id_stock=stock.id_stock WHERE detalle_factura.factura_id_factura={$id}";
$consult ="SELECT *, empleado.nombre AS nombreEmple, detalle_factura.cantidad AS cantidadd FROM detalle_factura INNER JOIN empleado ON detalle_factura.empleado_id_empleado=empleado.id_empleado WHERE detalle_factura.factura_id_factura='{$id}'";
$sql = mysqli_query($conn,$consult) or die(mysqli_error($conn));

if($num = $sql->num_rows>0){
   
    while($row = mysqli_fetch_assoc($sql)){

        $idStock = $row['stock_id_stock'];    
               


        include 'conexionGene.php';
        $consulPro = "SELECT * FROM producto WHERE id_producto={$idStock}";
        $sqlPro = mysqli_query($conn,$consulPro) or die(mysqli_error($conn));
        $resulPro = $sqlPro->fetch_object();
        $nombrePro = $resulPro->nombre;

     

        $datos[] = array(
            "cantidad"=>$row['cantidadd'],
            "producto"=>$nombrePro,
            "precio_venta"=>$row['precio_venta'],
            "precio_total"=>$row['total'],
            "descuento"=>$row['total_descuento'],
            "impuesto"=>$row['total_impuesto'],
            "fecha"=>$row['fecha'],
            "empleado"=>$row['nombreEmple']
        );
    }
    echo json_encode($datos);

}else {
    echo "No hay productos";
}

?>