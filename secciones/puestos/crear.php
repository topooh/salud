<?php
session_start();
include("../../bd.php");

if($_POST){
 print_r($_POST); 
 
 // recolectamos los datos del POST 
$nombredelpuesto=(isset($_POST["nombrePuesto"])?$_POST["nombrePuesto"]:"");
 // preparar la iserccion de datos
$sentencia=$conexion->prepare("insert into tbl_puestos(id,nombredelpuesto) VALUES(null, :nombrePuesto)");

// ASignando valores que vienen con el metodo  POST  los que vienen de los formularios..

$sentencia->bindParam(":nombrePuesto",$nombredelpuesto);
$sentencia ->execute();
$mensaje="Puesto Agregado";
header("location:index.php?mensaje=".$mensaje);
}
?>
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

<br>
<center> <h4> Puestos </h4></center> 
<div class="card">
    
    <div class="card-header">
    <h4>Datos del Nuevo Puesto </h4>
    </div>
    <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">    
    </div>
<div class="mb-3">
  <label for="nombrePuesto" class="form-label">Nombre del Puesto</label>
  <input type="text"
    class="form-control" name="nombrePuesto" id="nombrePuesto" aria-describedby="helpId" placeholder="Nombre Del Puesto">
    <br>
    <button type="submit" class="btn btn-success">Agregar</button> <a name="" id="" class="btn btn-danger" href="index.php" role="button">Cancelar</a>
  
</div>
   
</div>
<br>
<?php include("../../templates/footer.php"); ?>