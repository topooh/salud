<?php include("templates/header.php"); ?>
    <br>
    <div class="p-5 mb-4 bg-light rounded-3">
        <div class="container-fluid py-5">
          <center><h1 class="display-5 fw-bold">INICIO</h1></center>
          <p class="col-md-8 fs-4">Bienvenido <?php echo $_SESSION['usuario'];?><br> Tu correo Electronico es: <?php echo $_SESSION['correo'];?></p>
          <button class="btn btn-primary btn-lg" type="button">boton</button>
        </div>
      </div>
      <?php include("templates/footer.php"); ?>
 