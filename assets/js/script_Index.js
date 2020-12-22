//Función que solo permite el ingreso de números
function onlyNums(e) {
    const code = window.event ? e.which : e.ketCode;
    return !(code < 48 || code > 57);
}

//Función que solo permite el ingreso de letras
function onlyLetters(e) {
    const code = window.event ? e.which : e.ketCode;
    return code < 48 || code > 57;
}

//Metodo para capturar el valor del boton de la calculadora
$('.calcu').click(function () {
    var cant = $('#cantidad').val();
    $('#cantidad').focus();
    $('#cantidad').val(cant + $(this).val());
});
   

//Eliminar el último valor del input de cantidad
$('#seleEli').click(function () {
    var cadena = $('#cantidad').val();
    cadena = cadena.substring(0, cadena.length - 1);
    $('#cantidad').val(cadena);
     
});

//Buscar cedula para la existencia del cliente
$('#buscar1').click(function () {
    $.ajax({
        type: "POST",
        url: "encontrar_cedula.php",
        data: $('#formulario').serialize(),
        success: function(data) {
            
            $('#resultado').html(data);
            
            if (data === "No existe ese registro"){
                Swal.fire({
                    icon: 'error',
                    text: 'No existen registros con la búsqueda',
                    showClass: {
                        popup: 'animate__animated animate__fadeInDown'
                    },
                    hideClass: {
                        popup: 'animate__animated animate__fadeOutUp'
                    }
                });     
                $('#ingresar').prop('disabled', false);
            }
        }
    });
     
});
var cedula_cliente;
var tipo_cliente=0;
$('#confi').click(function () {
    cedula_cliente = $('#cedula1').val()
    $.ajax({
        type: "POST",
        url: "obtener_tipo.php?var="+cedula_cliente,
        data: $('#formulario').serialize(),
        success: function(data) {          
            tipo_cliente = data;           
        }
    });
});

//Buscar datos de clientes para su modificacion
$('#buscar3').click(function () {
    $.ajax({
        type: "POST",
        //url: "buscar_cliente.php?var='"+ valor+ "'",
        url: 'buscar_cliente.php?var='+ valor,
        data: $('#formularioCliente').serialize(),
        success: function(data) {
            if(data === "No existen registros"){
                Swal.fire({
                    icon: 'error',
                    text: 'No existen registros con la búsqueda',
                    showClass: {
                        popup: 'animate__animated animate__fadeInDown'
                    },
                    hideClass: {
                        popup: 'animate__animated animate__fadeOutUp'
                    }
                });     
            }else{
                var contenido = document.getElementById("conte_tabla");
                contenido.innerHTML = "";
                var datosEnco = JSON.parse(data);
                createRow1(datosEnco);
                $('#inlineRadio1').val('');
                $('#inlineRadio2').val('');
                
            }
            //alert(data);
            //$('#tabla').html(data);
            
        }
    });
     
});

function createRow1(data) {                              //dynamically adding rows to the Table
    //design this according to your requirement    
    for(var i=0; i<data.length; i++){
    var trElement = `<tr>
    <td>`+data[i].id+`</td>
    <td>`+data[i].nombre+`</td>
    <td>`+data[i].empresa+`</td>
    <td>`+data[i].direccion+`</td>
    <td>`+data[i].telefono+`</td>
    <td>`+data[i].correo+`</td>  
    <td>`+data[i].documento+`</td>
    <td>`+data[i].nit+`</td>    
    <td>`+data[i].fecha+`</td>    
    <td>`+data[i].opcion+`</td>    
    </tr>`;
    $('#conte_tabla').append(trElement);
    
    }  

}

//Metodo pata borrar datos del formulario de ingreso de cliente
function clearCliente(){
    $("#nombre").val('');
    $("#documento").val('');
    $("#telefono").val('');
    $("#direccion").val('');
    $("#correo").val('');
    $("#empresa").val('');
    $("#nit").val('');
    $("#nit1").val('');
}

