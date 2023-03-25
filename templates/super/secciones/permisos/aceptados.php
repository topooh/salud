<?php   include("../../../../bd.php");
require("../../../../funciones.php");

if(!isset($_SESSION['usuario'])){// obliga a redireccionar si no esta iniciado la secion.
   
    header("Location:".$url_base."../../../../login.php"); // no me esta tomando $url_base

  }
if ($_SESSION['tipousuario'] != 6) {
    
    // El usuario no tiene acceso a esta página, redirige al usuario a la página de inicio
    
    header("Location:".$url_base."../../../../index.php");
    $mensaje = "Error: no tienes permiso";
}
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
    estado_permiso,
    detalles,
    firmadirecto,
    firmacesfam,
    firmarrhh
FROM tbl_permisos
         join tbl_tipo_permiso ttp on ttp.id = tbl_permisos.idtipopermiso
         join tbl_jornada tj on tj.id = tbl_permisos.jornada
join tbl_usuarios tu on tu.rut = tbl_permisos.idempleado

WHERE
    estado_permiso=3 and jefedirecto=1 and jefecesfam=1 ");
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
<title>Permisos Firmados </title>
<center><h4> Listado de Permisos Aceptados </h4></center>
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
                <th scope="col">Jefe Directo </th>
                <th scope="col">Jefe Cesfam </th>
                <th scope="col">RRHH </th>
                <th scope="col">Estado Permiso </th>
                <th scope="col">Detalles</th>
                
                
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
               
                </td>
                <td><?php echo $registro['firmadirecto'] ?> </td> 
                <td><?php echo $registro['firmacesfam'] ?> </td> 
                <td><?php echo $registro['firmarrhh'] ?> </td> 
                <td>  <label for="idpuesto" class="form-label"></label>
  <select  class="form-select form-select-sm estado_permiso" name="estado_permiso"  id="estado_permiso" data-id="<?php echo $registro['id'];?>">
    
        <?php foreach($lista_tbl_puestos as $permiso){?>
            <option value="<?php echo $permiso['id']?>" <?php echo $registro['estado_permiso'] == $permiso['id'] ? 'selected':'';?>>
            <?php echo $permiso['estado_permiso'] ?> </option>
            <?php } ?> </select></td>
                
            <td><?php echo $registro['detalles']?> </td>   
            
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