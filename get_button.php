<?php
require 'conexionGene.php';

$producto = $_GET['var'];
$query = $_POST['query'];
//$productos = array();
$respuesta = mysqli_real_escape_string($conn,$query);
$data=array();
$consult = "SELECT * FROM producto WHERE nombre={$producto} AND nombre LIKE '%{$respuesta}%'";

$sql = mysqli_query($conn,$consult) or die(mysqli_error($conn));

if($numFilas = $sql->num_rows>0){

    $result = $sql->fetch_object();
    $productos = $result->nombre;
    //$productos = [$result->nombre];
    //echo $result->precio;
    /*if ($producto ?? '') {
        $matches = array_filter( $productos, function( $option ) use ( $producto) {
                return strpos( strtolower($option), $producto ) !== false;

        } );
        echo json_encode(array_values($matches));
        
    }*/
}

?>