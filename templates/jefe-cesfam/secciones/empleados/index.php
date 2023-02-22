<?php
$url_base="http://localhost/salud/"; 
if(!isset($_SESSION['usuario'])){ // obliga a redireccionar si no esta iniciado la secion.
  header("Location:".$url_base."login.php"); // no me esta tomando $url_base
}else{

}
include ("../../../../bd.php");
if(isset( $_GET['txtID'] )){

    $txtID=(isset($_GET['txtID']))?$_GET['txtID']:"";

    $sentencia=$conexion->prepare("DELETE FROM tbl_empleados WHERE id=:id");
    $sentencia->bindParam(":id",$txtID);
    $sentencia ->execute();
    $mensaje = "Trabajador Eliminado";



}

$sentencia=$conexion->prepare("SELECT *,
(SELECT nombredelpuesto
FROM tbl_puestos
WHERE tbl_puestos.id=tbl_empleados.idpuesto limit 1) as puesto
from tbl_empleados");
$sentencia ->execute();
$lista_tbl_empleados=$sentencia->fetchALL(PDO::FETCH_ASSOC);

?>
<?php
session_start();
switch($_SESSION['tipousuario']){
case 1:
  // TIPO USUARIO NORMAL 
echo("tipo de usuario 1");
include("../../templates/usuario/header.php");
break;
case 2:

  // JEFE DIRECTO
  echo("tipo usuario 2");
  include("../../templates/jefe-directo/header.php");
break;
case 3:

  // JEFE CESFAM

include("../../../../templates/jefe-cesfam/header.php");
break;
case 4:
  // ADMIN
include("../../templates/admin/header.php");
break;  

}
?>

<center><h4>Personal</h4></center>
<div class="card">

    <div class="card-header">
        
        <a name="" id="" class="btn btn-primary" href="crear.php" role="button">Agregar Personal</a>
    </div>
    <div class="card-body">
    <div class="table-responsive">
        <table class="table" id="tabla_id">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Foto</th>
                    <th scope="col">CV</th>
                    <th scope="col">Puesto</th>
                    <th scope="col">Fecha Ingreso</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>

            <?php foreach($lista_tbl_empleados as $registro){?>
                <tr class="">
                    <td><?php echo $registro['id']; ?></td>
                    <td scope="row">
                     <?php echo $registro['primernombre']; ?>
                     <?php echo $registro['segundonombre']; ?>
                     <?php echo $registro['primerapellido']; ?> 
                     <?php echo $registro['segundoapellido']; ?></td>
                    <td><?php echo $registro['foto']; ?></td>
                    <td><?php echo $registro['cv']; ?></td>
                    <td><?php echo $registro['puesto']; ?></td>
                    <td><?php echo $registro['fechaingreso']; ?></td>
                    <td><a name="" id="" class="btn btn-primary" href="decreto-administrativo.php?txtID=<?php echo$registro['id'] ?>" role="button">Decreto</a> |
                     <a class="btn btn-info" href="editar.php?txtID=<?php echo$registro['id'] ?>" role="button">Editar </a>
                <span>| 
                <a class="btn btn-danger" href="javascript:borrar(<?php echo$registro['id'] ?>);" role="button">Eliminar </a></tr>
                <?php } ?> 
                
            </tbody>
        </table>
    </div>
    
    </div>
</div>
 <script>

            //llevar a lfooter no se por que no me toma
    function borrar(id){
        Swal.fire({
  title: '¿Deseas Borrar los registros ?',
  showCancelButton: true,
  confirmButtonText: 'Si, Borrar',
}).then((result) => {
  /* Read more about isConfirmed, isDenied below */
  if (result.isConfirmed) {
    Swal.fire('Trabajador Eliminado!', '', 'success')
    window.location="index.php?txtID="+id;
  } else if (result.isDenied) {
    Swal.fire('Los Cambios No se Guardaron', '', 'info')
  }
})

        //index.php?txtID=
    }
 </script>
  </script>
<?php include("../../../../templates/footer.php"); ?>