//Metodo para el ingreso de los datos del formulario de cliente 
$('#registrar2').click(function () {   
    var tipo_cle = $('#tipo_cliente option:selected').val();
    var nombre = $('#nombre').val();
    var documento= $('#documento').val();
    var telefono= $('#telefono').val();
    var dirección = $('#direccion').val();
    var correo = $('#correo').val();
    var empresa = $('#empresa').val();
    var nit = $('#nit').val(); 
    var nit1 = $('#nit1').val(); 
  
    if(tipo_cle === '' || nombre===''||  documento===''|| telefono===''|| dirección===''|| correo==='' || empresa==='' || nit===''){
        Swal.fire({
            icon: 'error',
            text: 'Por favor ingrese los datos',
            showClass: {
                popup: 'animate__animated animate__fadeInDown'
            },
            hideClass: {
                popup: 'animate__animated animate__fadeOutUp'
            }
        });     
    }else{
        $.ajax({
            type: "POST",
            url: "registrar_cliente.php?var="+tipo_cle,
            data: $("#form_cliente").serialize(),
            success: function(data) {
                Swal.fire({
                    icon: 'success',
                    text: data,
                    showClass: {
                        popup: 'animate__animated animate__fadeInDown'
                    },
                    hideClass: {
                        popup: 'animate__animated animate__fadeOutUp'
                    }
                });     
                clearCliente();
                $('#cedula').val('');
            }
        });
    }
});

//Método para el ingreso a la aplicación por medio del login
$('#ingresar_login').click(function () {   
    var correo = $('#email').val();
    var password = $('#password').val();

    if(correo==='' || password===''){
        Swal.fire({
            icon: 'error',
            text: 'Por favor ingrese los datos',
            showClass: {
                popup: 'animate__animated animate__fadeInDown'
            },
            hideClass: {
                popup: 'animate__animated animate__fadeOutUp'
            }
        });     
    }else{
    $.ajax({
        type: "POST",
        url: "login.php",
        data: $("#formulario_ingreso").serialize(),
        success: function(data) {  
            if(data === "Datos correctos"){
                window.location.href="index.php";
            }
            if(data === "Datos erroneos"){
                Swal.fire({
                    icon: 'error',
                    text: 'Datos erroneos',
                    showClass: {
                        popup: 'animate__animated animate__fadeInDown'
                    },
                    hideClass: {
                        popup: 'animate__animated animate__fadeOutUp'
                    }
                });  
                $('#email').val('');
                $('#password').val('');   
            }
        }
    });
    }
});

//Obtener el id de la fatura de la tabla para ver los detalles 
var id_factu;
$('.view_products').click(function () {
    $tr=$(this).closest('tr');
    var datos = $tr.children("td").map(function (){
        return $(this).text();
    });
    id_factu = datos[0];
   
    $.ajax({
        url: "detalle_productos.php?var="+id_factu,
        type: "POST",
        success: function(data){
            //alert(data);
           // alert(JSON.parse(data));
            var produ = document.getElementById("cont_productos");
            produ.innerHTML = "";
            var datosPro = JSON.parse(data);
            createRow2(datosPro);   
        }
    });    
 });

 $('#modificar').click(function(){
    var paga = $('#pagaa option:selected').val();
    var tipo = $('#tipoo option:selected').val();
    var tipo2 = $('#tipoo option:selected').text();
   

    if(tipo2==="Efectivo"){
        refe = 0;
    }else{
        var refe = $('#ref').val();
    }

    $.ajax({
        url: "modificar_factura.php",
        type: "POST",
        data:{var: paga, var2: tipo, var3: refe, var4: id_},
        success: function(data){
         
           if(data==="Modificación de estado de la factura correcta"){
            Swal.fire({
                icon: 'success',
                text: 'Datos erroneos',
                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                }
            });  
            window.location.href="view_facturas_pendientes.php"; 
           }else{
            Swal.fire({
                icon: 'error',
                text: 'Ha ocurrido un error',
                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                }
            }); 
           }
        }
    });

});


 function createRow2(data) {                              //dynamically adding rows to the Table
    //design this according to your requirement    
    for(var i=0; i<data.length; i++){
    var trElement = `<tr>
    <td>`+data[i].cantidad+`</td>
    <td>`+data[i].producto+`</td>
    <td>`+data[i].precio_venta+`</td>
    <td>`+data[i].precio_total+`</td>
    <td>`+data[i].descuento+`</td>
    <td>`+data[i].impuesto+`</td>
    <td>`+data[i].fecha+`</td>  
    <td>`+data[i].empleado+`</td>   
    </tr>`;
    $('#cont_productos').append(trElement);  
    }  

}

//Buscar factura por el número de factura
var buscar_fac;
$('#buscarFac').click(function(){
    buscar_fac = $('#numberFac').val();
  
        $.ajax({
            url: "buscar_fact.php?var="+buscar_fac,
            method: "POST",
            success: function(data){
               if(data === "No se encuntran resultados con la búsqueda"){
                Swal.fire({
                    icon: 'error',
                    text: data,
                    showClass: {
                        popup: 'animate__animated animate__fadeInDown'
                    },
                    hideClass: {
                        popup: 'animate__animated animate__fadeOutUp'
                    }
                });
               }else{
                var contenidoFac = document.getElementById("pro");
                contenidoFac.innerHTML = "";
                var datosFac = JSON.parse(data);
                createRow3(datosFac);
                $('#numberFac').val('');
               }
            }
    });  
    
});

