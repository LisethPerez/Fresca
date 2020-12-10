<?php

$handle = fopen("COM4", "r");
$file = fopen("datos.txt","w");
$datos = array();
$j=0;
//puntero a archivo 
while (!feof($handle) AND $j<=1) {
    //linea de código abierto
    $buffer = fgets($handle, 19); //bueno 250
    $buffer = preg_replace('/[^0-9.\s]/','', $buffer);
    for($i=0;$i<10;$i++){
        $datos[$i] = $buffer;
    }

    $ultimo = end($datos);
    $j = $j+1;
    }
fwrite($file, $ultimo .PHP_EOL);
fclose($file);
fclose($handle);

if(file_exists('datos.txt')){
    $content = trim(file_get_contents('datos.txt'), PHP_EOL);    
    $lineas = explode(PHP_EOL, $content);
    foreach($lineas as $linea){
        $cadena =str_replace(' ', '', $linea);
        echo $cadena;
    }
}
?>