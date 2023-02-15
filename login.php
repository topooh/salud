<?php
session_start();
if($_POST){
    include("./bd.php");
    
    $sentencia=$conexion->prepare("select *,count(*)as n_usuarios
    FROM tbl_usuarios
    WHERE usuario=:usuario
    AND password=:password");
    $usuario=$_POST["usuario"];
    $contrasenia=$_POST["contrasenia"];
    $sentencia->bindParam(":usuario",$usuario);
    $sentencia->bindParam(":password",$contrasenia);
    $sentencia->execute();
    $registro=$sentencia->fetch(PDO::FETCH_LAZY);
    print_r($registro);
    if($registro["n_usuarios"]==1){
        $_SESSION['usuario']=$registro["usuario"]; // declaro las variables de sesion es decir estas son las que llamo en el index
        $_SESSION['logueado']= true;
        $_SESSION['password']=$registro["password"];
        $_SESSION['correo']=$registro["correo"];
        header("Location: index.php");

    }else{$mensaje = "Error: Usuario o contraseña incorrecta";
    }
}
?>

<!doctype html>
<html lang="en">

<head>
  <title>Login</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
  <header>
    <!-- place navbar here -->
  </header>
  <main class="container">
    <div class="row">
    <div class="col-md-4">
</div>
    <div class="col-md-4">
        <br><br>
        <div class="card">
            <div class="card-header">
                Login
            </div>
            <div class="card-body">
                <?php if(isset($mensaje)){ ?>
                <div class="alert alert-danger" role="alert">
                    <strong><?php echo $mensaje?></strong> 
                </div>
                <?php } ?>
                <form action="" method="post">
                <div class="mb-3">
                  <label for="usuario" class="form-label">Usuario</label>
                  <input type="text"
                    class="form-control" name="usuario" id="usuario" aria-describedby="helpId" placeholder="Escriba su Usuario">
                
                    <div class="mb-3">
                  <label for="contrasenia" class="form-label">Contraseña</label>
                  <input type="password"
                    class="form-control" name="contrasenia" id="contrasenia" aria-describedby="helpId" placeholder="Escriba su contraseña">
            
                </div>
                </div><button type="submit" class="btn btn-primary">Ingresar</button>
            </div>
            </form>
        </div>
</div>

  </main>
  <footer>
    <!-- place footer here -->
  </footer>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>