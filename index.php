<?php require ("funciones.php");

?>

<?php   require("bd.php");
$sentencia=$conexion->prepare("SELECT *,
(SELECT nombredelpuesto
FROM tbl_puestos
WHERE tbl_puestos.id=tbl_empleados.idpuesto limit 1) as puesto
from tbl_empleados");
$sentencia ->execute();
$lista_tbl_empleados=$sentencia->fetchALL(PDO::FETCH_ASSOC);
if(!isset($_SESSION['usuario'])){ // obliga a redireccionar si no esta iniciado la secion.
  header("Location:".$url_Base."login.php"); // no me esta tomando $url_base
}else{

}
?>

<title>Bienvenid@ <?php echo $_SESSION['nombre'] ?> </title>
<?php require("templates/header.php"); ?>
<?php 
?>

<br>
    <div class="p-5 mb-4 bg-light rounded-3">
        <div class="container-fluid py-5">
          <center><h1 class="display-5 fw-bold">INICIO</h1></center>
          <p class="col-md-8 fs-4">Bienvenido <?php echo $_SESSION['nombre'];echo(" "); echo $_SESSION['apellido_pat']; echo(" "); echo $_SESSION['apellido_mat'];?>
          <br>
           Tu correo Electronico es: <?php echo $_SESSION['correo'];?> 
        <br><br> <h2>Tu nivel de acceso es:  <?php echo saberusuario() ?> </h1></p>
        
          <td><a name="" id="" class="btn btn-primary" href="secciones/empleados/certificado-antiguedad.php?txtID=<?php echo$_SESSION['id'] ?>" role="button">Certificado Antiguedad</a>
 
       
          <button class="btn btn-primary btn-lg" type="button">boton</button>
        </div>
      </div>
      <?php include("templates/footer.php"); ?>
 