<?php

include 'conexionGene.php';
$producto = $_GET['var'];
$cantidad = $_POST['var2'];


$consult = "SELECT * FROM producto INNER JOIN categoria_productos ON producto.categoria_id_categoria=categoria_productos.id_categoria WHERE producto.nombre='{$producto}'";
$sql = mysqli_query($conn,$consult) or die(mysqli_error($conn));

if($numFilas = $sql->num_rows>0){
    $result = $sql->fetch_object();
    $id = $result->id_producto;

    include 'conexionBD.php';
    $consulta = "SELECT * FROM stock WHERE producto_id_producto={$id}";
    $sql1 = mysqli_query($conn,$consulta) or die(mysqli_error($conn));
    if($num = $sql1->num_rows>0){
        $resultado = $sql1->fetch_object();
        $diponibilidad = $resultado->disponibilidad;

        if($diponibilidad == "1"){
            $cantidad_produ = $resultado->cantidad;

            if($cantidad<=$cantidad_produ AND $cantidad_produ>0){
                echo "Hay disponibilidad";
            }
            else{
                echo "Excede la disponibilidad del producto";
            }
        }else{
            echo "No se encuentra disponibilidad del producto";
        }

    }else{
        echo "El producto no se encuentra en stock";
    }

}else{
    echo "El producto no existe";
}

//id_producto -> producto

?>