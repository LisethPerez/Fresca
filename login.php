<?php
session_start();
include 'conexionGene.php';
$usuario = $_POST['email'];
$contra = $_POST['pass'];

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