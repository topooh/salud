<?php   include("../../../../bd.php");
session_start();
if(!isset($_SESSION['usuario'])){ // obliga a redireccionar si no esta iniciado la secion.
    header("Location:".$url_base."login.php"); // no me esta tomando $url_base era por que estaba en mayuscula
  }else{
  
  }
//2 horas 51 tipo de permiso COMBOBOX TIPO DE PERMISOS
$sentencia=$conexion->prepare("SELECT *,
(SELECT tipopermiso FROM 
tbl_tipo_permiso WHERE 
tbl_tipo_permiso.id=tbl_permisos.id limit 1) as tipo_permiso
 FROM tbl_permisos");
$sentencia->execute();
$lista_tbl_permisos=$sentencia->fetchALL(PDO::FETCH_ASSOC);


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

}
?>


<?php 
?>


<br><br>

<center><h4> Listado de Permisos JEFEDIRECT </h4></center>
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
            </tr>
        </thead>
        <tbody>
        
        <?php foreach($lista_tbl_permisos as $registro){?> 
            <?php foreach($lista_tbl_jornada as $jornada){?>
            <tr class="">
                <td scope="row"><?php echo $registro['id']; ?></td>
                <td><?php echo $registro['idempleado']; ?></td>
                <td><?php echo $registro['tipo_permiso']; ?></td>
                <td><?php echo $registro['fechasolicitud']; ?></td>
                <td><?php echo $registro['fechapermiso']; ?></td>
                <td><?php echo $registro['permisohasta']; ?></td>
               <td> <?php echo $jornada['tipo_jornada']; ?></td>
               
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
                <input class="form-check-input" type="checkbox" value="" id="jefecesfam" >
                 <label class="form-check-label" for="jefecesfam">
                  Aprobar
                  </label>
                </div>
                </td>
                <td> <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="rrhh" >Recepcionado</td>
            </tr>
            <?php } ?> 
            <?php } ?> 
            
        </tbody>
    </table>
</div>

    </div>
    <div class="card-footer text-muted">
        
    </div>
</div>
<?php include("../../../../templates/footer.php"); ?>

