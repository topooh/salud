<?php
require ("../../../../funciones.php");

if(!isset($_SESSION['usuario'])){// obliga a redireccionar si no esta iniciado la secion.
   
    header("Location:".$url_base."../../../../login.php"); // no me esta tomando $url_base

  }
if ($_SESSION['tipousuario'] != 1) {
    
    // El usuario no tiene acceso a esta página, redirige al usuario a la página de inicio
    
    header("Location:".$url_base."../../../../index.php");
    $mensaje = "Error: no tienes permiso";
} 
require("../../../../bd.php");
//2 horas 51 tipo de permiso COMBOBOX TIPO DE PERMISOS

$rut_funcionario=$_SESSION['rut'];
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
    rrhh
FROM tbl_permisos
         join tbl_tipo_permiso ttp on ttp.id = tbl_permisos.idtipopermiso
         join tbl_jornada tj on tj.id = tbl_permisos.jornada
join tbl_usuarios tu on tu.rut = tbl_permisos.idempleado

where tu.rut= $rut_funcionario;");
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

<center><h4> Mis Permisos Solicitados</h4></center>
<CENTER><span>FILTRANDO SOLO POR  LOS PERMISOS QUE A SOLICITADO EL USUARIO</span></center>
<div class="card">
    
    <div class="card-header">
        Listado de Permisos <a name="pedir" id="pedir" class="btn btn-primary" href="pedir.php" role="button">Pedir Permiso</a>
    </div>
    <div class="card-body">
<div class="table-responsive-sm">
    <table class="table" id="tabla_id">
        <thead>
            <tr>
                
                
                <th scope="col">Tipo De Permiso</th>
                <th scope="col">Fecha Solicitud</th>
                <th scope="col">Fecha Permiso</th>
                <th scope="col">Permiso Hasta</th>
                <th scope="col">Jornada</th>
                <th scope="col">Jefe Directo</th>
                <th scope="col">Jefe CESFAM</th>
                <th scope="col">RRHH</th>
                <th scope="col">Estado Solicitud </th>
            </tr>
        </thead>
        <tbody>
        
        <?php foreach($lista_tbl_permisos as $registro){?>

            <tr class="">
                
                
                <td><?php echo $registro['tipopermiso']; ?></td>
                <td><?php echo $registro['fechasolicitud']; ?></td>
                <td><?php echo $registro['fechapermiso']; ?></td>
                <td><?php echo $registro['permisohasta']; ?></td>
               <td> <?php echo $registro['tipojornada']; ?></td>
               
                <td>
                    <div class="form-check">
                     <input class="form-check-input check-jefedirecto" type="checkbox" id="jefedirecto" disabled="disabled"<?php echo $registro['jefedirecto'] ? 'checked' : '' ;?>  data-id="<?php echo $registro['id'];?>">
                    <label class="form-check-label" for="jefedirecto">
                     Aprobado
                     </label>
                     
                    </div> 
                </td>
                <td> 
                <div class="form-check">
                <input class="form-check-input check-jefecesfam" type="checkbox" id="jefecesfam"disabled="disabled" <?php echo $registro['jefecesfam'] ? 'checked' : '' ;?>  data-id="<?php echo $registro['id'];?>">
                    <label class="form-check-label" for="jefecesfam">
                  Aprobado
                  </label>
                </div>
                </td>
                <td> <div class="form-check">
                <input class="form-check-input check-rrhh" type="checkbox"disabled="disabled" id="rrhh" <?php echo $registro['rrhh'] ? 'checked' : '' ;?>  data-id="<?php echo $registro['id'];?>">
                    <label class="form-check-label" for="rrhh">
                  Recepcionado
                  </label>
                </div></td>
                
                <td>  <label for="idpuesto" class="form-label"></label>
  <select  class="form-select form-select-sm" name="idpuesto" id="idpuesto" disabled="disabled">
    
        <?php foreach($lista_tbl_puestos as $registro){?>
        <option value="<?php echo $registro['id']?>"><?php echo $registro['estado_permiso'] ?> </option>
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


<?php include("../../../../templates/footer.php"); ?>