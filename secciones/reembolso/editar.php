<?php 
require("../../bd.php");
include("../../funciones.php");
mostrar_header();

?>
<?php
$sentencia=$conexion -> prepare ("select * from tbl_tipo_reembolso");
$sentencia ->execute();
$lista_tbl_reembolso=$sentencia->fetchAll(PDO::FETCH_ASSOC);

?>
<?php 
if(isset( $_GET['txtID'] )){

    $txtID=(isset($_GET['txtID']))?$_GET['txtID']:"";

    $sentencia=$conexion->prepare("SELECT * from tbl_reembolso where id=:id");
    $sentencia->bindParam(":id",$txtID);
    $sentencia ->execute();
    $registro=$sentencia->fetch(PDO::FETCH_LAZY);
    $rut=$registro["rut_usuario"];
    $tipo_reembolso=$registro["tipo_reembolso"];
    $fechasolicitud=$registro["fechasolicitud"];
    $fechaprestacion=$registro["fechaprestacion"];
    $estado=$registro["estado"];
    $archivo=$registro["archivo"];
    $archivo1=$registro["archivo1"];
    $archivo2=$registro["archivo2"];
    $sentencia->bindParam(":archivo",$nombreArchivo_archivo);
    $sentencia->bindParam(":archivo1",$nombreArchivo_archivo1);
    $sentencia->bindParam(":archivo1",$nombreArchivo_archivo1);
}


?>
<?php
// llamado a los post
if($_POST){

 // recolectamos los datos del POST 
 $rutsolicitante=(isset($_POST["rut"])?$_POST["rut"]:"");
 $tiporeembolso =(isset($_POST["tiporeembolso"])?$_POST["tiporeembolso"]:"");
 $fechasolicitud=(isset($_POST["fechasolicitud"])?$_POST["fechasolicitud"]:"");
 $fechaprestacion=(isset($_POST["fechaprestacion"])?$_POST["fechaprestacion"]:"");
 $archivo=(isset($_FILES["archivo"]['name'])?$_FILES["archivo"]['name']:"");
 $archivo1=(isset($_FILES["archivo1"]['name'])?$_FILES["archivo1"]['name']:"");
 $archivo2=(isset($_FILES["archivo2"]['name'])?$_FILES["archivo2"]['name']:"");


// preparamos la inserccion de datos 
 $sentencia=$conexion->prepare("INSERT INTO `tbl_reembolso` (`id`, `rut_usuario`, `tipo_reembolso`, `fechasolicitud`, `fechaprestacion`, `estado`,archivo,archivo1,archivo2)
  VALUES (NULL, :rutsolicitado, :tiporeembolso, :fechasolicitud, :fechaprestacion, '1', :archivo, :archivo1, :archivo2)");

// asignar valores del formulario 


$sentencia->bindParam(":rutsolicitado", $rutsolicitante);
$sentencia->bindParam(":tiporeembolso", $tiporeembolso);
$sentencia->bindParam(":fechasolicitud",$fechasolicitud);
$sentencia->bindParam(":fechaprestacion",$fechaprestacion);

// ARCHIVO 1
$fecha_archivo=new DateTime();

$nombreArchivo_archivo=($archivo!='')?$fecha_archivo->getTimestamp()."_".$_FILES["archivo"]['name']:"";
$tmp_archivo=$_FILES["archivo"]['tmp_name'];
if($tmp_archivo!=''){
  move_uploaded_file($tmp_archivo,"./subidas/".$nombreArchivo_archivo);
}


$sentencia->bindParam(":archivo",$nombreArchivo_archivo);


// Archivo 2 

$fecha_archivo1=new DateTime();
$nombreArchivo_archivo1=($archivo1!='')?$fecha_archivo1->getTimestamp()."_".$_FILES["archivo1"]['name']:"";
$tmp_archivo1=$_FILES["archivo1"]['tmp_name'];
if($tmp_archivo1!=''){
  move_uploaded_file($tmp_archivo1,"./subidas/".$nombreArchivo_archivo1);
}$sentencia->bindParam(":archivo1",$nombreArchivo_archivo1);

// tercer archivo 

$sentencia->bindParam(":archivo2",$nombreArchivo_archivo2);

$fecha_archivo2=new DateTime();
$nombreArchivo_archivo2=($archivo2!='')?$fecha_archivo2->getTimestamp()."_".$_FILES["archivo2"]['name']:"";
$tmp_archivo2=$_FILES["archivo2"]['tmp_name'];
if($tmp_archivo2!=''){
  move_uploaded_file($tmp_archivo2,"./subidas/".$nombreArchivo_archivo2);
}$sentencia->bindParam(":archivo2",$nombreArchivo_archivo2);



$sentencia ->execute();
$mensaje="Reembolso solicitado";
header("location:index.php?mensaje=".$mensaje);

} ?>
<br>
<div class="card">
    <div class="card-header">

    <title> Editar Reembolso </title>
        <h4>EDITANDO REEMBOLSO </h4>
    </div>
    <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">
           
            <div class="mb-3">
              <label for="rut" class="form-label">Rut</label>
              <input type="numeric"
              value="<?php echo $_SESSION['rut'];?>"
              
                class="form-control" readonly name="rut" id="rut" aria-describedby="helpId" placeholder="<?php echo $_SESSION['rut'];?> ">
            </div>
            
            <div class="mb-3">
              <label for="" class="form-label">fecha Solicitud</label>
              <input type="date" class="form-control" name="fechasolicitud" id="fechasolicitud"value="<?php echo $registro["fechasolicitud"] ?>" aria-describedby="emailHelpId" disabled="disabled">
              
            </div>
            
            <div class="mb-3">
              <label for="fechaprestacion" class="form-label">Fecha Prestación</label>
              <input type="date" class="form-control" name="fechaprestacion" id="fechaprestacion"value="<?php echo $registro['fechaprestacion'];?>" >  
            </div>
            <div class="mb-3">
                <label for="tiporeembolso" class="form-label">Tipo de Reembolso</label>
                <select class="form-select form-select-lg" name="tiporeembolso" id="tiporeembolso">
                  <?php foreach($lista_tbl_reembolso as $registro){?>
        <option value="<?php echo $registro['id']?>"><?php echo $registro['descripcion']?></option>
        <?php } ?> 
                </select>
            </div>
           <div class="mb-3">
             <label for="archivo" class="form-label">Seleccione Archivo:</label>
             "<?php echo $archivo?>"
             <input type="file"
              class="form-control" name="archivo" id="archivo" placeholder="archivo.pdf" aria-describedby="fileHelpId">
             
           </div>
           
           <div class="mb-3">
             <label for="archivo1" class="form-label">Seleccione Archivo:</label>
             "<?php echo $archivo1?>"
             <input type="file" class="form-control" name="archivo1" id="archivo1" placeholder="archivo.pdf" aria-describedby="fileHelpId">
             
           </div>
           
           <div class="mb-3">
           "<?php echo $archivo2?>"
             <label for="archivo2" class="form-label">Seleccione Archivo:</label>
             <input type="file" class="form-control" name="archivo2" id="archivo2" placeholder="archivo.pdf" aria-describedby="fileHelpId">
             
           </div>
         

            <button type="submit" class="btn btn-primary">Agregar</button>
            <a name="cancelar" id="cancelar" class="btn btn-danger" href="#" role="button">Cancelar</a>
        </form>
    </div>
   
</div>