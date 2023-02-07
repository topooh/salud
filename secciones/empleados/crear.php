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
  <label for="" class="form-label">Foto:</label>
  <input type="file"
    class="form-control" name="Foto" id="Foto" aria-describedby="helpId" placeholder="">
</div>

<div class="mb-3">
  <label for="" class="form-label">CV ( PDF)</label>
  <input type="file" class="form-control" name="cv" id="cv" placeholder="Curriculum Vitae" aria-describedby="fileHelpId">
  
</div>
<div class="mb-3">
  <label for="idpuesto" class="form-label">Puesto</label>
  <select multiple class="form-select form-select-sm" name="idpuesto" id="idpuesto">
        <option selected>Select one</option>
        <option value="">New Delhi</option>
        <option value="">Istanbul</option>
        <option value="">Jakarta</option>
    </select>
</div>
<div class="mb-3">
  <label for="" class="form-label">Fecha Ingreso</label>
  <input type="date" class="form-control" name="FechaIngreso" id="FechaIngreso" aria-describedby="emailHelpId" placeholder="Fecha Ingreso">
 
</div>
<button type="submit" class="btn btn-primary">Agregar</button>
<span>

<a name="" id="" class="btn btn-danger" href="index.php" role="button">Cancelar</a></form>
    </div>

</div>

<?php include("../../templates/footer.php"); ?>