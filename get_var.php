<?php
require 'conexionGene.php';

$cate = $_POST['query'];
    //$consult = "SELECT producto.nombre FROM producto INNER JOIN categoria_productos ON producto.categoria_id_categoria=categoria_productos.id_categoria WHERE categoria_productos.nombre='{$categoria}'";
    $consult = "SELECT * FROM producto WHERE (nombre LIKE '%{$cate}%') OR (ean LIKE '%{$cate}%')";
    
    $sql = mysqli_query($conn,$consult) or die(mysqli_error($conn));
    
    if($numFilas = $sql->num_rows>0){
    
        while($row = $sql->fetch_array()){
            $rows[] = $row['nombre'];
        }
        echo json_encode($rows);
    }
?>