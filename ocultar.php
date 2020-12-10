<?php
require 'conexionGene.php';

$produ = $_GET['var'];

$consult = "SELECT * FROM producto WHERE nombre='{$produ}'";
    
$sql = mysqli_query($conn,$consult) or die(mysqli_error($conn));

if($numFilas = $sql->num_rows>0){

    $result = $sql->fetch_object();
    $unidad = $result->unidad_de_medida;
    //$image = imagecreatefromjpeg($result->imagen);
    if($unidad=="KILO"){
        echo "peso";
    }if($unidad=="UNIDAD"){
        echo "cantidad";
    }

}


?>