<?php 
include 'conexionBD.php';
$id_fact = $_GET['var'];


$consult = "SELECT *, cliente.nombre AS nombreCliente, tipo_pago.nombre AS tipo, empleado.nombre AS nombreEmple from factura INNER JOIN cliente ON factura.cliente_id_cliente=cliente.id_cliente INNER JOIN tipo_pago ON factura.tipo_pago_id_tpago=tipo_pago.id_tpago INNER JOIN empleado ON factura.empleado_id_empleado=empleado.id_empleado INNER JOIN sede ON factura.sede_id_sede=sede.id_sede WHERE factura.id_factura={$id_fact}";
$sql = mysqli_query($conn,$consult) or die(mysqli_error($conn));

if($num = $sql->num_rows>0){
    $row = mysqli_fetch_assoc($sql);
  
    $datos[] = array(
        "id"=>$row['id_factura'],
        "total"=>$row['pago_total'],
        "productos"=>$row['noproductos'],
        "fecha"=>$row['fecha'],
        "tipo"=>$row['tipo'],
        "empleado"=>$row['nombreEmple'],
        "cliente"=>$row['nombreCliente'],
        "sede"=>$row['nombre_sede'],
        "opcion"=>'<button class="btn btn-white btn-sm view_products" style="background:#F0A744; color:#FFF" data-toggle="modal" data-target="#productos"><i class="fa fa-wrench" aria-hidden="true"></i></button> <button class="btn btn-success btn-sm impri"><i class="fa fa-print" aria-hidden="true"></button>'
    );
    
    echo json_encode($datos);

}else{
    echo "No se encuntran resultados con la búsqueda";
}
?> 

