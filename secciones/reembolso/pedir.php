<?php 
 include ("../../bd.php");
 include("../../funciones.php");
?>
<?php
$sentencia=$conexion -> prepare ("select * from tbl_tipo_reembolso");
$sentencia ->execute();
$lista_tbl_reembolso=$sentencia->fetchAll(PDO::FETCH_ASSOC);

?>

<?php
// Llamado Header con la funcion
mostrar_header(); ?>
 
<?php
// llamado a los post
if($_POST){
  print_r($_POST);
 // recolectamos los datos del POST 
 $rutsolicitante=(isset($_POST["rut"])?$_POST["rut"]:"");
 $tiporeembolso =(isset($_POST["tiporeembolso"])?$_POST["tiporeembolso"]:"");
 $fechasolicitud=(isset($_POST["fechasolicitud"])?$_POST["fechasolicitud"]:"");
 $fechaprestacion=(isset($_POST["fechaprestacion"])?$_POST["fechaprestacion"]:"");

// preparamos la inserccion de datos 
 $sentencia=$conexion->prepare("INSERT INTO `tbl_reembolso` (`id`, `rut_usuario`, `tipo_reembolso`, `fechasolicitud`, `fechaprestacion`, `estado`)
  VALUES (NULL, :rutsolicitado, :tiporeembolso, :fechasolicitud, :fechaprestacion, '1')");

// asignar valores del formulario 


$sentencia->bindParam(":rutsolicitado", $rutsolicitante);
$sentencia->bindParam(":tiporeembolso", $tiporeembolso);
$sentencia->bindParam(":fechasolicitud",$fechasolicitud);
$sentencia->bindParam(":fechaprestacion",$fechaprestacion);
$sentencia ->execute();
$mensaje="Reembolso solicitado";
header("location:index.php?mensaje=".$mensaje);

} ?>
<br>
<div class="card">
    <div class="card-header">

    <title> Solicitud de Reembolso </title>
        <h4>Solicitud de Reembolso </h4>
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
              <input type="date" class="form-control" name="fechasolicitud" id="fechasolicitud"value="<?php echo date('Y-m-d'); ?>" aria-describedby="emailHelpId">
              
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
              <label for="fechaprestacion" class="form-label">Fecha Prestación</label>
              <input type="date" class="form-control" name="fechaprestacion" id="fechaprestacion">  
            </div>
           
            

            <button type="submit" class="btn btn-primary">Agregar</button>
            <a name="cancelar" id="cancelar" class="btn btn-danger" href="#" role="button">Cancelar</a>
        </form>
    </div>
   
</div>


<?php include("../../templates/footer.php"); ?>




