<?php
 include ("../../bd.php");
 include("../../funciones.php");
 
 ?>

 <?php 
 // Llamar a Header
 mostrar_header(); ?>
 
 
<?php 

// puedo fixear la consulta sql funciona pero no esta bine hecha
$sentencia=$conexion->prepare("
SELECT `tbl_reembolso`.`id`, `rut_usuario`, `tipo_reembolso`, `fechasolicitud`, `fechaprestacion`, `estado`, `tbl_tipo_reembolso`.`descripcion`
FROM `tbl_reembolso` 
JOIN `tbl_tipo_reembolso`  ON `tbl_tipo_reembolso`.`id` = `tbl_reembolso`.`tipo_reembolso`;   
    JOIN tbl_tipo_reembolso ON tbl_reembolso.tipo_reembolso = tbl_tipo_reembolso.id
    JOIN tbl_estado_reembolso ON tbl_reembolso.estado = tbl_estado_reembolso.id
    JOIN tbl_usuarios ON tbl_reembolso.rut_usuario = tbl_usuarios.rut;
");



$sentencia->execute();
$lista_tbl_reembolso=$sentencia->fetchALL(PDO::FETCH_ASSOC);

?>



<?php 
?>


<br><br>
<title> Listado de Reembolso</title>

<center><h4> Pedido de Reembolsos</h4></center>
<div class="card">
    
    <div class="card-header">
        Listado de Permisos <a name="pedir" id="pedir" class="btn btn-primary" href="pedir.php" role="button">Pedir Reembolso</a>
    </div>
    <div class="card-body">
<div class="table-responsive-sm">
    <table class="table" id="tabla_id">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Rut</th>
                <th scope="col">Tipo De Reembolso</th>
                <th scope="col">Fecha Solicitud</th>
                <th scope="col">Fecha Prestación</th>
                <th scope="col">Estado </th>
        
            </tr>
        </thead>
        <tbody>
        
        <?php foreach($lista_tbl_reembolso as $registro){?>

            <tr class="">
                <td scope="row"><?php echo $registro['id']; ?></td>
                <td><?php echo $registro['rut_usuario']; ?></td>
                <td><?php echo $registro['descripcion']; ?></td>
                <td><?php echo $registro['fechasolicitud']; ?></td>      
                <td><?php echo $registro['fechaprestacion']; ?> </td>
                <td><?php echo("Este Dato no puede salir"); ?> </td>
            
                
            </tr>
            <?php } ?>
            
        </tbody>
    </table>
</div>

    </div>
    <div class="card-footer text-muted">
    </div>
</div>
<script>
    $('.check-jefedirecto').on('change', function (e) {
        console.log(e.target.checked);
        // aqui hago una llamada asincrona para actualizar el registro
        // $(this).attr('data-id') tiene el id del registro en bd
        // e.target.checked trae un booleano si esta o no checkeado el checkbox
        let request = $.ajax({
            url: "save.php?type=jefedirecto",
            method: "POST",
            data: { id : $(this).attr('data-id'), check: e.target.checked},
            dataType: "html"
        });

        request.done(function( msg ) {
            let result = JSON.parse(msg);
            if (!result.error) {
                alert(result.msg);
            }
        });
    });
</script>

<script>
    $('.check-jefecesfam').on('change', function (e) {
        console.log(e.target.checked);
        // aqui hago una llamada asincrona para actualizar el registro
        // $(this).attr('data-id') tiene el id del registro en bd
        // e.target.checked trae un booleano si esta o no checkeado el checkbox
        let request = $.ajax({
            url: "save.php?type=jefecesfam",
            method: "POST",
            data: { id : $(this).attr('data-id'), check: e.target.checked},
            dataType: "html"
        });

        request.done(function( msg ) {
            let result = JSON.parse(msg);
            if (!result.error) {
                alert(result.msg);
            }
        });
    });
</script>
<script>
    $('.check-rrhh').on('change', function (e) {
        console.log(e.target.checked);
        // aqui hago una llamada asincrona para actualizar el registro
        // $(this).attr('data-id') tiene el id del registro en bd
        // e.target.checked trae un booleano si esta o no checkeado el checkbox
        let request = $.ajax({
            url: "save.php?type=rrhh",
            method: "POST",
            data: { id : $(this).attr('data-id'), check: e.target.checked},
            dataType: "html"
        });

        request.done(function( msg ) {
            let result = JSON.parse(msg);
            if (!result.error) {
                alert(result.msg);
            }
        });
    });
</script>

<?php include("../../templates/footer.php"); ?>