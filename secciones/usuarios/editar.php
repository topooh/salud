<?php 
include ("../../bd.php");
if(isset( $_GET['txtID'] )){

    $txtID=(isset($_GET['txtID']))?$_GET['txtID']:"";

    $sentencia=$conexion->prepare("SELECT * from tbl_usuarios where id=:id");
    $sentencia->bindParam(":id",$txtID);
    $sentencia ->execute();
    $registro=$sentencia->fetch(PDO::FETCH_LAZY);
    $usuario=$registro["usuario"];
    $password=$registro["password"];
    $correo=$registro["corrreo"];
    
}
if($_POST){
    print_r($_POST); 
    
    // recolectamos los datos del POST 
   $txtID=(isset($_GET['txtID']))?$_GET['txtID']:"";
   $usuario=(isset($_POST["usuario"])?$_POST["usuario"]:"");
   $password=(isset($_POST["password"])?$_POST["password"]:"");
   $correo=(isset($_POST["correo"])?$_POST["correo"]:"");
   // preparar la iserccion de datos
   $sentencia=$conexion->prepare("UPDATE tbl_usuarios SET
   usuario=:usuario,
   password=:password,
   correo=:correo
   where id=:id");  
   // ASignando valores que vienen con el metodo  POST  los que vienen de los formularios..
   // asigna valores que tienene uso de :variable   
   $sentencia->bindParam(":usuario",$usuario);
   $sentencia->bindParam(":password",$password);
   $sentencia->bindParam(":correo",$correo);
   $sentencia->bindParam(":id",$txtID);
   $sentencia ->execute();
   header("location:index.php");
   }
?>

<?php include("../../templates/header.php"); ?>

<br>
<center> <h4> Editar   Usuario </h4></center> 
<div class="card">
    <div class="card-header">
   <h4>Usuarios</h4> 
    </div>
    <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">    
    </div>
    <div class="mb-3">
         <label for="txtID" class="form-label">ID:</label>
         <input type="text"
         value="<?php echo $txtID;?>"
           class="form-control" readonly name="txtID" id="txtID" aria-describedby="helpId" placeholder="">
         
       </div>  

<div class="mb-3">
  <label for="usuario" class="form-label">Nombre del Usuario</label>
  <input type="text"
  value="<?php echo $usuario;?>"
    class="form-control" name="usuario" id="usuario" aria-describedby="helpId" placeholder="Nombre De Usuario">
    
    <div class="mb-3">
      <label for="password" class="form-label">Password</label>
      <input type="password"
      value="<?php echo $password;?>"
        class="form-control" name="Password" id="password" aria-describedby="helpId" placeholder="Escriba su Contraseña">
    </div>

    <div class="mb-3">
      <label for="correo" class="form-label">Correo</label>
      <input type="email"
        value="<?php echo $correo;?>"
        class="form-control" name="correo" id="correo" aria-describedby="helpId" placeholder="Escriba su Correo Electronico">
        
    </div>

    <br>
    <button type="submit" class="btn btn-success">Editar</button> <a name="" id="" class="btn btn-danger" href="index.php" role="button">Cancelar</a>
  
</div>
   
</div>
<br>

<?php include("../../templates/footer.php"); ?>