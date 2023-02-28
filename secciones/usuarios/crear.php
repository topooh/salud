<?php include("../../bd.php");
session_start();
if($_POST){
  //print_r($_POST); 
  
  // recolectamos los datos del POST 
 $usuario=(isset($_POST["usuario"])?$_POST["usuario"]:"");
 $password=(isset($_POST["password"])?$_POST["password"]:"");
 $correo=(isset($_POST["correo"])?$_POST["correo"]:"");
 $rut=(isset($_POST["rut"])?$_POST["rut"]:"");
 $dv=(isset($_POST["dv"])?$_POST["dv"]:"");
 $nombre=(isset($_POST["nombre"])?$_POST["nombre"]:"");
 $apellido_pat=(isset($_POST["apellido_pat"])?$_POST["apellido_pat"]:"");
 $apellido_mat=(isset($_POST["apellido_mat"])?$_POST["apellido_mat"]:"");

 // preparar la iserccion de datos
 $sentencia=$conexion->prepare("insert into tbl_usuarios(id,usuario,password,correo,rut,dv,nombre,apellido_pat,apellido_mat,tipousuario)
  VALUES(NULL,:usuario,:password,:correo, :rut, :dv, :nombre, :apellido_pat, :apellido_mat, '1')");
 
 // ASignando valores que vienen con el metodo  POST  los que vienen de los formularios..
 // asigna valores que tienene uso de :variable   
 $sentencia->bindParam(":usuario",$usuario);
 $sentencia->bindParam(":password",$password);
 $sentencia->bindParam(":correo",$correo);
 $sentencia->bindParam(":rut",$rut);
 $sentencia->bindParam(":dv",$dv);
 $sentencia->bindParam(":nombre",$nombre);
 $sentencia->bindParam(":apellido_pat",$apellido_pat);
 $sentencia->bindParam(":apellido_mat",$apellido_mat);
 $mensaje="Usuario Creado";
 $sentencia ->execute();
 header("location:index.php?mensaje=".$mensaje); }
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
case 5:
  include("../../templates/RRHH/header.php");

}
?>

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
    <div class="mb-3">
      <label for="rut" class="form-label">Rut</label>
      <input type="numeric"
        class="form-control" name="rut" id="rut" aria-describedby="helpId" placeholder="12345678">

    </div>
    <div class="mb-3">
      <label for="dv" class="form-label">Digito Verificador</label>
      <input type="text" maxlength="1"
      
        class="form-control" name="dv" id="dv" aria-describedby="helpId" placeholder="K">

    </div>
    <div class="mb-3">
      <label for="nombre" class="form-label">Nombre</label>
      <input type="numeric"
        class="form-control" name="nombre" id="nombre" aria-describedby="helpId" placeholder="Nombre">

    </div>
    <div class="mb-3">
      <label for="apelldido_pat" class="form-label">Primer apellido</label>
      <input type="text"
        class="form-control" name="apellido_pat" id="apellido_pat" aria-describedby="helpId" placeholder="Primer Apellido">

    </div>
    <div class="mb-3">
      <label for="apelldido_mat" class="form-label">Segundo apellido</label>
      <input type="text"
        class="form-control" name="apellido_mat" id="apellido_mat" aria-describedby="helpId" placeholder="Primer Apellido">

    </div>
    
    <br>
    <button type="submit" class="btn btn-success">Agregar</button> <a name="" id="" class="btn btn-danger" href="index.php" role="button">Cancelar</a>
  
</div>
   
</div>
<br>
<?php include("../../templates/footer.php"); ?>