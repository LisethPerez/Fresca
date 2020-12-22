<?php 
$idFac = $_POST['var'];
$sipaga = $_POST['var2'];
$referencia = $_POST['var3'];
$pago = $_POST['var4'];
$total = $_POST['var5'];

if($sipaga==0){
    $sipaga = "No";
}else{
    $sipaga = "Si";
}

include 'conexionBD.php';
$consulta = "SELECT * FROM tipo_pago";
$sql = mysqli_query($conn,$consulta) or die(mysqli_error($conn));

echo '<div class="row">';
echo '<div class="col">';
echo '<label>La factura N°'. htmlspecialchars($idFac) .' <strong>'. htmlspecialchars($sipaga) .'</strong> se encuentra pagada</label>';
echo '</div>';
echo '<div class="col">';
echo '<label>¿Desea marcarla como pagada?</label>';
echo '<select id="pagaa">';
echo '<option value="1">Si</option>';
echo '<option value="0">No</option>';
echo '</select>';
echo '</div>';
echo '</div>';
echo '<hr>';

echo '<div class="row">';
echo '<div class="col">';
echo '<label>El tipo de pago de la factura N°'. htmlspecialchars($idFac) .' es: <strong>'.htmlspecialchars($pago).'</strong> </label>';
echo '</div>';
echo '<div class="col">';
echo '<label>¿Desea cambiar el tipo de pago?</label>';
echo '<select id="tipoo">';
while($valores = mysqli_fetch_object($sql)){
    if($valores->nombre==$pago){
        $sele = 'selected="selected"';      
    }else{
        $sele = '';
    }
    echo '<option value="'.$valores->id_tpago.'" '.$sele.'>'.$valores->nombre.'</option>';
   // echo '<option value="'.$valores->id_tpago.'">'.$valores->nombre.'</option>';
   
}
echo '</select>';
echo '</div>';
echo '</div>';
echo '<hr>';

echo '<div class="row">';
echo '<div class="col">';
echo '<strong>Total Factura</strong>';
echo '<input type="text" class="form-control" onkeypress="return onlyNums(event)" value="'.htmlspecialchars($total) .'"  disabled></input>';
echo '</div>';
echo '<div class="col" id="depe">';

if($pago!="Efectivo"){
    echo '<strong>Ingrese el número de referencia de pago</strong>';
    echo '<input type="text" class="form-control" id="ref" name="ref" onkeypress="return onlyNums(event)" style="width:200px;"></input>';

}else{
    echo '<strong>Valor recibido</strong>';
    echo '<input type="text" class="form-control" id="valor_ingresado" name="valor_ingresado" onkeypress="return onlyNums(event)" value=""></input>';
}

echo '</div>';
echo '</div>';
?>


<script>
$('#tipoo').change(function(){
    
    var selectedValue = $('#tipoo option:selected').text();
    if(selectedValue!=="Efectivo"){
        $('#depe').html('<strong>Ingrese el número de referencia de pago</strong><input type="text" class="form-control" id="ref" name="ref" onkeypress="return onlyNums(event)" style="width:200px;"></input>');
        
    }else{
        $('#depe').html('<strong>Valor recibido</strong><input type="text" class="form-control" id="valor_ingresado" name="valor_ingresado" onkeypress="return onlyNums(event)" value=""></input>');
    }

});

$('#valor_ingresado').on('keyup', () => {
    const value = $('#valor_ingresado').val();
    var chain = String(value.replace(/\D/g, ""));
    const newValue = new Intl.NumberFormat('en-US').format(chain);
    $('#valor_ingresado').val("$ " + newValue);
    
});
</script>