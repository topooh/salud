<?php 
session_start();
 include ("../../bd.php");

 // llamando al header de admin me falta crear el switch
 include("../../templates/admin/header.php");
?>
<div class="card">
    <div class="card-header">

    <title> Solicitud de Reembolso </title>
        <h4>Solicitud de Reembolso </h4>
    </div>
    <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
              <label for="rut" class="form-label">Nombre Solicitante</label>
              <input type="text"
              value="<?php echo $_SESSION['nombre'];echo(" "); echo $_SESSION['apellido_pat']; echo(" "); echo $_SESSION['apellido_mat']; ?>"
                class="form-control" readonly name="nombre" id="nombre" aria-describedby="helpId" placeholder="<?php echo $_SESSION['nombre'];echo(" "); echo $_SESSION['apellido_pat']; echo(" "); echo $_SESSION['apellido_mat'];?>">
            </div>
            <div class="mb-3">
              <label for="rut" class="form-label">Rut</label>
              <input type="text"
              value="<?php echo $_SESSION['rut'];?>";
              
                class="form-control" readonly name="rut" id="rut" aria-describedby="helpId" placeholder="<?php echo $_SESSION['rut'];?>">
            </div>
            <div class="mb-3">
              <label for="" class="form-label">fecha Solicitud</label>
              <input type="date" class="form-control" name="fechasolicitud" id="rechasolicitud"value="<?php echo date('Y-m-d'); ?>" aria-describedby="emailHelpId">
              
            </div>
            <div class="mb-3">
                <label for="tiporeembolso" class="form-label">Tipo de Reembolso</label>
                <select class="form-select form-select-lg" name="tiporeembolso" id="tiporeembolso">
                    <option selected>Opcion 1</option>
                    <option value="">Opcion 2</option>
                    <option value="">Opcion 3</option>
                    <option value="">Opcion 4 </option>
                </select>
            </div>
            <div class="mb-3">
              <label for="fechaprestacion" class="form-label">Fecha Prestación</label>
              <input type="date" class="form-control" name="fechaprestacion" id="fechaprestacion">  
            </div>
            <div class="mb-3">
              <label for="archivo" class="form-label">Archivo</label>
              <input type="file" class="form-control" name="archivo" id="archivo" placeholder="" aria-describedby="fileHelpId">
            </div>
            <div class="mb-3">
              <label for="archivo2" class="form-label">Archivo 2:</label>
              <input type="file" class="form-control" name="archivo2" id="archivo2" placeholder="archivo2" aria-describedby="fileHelpId">
            </div>
            

            <button type="button" class="btn btn-primary">Enviar</button>
            <a name="cancelar" id="cancelar" class="btn btn-danger" href="#" role="button">Cancelar</a>
        </form>
    </div>
   
</div>


<?php include("../../templates/footer.php"); ?>




