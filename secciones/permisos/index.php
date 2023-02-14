<?php include("../../templates/header.php"); ?>

<br><br>

<center><h4> Listado de Permisos </h4></center>
<div class="card">
    
    <div class="card-header">
        Listado de Permisos <a name="pedir" id="pedir" class="btn btn-primary" href="pedir.php" role="button">Pedir Permiso</a>
    </div>
    <div class="card-body">
<div class="table-responsive-sm">
    <table class="table" id="tabla_id">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Trabajador</th>
                <th scope="col">Tipo De Permiso</th>
                <th scope="col">Fecha Solicitud</th>
                <th scope="col">Fecha Permiso</th>
                <th scope="col">Permiso Hasta</th>
                <th scope="col">Jornada</th>
                <th scope="col">Jefe Directo</th>
                <th scope="col">Jefe CESFAM</th>
            </tr>
        </thead>
        <tbody>
            <tr class="">
                <td scope="row">ID!!</td>
                <td>Nombre Trabajador</td>
                <td>Tipo de Permiso</td>
                <td>02-02-2023</td>
                <td>14-02-2023</td>
                <td>15-02-2023</td>
                <td>TARDE</td>
                <td>
                    <div class="form-check">
                     <input class="form-check-input" type="checkbox" value="" id="jefedirecto">
                    <label class="form-check-label" for="jefedirecto">
                     Aprobar
                     </label>
                    </div> 
                </td>
                <td> 
                <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="jefecesfam" >
                 <label class="form-check-label" for="jefecesfam">
                  Aprobar
                  </label>
                </div>
                </td>
            </tr>
            
        </tbody>
    </table>
</div>

    </div>
    <div class="card-footer text-muted">
        Footer
    </div>
</div>
<?php include("../../templates/footer.php"); ?>