<php $url_base="http://localhost/salud/"; 
 ?>
<?php  
session_start();
if(!isset($_SESSION['usuario'])){// obliga a redireccionar si no esta iniciado la secion.
   
    header("Location:".$url_base."../../../../login.php"); // no me esta tomando $url_base

  }
if ($_SESSION['tipousuario'] != 1) {
    
    // El usuario no tiene acceso a esta página, redirige al usuario a la página de inicio
    
    header("Location:".$url_base."../../../../index.php");
    $mensaje = "Error: no tienes permiso";
} ?>

<?php

switch($_SESSION['tipousuario']){
case 1:
  // TIPO USUARIO NORMAL 

include("../../../..//templates/usuario/header.php");
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
<?php include ("../../../../bd.php"); ?>
 
<?php if($_POST){




 // recolectamos los datos del POST 
 $idempleado=(isset($_POST["primernombre"])?$_POST["primernombre"]:"");
 $idpermiso=(isset($_POST["tipopermiso"])?$_POST["tipopermiso"]:"");
 $fechasolicitud=(isset($_POST["fechasolicitud"])?$_POST["fechasolicitud"]:"");
 $fechapermiso=(isset($_POST["fechapermiso"])?$_POST["fechapermiso"]:"");
 $hasta=(isset($_POST["hasta"])?$_POST["hasta"]:"");
 $jornada=(isset($_POST["jornada"])?$_POST["jornada"]:"");




 // preparar la iserccion de datos
$sentencia=$conexion->prepare("INSERT INTO `tbl_permisos` (`id`, `idempleado`, `idtipopermiso`, `fechasolicitud`, `fechapermiso`, `permisohasta`, `jornada`, `jefedirecto`, `jefecesfam`)
 VALUES(NULL, :primernombre, :tipopermiso, :fechasolicitud, :fechapermiso, :hasta, :jornada, 0, 0)");

// asignar valores del formulario 

$sentencia->bindParam(":primernombre",$idempleado);
$sentencia->bindParam(":tipopermiso",$idpermiso);
$sentencia->bindParam(":fechasolicitud",$fechasolicitud);
$sentencia->bindParam(":fechapermiso",$fechapermiso);
$sentencia->bindParam(":hasta",$hasta);
$sentencia->bindParam(":jornada",$jornada);
$sentencia ->execute();
$mensaje="Permiso solicitado";
// header("location:index.php?mensaje=".$mensaje);








} ?>
<?php
$sentencia=$conexion -> prepare ("SELECT * FROM `tbl_tipo_permiso`");
$sentencia ->execute();
$lista_tbl_tipo_permiso=$sentencia->fetchALL(PDO::FETCH_ASSOC); ?>

<?php
$sentencia2=$conexion -> prepare ("SELECT * FROM `tbl_jornada`");
$sentencia2 ->execute();
$lista_tbl_jornada=$sentencia2->fetchALL(PDO::FETCH_ASSOC); ?>



<br><br>
<div class="card">
  <div class="card-header">
    Solicitar permiso
  </div>
  <div class="card-body">
   <form action="" method="post" enctype="multipart/form-data">
    <div class="mb-3">
      <label for="" class="form-label">Rut</label>
      <input type="text"
        class="form-control" name="primernombre" id="primernombre" aria-describedby="helpId" placeholder="<?php echo isset($_SESSION['rut']) ? $_SESSION['rut'] : ''; ?>" readonly value="<?php echo isset($_SESSION['rut']) ? $_SESSION['rut'] : ''; ?>" >
              
    </div>
    <div class="mb-3">
      <label for="" class="form-label">Tipo Permiso</label>
      <select class="form-select form-select-lg" name="tipopermiso" id="tipopermiso">
      <?php foreach($lista_tbl_tipo_permiso as $registro){?>
        <option value="<?php echo $registro['id']?>"><?php echo $registro['tipopermiso']?></option>
        <?php } ?> </select>
    </div>
    <div class="mb-3">
      <label for="fechasolicitud" class="form-label">Fecha Solicitud</label>
      <input type="date"
        class="form-control" name="fechasolicitud" id="fechasolicitud"value="<?php echo date('Y-m-d'); ?>" readonly aria-describedby="helpId" placeholder="">

    </div>
    <div class="mb-3">
    
      <label for="fechapermiso" class="form-label">Fecha Permiso</label>
      <input type="date"
        class="form-control" name="fechapermiso" id="fechapermiso" aria-describedby="helpId" placeholder="">
    </div>
    <?php
  // Obtener la fecha actual
  $fecha_actual = date('Y-m-d');

  // Si se envió el formulario
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener la fecha ingresada por el usuario
    $fecha_ingresada = $_POST['fechapermiso'];

    // Si la fecha ingresada es anterior o igual a la fecha actual
    if ($fecha_ingresada <= $fecha_actual) {
      // Mostrar un mensaje de error
      echo 'La fecha de permiso debe ser posterior fecha actual. ';
    } else {
      // La fecha es válida, procesar el formulario
      // ...
    }
  }
?>
    <div class="mb-3">
      <label for="" class="form-label">Hasta </label>
      <input type="date"
        class="form-control" name="hasta" id="hasta" aria-describedby="helpId" placeholder="">
        <?php
  // Obtener la fecha actual
  $fecha_hasta = date('Y-m-d');

  // Si se envió el formulario
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener la fecha ingresada por el usuario
    $fecha_ingresada = $_POST['hasta'];

    // Si la fecha ingresada es anterior 
    if ($fecha_ingresada < $fecha_hasta) {
      // Mostrar un mensaje de error
      echo 'El permiso tiene que durar almenos 1 jornada. ';
    } else {
      // La fecha es válida, procesar el formulario
      // ...
    }
  }
?>
    </div>
    <div class="mb-3">
      <label for="" class="form-label">Jornada</label>
      <select class="form-select form-select-lg" name="jornada" id="jornada">
        <<?php foreach($lista_tbl_jornada as $registro){?>
        <option value="<?php echo $registro['id']?>"><?php echo $registro['tipojornada']?></option>
        <?php } ?> </select>

      </select>
    </div>


   
  </div>
  <div class="card-footer text-muted">
  <button type="submit" class="btn btn-primary">Agregar</button>  
<a name="" id="" class="btn btn-danger" href="index.php" role="button">Cancelar</a>
  </form>
  </div>
</div>

<?php include("../../../../templates/footer.php"); ?>