$('.atras').click(function(){  
    var contenidoFac = document.getElementById("cont_productos");
    contenidoFac.innerHTML = "";
});

function createRow3(data) {                              //dynamically adding rows to the Table
    //design this according to your requirement    
    for(var i=0; i<data.length; i++){
    var trElement = `<tr>
    <td>`+data[i].id+`</td>
    <td>`+data[i].total+`</td>
    <td>`+data[i].productos+`</td>
    <td>`+data[i].fecha+`</td>
    <td>`+data[i].tipo+`</td>
    <td>`+data[i].empleado+`</td>
    <td>`+data[i].cliente+`</td>  
    <td>`+data[i].sede+`</td>   
    <td>`+data[i].opcion+`</td>  
    </tr>`;
    $('#pro').append(trElement);    
    }  
}

//Buscar factura anulada por número de factura
var  buscar_fac2;
$('#buscarFac2').click(function(){
    buscar_fac2 = $('#numberFac').val();

    if(buscar_fac === ''){
        Swal.fire({
            icon: 'error',
            text: 'Ingrese número de búsqueda',
            showClass: {
                popup: 'animate__animated animate__fadeInDown'
            },
            hideClass: {
                popup: 'animate__animated animate__fadeOutUp'
            }
        });  
    }else{
        $.ajax({
            url: "buscar_fact.php?var="+buscar_fac2,
            method: "POST",
            success: function(data){
               if(data === "No se encuntran resultados con la búsqueda"){
                Swal.fire({
                    icon: 'error',
                    text: data,
                    showClass: {
                        popup: 'animate__animated animate__fadeInDown'
                    },
                    hideClass: {
                        popup: 'animate__animated animate__fadeOutUp'
                    }
                });
               }else{
                var contenidoFac = document.getElementById("pro2");
                contenidoFac.innerHTML = "";
                var datosFac = JSON.parse(data);
                createRow4(datosFac);
                $('#numberFac2').val('');
               }
            }
        });
    }
});



function createRow4(data) {                              //dynamically adding rows to the Table
    //design this according to your requirement    
    for(var i=0; i<data.length; i++){
    var trElement = `<tr>
    <td>`+data[i].id+`</td>
    <td>`+data[i].total+`</td>
    <td>`+data[i].productos+`</td>
    <td>`+data[i].fecha+`</td>
    <td>`+data[i].tipo+`</td>
    <td>`+data[i].empleado+`</td>
    <td>`+data[i].cliente+`</td>  
    <td>`+data[i].sede+`</td>   
    <td>`+data[i].opcion+`</td>  
    </tr>`;
    $('#pro2').append(trElement);
    
    }  

}

//Agregar los datos de la fila seleccionada el formulario
$('.editbtn').click(function () {
    $tr=$(this).closest('tr');
    var datos = $tr.children("td").map(function (){
        return $(this).text();
    });
    $('#update_id').val(datos[0]);
    $('#nombre1').val(datos[1]);
    $('#empresa1').val(datos[2]);
    $('#direccion1').val(datos[3]);
    $('#telefono1').val(datos[4]);
    $('#correo1').val(datos[5]); 
    $('#documento1').val(datos[6]);
    $('#nit1').val(datos[7]);
 });

 var tipo_domi;
$('.groupTipo').click(function(){
    tipo_domi = $(this).val();
    if(tipo_domi === "Presencial"){
        $('.pago').show();
    }else{
        $('.pago').hide();
    }
    

});

var emple;
$('#domiciliario').click(function(){
    emple = $('#domi').val();
    $('.pago').show();
});

