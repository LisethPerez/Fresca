 <?php

    include 'conexionBD.php';
    $id = $_POST['update_id'];
    $nombre = $_POST['nombre1'];
    $documento = $_POST['documento1'];
    $telefono = $_POST['telefono1'];
    $direccion = $_POST['direccion1'];
    $correo = $_POST['correo1'];
    $empresa = $_POST['empresa1'];
    $nit = $_POST['nit1'];
    
    
$consulta1 = "UPDATE cliente SET nombre='{$nombre}', nombre_empresa='{$empresa}', direccion='{$direccion}', telefono={$telefono}, correo='{$correo}', documento={$documento},  verificacion_nit={$nit} WHERE id_cliente={$id}";
$sql1 = mysqli_query($conn,$consulta1) or die(mysqli_error($conn));
if($sql1){
    return header("Location:view_cliente.php");
}
?>                                                                