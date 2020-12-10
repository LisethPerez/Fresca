<?php
session_start();

    $id_Sede = $_SESSION['idSede'];
    $id_usuario = $_SESSION['idUser'];
    $nombre = $_POST['nombre'];
    $documento = $_POST['documento'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];
    $correo = $_POST['correo'];
    $empresa = $_POST['empresa'];
    $categoria_id_cliente = $_GET['var'];
    $fecha = date('Y-m-d');
    $nit = $_POST['nit'];
    $nit1 = $_POST['nit1'];

    //require 'conexionGene.php';


    //echo "El nombre es: " .$nombre. ", el documento es: " .$documento;

    require 'conexionBD.php';
    $consultEmple = "SELECT * FROM empleado WHERE user_id_user='{$id_usuario}'";
    $sqlUser = mysqli_query($conn,$consultEmple) or die(mysqli_error($conn));
    $resultadoUser = $sqlUser->fetch_object();
    $idEmple = $resultadoUser->id_empleado;

    $consulta = "INSERT INTO cliente (nombre,nombre_empresa,direccion,telefono,correo,documento,nit,verificacion_nit,categoria_cliente_id_categoria,sede_id_sede,fecha,empleado_id_empleado) VALUES ('{$nombre}','{$empresa}','{$direccion}',$telefono,'{$correo}',$documento,'{$nit}','{$nit1}',$categoria_id_cliente,$id_Sede,'{$fecha}',$idEmple)";

    $sql = mysqli_query($conn,$consulta) or die(mysqli_error($conn));

    if($sql){
        echo "Datos ingresados";
    }

    
?>