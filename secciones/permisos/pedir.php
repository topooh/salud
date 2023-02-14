<php $url_base="http://localhost/salud/";  ?>


<?php include("../../templates/header.php"); ?>
<?php include ("../../bd.php"); ?>
//1 hora 9 mnutos para crear con la creacion
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
      <label for="" class="form-label">Nombre</label>
      <input type="text"
        class="form-control" name="primernombre" id="primernombre" aria-describedby="helpId" placeholder=" Primer Nombre">
      
    </div>
    <div class="mb-3">
      <label for="" class="form-label">Tipo Permiso</label>
      <select class="form-select form-select-lg" name="" id="">
      <?php foreach($lista_tbl_tipo_permiso as $registro){?>
        <option value="<?php echo $registro['id']?>"><?php echo $registro['tipopermiso']?></option>
        <?php } ?> </select>
    </div>
    <div class="mb-3">
      <label for="fechasolicitud" class="form-label">Fecha Solicitud</label>
      <input type="date"
        class="form-control" name="fechasolicitud" id="fechasolicitud"value="<?php echo date("Y-m-d");?>" aria-describedby="helpId" placeholder="">

    </div>
    <div class="mb-3">
      <label for="fechapermiso" class="form-label">Fecha Permiso</label>
      <input type="date"
        class="form-control" name="fechapermiso" id="fechapermiso" aria-describedby="helpId" placeholder="">
    </div>
    <div class="mb-3">
      <label for="" class="form-label">Hasta </label>
      <input type="date"
        class="form-control" name="hasta" id="hasta" aria-describedby="helpId" placeholder="">
    </div>
    <div class="mb-3">
      <label for="" class="form-label">Jornada</label>
      <select class="form-select form-select-lg" name="jornada" id="jornada">
        <<?php foreach($lista_tbl_jornada as $registro){?>
        <option value="<?php echo $registro['id']?>"><?php echo $registro['tipojornada']?></option>
        <?php } ?> </select>

      </select>
    </div>


   </form>
  </div>
  <div class="card-footer text-muted">
    Footer
  </div>
</div>

cuerpo de pedir permiso
<?php include("../../templates/footer.php"); ?>