var pago;
var referencia;
//Esconder div de método de pago en efectivo
 $('.groupPago').click(function () {
    pago = $(this).val();

    if(tipo_domi === "Presencial"){
        if(pago === "Efectivo"){
            $('#efectivo').show();
            $('#credito').hide();
            $('#debito').hide();
    
        }
        if(pago === "Tarjeta debito"){
            $('#efectivo').hide();
            $('#credito').hide();
            $('#links').hide();
    
            Swal.fire({
                title: '¿Se aprobó la transacción?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: ' #25A01B',
                cancelButtonColor: '#d33',
                confirmButtonText: '¡OK!'
              }).then((result) => {
                if (result.isConfirmed) {
                    $('#debito').show();
                    const value = $('#total').val();
                    var chain = String(value.replace(/\D/g, ""));
                    const newValue = new Intl.NumberFormat('en-US').format(chain);
                    $('#total_venDe').val("$ " + newValue);
    
                } else if (
                    result.dismiss === Swal.DismissReason.cancel
                  ) {
                    $('#debito').hide();
                  }
              })
        }
        if(pago === "Tarjeta credito"){
            $('#efectivo').hide();
            $('#debito').hide();
            $('#links').hide();
            Swal.fire({
                title: '¿Se realizó la transacción?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: ' #25A01B',
                cancelButtonColor: '#d33',
                confirmButtonText: '¡OK!'
              }).then((result) => {
                if (result.isConfirmed) {
                    $('#credito').show();
                    const value = $('#total').val();
                    var chain = String(value.replace(/\D/g, ""));
                    const newValue = new Intl.NumberFormat('en-US').format(chain);
                    $('#total_venCre').val("$ " + newValue);
     
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                  ) {
                    $('#credito').hide();   
                  }
              })    
        }
        if(pago === "Link de pago"){
            $('#efectivo').hide();
            $('#debito').hide();
            $('#credito').hide();
            Swal.fire({
                title: '¿Se realizó la transacción?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: ' #25A01B',
                cancelButtonColor: '#d33',
                confirmButtonText: '¡OK!'
              }).then((result) => {
                if (result.isConfirmed) {
                    $('#credito').show();
                    const value = $('#total').val();
                    var chain = String(value.replace(/\D/g, ""));
                    const newValue = new Intl.NumberFormat('en-US').format(chain);
                    $('#total_venCre').val("$ " + newValue);
     
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                  ) {
                    $('#links').hide();   
                  }
              })    
        }

    }else if(tipo_domi === "Domicilios"){
        $('#efectivo').hide();
        $('#credito').hide();
        $('#debito').hide();
        $('#links').hide();

    }
 });

 //Colocar signo de $ y comas 
 $('#valor_ingre').on('keyup', () => {
    const value = $('#valor_ingre').val();
    var chain = String(value.replace(/\D/g, ""));
    const newValue = new Intl.NumberFormat('en-US').format(chain);
    $('#valor_ingre').val("$ " + newValue);

});

$('#prueba').click(function(){
    const value = $('#total').val();
    var chain = String(value.replace(/\D/g, ""));
    const newValue = new Intl.NumberFormat('en-US').format(chain);
    $('#total_web').val("$ " + newValue);
});

$('#total_web').keydown(function(e){
    e.preventDefault();
    try {                
        if ((e.keyCode == 8 || e.keyCode == 46))
            return false;
        else
            return true;  
                   
    }
    catch (Exception)
    {
        return false;
    }

});
var nombre_producto;
var tipo;
//Esconder formulario de busqueda
$(document).ready(function(){
    //$('#menuToggle').trigger('click')
    document.getElementById("menuToggle").click();
    //Esconder formulario de busqueda 
    //Esconder duv de metodo de pago efectivo
    $('#efectivo').hide();
    $('#credito').hide();
    $('#debito').hide();
    $('#total').val(0);
    $('.pago').hide();
    $('#links').hide();

    $('#producto').focus();

     //Autocompletar de productos
    $('#producto').typeahead({
        source: function(query,result){
            $.ajax({
                url:"get_var.php",
                method:"POST",
                data:{query:query},
                dataType:"json",
                success:function(data){
                    result($.map(data,function(item){
                        return item;
                    }));
                    
                }
            });
        },
        updater : function(item) {
            this.$element[0].value = item;
            nombre_producto = item;
            $.ajax({
                url:"get_image.php?var="+item,
                method:"POST",    
                success:function(data){
                    //alert(data);   
                    $('#productos').html(data);        
                }
            });
            /*$("#cantidad").prop('disabled', false);
            $("#pesooo").prop('disabled', false);*/
            $.ajax({
                
                url:"ocultar.php?var="+nombre_producto,
                method:"POST",    
                success:function(data){ 
                     tipo = data;   
                 
                     if(tipo==="cantidad"){
                        $('#cantidad').focus();
                        $("#pesooo").val('');
                    }
                    if(tipo==="peso"){
                        $('#pesooo').focus();
                        $("#cantidad").val('');
                        
                    }        
                }
            });
            
            return item;    
        }
    });

    $('#domi').typeahead({
        source: function(query,result){
            $.ajax({
                url:"get_empleado.php",
                method:"POST",
                data:{query:query},
                dataType:"json",
                success:function(data){
                    result($.map(data,function(item){
                        return item;
                    }));
                    
                }
            });
        },
        updater : function(item) {
            this.$element[0].value = item;
            nombre_producto = item;
            $.ajax({
                url:"get_image.php?var="+item,
                method:"POST",    
                success:function(data){
                    //alert(data);   
                    $('#productos').html(data);        
                }
            });

            return item;    
        }
    });


});

