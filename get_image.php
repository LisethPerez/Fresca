<?php
require 'conexionGene.php';

$produ = $_GET['var'];

//echo '<img src="http://unoa.controler.com.co/imagenes/articulosClientes/10_esferos%20x2_esfero.png">';
$consult = "SELECT * FROM producto INNER JOIN categoria_productos ON producto.categoria_id_categoria=categoria_productos.id_categoria WHERE producto.nombre='{$produ}'";
    
$sql = mysqli_query($conn,$consult) or die(mysqli_error($conn));

if($numFilas = $sql->num_rows>0){

    $result = $sql->fetch_object();
    //$image = imagecreatefromjpeg($result->imagen);
    header("Content-type: image/jpg"); 

    echo '<div class="col">';
    echo '<img src="' .$result->imagen. '">';
    echo '</div>';
    echo '<div class="col">';
    echo $result->nombre;
    echo '</div>';
}


?>