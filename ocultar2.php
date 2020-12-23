<?php
require 'conexionGene.php';

$produ = $_GET['var'];
//echo $produ;
$consult = "SELECT * FROM producto WHERE ean='{$produ}'";
$sql = mysqli_query($conn,$consult) or die(mysqli_error($conn));

if($numFilas = $sql->num_rows>0){

    $result = $sql->fetch_object();
    $unidad = $result->unidad_de_medida;
    //echo $unidad;
    if($unidad=="KILO"){
        echo "peso";
    }else{
        echo "cantidad";
    }

}else{
    echo "No existen registros";
}


?>