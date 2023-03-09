<?php

$url_base="http://localhost/salud/"; 


?>
<script> //llevar a lfooter no se por que no me toma
 function borrar(id){
        Swal.fire({
  title: '¿Deseas Borrar el registro?',
  showCancelButton: true,
  confirmButtonText: 'Si, Borrar',
}).then((result) => {
    if(result.isConfirmed){
        window.location="index.php?txtID="+id;
    }
})

        //index.php?txtID=
    }
  </script>
<!doctype html>
<html lang="es">

<head>
  
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.css">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>



<?php
  switch($_SESSION['tipousuario']){
case 1:
   // echo("tipo de usuario 1");
   include("templates/usuario/header.php");
  break;
case 2:
    // echo("tipo Jefe directo");
    include("templates/jefe-directo/header.php");
  break;
case 3:
  //jefe Cesfam
  include("templates/jefe-cesfam/header.php");
  break;
case 4:
  // admin 
  include("templates/admin/header.php");
  break;  

 // RRHH
case 5:
  include("templates/RRHH/header.php");
  break;
   // SUPER JEFE
case 6:
  include("templates/super/header.php");

  
  }
  ?>
  <body>
  <header>
   
    <!-- place navbar here -->
  </header>
  <main class="container">

  <?php if(isset($_GET['mensaje']));
?>
<script>
    Swal.fire({icon:"success", title:"<?php echo $_GET['mensaje'];?>"});
    </script>

    