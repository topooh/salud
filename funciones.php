<?php 
session_start();



// Funcion Para index mostrar tipo de usuario es en el Index 
function saberusuario(){
  switch ($_SESSION['tipousuario']){
    case 1:
     
      $tipousuario="Usuario";
    break;
    
    case 2:
      $tipousuario="Jefe Directo";
      break;
    
    case 3:
      $tipousuario = " Director";
      break;
    
    case 4: 
      $tipousuario = "Administrador";
      break; 
    case 5:
      $tipousuario = "Recursos Humanos";
      break;
    case 6:
      $tipousuario = "Super Jefe";
      break;
  }

  return $tipousuario;
}

?>

 
<?php
function mostrar_header() {
  switch($_SESSION['tipousuario']) {
    case 1:
      include("templates/usuario/header.php");
      break;
    case 2:
      include("templates/jefe-directo/header.php");
      break;
    case 3:
      include("templates/jefe-cesfam/header.php");
      break;
    case 4:
      include("templates/admin/header.php");
      break;
    case 5:
      include("templates/RRHH/header.php");
      break;
    case 6:
      include("templates/super/header.php");
      break;
    default:
      echo "Error: tipo de usuario no reconocido";
      break;
  }
}
?>