$('.editarDomi').click(function(){
    $tr=$(this).closest('tr');
    var datos = $tr.children("td").map(function (){
        return $(this).text();
    });
    id_= datos[0];
    var total = datos[1];
    tipo_ = datos[4];
    var sipaga = datos[9];
    referencia_pago = datos[10];

    var chain = String(total.replace(/\D/g, ""));
    const newValue = new Intl.NumberFormat('en-US').format(chain);
    total = "$ " + newValue;

    $.ajax({
        url: "detalle_factura.php",
        type: "POST",
        data:{var: id_, var2: sipaga, var3: referencia_pago, var4: tipo_, var5: total},
        success: function(data){
            var contenido = document.getElementById("cambiosFact");
            contenido.innerHTML = "";
            $('#cambiosFact').html(data);
            
         //alert(data);           
        }
    });

});

//Desabilitar editar y eliminación del datos dentro del input
//keydown
$('#pesooo').keypress(function (evt) {
    evt.preventDefault();
    try {                
        if ((evt.keyCode == 8 || evt.keyCode == 46))
            return false;
        else
            return true;  
                   
    }
    catch (Exception)
    {
        return false;
    }
});


$('#total_venCre').keypress(function (evt) {
    evt.preventDefault();
    try {                
        if ((e.keyCode == 8 || e.keyCode == 46))
            return false;
        else
            return true;               
    }
    catch (Exception)
    {
        return false;
    }
});

$('#total_venDe').keypress(function (evt) {
    evt.preventDefault();
    try {                
        if ((e.keyCode == 8 || e.keyCode == 46))
            return false;
        else
            return true;               
    }
    catch (Exception)
    {
        return false;
    }
});

//Capturar el peso de forma actomática cuando se situe el cursos dentro del input
$("#pesooo").focus(function(e) {

    $('#pesooo').val(1);
    $('#peso').val(1);
    /*$.ajax({
        url: "lectura.php",
        success: function(data) {
            $('#pesooo').val(data);
            $('#peso').val(data);
        }
    });*/
});   


var datos = [];
var DataArray = [];
var total=0;
var cant;
var cont = 0;
//var descuento = 0, impuesto = 0;
//Enviar datos por con enter

