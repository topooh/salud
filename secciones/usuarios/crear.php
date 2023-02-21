<?php include("../../bd.php");
if($_POST){
  //print_r($_POST); 
  
  // recolectamos los datos del POST 
 $usuario=(isset($_POST["usuario"])?$_POST["usuario"]:"");
 $password=(isset($_POST["password"])?$_POST["password"]:"");
 $correo=(isset($_POST["correo"])?$_POST["correo"]:"");

 // preparar la iserccion de datos
 $sentencia=$conexion->prepare("insert into tbl_usuarios(id,usuario,password,correo,tipousuario)
  VALUES(NULL,:usuario,:password,:correo,'1')");
 
 // ASignando valores que vienen con el metodo  POST  los que vienen de los formularios..
 // asigna valores que tienene uso de :variable   
 $sentencia->bindParam(":usuario",$usuario);
 $sentencia->bindParam(":password",$password);
 $sentencia->bindParam(":correo",$correo);
 $mensaje="Usuario Creado";
 $sentencia ->execute();
 header("location:index.php?mensaje=".$mensaje); }
?>

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
  <label for="usuario" class="form-label">Nombre del Usuario</label>
  <input type="text"
    class="form-control" name="usuario" id="usuario" aria-describedby="helpId" placeholder="Nombre De Usuario">
    
    <div class="mb-3">
      <label for="password" class="form-label">Password</label>
      <input type="password"
        class="form-control" name="password" id="password" aria-describedby="helpId" placeholder="Escriba su Contraseña">
    </div>

    <div class="mb-3">
      <label for="correo" class="form-label">Correo</label>
      <input type="email"
        class="form-control" name="correo" id="correo" aria-describedby="helpId" placeholder="Escriba su Correo Electronico">

    </div>

    <br>
    <button type="submit" class="btn btn-success">Agregar</button> <a name="" id="" class="btn btn-danger" href="index.php" role="button">Cancelar</a>
  
</div>
   
</div>
<br>
<?php include("../../templates/footer.php"); ?>