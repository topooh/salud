<?php   include("bd.php");
session_start();
if(!isset($_SESSION['usuario'])){ // obliga a redireccionar si no esta iniciado la secion.
  header("Location:".$url_Base."login.php"); // no me esta tomando $url_base
}else{

}
?>
<?php include("templates/header.php"); ?>
<?php switch ($_SESSION['tipousuario']){
case 1:
  $tipousuario="Usuario";
break;

case 2:
  $tipousuario="Jefe Directo";
  break;

case 3:
  $tipousuario = " Jefe Cesfam";
  break;

case 4: 
  $tipousuario = "Administrador";
  break; 
}
?>

<br>
    <div class="p-5 mb-4 bg-light rounded-3">
        <div class="container-fluid py-5">
          <center><h1 class="display-5 fw-bold">INICIO</h1></center>
          <p class="col-md-8 fs-4">Bienvenido <?php echo $_SESSION['usuario'];?><br> Tu correo Electronico es: <?php echo $_SESSION['correo'];?>
        <br><br> <h1>tu acceso es <?php echo $tipousuario ?> </h1></p>
       
          <button class="btn btn-primary btn-lg" type="button">boton</button>
        </div>
      </div>
      <?php include("templates/footer.php"); ?>
 