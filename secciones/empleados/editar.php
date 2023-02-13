<?php 
include("../../bd.php");
if(isset( $_GET['txtID'] )){

    $txtID=(isset($_GET['txtID']))?$_GET['txtID']:"";

    $sentencia=$conexion->prepare("SELECT * from tbl_empleados where id=:id");
    $sentencia->bindParam(":id",$txtID);
    $sentencia ->execute();
    $registro=$sentencia->fetch(PDO::FETCH_LAZY);

    $primernombre=$registro["primernombre"];
    $segundonombre=$registro["segundonombre"];
    $primerapellido=$registro["primerapellido"];
    $segundoapellido=$registro["segundoapellido"];
    $foto=$registro["foto"];
    $cv=$registro["cv"];
    $idpuesto=$registro["idpuesto"];
    $fechaingreso=$registro["fechaingreso"];

    $sentencia->bindParam(":primernombre",$primernombre);
$sentencia->bindParam(":segundonombre",$segundonombre);
$sentencia->bindParam(":primerapellido",$primerapellido);
$sentencia->bindParam(":segundoapellido",$segundoapellido);
$sentencia->bindParam(":foto",$foto);
$sentencia->bindParam(":cv",$cv);
$sentencia->bindParam(":idpuesto",$idpuesto);
$sentencia->bindParam(":fechaingreso",$fechaingreso);

$sentencia=$conexion -> prepare ("select * from tbl_puestos");
$sentencia ->execute();
$lista_tbl_puestos=$sentencia->fetchALL(PDO::FETCH_ASSOC);

}
if($_POST){
    print_r($_POST);
    
    $txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";   
    $primernombre=(isset($_POST["primernombre"])?$_POST["primernombre"]:"");
    $segundonombre=(isset($_POST["segundonombre"])?$_POST["segundonombre"]:""); // son con la primera en Mayuscula por que asi se llaman los formularios
    $primerapellido=(isset($_POST["primerapellido"])?$_POST["primerapellido"]:"");
    $segundoapellido=(isset($_POST["segundoapellido"])?$_POST["segundoapellido"]:"");
    $foto=(isset($_POST["foto"])?$_POST["foto"]:""); // este es mi rut
    $cv=(isset($_POST["cv"])?$_POST["cv"]:""); // digito verificador
    $idpuesto=(isset($_POST["idpuesto"])?$_POST["idpuesto"]:"");
    $fechaingreso=(isset($_POST["fechaingreso"])?$_POST["fechaingreso"]:"");
  
    $sentencia=$conexion->prepare("
    UPDATE tbl_empleados SET

        primernombre=:primernombre,
        segundonombre=:segundonombre,
        primerapellido=:primerapellido,
        segundoapellido=:segundoapellido,
        foto=:foto,
        cv=:cv,
        idpuesto=:idpuesto,
        fechaingreso=:fechaingreso
    WHERE id=:id");

    // no me esta guardando todos los cambios 3 horas 50 
  $sentencia->bindParam(":primernombre",$primernombre);
  $sentencia->bindParam(":segundonombre",$segundonombre);
  $sentencia->bindParam(":primerapellido",$primerapellido);
  $sentencia->bindParam(":segundoapellido",$segundoapellido);
  $sentencia->bindParam(":foto",$foto);
  $sentencia->bindParam(":cv",$cv);
  $sentencia->bindParam(":idpuesto",$idpuesto);
  $sentencia->bindParam(":fechaingreso",$fechaingreso); 
  $sentencia->bindParam(":id",$txtID); 
  $sentencia ->execute();
  header("location:index.php"); // redireccionar
  
  
  
  
  
  
  }
  
?>
<?php include("../../templates/header.php"); ?>
<br>
   
<center><h4>Editar Empleado</h4></center>
<div class="card">
    <div class="card-header">
        <h4>Datos Empleado</h4> 
    </div>
    <div class="card-body">
    <div class="mb-3">
         <label for="txtID" class="form-label">ID:</label>
         <input type="text"
         value="<?php echo $txtID;?>"
           class="form-control" readonly name="txtID" id="txtID" aria-describedby="helpId" placeholder="">
         
       </div>
      <form action="" method="post" enctype="multipart/form-data">
<div class="mb-3">
  <label for="primernombre" class="form-label">Nombre</label>
  <input type="text"
  value="<?php echo $primernombre;?>"
    class="form-control" name="primernombre" id="primernombre" aria-describedby="helpId" placeholder="Primer Nombre">
  
</div>
<div class="mb-3">
  <label for="segundonombre" class="form-label">Segundo Nombre</label>
  <input type="text"
  value="<?php echo $segundonombre;?>"
    class="form-control" name="segundonombre" id="segundonombre" aria-describedby="helpId" placeholder="Segundo Nombre">
  
</div>
<div class="mb-3">
  <label for="primerapellido" class="form-label">Apellido Paterno</label>
  <input type="text"
  value="<?php echo $primerapellido;?>"
    class="form-control" name="primerapellido" id="primerapellido" aria-describedby="helpId" placeholder="Apellido Paterno">
 
</div>
<div class="mb-3">
  <label for="segundoapellido" class="form-label">Apellido Materno</label>
  <input type="text"
  value="<?php echo $segundoapellido;?>"
    class="form-control" name="segundoapellido" id="segundoapellido" aria-describedby="helpId" placeholder="Apellido Materno">

</div>
<div class="mb-3">
  <label for="foto" class="form-label">Rut(foto):</label>
  <input type="numeric"
  value="<?php echo $foto;?>"
    class="form-control" name="foto" id="foto" aria-describedby="helpId" placeholder="">
</div>

<div class="mb-3">
  <label for="" class="form-label">CV ( PDF)</label>
  <input type="text"
  value="<?php echo $cv;?>"
  class="form-control" name="cv" id="cv" placeholdser="Curriculum Vitae" aria-describedby="fileHelpId">
  
</div>

<div class="mb-3">
  <label for="idpuesto" class="form-label">Puesto</label>
  "<?php echo $idpuesto?>"
    <select  class="form-select form-select-sm" name="idpuesto" id="idpuesto">
       <?php foreach($lista_tbl_puestos as $registro) {?>

        <option <?php echo ($idpuesto == $registro['id'])?"selected":"";?> value="<?php echo $registro['id']?>">
        <?php echo $registro['nombredelpuesto']?>
        </option>
        <?php } ?> </select>

</div>
<div class="mb-3">
  <label for="fechaingreso" class="form-label">Fecha Ingreso</label>
  <input type="date"
  value="<?php echo $fechaingreso;?>"
  class="form-control" name="fechaingreso" id="fechaingreso" aria-describedby="emailHelpId" placeholder="Fecha Ingreso">
 
</div>
<button type="submit" class="btn btn-primary">Editar</button>
<span>

<a name="" id="" class="btn btn-danger" href="index.php" role="button">Cancelar</a></form>
    </div>

</div>
<?php include("../../templates/footer.php"); ?>