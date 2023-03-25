
<?php
session_start();
 include("../../bd.php");

//2 horas 51 tipo de permiso COMBOBOX TIPO DE PERMISOS
$sentencia=$conexion->prepare("
SELECT
    tbl_permisos.id as id,
    tu.nombre,
    tipopermiso,
    fechasolicitud,
    fechapermiso,
    permisohasta,
    tipojornada,
    jefedirecto,
    jefecesfam,
    rrhh,
    estado_permiso,
    detalles,
    firmadirecto,
    firmacesfam,
    firmarrhh
FROM tbl_permisos
         join tbl_tipo_permiso ttp on ttp.id = tbl_permisos.idtipopermiso
         join tbl_jornada tj on tj.id = tbl_permisos.jornada
join tbl_usuarios tu on tu.rut = tbl_permisos.idempleado");
$sentencia->execute();
$lista_tbl_permisos=$sentencia->fetchALL(PDO::FETCH_ASSOC);

?>
<?php  $sentencia=$conexion -> prepare ("select * from tbl_estado_permiso");
$sentencia ->execute();
$lista_tbl_puestos=$sentencia->fetchALL(PDO::FETCH_ASSOC);?>
<?php

switch($_SESSION['tipousuario']){
case 1:
  // TIPO USUARIO NORMAL 

include("../../templates/usuario/header.php");
break;
case 2:

  // JEFE DIRECTO
 
  include("../../templates/jefe-directo/header.php");
break;
case 3:

  // JEFE CESFAM

include("../../templates/jefe-cesfam/header.php");
break;
case 4:
  // ADMIN
include("../../templates/admin/header.php");
break;  

}
?>




<br><br>
<title>Listado de Permisos </title>
<center><h4> Listado de Permisos </h4></center>
<div class="card">
    
    <div class="card-header">
        Listado de Permisos <a name="pedir" id="pedir" class="btn btn-primary" href="pedir.php" role="button">Pedir Permiso</a>
    </div>
    <div class="card-body">
<div class="table-responsive-sm">
    <table class="table" id="tabla_id">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Trabajador</th>
                <th scope="col">Tipo De Permiso</th>
                <th scope="col">Fecha Solicitud</th>
                <th scope="col">Fecha Permiso</th>
                <th scope="col">Permiso Hasta</th>
                <th scope="col">Jornada</th>
                <th scope="col">Jefe Directo</th>
                <th scope="col">Jefe CESFAM</th>
                <th scope="col">RRHH</th>
                <th scope="col">estado</th>
                <th scope="col">Detalles </th>
                
            </tr>
        </thead>
        <tbody>
        
        <?php foreach($lista_tbl_permisos as $registro){?>

            <tr class="">
                <td scope="row"><?php echo $registro['id']; ?></td>
                <td><?php echo $registro['nombre']; ?></td>
                <td><?php echo $registro['tipopermiso']; ?></td>
                <td><?php echo $registro['fechasolicitud']; ?></td>
                <td><?php echo $registro['fechapermiso']; ?></td>
                <td><?php echo $registro['permisohasta']; ?></td>
               <td> <?php echo $registro['tipojornada']; ?></td>
               
                <td>
                    <div class="form-check">
                     <input class="form-check-input check-jefedirecto" type="checkbox" id="jefedirecto" <?php echo $registro['jefedirecto'] ? 'checked' : '' ;?>  data-id="<?php echo $registro['id'];?>">
                    <label class="form-check-label" for="jefedirecto">
                    Revisado Por   <?php echo $registro['firmadirecto'] ?> 
                     </label>
                     
                    </div> 
                </td>
                <td> 
                <div class="form-check">
                <input class="form-check-input check-jefecesfam" type="checkbox" id="jefecesfam" <?php echo $registro['jefecesfam'] ? 'checked' : '' ;?>  data-id="<?php echo $registro['id'];?>">
                    <label class="form-check-label" for="jefecesfam">
                    Revisado Por   <?php echo $registro['firmacesfam'] ?> 
                  </label>
                </div>
                </td>
                <td> <div class="form-check">
                <input class="form-check-input check-rrhh" type="checkbox" id="rrhh" <?php echo $registro['rrhh'] ? 'checked' : '' ;?>  data-id="<?php echo $registro['id'];?>">
                    <label class="form-check-label" for="rrhh">
                    Revisado Por   <?php echo $registro['firmarrhh'] ?>
                     
                  </label>
                </div></td>
                <td>  <label for="idpuesto" class="form-label"></label>
  <select  class="form-select form-select-sm estado_permiso" name="estado_permiso" id="estado_permiso" data-id="<?php echo $registro['id'];?>">
    
        <?php foreach($lista_tbl_puestos as $permiso){?>
            <option value="<?php echo $permiso['id']?>" <?php echo $registro['estado_permiso'] == $permiso['id'] ? 'selected':'';?>>
            <?php echo $permiso['estado_permiso'] ?> </option>
            <?php } ?> </select></td>
            <td> <?php echo $registro['detalles']; ?></td>    
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
    $('.estado_permiso').on('change', function (e) {
        console.log($(this).val());
        let request = $.ajax({
            url: "save.php?type=estado_permiso",
            method: "POST",
            data: { id : $(this).attr('data-id'), select: $(this).val()},
            dataType: "html"
        });

    });


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