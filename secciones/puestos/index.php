<?php 
session_start();
include("../../bd.php");

if(isset( $_GET['txtID'] )){

    $txtID=(isset($_GET['txtID']))?$_GET['txtID']:"";

    $sentencia=$conexion->prepare("DELETE FROM tbl_puestos WHERE id=:id");
    $sentencia->bindParam(":id",$txtID);
    $sentencia ->execute();
    $mensaje = "Puesto Eliminado";
header("location:index.php?mensaje=".$mensaje);


}
$sentencia=$conexion -> prepare ("select * from tbl_puestos");
$sentencia ->execute();
$lista_tbl_puestos=$sentencia->fetchALL(PDO::FETCH_ASSOC);
// print_R($lista_tbl_puestos); mostrar los datos que me esta trayendo desde la base de datos!!!
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

}
?>
<title> Puestos de Trabajo </title>

<br>
<center><h4>Puestos de Trabajo </h4></center>
<div class="card">
    <div class="card-header">
    <a name="id" id="id" class="btn btn-primary" href="crear.php" role="button">Agregar Puesto</a>    </div>
    <div class="card-body">
<div class="table-responsive-sm">
    <table class="table " id="tabla_id">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre Del puesto</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($lista_tbl_puestos as $registro){?>
           
            <tr class="">
                <td scope="row"><?php echo $registro['id']; ?></td>
                <td><?php echo $registro['nombredelpuesto']; ?></td>
                <td>
                <a class="btn btn-info" href="editar.php?txtID=<?php echo$registro['id'] ?>" role="button">Editar </a>
                <span>| 
                <a class="btn btn-danger" href="javascript:borrar(<?php echo$registro['id'] ?>);" role="button">Eliminar </a>
                </td>
            </tr>
            
            <?php } ?> 



        </tbody>
    </table>
</div>
    </div>
    
</div>


<?php include("../../templates/footer.php"); ?>