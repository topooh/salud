<?php
include("../../bd.php"); 
if(isset( $_GET['txtID'] )){

    $txtID=(isset($_GET['txtID']))?$_GET['txtID']:"";

    $sentencia=$conexion->prepare("SELECT * from tbl_puestos where id=:id");
    $sentencia->bindParam(":id",$txtID);
    $sentencia ->execute();
    $registro=$sentencia->fetch(PDO::FETCH_LAZY);
    $nombredelpuesto=$registro["nombredelpuesto"];
}
if($_POST){
   // print_r($_POST); Verificar si llevo acabo la actualizacion
    
    // recolectamos los datos del POST 
    $$txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
   $nombredelpuesto=(isset($_POST["nombredelpuesto"])?$_POST["nombredelpuesto"]:"");
    
   // preparar la iserccion de datos
   $sentencia=$conexion->prepare("UPDATE tbl_puestos SET nombredelpuesto=:nombredelpuesto
   WHERE id=:id");
   
   // ASignando valores que vienen con el metodo  POST  los que vienen de los formularios..
   
   $sentencia->bindParam(":nombredelpuesto",$nombredelpuesto);
   $sentencia->bindParam(":id",$txtID);

   $sentencia ->execute();
   $mensaje="Cambios Realizados";
   header("location:index.php?mensaje=".$mensaje);
   }
?>
<?php include("../../templates/header.php"); ?>


<br>
<center> <h4> Puestos </h4></center> 
<div class="card">
    
    <div class="card-header">
    <h4>Datos del Nuevo Puesto </h4>
    </div>
    <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">  
       <div class="mb-3">
         <label for="txtID" class="form-label">ID:</label>
         <input type="text"
         value="<?php echo $txtID;?>"
           class="form-control" readonly name="txtID" id="txtID" aria-describedby="helpId" placeholder="">

       </div>       
    </div>
<div class="mb-3">
  <label for="nombrePuesto" class="form-label">Nombre del Puesto</label>
  <input type="text"
  value="<?php echo  $nombredelpuesto;?>"
    class="form-control" name="nombredelpuesto" id="nombredelpuesto" aria-describedby="helpId" placeholder="Nombre Del Puesto">
    <br>
    <button type="submit" class="btn btn-success">Editar</button> <a name="" id="" class="btn btn-danger" href="index.php" role="button">Cancelar</a>
  
</div>
   
</div>
<br>
<?php include("../../templates/footer.php"); ?>