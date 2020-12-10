<?php 
//mb_internal_encoding('UTF-8');
//mb_http_output('UTF-8');

    include 'conexionBD.php';
    //mysql_set_charset('utf8');
    $consulta = "SELECT *, cliente.nombre AS nombreCliente, tipo_pago.nombre AS tipo, empleado.nombre AS nombreEmple, factura.fecha AS fecha from factura INNER JOIN cliente ON factura.cliente_id_cliente=cliente.id_cliente INNER JOIN tipo_pago ON factura.tipo_pago_id_tpago=tipo_pago.id_tpago INNER JOIN empleado ON factura.empleado_id_empleado=empleado.id_empleado INNER JOIN sede ON factura.sede_id_sede=sede.id_sede WHERE factura.facturapaga=0 AND factura.anulacion=0";
    $sql = mysqli_query($conn,$consulta) or die(mysqli_error($conn));

        while($row = mysqli_fetch_assoc($sql)){
        ?>
        <tr>    
           <td><?php echo $row['id_factura'];?></td>
            <td><?php echo $row['pago_total'];?></td>
            <td><?php echo $row['noproductos'];?></td>
            <td><?php echo $row['fecha'];?></td>
            <td><?php echo $row['tipo'];?></td>
            <td><?php echo $row['nombreEmple'];?></td>
            <td><?php echo $row['nombreCliente'];?></td>
            <td><?php echo $row['nombre_sede'];?></td>
            <td> 
           <!-- <td><?php echo $row->id_factura;?></td>
            <td><?php echo $row->pago_total;?></td>
            <td><?php echo $row->noproductos;?></td>
            <td><?php echo $row->fecha;?></td>
            <td><?php echo $row->tipo;?></td>
            <td><?php echo $row->nombreEmple;?></td>
            <td><?php echo $row->nombreCliente;?></td>
            <td><?php echo $row->nombre_sede;?></td>
            <td> -->
                <button class="btn btn-white btn-sm view_products" style="background:#F0A744; color:#FFF" id="detalles" data-toggle="modal" data-target="#productos2">
                <i class="fa fa-wrench" aria-hidden="true"></i></button>
                <button class="btn btn-success btn-sm impri" id="imprimir"><i class="fa fa-print" aria-hidden="true"></i></button>
            </td>
        </tr>
        
  
<?php    }

                                                
                                        
?>
                                                