<?php   include("../../../../bd.php");
session_start();
$url_base="http://localhost/salud/"; 
if(!isset($_SESSION['usuario'])){ // obliga a redireccionar si no esta iniciado la secion.
  header("Location:".$url_base."login.php"); // no me esta tomando $url_base
}else{

}
//2 horas 51 tipo de permiso COMBOBOX TIPO DE PERMISOS
$sentencia2=$conexion->prepare("SELECT *,
(SELECT tipopermiso FROM 
tbl_tipo_permiso WHERE 
tbl_tipo_permiso.id=tbl_permisos.id limit 1) as tipo_permiso
 FROM tbl_permisos");
$sentencia2->execute();
$lista_tbl_permisos=$sentencia2->fetchALL(PDO::FETCH_ASSOC);


// sentencia jornada
$jornada=$conexion->prepare("SELECT *,
(SELECT tipojornada FROM 
tbl_jornada WHERE 
tbl_jornada.id=tbl_permisos.jornada limit 1 ) as tipo_jornada
 FROM tbl_permisos");
$jornada->execute();
$lista_tbl_jornada=$jornada->fetchALL(PDO::FETCH_ASSOC);
?>
<?php

switch($_SESSION['tipousuario']){
case 1:
  // TIPO USUARIO NORMAL 

include("../../../../templates/usuario/header.php");
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


<?php 
?>


<br><br>

<center><h4> Mis Permisos Solicitados </h4></center>
<div class="p-5 mb-4 bg-light rounded-3">
        <div class="container-fluid py-5">
          <center><h1 class="display-5 fw-bold"></h1>
          <h4>  <a name="pedir" id="pedir" class="btn btn-primary" href="pedir.php" role="button">Pedir Permiso</a></h4></center>
        </div>
      </div>
      
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
            </tr>
        </thead>
        <tbody>
        
        <?php // array arreglado mostrando solo 1 vez
$lista_permisos_jornada = array();
foreach ($lista_tbl_permisos as $registro) {
    $jornada = $lista_tbl_jornada[array_search($registro['id'], array_column($lista_tbl_jornada, 'id'))];
    $registro['tipo_jornada'] = $jornada['tipo_jornada'];
    $lista_permisos_jornada[] = $registro;
}
foreach ($lista_permisos_jornada as $registro) {
?>
    <tr class="">
        <td scope="row"><?php echo $registro['id']; ?></td>
        <td><?php echo $registro['idempleado']; ?></td>
        <td><?php echo $registro['idtipopermiso']; ?></td>
        <td><?php echo $registro['fechasolicitud']; ?></td>
        <td><?php echo $registro['fechapermiso']; ?></td>
        <td><?php echo $registro['permisohasta']; ?></td>
        <td><?php echo $registro['tipo_jornada']; ?></td>
        <td>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="jefedirecto">
                <label class="form-check-label" for="jefedirecto">
                    Aprobar
                </label>
            </div>
        </td>
        <td>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="jefecesfam">
                <label class="form-check-label" for="jefecesfam">
                    Aprobar
                </label>
            </div>
        </td>
        <td>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="rrhh">
                <label class="form-check-label" for="rrhh">
                    Recepcionado
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

<?php include("../../../../templates/footer.php"); ?>