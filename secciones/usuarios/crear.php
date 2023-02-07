<?php include("../../templates/header.php"); ?>

<br>
<center> <h4> Crear Un Nuevo Usuario </h4></center> 
<div class="card">
    <div class="card-header">
   <h4>Usuarios</h4> 
    </div>
    <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">    
    </div>
<div class="mb-3">
  <label for="Usuario" class="form-label">Nombre del Usuario</label>
  <input type="text"
    class="form-control" name="Usuario" id="Usuario" aria-describedby="helpId" placeholder="Nombre De Usuario">
    
    <div class="mb-3">
      <label for="" class="form-label">Password</label>
      <input type="password"
        class="form-control" name="Password" id="Password" aria-describedby="helpId" placeholder="Escriba su Contraseña">
    </div>

    <div class="mb-3">
      <label for="Correo" class="form-label">Correo</label>
      <input type="email"
        class="form-control" name="Correo" id="Correo" aria-describedby="helpId" placeholder="Escriba su Correo Electronico">

    </div>

    <br>
    <button type="submit" class="btn btn-success">Agregar</button> <a name="" id="" class="btn btn-danger" href="index.php" role="button">Cancelar</a>
  
</div>
   
</div>
<br>
<?php include("../../templates/footer.php"); ?>