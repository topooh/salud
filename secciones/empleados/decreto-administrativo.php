<?php  
include ("../../bd.php.");
if(isset( $_GET['txtID'] )){

    $txtID=(isset($_GET['txtID']))?$_GET['txtID']:"";

    $sentencia=$conexion->prepare("SELECT * from tbl_empleados where id=:id");
    $sentencia->bindParam(":id",$txtID);
    $sentencia ->execute();
    $registro=$sentencia->fetch(PDO::FETCH_LAZY);
    print_r ($registro);
    $primernombre=$registro["primernombre"];
    $segundonombre=$registro["segundonombre"];
    $primerapellido=$registro["primerapellido"];
    $segundoapellido=$registro["segundoapellido"];
    $foto=$registro["foto"];
    $cv=$registro["cv"];
    $idpuesto=$registro["idpuesto"];
    $fechaingreso=$registro["fechaingreso"];
    }
?>
ob_start();
<!DOCTYPE html>
<html lang="es-ES">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Decreto </title>

    <P ALIGN=right><b>AUTORIZA PERMISO 
ADMINISTRATIVO</b></P>
<br><br>


<P ALIGN=right><b>DECRETO AFECTO N° ______</b></P>
<br><br>
<B> VISTOS </B><BR><BR>
Lo dispuesto en la Ley Nº19.378, Estatuto Atención Primaria de Salud Municipal y, en uso de las facultades que me confiere la Ley Nº18.695, Orgánica Constitucional de Municipalidades. Lo dispuesto en la Ley Nº 18.883 Estatuto de los Funcionarios Municipales, la Ley Nº 19.378, Estatuto Atención Primaria de Salud Municipal y, en uso de las facultades que me confiere la Ley Nº 18.695 Orgánica Constitucional de Municipalidades y sus posteriores modificaciones. 
<br> <br> El Decreto Afecto N°01 de fecha 03 de enero de 2023, designa Secretaria Municipal subrogante a doña Germana Peña Pinuer.

<br><br>
<b>Considerando </B>
    <BR><BR>
    Las solicitudes de permisos de los funcionarios de la Salud Municipal adjuntas:

                                                                     Que le corresponde a la autoridad administrativa adoptar las medidas y celebrar los actos y contratos que resguarden el normal y correcto funcionamiento de la administración, permitiéndole cumplir eficazmente sus objetivos, tareas y actividades permanentes y asegurar la continuidad de sus funciones:  

</head>
<BR><BR>
<B>DECRETO</B>
<BR><BR>

<body>
    
</body>
</html>

<?php 
$HTML=ob_get_clean();
require_once("../../libs/autoload.inc.php");
use Dompdf\Dompdf;
$dompdf= new Dompdf();
$opciones=$dompdf->getOptions();
$opciones ->set(array("isRemoteEnable"=>true));
$dompdf ->setOptions($opciones);
$dompdf ->loadHTML($HTML);
$dompdf -> setPaper('letter');
$dompdf -> render();
$dompdf ->stream("archivo.pdp",array ("Attachment"=>false))
?>

