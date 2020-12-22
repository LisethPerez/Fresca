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
    <title>Ela Admin - HTML5 Admin Template</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="https://i.imgur.com/QRAUqs9.png">

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

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
<style>
    .my-custom-scrollbar {
    position: relative;
    height: 380px;
    overflow: auto;
    }
    .table-wrapper-scroll-y {
    display: block;
    }
    thead tr th{
    position: sticky;
    top: 0;
    z-index: 10;
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
            <div class="content">
                <div class="container">
                <div class="clearfix"></div>
                    <div class="row">
                    <div class="col-lg-12">
                        <div class="card border border-secondary">
                            <div class="card-header bg-light">
                                <strong class="card-title text-dark">Información clientes</strong>
                            </div>
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="row">
                                        <div id="selección">
                                            <div class="row">
                                                <div class="col">
                                               
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <strong>Ingresa patrón de búsqueda</strong>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                   
                                                    <input type="text" class="form-control" id="num" name="num" placeholder="">
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    </div>  <br>
                                    </div>
                                    <div>
                                    <div class=""> 
                                    <table class="table table-responsive table-wrapper-scroll-y my-custom-scrollbar" id="tabla">
                                            <thead class="thead-dark">
                                                <tr>    
                                                    <th>ID</th>
                                                    <th>Nombre</th>
                                                    <th>Empresa</th>
                                                    <th>Dirección</th>
                                                    <th>Telefono</th>
                                                    <th>Correo</th>
                                                    <th>Documento</th>
                                                    <th>NIT</th>
                                                    <th>Fecha</th>
                                                    <th>Editar</th>
                                                </tr>
                                            </thead>
                                            <tbody id="conte_tabla">
                                            <?php 
                                                    include 'conexionBD.php';
                                                    $consulta = "SELECT * from cliente";
                                                    $sql = mysqli_query($conn,$consulta) or die(mysqli_error($conn));
                                                    while($row = mysqli_fetch_object($sql)){
                                                    ?>
                                                    <tr>    
                                                        <td><?php echo $row->id_cliente;?></td>
                                                        <td><?php echo $row->nombre;?></td>
                                                        <td><?php echo $row->nombre_empresa;?></td>
                                                        <td><?php echo $row->direccion;?></td>
                                                        <td><?php echo $row->telefono;?></td>
                                                        <td><?php echo $row->correo;?></td>
                                                        <td><?php echo $row->documento;?></td>
                                                        <td><?php echo $row->verificacion_nit;?></td>
                                                        <td><?php echo $row->fecha;?></td>
                                                        <td> 
                                                            <button class="btn btn-white btn-sm editbtn" style="background:#F0A744; color:#FFF" id="obtener" data-toggle="modal" data-target="#actualizar_cliente">
                                                            <i class="fa fa-wrench" aria-hidden="true"></i></button>
                                                        </td>
                                                    </tr>
                                                <?php } 
                                                ?>
                                                
                                            </tbody>
                                        </table>
                                </div>
                            </div>   
                            </div> 
                    
                    </div><!-- /# column -->
                </div>
                <div class="modal fade" id="actualizar_cliente" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true" data-backdrop="static">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel"><strong>Editar cliente</strong></h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                    </div>
                                                    <div class="modal-body">
                                                    
                                                        <form class="needs-validation" method="POST" action="editar.php" id="form_cliente" novalidate>
                                                                                                                   
                                                                <div class="form-row">
                                                                    <div class="col-12">
                                                                        <label for="validationCustom01">Nombre</label>
                                                                        <input type="hidden" id="update_id" name="update_id">
                                                                        <input type="text" class="form-control" id="nombre1" name="nombre1"  onkeypress="return onlyLetters(event)"  required>
                                                                        <div class="invalid-feedback">
                                                                            Ingrese nombre
                                                                    </div>
                                                                </div>
                                                                </div>
                                                                <div class="form-row">
                                                                    <div class="col">
                                                                            <label for="validationCustom03">Documento</label>
                                                                            <input type="text" class="form-control" id="documento1" name="documento1"  onkeypress="return onlyNums(event)" max="10" required><br>
                                                                            <div class="invalid-feedback">
                                                                            Ingrese documento
                                                                        </div>
                                                                    </div>
                                                                    <div class="col">
                                                                        <label for="validationCustom03">Telefono</label>
                                                                        <input type="text" class="form-control" id="telefono1" name="telefono1"  max="10" onkeypress="return onlyNums(event)" required><br>
                                                                        <div class="invalid-feedback">
                                                                            Ingrese telefono
                                                                        </div>
                                                                    </div>
                                                                    
                                                                </div>
                                                                <div class="form-row">
                                                                    <div class="col">
                                                                        <label for="validationCustom03">Dirección</label>
                                                                        <input type="text" class="form-control" id="direccion1" name="direccion1"  required><br>
                                                                        <div class="invalid-feedback">
                                                                            Ingrese dirección
                                                                        </div>
                                                                    </div> 
                                                                    <div class="col">
                                                                            <label for="validationCustom03">Correo</label>
                                                                            <input type="email" class="form-control" id="correo1" name="correo1"   required><br>
                                                                            <div class="invalid-feedback">
                                                                            Ingrese correo
                                                                        </div>
                                                                    </div>    
                                                                 
                                                                </div>
                                                                <div class="form-row">
                                                                    <div class="col">
                                                                        <label for="validationCustom03">Empresa</label>
                                                                        <input type="text" class="form-control" id="empresa1" name="empresa1"  onkeypress="return onlyLetters(event)" required><br>
                                                                        <div class="invalid-feedback">
                                                                            Ingrese nombre empresa
                                                                        </div>
                                                                    </div>
                                                                    <div class="col">
                                                                            <label for="validationCustom03">Indentificación NIT</label>
                                                                            <input type="number" class="form-control" id="nit1" name="nit1"   onkeypress="return onlyNums(event)" required><br>
                                                                            <div class="invalid-feedback">
                                                                            Ingrese identificación NIT
                                                                        </div>
                                                                    </div>   
                                                                </div>
                                                            
                                                            
                                                                <!--<button class="btn btn-outline-success btn-sm" type="submit">Buscar</button>-->
                                                        
                                                    </div> <!--modal-body-->
                                                    <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal" id="cacel">Cancel</button>
                                                            <button type="submit" class="btn btn-success btn-sm" id="guardar">Guardar</button>
                                  
                                                    </div> <!--modal-footer-->
                                                    </form>
                                                    
                                                </div><!--modal-content-->
                                            </div><!--modal-dialog-->
                                            </div> <!--modal-fade-->
            </div>
            </div>
        
       </div>         <!--  /Traffic -->

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
<script src="assets/fontawesome/js/all.js"></script>
<script src="assets/js/jQuery.js"></script>
<script src="assets/js/sweetalert2.min.js"></script>
<script src="assets/js/script_Index.js"></script>


</body>
</html>

<?php endif; ?>