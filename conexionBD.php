<?php
$servidor="127.0.0.1";
$username="root";
$password="";
$db="bd";
/*$servidor="remotemysql.com";
$username="MTvDp0bqcd";
$password="SxQzQi4dyT";
$db="MTvDp0bqcd";*/
//$db="dbfresca";

$conn = mysqli_connect($servidor,$username,$password,$db) or die(mysqli_error());
/*if(!$conn){
    die('Error de conexión:'. $conn->connet_error());
}
else{
    print "Conexión exitosa\n" ;
}
exit(1);*/
?>
