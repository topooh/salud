<?php
include ("../../bd.php");


$sentencia=$conexion->prepare("SELECT *,
(SELECT nombredelpuesto
FROM tbl_puestos
WHERE tbl_puestos.id=tbl_empleados.idpuesto limit 1) as puesto
from tbl_empleados");
$sentencia ->execute();
$lista_tbl_empleados=$sentencia->fetchALL(PDO::FETCH_ASSOC);

?>
<?php include("../../templates/header.php"); ?>

<center><h4>Personal</h4></center>
<div class="card">

    <div class="card-header">
        
        <a name="" id="" class="btn btn-primary" href="crear.php" role="button">Agregar Personal</a>
    </div>
    <div class="card-body">
    <div class="table-responsive">
        <table class="table">
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
                    <td><a name="" id="" class="btn btn-primary" href="#" role="button">Decreto</a> | <a name="" id="" class="btn btn-info" href="#" role="button">Editar</a>  | <a name="" id="" class="btn btn-danger" href="#" role="button">Eliminar</a> </td>
                </tr>
                <?php } ?> 
                
            </tbody>
        </table>
    </div>
    
    </div>
</div>

<?php include("../../templates/footer.php"); ?>