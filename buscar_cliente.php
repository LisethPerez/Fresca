<?php
require 'conexionBD.php';

$opcion = $_GET['var'];
$number = $_POST['num'];
$fecha = date('Y-m-d');

//$opcion = preg_replace('/[^0-9a-zA-Z]/','', $opcion);

if($opcion == "nombre"){
$consulta = "SELECT * FROM cliente WHERE nombre LIKE '%{$number}%'";
}

if($opcion == "documento"){
    $consulta = "SELECT * FROM cliente WHERE documento='{$number}'";
}
    
    $sql = mysqli_query($conn,$consulta) or die(mysqli_error($conn));

    if($numFilas = $sql->num_rows>0){

        while($row = mysqli_fetch_object($sql)){
            
            $datos[] = array(
                "id"=>$row->id_cliente,
                "nombre"=>$row->nombre,
                "empresa"=>$row->nombre_empresa,
                "direccion"=>$row->direccion,
                "telefono"=>$row->telefono,
                "correo"=>$row->correo,
                "documento"=>$row->documento,
                "nit"=>$row->verificacion_nit,
                "fecha"=>$row->fecha,
                "opcion"=>'<button class="btn btn-white editbtn" id="obtener" style="background:#F0A744; color:#FFF" data-toggle="modal" data-target="#actualizar_cliente"><i class="fa fa-wrench" aria-hidden="true"></i></button>'
            );
        }
        echo json_encode($datos);
        //echo "el nobre es:" .$result->nombre;
        
    }
    else{
        echo  "No existen registros";
     
    }
?>