<?php   include("../../../../bd.php");
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
    jefecesfam
FROM tbl_permisos
         join tbl_tipo_permiso ttp on ttp.id = tbl_permisos.idtipopermiso
         join tbl_jornada tj on tj.id = tbl_permisos.jornada
join tbl_usuarios tu on tu.rut = tbl_permisos.idempleado

WHERE
    jefedirecto=1;");
$sentencia->execute();
$lista_tbl_permisos=$sentencia->fetchALL(PDO::FETCH_ASSOC);

?>
<?php
session_start();
switch($_SESSION['tipousuario']){
case 1:
  // TIPO USUARIO NORMAL 

include("../../templates/usuario/header.php");
break;
case 2:

  // JEFE DIRECTO
 
  include("../../../../templates/jefe-directo/header.php");
break;
case 3:

  // JEFE CESFAM

include("../../templates/jefe-cesfam/header.php");
break;
case 4:
  // ADMIN
include("../../templates/admin/header.php");
break;  
case 5:
 // RRHH
 include("../../templates/RRHH/header.php");
 break;
}
?>


<?php 
?>


<br><br>

<center><h4> Listado de Permisos Firmados </h4></center>
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
                     <input class="form-check-input check-jefedirecto" type="checkbox" disabled="disabled" id="jefedirecto" <?php echo $registro['jefedirecto'] ? 'checked' : '' ;?>  data-id="<?php echo $registro['id'];?>">
                    <label class="form-check-label" for="jefedirecto">
                     Aprobar
                     </label>
                     
                    </div> 
                </td>
                
                
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
   
</script>

<?php include("../../../../templates/footer.php"); ?>