$('.selec').keypress(function (e) {
    var producto = $('#producto').val();
    var cantidad = $('#cantidad').val();
    var peso = $('#peso').val();
    var codigo = $('#producto1').val();

    if(e.which == 13) {
        
        if(tipo==="cantidad" && cantidad===''){  
            $('#cantidad').focus();      
            Swal.fire({
                icon: 'error',
                text: 'Por favor ingrese la cantidad',
                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                } 
            });     
            $('#peso').val('');  
            $('#pesooo').val(''); 
        }else if(tipo==="peso" && peso===''){
            $('#pesooo').focus(); 
            Swal.fire({
                icon: 'error',
                text: 'Por favor ingrese el peso',
                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                }
            });         
            $('#cantidad').val('');
        }else{
            if(tipo_cliente===0){
                Swal.fire({
                    icon: 'error',
                    text: 'Por favor ingrese cliente',
                    showClass: {
                        popup: 'animate__animated animate__fadeInDown'
                    },
                    hideClass: {
                        popup: 'animate__animated animate__fadeOutUp'
                    }
                });     
            }else{ 
                if(peso === ''){
                    cant = cantidad;
                }
                if(cantidad === ''){
                    cant = peso;
                }
                //Verificar la disponibilidad del producto seleccionado 
                //Colocar luego el codigo comentado y el vectos de ventas 
                cont = cont + 1;
                $.ajax({
                    type: "POST",
                    url: "ingresar_tabla.php?var="+tipo_cliente+"&var2="+cont,
                    data: $("#venta").serialize(),
                    success: function(data) {
                        //alert(data);
                        DataArray = JSON.parse(data);  
                                        createRow(DataArray);
                                        deleteRow(datos);  
                                        //alert(JSON.stringify(DataArray));
                                        //Recorrer el array temporal para llenar el nuevo JSON
                                       
                                        $.each(DataArray, function(i, _data) {
                                            var id = _data.id;
                                            var codigo =  _data.codigo;
                                            var cantidad =  parseInt( _data.cantidad);
                                            var producto =  _data.producto;
                                            var peso =  parseFloat(_data.peso);
                                            var precio = parseFloat(_data.precio);
                                            var impuesto =  parseInt(_data.impuesto);
                                            var descuento = parseInt(_data.descuento);
                                            var total = parseFloat(_data.total);
                                            
                                            datos.push({
                                                'id': id,
                                                'codigo': codigo,
                                                'cantidad': cantidad,
                                                'producto': producto,
                                                'peso': peso,
                                                'precio' : precio,
                                                'impuesto': impuesto,
                                                'descuento': descuento,
                                                'total' : total
                                            })
                                    
                                        });
                                        //Suma de los total por productos seleccionados
                                        $.each(datos, function(i, _data) {
                                            
                                            total += parseFloat(_data.total);
                                        });
                                        
                                        $('#producto').val('');
                                        $('#cantidad').val('');
                                        $('#peso').val('');
                                        $('#producto1').val('');
                                        
                                        
                                        const newValue = new Intl.NumberFormat('en-US').format(total.toString());
                                        
                                        if(datos.length===0){
                                            $('#total').val('');
                                        }else{
                                            $('#total').val("$" + newValue);
                                        } 
                                        total = 0;
                                   
                    }
                    
                    /*type: "POST",
                    url: "disponibilidad.php?var="+nombre_producto,
                    data:{var2: cant},
                    success: function(data) {
                      
                        if(data==="Hay disponibilidad"){
                            //Si se encuentra disponibilidad de agregar al JSON y la tabla
                            cont = cont + 1;
                             $.ajax({
                                    type: "POST",
                                    url: "ingresar_tabla.php?var="+tipo_cliente+"&var2="+cont,
                                    data: $("#venta").serialize(),
                                    success: function(data) {
                                       // alert(data);
                                        DataArray = JSON.parse(data);  
                                         
                                        createRow(DataArray);
                                        deleteRow(datos);  
                                        //alert(JSON.stringify(DataArray));
                                        //Recorrer el array temporal para llenar el nuevo JSON
                                       
                                        $.each(DataArray, function(i, _data) {
                                            var id = _data.id;
                                            var codigo =  _data.codigo;
                                            var cantidad =  parseInt( _data.cantidad);
                                            var producto =  _data.producto;
                                            var peso =  parseFloat(_data.peso);
                                            var precio = parseFloat(_data.precio);
                                            var impuesto =  parseInt(_data.impuesto);
                                            var descuento = parseInt(_data.descuento);
                                            var total = parseFloat(_data.total);
                                            
                                            datos.push({
                                                'id': id,
                                                'codigo': codigo,
                                                'cantidad': cantidad,
                                                'producto': producto,
                                                'peso': peso,
                                                'precio' : precio,
                                                'impuesto': impuesto,
                                                'descuento': descuento,
                                                'total' : total
                                            })
                                    
                                        });
                                        //Suma de los total por productos seleccionados
                                        $.each(datos, function(i, _data) {
                                            
                                            total += parseFloat(_data.total);
                                        });
                                        
                                        $('#producto').val('');
                                        $('#cantidad').val('');
                                        $('#peso').val('');
                                        $('#producto1').val('');
                                        
                                        
                                        const newValue = new Intl.NumberFormat('en-US').format(total.toString());
                                        
                                        if(datos.length===0){
                                            $('#total').val('');
                                        }else{
                                            $('#total').val("$" + newValue);
                                        } 
                                        total = 0;
                                        //cont = 0;
                                    }   
                                   
                                });
                                //Sincronizar los nuevos productos con la eliminación y agregación
                                venta = datos;
                                $('#pesooo').val('');
                                $('#peso').val('');

                        //Mensaje de no existencia de disponibilidad del producto
                        }else if(data==="Excede la disponibilidad del producto" || data==="No se encuentra disponibilidad del producto" || data === "El producto no se encuentra en stock" || data ==="El producto no existe"){
                            Swal.fire({
                                icon: 'error',
                                text: data,
                                showClass: {
                                    popup: 'animate__animated animate__fadeInDown'
                                },
                                hideClass: {
                                    popup: 'animate__animated animate__fadeOutUp'
                                }
                            });    
                        }
                    }*/
                    
                });
                venta = datos;
                $('#pesooo').val('');
                $('#peso').val('');
               
            }       
        }//IF DE VALIDAR DATOS VACIOS
    }//IF DEL ENTER

});
var venta = [];

