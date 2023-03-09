<?php 
session_start(); 
include ("../../bd.php.");
if(isset( $_GET['txtID'] )){

    $txtID=(isset($_GET['txtID']))?$_GET['txtID']:"";

    $sentencia=$conexion->prepare("SELECT * from tbl_usuarios where id=:id");
    $sentencia->bindParam(":id",$txtID);
    $sentencia ->execute();
    $registro=$sentencia->fetch(PDO::FETCH_LAZY);
    print_r ($registro);
    $primernombre=$registro["nombre"];
    $segundonombre=$registro["segundonombre"];
    $primerapellido=$registro["apellido_pat"];
    $segundoapellido=$registro["apellido_mat"];
    $rut=$registro["rut"];
    $dv=$registro["dv"];
    $idpuesto=$registro["idpuesto"];
    $fechaingreso=$registro["fechaingreso"];
    }

?>

<?php setlocale(LC_TIME, 'es_ES.UTF-8'); // Establecer el idioma en español

$fecha_actual =date('d/m/Y'); // Obtener la fecha actual en formato deseado

echo strftime("%d de %B de %Y", strtotime($fecha_actual)); // Imprimir la fecha formateada en español
?>
ob_start();
<!DOCTYPE html>
<html lang="es-ES">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CERTIFICADO Antiguedad </title>


<br><br>
<img src="../logo.jpg" alt="Logo de la municipalidad">

<br>
<P ALIGN=center><b><u>CERTIFICADO</u></b></P>
<br><br>

<dd>Quien suscribe,Encargado de Recursos Humanos del Departamento de Salud de la I. Municipalidad de La</dd> Unión, R.U.T.: 69.200.800-6, representada legalmente por Don Juan Andrés Reinoso Carrillo, Cedula de Identidad N° 8.810.114-6, ambos con domicilio en Arturo Prat 680 de La Unión, certifica que:
<br> <br> 
<dd>Don <b> <?php echo ($primernombre . " " . $primerapellido . " " . $segundoapellido);?></b>, R.U.T.: <?php echo ($rut . "-". $dv);?>, es funcionario del Departamento de Salud de la I.</dd> Municipalidad de La Unión, desde el 03 de agosto de 2020 y hasta el 31 de diciembre de 2023, con contrato a plazo fijo, regido por la Ley 19.378, Estatuto Administrativo de Atención Primaria de Salud.

<br><br><dd>Actualmente se desempeña como Técnico en Electricidad, Categoría C, nivel 15, con jornada de 44 horas</dd> semanales.

<br><br>
<dd>Se extiende el presente certificado a petición del interesado para los fines que estime conveniente</dd>
</head>
<BR><BR><br><br>

<BR><BR>

<P ALIGN=center><b>VICTOR HUGO PERALTA RIVAS</b></P>
<P ALIGN=center>RRHH DESAM LA UNIÓN</P>
<br>
<br>
<br>
<br>
<br>
<?php echo strftime("%d de %B de %Y", strtotime($fecha_actual)); // mostrar FECHA ?>
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

