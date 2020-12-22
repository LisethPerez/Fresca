<?php
session_start();
include 'conexionGene.php';
$usuario = $_POST['email'];
$contra = $_POST['pass'];
$fecha = $fecha = date('d-m-Y');

//Consulta a la base de datos
$consult = "SELECT * FROM users WHERE email='{$usuario}'";
$sql = mysqli_query($conn,$consult) or die(mysqli_error($conn));

if($number = $sql->num_rows>0){
    $result = $sql->fetch_object();
//Verificación de contraseña encriptada con la ingresada 
    if(password_verify($contra, $result->password)) {
        
        $_SESSION['username'] = $usuario;       
        $_SESSION['idUser'] = $result->id; 
        $_SESSION['idSede'] = $result->sede_id_sede; 
        $_SESSION['fecha'] = $fecha;

        include "conexionBD.php";
        $consultEmple = "SELECT * FROM empleado WHERE user_id_user='{$_SESSION['idUser']}'";
        $sqlEmple = mysqli_query($conn,$consultEmple) or die(mysqli_error($conn));
        $resultEmple = $sqlEmple->fetch_object();

        
        $consultSede = "SELECT * FROM sede WHERE id_sede='{$_SESSION['idSede']}'";
        $sqlSede = mysqli_query($conn,$consultSede) or die(mysqli_error($conn));
        $resultSede = $sqlSede->fetch_object();
        
        
        
        $_SESSION['nombreEmple'] = $resultEmple->nombre; 
        $_SESSION['nombreSede'] = $resultSede->nombre_sede;  
        //return header("Location: index.php");
        echo "Datos correctos";
     
    } else{   
        //return header("Location: index.php");
        echo "Datos erroneos";
         
    }
}else{
    echo "Datos erroneos";
}
?>