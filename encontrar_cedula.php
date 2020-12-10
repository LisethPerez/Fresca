<?php
require 'conexionBD.php';

$number = $_POST['cedula'];
$consulta = "SELECT * FROM cliente WHERE documento={$number}";

    $sql = mysqli_query($conn,$consulta) or die(mysqli_error($conn));

    if($numFilas = $sql->num_rows>0){
        $result = $sql->fetch_object();
        //echo "el nobre es:" .$result->nombre;
        echo  '<label for="validationCustom03">Cliente</label>';
        echo  '<input type="text" id="cedula2" class="form-control" value="'. htmlspecialchars($result->nombre) .'" disabled>';
        echo  '<input type="hidden" id="cedula1" class="form-control" value="'. htmlspecialchars($result->documento) .'">';
        $tipo_cliente = $result->categoria_cliente_id_categoria;
    }
    else{
        echo  "No existe ese registro";
     
    }
    
    
?>