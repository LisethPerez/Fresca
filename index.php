<?php
    session_start(); 
    if (empty($_SESSION['username'])): header("Location: login_page.php");
    else: 
?>
        
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Cosecha Fresca</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--<link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="https://i.imgur.com/QRAUqs9.png">-->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/sweetalert2.min.css">
    <link rel="stylesheet" href="assets/fontawesome/css/all.css">
    <link rel="stylesheet" href="assets/jquery-ui/jquery-ui.css">
    <script src="assets/js/jQuery.js"></script>
    <script src="assets/jquery-ui/jquery-ui.js"></script>
  <!--  <script src="assets/jquery-ui/typeahead.js"></script>-->
    
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
<style>
.my-custom-scrollbar {
position: relative;
height: 400px;
overflow: auto;
}
.table-wrapper-scroll-y {
display: block;
}
::placeholder {
  font-size: 80%;

}

.groupPago:active { 
  padding: 5px; 
} 
</style>
</head>
<body>
    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                <li class="active">
                        <a href="index.php"><i class="menu-icon fa fa-laptop active"></i>FRESCA</a>
                    </li>
                    <li class="menu-title">Administración</li><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-cogs"></i>CLIENTES</a>
                        <ul class="sub-menu children dropdown-menu">                            
                            <li><i class=""></i><a href="view_cliente.php">Lista clientes</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>FACTURACIÓN</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class=""></i><a href="view_ventas.php">Realizadas</a></li>
                            <!--<li><i class=""></i><a href="view_facturas.php">Anuladas</a></li>-->
                            <li><i class=""></i><a href="view_facturas_pendientes.php">Pendientes</a></li>
                           <!-- <li><i class=""></i><a href="view_facturas_web.php">Web</a></li>-->
                        </ul>
                    </li>
                    
                    <hr>
                    <li class="menu-title">Salir</li><!-- /.menu-title -->
                    <li>
                        <a href="salir.php" class="nav-link"> <i class="menu-icon fa fa-power-off"></i>Cerrar sessión</a>
                        
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">
           <!-- <div class="top-left">
                <div class="navbar-header" style="background:#F0A744">
                    <a class="navbar-brand" style="background:#F0A744" href="./"><img src="images/logoo1.png" alt="Logo"></a>
                 
                    <a id="menuToggle" class="menutoggle" style="background:#F0A744;"><i class="fa fa-bars" style=" color:#FFF"></i></a>
                    
                </div>
            </div>-->
            <div class="top-left">
                <div class="navbar-header">
                    <a class="navbar-brand" href="./"><img src="images/logoCo1.png" alt="Logo"><img src="images/texto.png" alt="Logo"></a>
                 
                    <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
                    
                </div>
            </div>
            <div class="top-right">
                <div class="header-menu">
                    <div class="header-left">
                   
                    <br>
                        <label>Bienvenido: <?php echo $_SESSION['nombreEmple']?></label>
                    </div>
                    <div class="user-area dropdown float-right">
                    <a href="#"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                            <img class="" src="images/controler2.jpg" style="width: 110px; height: 50px;">
                        </a>
                    </div>
                </div>
            </div>
            
        </header><!-- /header -->
        <!-- Header-->

        <!--<div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Dashboard</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Dashboard</a></li>
                                    <li><a href="#">Forms</a></li>
                                    <li class="active">Basic</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>-->
        <div class="clearfix"></div>
        <div class="content">
            <div class="container">     
                <div class="clearfix"></div>
                <!-- Orders -->
                <div class="orders">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <div class="card bg-flat-color-8 border border-secondary" >
                           
                                        <div class="card-header bg-dark">
                                            <strong class="card-title text-light">Información venta</strong>
                                        </div>
                                        <div class="card-body">
                                        <form id="venta" method="POST">   
                                            <div class="form-row">
                                                <div class="col">
                                        
                                                    <label for="staticEmail2">Buscar producto</label>
                                                    <input autocomplete="off"  type="text" class="form-control active selec" id="producto" name="producto" placeholder="Número o nombre" style="width:400px; height:35px; font-size:110%;" data-minChars="1">
                                                    
                                                </div>
                                                <div class="col">
                                                        <label><a id="obte" class="">Peso (KG)</a></label>
                                                        <input type="hidden" id="peso" name="peso"></input>
                                                        <input type="text" class="form-control selec" id="pesooo" name="pesooo" style="height:35px; font-size:160%;" required>
                                                       <!--<input type="text" class="form-control selec" name="peso" id="peso" placeholder="Peso" style="height:30px" required>-->
                                                </div>
                                            </div><br>
                                            <div class="form-row">
                                                <div class="col">
                                                        <label for="staticEmail2">Buscar por código</label>
                                                        <input type="text" class="form-control selec" id="producto1" name="producto1" placeholder="Número o nombre" style="width:400px; height:35px; font-size:110%;">
                                                </div>
                                                <div class="col">
                                                    <label for="validationCustom03">Cantidad</label>
                                                    <input type="text" class="form-control selec" id="cantidad" name="cantidad" style="height:35px; font-size:110%;" placeholder="Cantidad" onkeypress="return onlyNums(event)" required><br>
                                        </form>                
                                                </div>
                                            </div><hr>
                                            <div class="form-row table-wrapper-scroll-y my-custom-scrollbar" >
                                            <table class="table table-responsive">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th style="display:none">ID</th>    
                                                        <th>Código</th>
                                                        <th>Cantidad</th>
                                                        <th>Producto</th>
                                                        <th>Peso</th>
                                                        <th>Precio</th>
                                                        <th>Imp</th>
                                                        <th>Desc</th>
                                                        <th>Total</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody style="font-size:80%;" id="cont_ventas">

                                                </tbody>
                                            </table>
                                            </div>
                                            <br>
                                            <div class="form-row">
                                                <div class="col">
                                                </div>
                                                <div class="col">
                                                </div>
                                                <div class="col">
                                                </div>
                                                <div class="col">
                                                    <div class="form-check form-check-inline">
                                                        <strong style="font-size:160%">Total</strong>
                                                </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-check form-check-inline">
                                                        <input type="text" class="form-control" id="total" placeholder="Total" required style="width:150px; height:50px; font-size:150%" disabled>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            
                                            <div class="modal fade" id="infoCliente" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true" >
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id=""><strong>Información Cliente</strong></h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                         </div>
                                                        <div class="modal-body">
                                                            <div class="card border border-secondary">
                                                                <div class="card-header bg-dark">
                                                                    <strong class="card-title text-light heading">Información general</strong>
                                                                </div>
                                                                <div class="card-body">

                                                                    <form  method="POST" id="formulario" class="form-inline">
                                                                        <div class="form-group mx-sm-3">       
                                                                            <label for="staticEmail2">Número de identidad</label>
                                                                        </div>
                                                                        <div class="form-group mx-sm-3">     
                                                                            <input type="text" class="form-control" id="cedula" name="cedula" placeholder="Número">
                                                                        </div>   
                                                                        <div class="form-group mx-sm-3">   
                                                                            <button type="button" id="buscar1" class="btn btn-primary btn-sm mb-2"> Buscar</button>
                                                                        </div>
                                                                        <div class="form-group mx-sm-1">   
                                                                            <button type="button" id="ingresar" data-toggle="modal" data-target="#cliente" class="btn btn-success btn-sm mb-2" disabled> Ingresar</button> 
                                                                        </div>
                                                                    </form>
                                                                   
                                                                    <hr>
                                                                    <div class="form-row">
                                                                        <div class="col" id="resultado">
                                                                        
                                                                        </div>
                                                                    </div>
                                                                   
                                                                </div><!--card-body-->
                                                            </div><!--card-border-->
                                                        </div><!--model-body-->
                                                        <div class="modal-footer">
                                                            <button type="button" id="confi" class="btn btn-success btn-sm mb-2" data-dismiss="modal">Confirmar</button>
                                                           
                                                        </div>
                                                    </div><!--modal-content-->
                                                </div> <!--modal-dialog-->
                                            </div><!--modal-fade-->

                                            <div class="modal fade" id="cliente" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true" data-backdrop="static">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel"><strong>Ingreso de datos del cliente</strong></h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form class="needs-validation" method="POST" id="form_cliente" novalidate>
                                                            <div class="form-row">
                                                            <div class="col">
                                                                            <label for="validationCustom03">Tipo Cliente</label>
                                                                            <?php 
                                                                                include 'conexionBD.php';
                                                                                $consulta = "SELECT * FROM categoria_cliente";
                                                                                $sql = mysqli_query($conn,$consulta) or die(mysqli_error($conn));
                                                                            ?>
                                                                            <select type="text" class="form-control" id="tipo_cliente" name="tipo_cliente" placeholder="Tipo cliente"  style="height:33px" onkeypress="return onlyLetters(event)" style="width:160px;" required>
                                                                            
                                                                            <?php 
                                                                                while ($valores = mysqli_fetch_object($sql)) {
                                                                                    echo '<option value="'.$valores->id_categoria.'">'.$valores->nombre.'</option>';
                                                                                }
                                                                            ?>
                                                                            
                                                                                <!--<option value="1">Corriente</option>
                                                                                <option value="2">Institucional</option>-->
                                                                            </select>
                                                                    </div>
                                                            </div>
                                                            <hr>
                                                                <div class="form-row">
                                                                    <div class="col-12">
                                                                        <label for="validationCustom01">Nombre</label>
                                                                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre completo" style="height:33px" onkeypress="return onlyLetters(event)"  required><br>
                                                                        <div class="invalid-feedback">
                                                                            Ingrese nombre
                                                                    </div>
                                                                </div>
                                                                </div>
                                                                <div class="form-row">
                                                                    <div class="col">
                                                                            <label for="validationCustom03">Documento</label>
                                                                            <input type="text" class="form-control" id="documento" name="documento" placeholder="Documento" style="height:33px" onkeypress="return onlyNums(event)" max="10" required><br>
                                                                            
                                                                    </div>
                                                                    <div class="col">
                                                                        <label for="validationCustom03">Telefono</label>
                                                                        <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Telefono" maxlength="10" style="height:33px" onkeypress="return onlyNums(event)" required><br>
                                                                        
                                                                    </div>
                                                                    
                                                                </div>
                                                                <div class="form-row">
                                                                    <div class="col">
                                                                        <label for="validationCustom03">Dirección</label>
                                                                        <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Direccion" style="height:33px" required><br>
                                                                        
                                                                    </div> 
                                                                    <div class="col">
                                                                            <label for="validationCustom03">Correo</label>
                                                                            <input type="email" class="form-control" id="correo" name="correo" placeholder="Correo"  style="height:33px" required><br>
                                                                           
                                                                    </div>    
                                                                 
                                                                </div>
                                                                <div class="form-row" id="info_insti">
                                                                    <div class="col">
                                                                        <label for="validationCustom03">Empresa</label>
                                                                        <input type="text" class="form-control" id="empresa" name="empresa" placeholder="Empresa"  style="height:33px" onkeypress="return onlyLetters(event)" required><br>
                                                                       
                                                                    </div>
                                                                    <div class="col">       
                                                                    <label for="validationCustom03">Indentificación NIT</label>
                                                                        <div class="form-row">
                                                                            <div class="col"> 
                                                                                <input type="text" class="form-control" id="nit" name="nit" placeholder="NIT"  style="height:33px; width:142px" onkeypress="return onlyNums(event)" required>
                                                                            </div>
                                                                            <strong>-</strong>
                                                                            <div class="col"> 
                                                                               <input type="number" class="form-control" id="nit1" name="nit1" placeholder="NIT"  style="height:33px; width:65px" min="1" max="9" onkeypress="return onlyNums(event)" required><br>
                                                                            </div>
                                                                              
                                                                            </div>      
                                                                    </div> 
                                                                    
                                                                </div>
                                                               
                                                        
                                                    </div> <!--modal-body-->
                                                    <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancelar</button>
                                                            <button type="button" class="btn btn-success btn-sm" id="registrar2">Confirmar</button>
                                  
                                                    </div> <!--modal-footer-->
                                                    </form>
                                                </div><!--modal-content-->
                                            </div><!--modal-dialog-->
                                            </div> <!--modal-fade-->

                                            <div class="modal fade" id="infoPago" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true" >
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="mediumModalLabel"><strong>Información Cliente</strong></h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                         </div>
                                                        <div class="modal-body">
                                                            <div class="card border border-secondary">
                                                                <div class="card-header bg-dark">
                                                                    <strong class="card-title text-light">Información de pago</strong>
                                                                </div>
                                                                <div class="card-body">
                                                                <div class="form-row">
                                                                    <div class="col">
                                                                        <strong>TIPOS DE DOMICILIOS</strong>
                                                                    </div>
                                                                    
                                                                </div><hr>
                                                                <div class="form-row">
                                                                    <div class="col">
                                                                        <button type="button" class="btn btn-primary btn-sm mb-2 groupTipo" value="Presencial">Presencial</button>
                                                                    </div>
                                                                    <div class="col">
                                                                        <button type="button" class="btn btn-primary btn-sm mb-2 groupTipo" data-toggle="modal" data-target="#infoDomiciliario" value="Domicilios">Domicilios</button>
                                                                    </div>
                                                                </div><hr>
                                                                    <div class="form-row pago">
                                                                        <div class="col">
                                                                            <strong> TIPOS DE PAGO</strong>
                                                                        </div>
                                                                    </div><hr>
                                            
                                                                    <div class="form-row pago">
                                                                        <?php 
                                                                            include 'conexionBD.php';
                                                                            $consulta = "SELECT * FROM tipo_pago";
                                                                            $sql = mysqli_query($conn,$consulta) or die(mysqli_error($conn));
                                                                        ?>
                                                                       
                                                                            <?php foreach($sql as $opciones): ?>
                                                                                <div class="btn-group alignment col">
                                                                                <button type="button" class="btn btn-success btn-sm mb-2 groupPago" value="<?php echo $opciones['nombre']?>" selected="selected" name="<?php echo $opciones['nombre']?>"><?php echo $opciones['nombre']?></button>
                                                                                </div>                                           
                                                                            <?php endforeach ?>
                                                                    </div><br>
                                                                    <div id="efectivo">
                                                                        <div class="form-row">
                                                                            <div class="col">
                                                                                <label for="validationCustom03">Ingrese valor recibido</label>
                                                                                <input type="text" class="form-control" id="valor_ingre" name="valor_ingre" onkeypress="return onlyNums(event)" style="height:120px; font-size:300%;"><br>        
                                                                            </div>
                                                                            <div class="col">
                                                                            <label for="validationCustom03">Valor de cambio</label>
                                                                                <input type="text" class="form-control" id="vueltas" name="vueltas" onkeypress="return onlyNums(event)" disabled style="height:120px; font-size:300%;"><br>        
                                                                            </div>
                                                                            </div>
                                                                    </div>   
                                                                    <div id="debito">
                                                                        <div class="form-row">
                                                                            <div class="col">
                                                                                <label for="validationCustom03">Total</label>
                                                                                <input type="text" class="form-control" id="total_venDe" name="total_ven" onkeypress="return onlyNums(event)" style="height:100px; font-size:300%;"><br>        
                                                                            </div>
                                                                            <div class="col">
                                                                            <label for="validationCustom03">Número de aprobación</label>
                                                                                <input type="text" class="form-control" id="id_factDe" name="id_fact" onkeypress="return onlyNums(event)" style="height:100px; font-size:300%;"><br>        
                                                                            </div>
                                                                        </div>
                                                                    </div>  
                                                                    <div id="credito">
                                                                        <div class="form-row">
                                                                            <div class="col">
                                                                                <label for="validationCustom03">Total</label>
                                                                                <input type="text" class="form-control" id="total_venCre" name="total_ven" onkeypress="return onlyNums(event)" style="height:110px; font-size:300%;"><br>        
                                                                            </div>
                                                                            <div class="col">
                                                                            <label for="validationCustom03">Número de aprobación</label>
                                                                                <input type="text" class="form-control" id="id_factCre" name="id_fact" onkeypress="return onlyNums(event)" style="height:110px; font-size:300%;"><br>        
                                                                            </div>
                                                                        </div>
                                                                    </div>  
                                                                    <div id="links">
                                                                        <div class="form-row">
                                                                            <div class="col">
                                                                                <label for="validationCustom03">Total</label>
                                                                                <input type="text" class="form-control" id="total_venLink" name="total_ven" onkeypress="return onlyNums(event)" style="height:110px; font-size:300%;"><br>        
                                                                            </div>
                                                                            <div class="col">
                                                                            <label for="validationCustom03">Número de aprobación</label>
                                                                                <input type="text" class="form-control" id="id_factLink" name="id_fact" onkeypress="return onlyNums(event)" style="height:110px; font-size:300%;"><br>        
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <form method="POST" action="generar_pdf.php">  
                                                                            <input type="hidden" value="" id="ggg" name="var">
                                                                            <input type="hidden" value="" id="g2" name="var2">
                                                                
                                                                            <button type="submit" style="display:none;" id="submitButton1"></button>
                                                                    </form>
                                                                </div><!--card-body-->
                                                            </div><!--card-border-->
                                                        </div><!--model-body-->
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger btn-sm mb-2" data-dismiss="modal">ATRÁS</button>
                                                            <button type="button" id="volver_stock" class="btn btn-success btn-sm mb-2" id="eliminar">ELIMINAR</button>
                                                            <button type="button" class="btn btn-success btn-sm mb-2" id="pagar">PAGAR</button>
                                                        </div>
                                                    </div><!--modal-content-->
                                                </div> <!--modal-dialog-->
                                            </div><!--modal-fade-->

                                            <div class="modal fade" id="infoDomiciliario" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true" >
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="mediumModalLabel"><strong>Información Domiciliario</strong></h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                         </div>
                                                        <div class="modal-body">
                                                            <div class="card border border-secondary">
                                                                <div class="card-header bg-dark">
                                                                    <strong class="card-title text-light">Domiciliario</strong>
                                                                </div>
                                                                <div class="card-body">
                                                                <div class="form-row">
                                                                    <div class="col">
                                                                        <div class="form-check form-check-inline">
                                                                            <strong>Nombre empleado</strong>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                        
                                                                            <input type="text" class="form-control" id="domi" name="domi" placeholder="Nombre empleado">
                                                                        </div>
                                                                    </div>
                                                                    
                                                                </div><hr>
                                                                </div><!--card-body-->
                                                            </div><!--card-border-->
                                                        </div><!--model-body-->
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger btn-sm mb-2" data-dismiss="modal">ATRÁS</button>
                                                            <button type="button" id="domiciliario" class="btn btn-success btn-sm mb-2" data-dismiss="modal">OK</button>
                                                        
                                                        </div>
                                                    </div><!--modal-content-->
                                                </div> <!--modal-dialog-->
                                            </div><!--modal-fade-->

                                            <div class="modal fade" id="descuentoStock" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true" >
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="mediumModalLabel"><strong>Descuento inventario</strong></h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                         </div>
                                                        <div class="modal-body">
                                                            <div class="card border border-secondary">
                                                                <div class="card-header bg-dark">
                                                                    <strong class="card-title text-light">Información</strong>
                                                                </div>
                                                                <div class="card-body">
                                                                    <div class="form-row">
                                                                        <div class="col">
                                                                            <strong>Total</strong><br>
                                                                            <input type="text" class="form-control" id="total_web" name="total_web" onkeypress="return onlyNums(event)" style=""><br>     
                                                                        </div>
                                                                        <div class="col">
                                                                            <strong for="validationCustom03">Tipo Cliente</strong>
                                                                                <?php 
                                                                                    include 'conexionBD.php';
                                                                                    $consulta = "SELECT * FROM tipo_pago";
                                                                                    $sql = mysqli_query($conn,$consulta) or die(mysqli_error($conn));
                                                                                ?>
                                                                                <select type="text" class="form-control" id="tipoPa" name="tipoPa" placeholder="Tipo pago"  onkeypress="return onlyLetters(event)" style="width:160px;" required>
                                                                                
                                                                                <?php 
                                                                                    while ($valores = mysqli_fetch_object($sql)) {
                                                                                        echo '<option value="'.$valores->id_tpago.'">'.$valores->nombre.'</option>';
                                                                                    }
                                                                                ?>
                                                                                
                                                                                </select>
                                                                        </div>
                                                                        <div class="col">
                                                                            <strong> Ingrese código</strong><br>
                                                                            <input type="text" class="form-control" id="codigo_inve" name="valor_ingre" onkeypress="return onlyNums(event)" style=""><br>        
                                                                        </div>
                                                                    </div>
                                                                    
                                                                </div><!--card-body-->
                                                            </div><!--card-border-->
                                                        </div><!--model-body-->
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger btn-sm mb-2" data-dismiss="modal">ATRÁS</button>
                                                           
                                                            <button type="button" class="btn btn-success btn-sm mb-2" id="descontar">DESCONTAR</button>
                                                        </div>
                                                    </div><!--modal-content-->
                                                </div> <!--modal-dialog-->
                                            </div><!--modal-fade-->
                                        </div><!--card-body-->
                       
                                    </div> <!--card bg-->
                                </div>  <!--fomr-group-->   
                            </div> <!--COL-LOg-8-->
                            <div class="col-lg-4">
                                <div class="card border border-secondary">
                                    <div class="card-header bg-dark">
                                        <strong class="card-title text-light">Información Productos</strong>
                                    </div>
                                    <div class="card-body">
                                        <!--<div class="card-header bg-dark">
                                            <strong class="card-title text-light">Categorías</strong>
                                        </div>-->
                                        <div class="card-text">
                                        <!--<strong>CATEGORÍAS</strong>
                                        <br>
                                            <?php 
                                                include 'conexionGene.php';
                                                $consulta = "SELECT * FROM categoria_productos";
                                                $sql = mysqli_query($conn,$consulta) or die(mysqli_error($conn));
                                            ?>
                                            <div class="btn-group alignment col">
                                                <?php foreach($sql as $opciones): ?>
                                                    <button type="button" class="btn btn-outline-success btn-sm mb-2 groupBotones" value="<?php echo $opciones['nombre']?>" selected="selected" name="<?php echo $opciones['nombre']?>"><?php echo $opciones['nombre']?></button>
                                                                                                
                                                <?php endforeach ?>
                                               
                                            </div>
                                            <hr width="100%" />
                                            <br>   -->        
                                            <!--<div class="card-header bg-dark">
                                                <strong class="card-title text-light">Productos</strong>
                                            </div>-->
                                            <strong>PRODUCTOS</strong><br>
                                            <div class="card-text col-12" >
                                                <div class="form-row" id="productos">
                                                    
                                                    
                                                </div>
            
                                            </div>
                                        </div> <!--card-text-->
                                    </div>  <!--card-body-->
                                </div><!--card-border-->
                                <div class="card border border-secondary">
                                   
                                    <div class="card-body">
                                        <table class="table table-sm table-borderless">
                                        <tbody>
                                                                <tr>
                                                                    <td><button type="button"  id="sele1" class="btn btn-white btn-sm calcu" style="width:75px; background:#F0A744; font-size:124%; color:#FFF;" value="1">1</button></td>
                                                                    <td><button type="button"  id="sele2" class="btn btn-white btn-sm calcu" style="width:75px; background:#F0A744; font-size:124%; color:#FFF;" value="2">2</button></td>
                                                                    <td> <button type="button" id="sele3" class="btn btn-white btn-sm calcu" style="width:75px; background:#F0A744; font-size:124%; color:#FFF;" value="3">3</button></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><button type="button" id="sele4" class="btn btn-white btn-sm calcu" style="width:75px; background:#F0A744; font-size:124% ;color:#FFF;" value="4">4</button></td>
                                                                    <td><button type="button" id="sele5" class="btn btn-white btn-sm calcu" style="width:75px; background:#F0A744; font-size:124%; color:#FFF;" value="5">5</button></td>
                                                                    <td><button type="button" id="sele6" class="btn btn-white btn-sm calcu" style="width:75px; background:#F0A744; font-size:124%; color:#FFF;" value="6">6</button></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><button type="button" id="sele7" class="btn btn-white btn-sm calcu" style="width:75px; background:#F0A744; font-size:124%; color:#FFF;" value="7">7</button></td>
                                                                    <td><button type="button" id="sele8" class="btn btn-white btn-sm calcu" style="width:75px; background:#F0A744; font-size:124%; color:#FFF;" value="8">8</button></td>
                                                                    <td> <button type="button" id="sele9" class="btn btn-white btn-sm calcu" style="width:75px; background:#F0A744; font-size:124%; color:#FFF;"  value="9">9</button></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><button type="button" id="sele0" class="btn btn-white btn-sm calcu" style="width:75px; background:#F0A744; font-size:124%; color:#FFF;" value="0">0</button></td>
                                                                    <td><button type="button" id="sele00" class="btn btn-white btn-sm calcu" style="width:75px; background:#F0A744; font-size:124%; color:#FFF;" value="00">00</button></td>
                                                                    <td> <button type="button" id="seleEli" class="btn btn-white btn-sm" style="width:75px; background:#F0A744; font-size:124%; color:#FFF;">&larr;</button></td>
                                                                </tr>
                                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="card border border-secondary">
                                   
                                    <div class="card-body">
                                        <div class="form-row">
                                            
                                                <button class="btn btn-primary btn-sm mb-2" id="" type="button" data-toggle="modal" data-target="#infoCliente" style="width:309px; height:50px"><i class="fa fa-user"></i>&nbsp;Cliente</button>
                                            
                                        </div>
                                    <div class="form-row">
                                        <div class="col"></div>
                                        <div class="col">
                                            <button class="btn btn-success btn-sm mb-2" id="realizar_pago" type="button" data-toggle="modal" data-target="#infoPago" style=" height:50px"><i class="fa fa-shopping-cart"></i>&nbsp;Realizar pago</button> 
                                        </div>
                                        <div class="col">
                                            <button class="btn btn-white btn-sm mb-2" type="button"  id="prueba" data-toggle="modal" data-target="#descuentoStock" style="background:#F0A744; color:#FFF; height:50px" disabled><i class="fa fa-globe"></i>&nbsp;Pagos Web</button> 
                                        </div>
                                    </div>
                                </div>
                            </div> <!--COL-LOg-4-->
                        </div> <!--row-->
                    </div><!--COL-LOg-12-->   
                </div><!--orders-->
            </div> <!--CONTainet-->
        </div><!--CONTENT-->
            
    <div class="clearfix"></div>

    <footer class="site-footer">
        <div class="footer-inner bg-white">
            <div class="row">
                <div class="col-sm-6">
                    Copyright &copy; 2018 Ela Admin
                </div>
                <div class="col-sm-6 text-right">
                    Designed by <a href="https://colorlib.com">Colorlib</a>
                </div>
            </div>
        </div>
    </footer>

</div><!-- /#right-panel -->

<!-- Right Panel -->

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
<script src="assets/js/main.js"></script>
<script src="assets/js/awesomplete.min.js"></script>
<script src="assets/fontawesome/js/all.js"></script>
<script src="assets/js/jQuery.js"></script>
<script src="assets/js/sweetalert2.min.js"></script>
<script src="assets/js/script_Index.js"></script>
<script src="assets/jquery-ui/typeahead.js"></script>

</body>
</html>

<?php endif; ?>