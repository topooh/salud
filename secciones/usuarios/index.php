<?php include("../../templates/header.php"); ?>
<br>
<center><h4>Panel de Usuarios</h4></center>
<div class="card">
    <div class="card-header">
    <a name="" id="" class="btn btn-primary" href="crear.php" role="button">Agregar Usuario</a>    </div>
    <div class="card-body">
<div class="table-responsive-sm">
    <table class="table ">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre Del Usuario</th>
                <th scope="col">Contraseña</th>
                <th scope="col">Correo</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <tr class="">
                <td scope="row">1</td>
                <td>Matias Muñoz</td>
                <td>******</td>
                <td>matiasi.munozg@gmail.com</td>
                <td><input name="BtnEditar" id="BtnEditar" class="btn btn-info" type="button" value="Editar">
                <span>| <input name="BtnEliminar" id="BtnEliminar" class="btn btn-danger" type="button" value="Eliminar">
                </td>
            </tr>
          
        </tbody>
    </table>
</div>
    </div>
    
</div>

<?php include("../../templates/footer.php"); ?>