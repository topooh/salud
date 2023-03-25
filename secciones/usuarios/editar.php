<?php 

include ("../../bd.php");
require("../../funciones.php");
mostrar_header();
if(isset( $_GET['txtID'] )){

    $txtID=(isset($_GET['txtID']))?$_GET['txtID']:"";

    $sentencia=$conexion->prepare("SELECT * from tbl_usuarios where id=:id");
    $sentencia->bindParam(":id",$txtID);
    $sentencia ->execute();
    $registro=$sentencia->fetch(PDO::FETCH_LAZY);
    $usuario=$registro["usuario"];
    $password=$registro["password"];
    $correo=$registro["correo"];
    $rut=$registro["rut"];
    $dv=$registro["dv"];
    $nombre=$registro["nombre"];
    $apellido_pat=$registro["apellido_pat"];
    $apellido_mat=$registro["apellido_mat"];
    $tipousuario=$registro["tipousuario"];
    $ingreso=$registro["ingreso"];
    $fincontrato=$registro["fincontrato"];
    $funcion=$registro["funcion"];
    $categoria=$registro["categoria"];
    $nivel=$registro["nivel"];
    $horas=$registro["horas"];
    



$sentencia=$conexion -> prepare ("SELECT * from tbl_tipo_categoria WHERE id=$txtID");
$sentencia ->execute();
$lista_categoria=$sentencia->fetchALL(PDO::FETCH_ASSOC);

$sentencia=$conexion -> prepare ("SELECT * from tbl_nivel_usuario WHERE id=$txtID");
$sentencia ->execute();
$lista_nivel=$sentencia->fetchALL(PDO::FETCH_ASSOC);
}
if($_POST){
    print_r($_POST); 
    
    // recolectamos los datos del POST 
   $txtID=(isset($_GET['txtID']))?$_GET['txtID']:"";
   $usuario=(isset($_POST["usuario"])?$_POST["usuario"]:"");
   $password=(isset($_POST["password"])?$_POST["password"]:"");
   $correo=(isset($_POST["correo"])?$_POST["correo"]:"");
   $rut=(isset($_POST["rut"])?$_POST["rut"]:"");
   $dv=(isset($_POST["dv"])?$_POST["dv"]:"");
   $nombre=(isset($_POST["nombre"])?$_POST["nombre"]:"");
   $apellido_pat=(isset($_POST["apellido_pat"])?$_POST["apellido_pat"]:"");
   $apellido_mat=(isset($_POST["apellido_mat"])?$_POST["apellido_mat"]:"");
   $tipousuario=(isset($_POST["tipousuario"])?$_POST["tipousuario"]:"");
   $ingreso=(isset($_POST["ingreso"])?$_POST["ingreso"]:"");
   $fincontrato=(isset($_POST["fincontrato"])?$_POST["fincontrato"]:"");
   $funcion=(isset($_POST["funcion"])?$_POST["funcion"]:"");
   $categoria=(isset($_POST["categoria"])?$_POST["categoria"]:"");
   $nivel=(isset($_POST["nivel"])?$_POST["nivel"]:"");
   $horas=(isset($_POST["horas"])?$_POST["horas"]:"");


   // preparar la iserccion de datos
   $sentencia=$conexion->prepare("UPDATE tbl_usuarios SET
   usuario=:usuario,
   password=:password,
   correo=:correo,
   rut=:rut,
   dv=:dv,
   nombre=:nombre,
   apellido_pat=:apellido_pat,
   apellido_mat=:apellido_mat,
   tipousuario=:tipousuario,
   ingreso=:ingreso,
   fincontrato=:fincontrato,
   funcion=:funcion,
   categoria=:categoria,
   nivel=:nivel,
   horas=:horas
   where id=:id");  
   // ASignando valores que vienen con el metodo  POST  los que vienen de los formularios..
   // asigna valores que tienene uso de :variable   
  
   $sentencia->bindParam(":usuario",$usuario);
   $sentencia->bindParam(":password",$password);
   $sentencia->bindParam(":correo",$correo);
   $sentencia->bindParam(":id",$txtID);
   $sentencia->bindParam(":rut",$rut);
   $sentencia->bindParam(":dv",$dv);
   $sentencia->bindParam(":nombre",$nombre);
   $sentencia->bindParam(":apellido_pat",$apellido_pat);
   $sentencia->bindParam(":apellido_mat",$apellido_mat);
   $sentencia->bindParam(":tipousuario",$tipousuario);
   $sentencia->bindParam(":ingreso",$ingreso);
   $sentencia->bindParam(":fincontrato",$fincontrato);
   $sentencia->bindParam(":funcion",$funcion);
   $sentencia->bindParam(":categoria",$categoria);
   $sentencia->bindParam(":nivel",$nivel);
   $sentencia->bindParam(":horas",$horas);
   $sentencia ->execute();
   header("location:index.php");
   }

   $sentencia=$conexion -> prepare ("SELECT * FROM `tbl_tipo_categoria`");
   $sentencia ->execute();
   $lista_tbl_puestos=$sentencia->fetchALL(PDO::FETCH_ASSOC);

   $sentencia=$conexion -> prepare ("SELECT  * from tipo_usuario");
$sentencia ->execute();
$listas=$sentencia->fetchALL(PDO::FETCH_ASSOC);

$sentencia=$conexion -> prepare ("SELECT  * from tbl_nivel_usuario");
$sentencia ->execute();
$listas_nivel=$sentencia->fetchALL(PDO::FETCH_ASSOC);

?>



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
        class="form-control" name="password" id="password" aria-describedby="helpId" placeholder="Escriba su Contraseña">
    </div>

    <div class="mb-3">
      <label for="correo" class="form-label">Correo</label>
      <input type="email"
        value="<?php echo $correo;?>"
        class="form-control" name="correo" id="correo" aria-describedby="helpId" >
        
    </div>
    <div class="mb-3">
      <label for="correo" class="form-label">Rut</label>
      <input type="numeric"
        value="<?php echo $rut;?>"
        class="form-control" name="rut" id="rut" aria-describedby="helpId" placeholder="Escriba Su Rut">
        
    </div>
    <div class="mb-3">
      <label for="correo" class="form-label">DV</label>
      <input type="numeric"
        value="<?php echo $dv;?>"
        class="form-control" name="dv" id="dv" aria-describedby="helpId" placeholder="Escriba Su DV">
        
    </div>
    <div class="mb-3">
      <label for="correo" class="form-label">Nombre</label>
      <input type="text"
        value="<?php echo $nombre;?>"
        class="form-control" name="nombre" id="nombre" aria-describedby="helpId" placeholder="Escriba Su DV">
        
    </div>
    <div class="mb-3">
      <label for="correo" class="form-label">Apellido Paterno</label>
      <input type="text"
        value="<?php echo $apellido_pat;?>"
        class="form-control" name="apellido_pat" id="apellido_pat" aria-describedby="helpId" placeholder="Apellido Paterno">
        
    </div>
    <div class="mb-3">
      <label for="correo" class="form-label">Apellido Materno</label>
      <input type="text"
        value="<?php echo $apellido_mat;?>"
        class="form-control" name="apellido_mat" id="apellido_mat" aria-describedby="helpId" placeholder="Escriba Su DV">
        
    </div>
    <div class="mb-3">
  <label for="tipousuario" class="form-label">Tipo Usuario</label>

    <select  class="form-select form-select-sm" name="tipousuario" id="tipousuario">
       <?php foreach($listas as $registro) {?>

        <option <?php echo ($tipousuario == $registro['id'])?"selected":"";?> value="<?php echo $registro['id']?>">
        <?php echo $registro['tipousuario']?>
        </option>
        <?php } ?> </select>

       </div>
        <div class="mb-3">
              <label for="ingreso" class="form-label">Fecha Ingreso</label>
              <input type="date"
              value="<?php echo $ingreso;?>" class="form-control" name="ingreso" id="ingreso">  
            </div>

            <div class="mb-3">
              <label for="ingreso" class="form-label">Trabaja HASTA</label>
              <input type="date"
              value="<?php echo $fincontrato;?>" class="form-control" name="fincontrato" id="fincontratoeso">  
            </div>
      <div class="mb-3">
      <label for="funcion" class="form-label">Funcion</label>
      <input type="text"
        value="<?php echo $funcion;?>"
        class="form-control" name="funcion" id="funcion" aria-describedby="helpId" placeholder="funcion">
        
    </div>

    <div class="mb-3">
  <label for="categoria" class="form-label">Categoria</label>

    <select  class="form-select form-select-sm" name="categoria" id="categoria">
       <?php foreach($lista_tbl_puestos as $registro) {?>

        <option <?php echo ($categoria == $registro['id'])?"selected":"";?> value="<?php echo $registro['id']?>">
        <?php echo $registro['descripcion']?>
        </option>
        <?php } ?> </select>

</div>


<div class="mb-3">
  <label for="nivel" class="form-label">Nivel</label>
  
    <select  class="form-select form-select-sm" name="nivel" id="nivel">
       <?php foreach($listas_nivel as $registro) {?>

        <option <?php echo ($nivel == $registro['id'])?"selected":"";?> value="<?php echo $registro['id']?>">
        <?php echo $registro['descripcion']?>
        </option>
        <?php } ?> </select>

        </div>
    <div class="mb-3">
      <label for="correo" class="form-label">Horas</label>
      <input type="numeric"
        value="<?php echo $horas;?>"
        class="form-control" name="horas" id="horas" aria-describedby="helpId" placeholder="Escriba Su Rut">
        
    </div>
       </div>

</div>
    <br>
    <button type="submit" class="btn btn-success">Editar</button> <a name="" id="" class="btn btn-danger" href="index.php" role="button">Cancelar</a>
  
</div>
   
</div>
<br>
<?php include("../../templates/footer.php"); ?>