//Cambio de la caja del pago en efectivo
$('#valor_ingre').keypress(function (e) {
    var totaal = parseInt($('#total').val().replace(/[^a-zA-Z0-9]/g, ''));
    var valor_ingre = parseInt($('#valor_ingre').val().replace(/[^a-zA-Z0-9]/g, ''));
    if(e.which == 13) {
        var residuo = valor_ingre-totaal;
        const newValue = new Intl.NumberFormat('en-US').format(residuo.toString().replace(/\D/g, ""));
        $('#vueltas').val("$" + newValue);
    }
});   

//Ingreso de JSON de los productos para descontarlos de stock y realizar la posterior venta
var id_factura;

//Realizar modificaciones de la facrtura y hacer el pago de la compra 
$('#pagar').click(function(){
    if($('#id_factCre').val()===''){
        referencia =  referencia = $('#id_factDe').val();
        $('#id_factDe').val('');
    }else{
        referencia =  referencia = $('#id_factCre').val();
        $('#id_factCre').val('')
    }
    $.ajax({
        type:"POST",
        url: "detalle_venta.php?cliente="+cedula_cliente,
        data: {var: venta},  
        success: function(data) {
            id_factura = data;
            $('#ggg').val(data);
            var cost = parseInt($('#valor_ingre').val().replace(/[^a-zA-Z0-9]/g, ''));
            var total = parseInt($('#total').val().replace(/[^a-zA-Z0-9]/g, ''));

            if(tipo_domi ==="Presencial"){
                if(pago==="Efectivo"){
                    $('#g2').val(cost);
                }else{
                    $('#g2').val(total);
                }
            }else{
                $('#g2').val(total);
            }
                $.ajax({
                type:"POST",
                url: "agregar_factura.php",
                //data:{tipo_pago: pago, id:  id_factura, refe: referencia, var2: tipo_domi, var3: emple},
                data:{tipo_pago: pago, id:  id_factura, refe: referencia, var2: tipo_domi, var3: emple},
                success: function(data) {
                    if(data==="No se hicieron cambios" || data==="No hay detalle de venta"){
                        Swal.fire({
                            icon: 'error',
                            text: data,
                            showClass: {
                                popup: 'animate__animated animate__fadeInDown'
                            },
                            hideClass: {
                                popup: 'animate__animated animate__fadeOutUp'
                            }
                        });     
                    }else{
                        document.getElementById("submitButton1").click();
                        var myVar = setInterval(myTimer, 2000);
                    }
                }
            });
        }
    });
    
});

function myTimer() {
    window.location.href="index.php";  
    var contenidoVen = document.getElementById("cont_ventas");
    contenidoVen.innerHTML = "";
    $('#valor_ingre').val('');
    $('#vueltas').val('');
    $('#efectivo').hide();
    $('#total').val('');
  }


//Realizar descuento de la disponibilidad del producto (si se requiere)
$('#volver_stock').click(function(){
    //alert(JSON.stringify(venta));
    $.ajax({
        type:"POST",
        url: "detalle_venta.php?cliente="+cedula_cliente,
        data: {var: venta},  
        success: function(data) {
            id_factura = data;
            $.ajax({
                type:"POST",
                url: "volverStock.php?fac="+id_factura,
                data: {var: venta, tipo_pago: pago},
            
                success: function(data) {
                    //alert(data);
                    if(data==="Factura anulada"){
                        Swal.fire({
                            icon: 'success',
                            text: data,
                            showClass: {
                                popup: 'animate__animated animate__fadeInDown'
                            },
                            hideClass: {
                                popup: 'animate__animated animate__fadeOutUp'
                            }
                        });   
                        window.location.href="index.php";  
        
                    }
                    if(data ==="No se anulo la factura"){
                        Swal.fire({
                            icon: 'error',
                            text: data,
                            showClass: {
                                popup: 'animate__animated animate__fadeInDown'
                            },
                            hideClass: {
                                popup: 'animate__animated animate__fadeOutUp'
                            }
                        });     
                    }
                    var contenidoVen = document.getElementById("cont_ventas");
                        contenidoVen.innerHTML = "";
                      $('#total').val('');   
                }
            });
        }
    });
   
});
  
