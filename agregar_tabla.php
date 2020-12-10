<?php 
    include 'conexionBD.php';
    $consulta = "SELECT * from cliente";
    $sql = mysqli_query($conn,$consulta) or die(mysqli_error($conn));
    while($row = mysqli_fetch_object($sql)){
    ?>
    <tr>
        <td><?php echo $row->nombre;?></td>
        <td><?php echo $row->empresa;?></td>
        <td><?php echo $row->direccion;?></td>
        <td><?php echo $row->telefono;?></td>
        <td><?php echo $row->correo;?></td>
        <td><?php echo $row->documento;?></td>
        <td><?php echo $row->verificacion_nit;?></td>
        <td><?php echo $row->fecha;?></td>
        <td>
                                                        <!--<a class="btn btn-primary" href="editar.php?id=<//?php echo $row->id; ?>">-->
            <a class="btn btn-primary" href="id=<?php echo $row->id_cliente; ?>" data-toggle="modal" data-target="#actualizar_cliente">
            <i class="fa fa-pencil fa-lg" aria-hidden="true"></i></a>
        </td>
    </tr>
<?php } 
?>