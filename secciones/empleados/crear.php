<?php include ("../../bd.php");

if($_POST){
  print_r($_POST);
  //print_r($_FILES);

  $primernombre=(isset($_POST["PrimerNombre"])?$_POST["PrimerNombre"]:"");
  $segundonombre=(isset($_POST["SegundoNombre"])?$_POST["SegundoNombre"]:""); // son con la primera en Mayuscula por que asi se llaman los formularios
  $primerapellido=(isset($_POST["PrimerApellido"])?$_POST["PrimerApellido"]:"");
  $segundoapellido=(isset($_POST["SegundoApellido"])?$_POST["SegundoApellido"]:"");
  $foto=(isset($_POST["Foto"])?$_POST["Foto"]:""); // este es mi rut
  $cv=(isset($_POST["cv"])?$_POST["cv"]:""); // digito verificador


  $idpuesto=(isset($_POST["idpuesto"])?$_POST["idpuesto"]:"");
  $fechaingreso=(isset($_POST["fechaingreso"])?$_POST["fechaingreso"]:"");

  $sentencia=$conexion->prepare("INSERT INTO `tbl_empleados` (`id`, `primernombre`, `segundonombre`, `primerapellido`, `segundoapellido`, `foto`, `cv`, `idpuesto`, `fechaingreso`)
   VALUES (NULL, :primernombre, :segundonombre, :primerapellido, :segundoapellido, :foto, :cv, :idpuesto, :fechaingreso);)");
$sentencia->bindParam(":primernombre",$primernombre);
$sentencia->bindParam(":segundonombre",$segundonombre);
$sentencia->bindParam(":primerapellido",$primerapellido);
$sentencia->bindParam(":segundoapellido",$segundoapellido);
$sentencia->bindParam(":foto",$foto);
$sentencia->bindParam(":cv",$cv);
$sentencia->bindParam(":idpuesto",$idpuesto);
$sentencia->bindParam(":fechaingreso",$fechaingreso); 
$sentencia ->execute();
header("location:index.php"); // redireccionar






}

$sentencia=$conexion -> prepare ("select * from tbl_puestos");
$sentencia ->execute();
$lista_tbl_puestos=$sentencia->fetchALL(PDO::FETCH_ASSOC);
// print_R($lista_tbl_puestos); mostrar los datos que me esta trayendo desde la base de datos!!!

?>
<?php include("../../templates/header.php"); ?>


<center><h4>Crear Trabajador</h4></center>
<div class="card">
    <div class="card-header">
        <h4>Datos Trabajador</h4> 
    </div>
    <div class="card-body">
      <form action="" method="post" enctype="multipart/form-data">
<div class="mb-3">
  <label for="PrimerNombre" class="form-label">Nombre</label>
  <input type="text"
    class="form-control" name="PrimerNombre" id="PrimerNombre" aria-describedby="helpId" placeholder="Primer Nombre">
  
</div>
<div class="mb-3">
  <label for="SegundoNombre" class="form-label">Segundo Nombre</label>
  <input type="text"
    class="form-control" name="SegundoNombre" id="SegundoNombre" aria-describedby="helpId" placeholder="Segundo Nombre">
  
</div>
<div class="mb-3">
  <label for="" class="form-label">Apellido Paterno</label>
  <input type="text"
    class="form-control" name="PrimerApellido" id="PrimerApellido" aria-describedby="helpId" placeholder="Apellido Paterno">
 
</div>
<div class="mb-3">
  <label for="SegundoApellido" class="form-label">Apellido Materno</label>
  <input type="text"
    class="form-control" name="SegundoApellido" id="SegundoApellido" aria-describedby="helpId" placeholder="Apellido Materno">

</div>
<div class="mb-3">
  <label for="" class="form-label">Rut(foto):</label>
  <input type="numeric"
    class="form-control" name="Foto" id="Foto" aria-describedby="helpId" placeholder="">
</div>

<div class="mb-3">
  <label for="" class="form-label">CV ( PDF)</label>
  <input type="text" class="form-control" name="cv" id="cv" placeholdser="Curriculum Vitae" aria-describedby="fileHelpId">
  
</div>
<div class="mb-3">
  <label for="idpuesto" class="form-label">Puesto</label>
  <select  class="form-select form-select-sm" name="idpuesto" id="idpuesto">
    
        <?php foreach($lista_tbl_puestos as $registro){?>
        <option value="<?php echo $registro['id']?>"><?php echo $registro['nombredelpuesto']?></option>
        <?php } ?> </select>

</div>
<div class="mb-3">
  <label for="fechaingreso" class="form-label">Fecha Ingreso</label>
  <input type="date" class="form-control" name="fechaingreso" id="fechaingreso" aria-describedby="emailHelpId" placeholder="Fecha Ingreso">
 
</div>
<button type="submit" class="btn btn-primary">Agregar</button>
<span>

<a name="" id="" class="btn btn-danger" href="index.php" role="button">Cancelar</a></form>
    </div>

</div>

<?php include("../../templates/footer.php"); ?>