//Descontar del inventario para pagos por las otras plataformas electrónicas
$('#descontar').click(function(){
    //alert(JSON.stringify(venta));
    var codigo = $('#codigo_inve').val();
    var tipo_pa = $('#tipoPa option:selected').val();
    if(codigo === ''){
        Swal.fire({
            icon: 'error',
            text: 'Ingrese número de factura',
            showClass: {
                popup: 'animate__animated animate__fadeInDown'
            },
            hideClass: {
                popup: 'animate__animated animate__fadeOutUp'
            }
        });     

    }else{
        $.ajax({
            type:"POST",
            url: "volverStock2.php?codigo="+codigo,
            data: {var: venta, var3: cedula_cliente, var4: tipo_pa},
            success: function(data) {
             
                if(data==="Cambios realizados"){
                    Swal.fire({
                        icon: 'success',
                        text: data,
                        showClass: {
                            popup: 'animate__animated animate__fadeInDown'
                        },
                        hideClass: {
                            popup: 'animate__animated animate__fadeOutUp'
                        }
                    });   
                    $('#codigo_inve').val('');  
                    window.location.href="index.php";  

                }
                if(data ==="No se realizaron cambios"){
                    Swal.fire({
                        icon: 'error',
                        text: data,
                        showClass: {
                            popup: 'animate__animated animate__fadeInDown'
                        },
                        hideClass: {
                            popup: 'animate__animated animate__fadeOutUp'
                        }
                    });   
                    $('#codigo_inve').val('');    
                }
            }
        });
    }
});

//Buscardor en tiempo real para la búsqueda de facturas
$("#numberFac").keyup(function(){
    _this = this;
    $.each($("#taable tbody tr"), function() {
        if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
           $(this).hide();
        else
           $(this).show();                
    });
}); 

//Buscardos en tiempo real para la búsqueda de facturas anuladas
$("#numberFac2").keyup(function(){
    _this = this;
    $.each($("#taaable tbody tr"), function() {
        if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
           $(this).hide();
        else
           $(this).show();                
    });
}); 

//Buscador en tiempo real para la búsqueda de cliente
$("#num").keyup(function(){
    _this = this;
    // Muestra los tr que concuerdan con la busqueda, y oculta los demás.
    $.each($("#tabla tbody tr"), function() {
        if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
           $(this).hide();
        else
           $(this).show();                
    });
}); 

var idFac;
//Acción para la generación de facturas en formato pdf

/*$('.impri').click(function(){
    /*$tr=$(this).closest('tr');
        var datos = $tr.children("td").map(function (){
            return $(this).text();
        });
    idFac = datos[0];*/
    //var prueba = document.getElementById("gg").value;
    //alert(prueba);
    //var prueba = document.getElementById('submitButton').value();
    //window.open("generar_pdf.php");
    /*$.ajax({
        url:"generar_pdf.php?var=4",
        method: "GET",
        success: function(data){
            //alert(data);
            window.open("generar_pdf.php");
        }
    });
});*/

//Eliminar registro del pedido y del array
function deleteRow(data){  
    $('.eliRows').click(function () {
        $tr=$(this).closest('tr');
        var datos = $tr.children("td").map(function (){
            return $(this).text();
        });
        var cod = datos[0];
     
        for(var i=0; i<data.length;i++) {
            if(String(data[i].id)===cod){
                var cost = parseInt($('#total').val().replace(/[^a-zA-Z0-9]/g, ''));
                var nuevo = cost-data[i].total;
                nuevo = new Intl.NumberFormat('en-US').format(nuevo.toString());
                $('#total').val("$"+nuevo);
                data.splice(i, 1);    
            }
        }  
        venta = JSON.parse(JSON.stringify(data));
        
        $(this).closest('tr').remove();
    });
}

//Agregar dinaminicamente columnas a la tabla del array de producto
function createRow(data) {                             
                     
    for(var i=0; i<data.length; i++){
    var trElement = `<tr>
    <td style="display:none">`+data[i].id+`</td>
    <td>`+data[i].codigo+`</td>
    <td>`+data[i].cantidad+`</td>
    <td>`+data[i].producto+`</td>
    <td>`+data[i].peso+`</td>
    <td>`+data[i].precio+`</td>
    <td>`+data[i].impuesto+`</td>
    <td>`+data[i].descuento+`</td>
    <td>`+data[i].total+`</td>
    <td>`+data[i].opcion+`</td>  
    
    </tr>`;
    $('#cont_ventas').append(trElement);
    //trElement += "<td >" + data[i] + "</td>";
    }  
    //return trElement;
}



/*$('#groupBotones').click(function () {
    categorias = $(this).val();
    alert(categorias);
    /*$.ajax({
        type: "POST",
        url: 'get_var.php?var='+categorias,
        success: function(data) {
            productos = data;
        }
    });
});*/
