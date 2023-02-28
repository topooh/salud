<?php
$url_base="http://localhost/salud/"; 
if(!isset($_SESSION['usuario'])){ // obliga a redireccionar si no esta iniciado la secion.
  header("Location:".$url_base."login.php"); // no me esta tomando $url_base
}else{

}


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
  <title>Pagina principal </title>
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

<body>
  <header>
    <nav class="navbar navbar-expand navbar-light bg-light">
        <ul class="nav navbar-nav">
            <li class="nav-item">
                <a class="nav-link active" href="/salud/" aria-current="page">Sistema Web Director <span class="visually-hidden">(current)</span></a>
            </li>
            
            
            <div class="dropdown">
             <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
              Permisos
             </a>

              <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <li><a class="dropdown-item" href="<?php echo $url_base;?>templates/jefe-cesfam/secciones/permisos/">Permisos Pendientes</a></li>
                <li><a class="dropdown-item" href="<?php echo $url_base;?>templates/jefe-cesfam/secciones/permisos/firmados.php">Permisos Firmados</a></li>
              </ul>
            </div>
            
            <li class="nav-item">
                <a class="nav-link" href="<?php echo $url_base;?>cerrar.php">Cerrar Sesión</a>
            </li>
        </ul>
    </nav>
    <!-- place navbar here -->
  </header>
  <main class="container">

  <?php if(isset($_GET['mensaje']));
?>
<script>
    Swal.fire({icon:"success", title:"<?php echo $_GET['mensaje'];?>"});
    </script>
  
    