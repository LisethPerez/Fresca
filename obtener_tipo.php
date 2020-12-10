<?php
require 'conexionBD.php';

$number = $_POST['cedula'];
$consulta = "SELECT * FROM cliente WHERE documento={$number}";

    $sql = mysqli_query($conn,$consulta) or die(mysqli_error($conn));

    if($numFilas = $sql->num_rows>0){
        $result = $sql->fetch_object();
        //echo "el nobre es:" .$result->nombre;
        
        $tipo_cliente = $result->categoria_cliente_id_categoria;
        echo $tipo_cliente;
    }
    else{
        echo  "No existe ese registro";
     
    }
    
    
?>