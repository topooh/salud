<?php   include("../../../../bd.php");
require ("../../../../funciones.php");

if(!isset($_SESSION['usuario'])){// obliga a redireccionar si no esta iniciado la secion.
   
  header("Location:".$url_base."../../../../login.php"); // no me esta tomando $url_base

}else{

}
if ($_SESSION['tipousuario'] != 3) {
  
  // El usuario no tiene acceso a esta página, redirige al usuario a la página de inicio
  header("Location:".$url_base."../../../../index.php");
  echo("No tienes permisos");
}

//2 horas 51 tipo de permiso COMBOBOX TIPO DE PERMISOS
$sentencia=$conexion->prepare("
SELECT
    tbl_permisos.id as id,
    tu.nombre,
    tu.apellido_pat,
    tu.apellido_mat,
    tipopermiso,
    fechasolicitud,
    fechapermiso,
    permisohasta,
    tipojornada,
    jefedirecto,
    jefecesfam
FROM tbl_permisos
         join tbl_tipo_permiso ttp on ttp.id = tbl_permisos.idtipopermiso
         join tbl_jornada tj on tj.id = tbl_permisos.jornada
join tbl_usuarios tu on tu.rut = tbl_permisos.idempleado

where jefedirecto=1 and jefecesfam=0;");
$sentencia->execute();
$lista_tbl_permisos=$sentencia->fetchALL(PDO::FETCH_ASSOC);

?>

<?php  $sentencia=$conexion -> prepare ("select * from tbl_estado_permiso");
$sentencia ->execute();
$lista_tbl_puestos=$sentencia->fetchALL(PDO::FETCH_ASSOC);?>
<?php
mostrar_header();

?>


<?php 
?>


<br><br>
<title>Permisos Pendientes</title>
<center><h4> Listado de Permisos Pendientes </h4></center>
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
                <th scope="col">Jefe CESFAM</th>
                <th scope="col">Estado Solicitud</th>
                
            </tr>
        </thead>
        <tbody>
        
        <?php foreach($lista_tbl_permisos as $registro){?>

            <tr class="">
                <td scope="row"><?php echo $registro['id']; ?></td>
                <td><?php echo $registro['nombre']; ?> <?php echo $registro['apellido_pat']; ?> <?php echo $registro['apellido_mat']; ?></td>
                <td><?php echo $registro['tipopermiso']; ?></td>
                <td><?php echo $registro['fechasolicitud']; ?></td>
                <td><?php echo $registro['fechapermiso']; ?></td>
                <td><?php echo $registro['permisohasta']; ?></td>
               <td> <?php echo $registro['tipojornada']; ?></td>
                <td> 
                <div class="form-check">
                <input class="form-check-input check-jefecesfam" type="checkbox"  id="jefecesfam" <?php echo $registro['jefecesfam'] ? 'checked' : '' ;?>  data-id="<?php echo $registro['id'];?>">
                 <label class="form-check-label" for="jefecesfam">
                  Aprobar
                  </label>
                </div>
                </td>
                <td>  <label for="estado" class="form-label"></label>
  <select  class="form-select form-select-sm" name="estado" id="estado">
        <?php foreach($lista_tbl_puestos as $registro){?>
        <option value="<?php echo $registro['id']?>"><?php echo $registro['estado_permiso']?></option>
        <?php } ?> </select></td>
                
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

<?php include("../../../../templates/footer.php"); ?>