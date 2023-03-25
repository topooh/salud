<?php 
session_start(); 
include ("../../bd.php");
if(isset( $_GET['txtID'] )){

    $txtID=(isset($_GET['txtID']))?$_GET['txtID']:"";

    $sentencia=$conexion->prepare("SELECT * from tbl_usuarios where id=:id");
    $sentencia->bindParam(":id",$txtID);
    $sentencia ->execute();
    $registro=$sentencia->fetch(PDO::FETCH_LAZY);
    print_r ($registro);
    $primernombre=$registro["nombre"];
    $primerapellido=$registro["apellido_pat"];
    $segundoapellido=$registro["apellido_mat"];
    $rut=$registro["rut"];
    $dv=$registro["dv"];
    $idpuesto=$registro["idpuesto"];
    $ingreso=$registro["ingreso"];
    $fincontrato=$registro['fincontrato'];
    $funcion=$registro['funcion'];
    $categoria=$registro['categoria'];
    $nivel=$registro['nivel'];
    $horas=$registro['horas'];
  
    }
   

?>
<?php 
switch($categoria){
    case 1:
      // F
    
    $tipocategoria ="F";
    break;
    case 2:
    
      // E
      
      $tipocategoria ="E";
    break;
    case 3:
        // D
        $tipocategoria ="D";     
    break;
    case 4:
        $tipocategoria ="C";
    break; 
    case 5:
        $tipocategoria ="B";
    break;  
    case 6:
        $tipocategoria ="A";
    break; 
    default:
        echo ("default");
    }
    ?>

?>

<?php setlocale(LC_TIME, 'es'); // Establecer el idioma en español

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
    <title>CERTIFICADO ANTIGUEDAD </title>


<br><br>
<img src="http://localhost/salud/images/logomuni.png" alt="Imagen de ejemplo">


<br>
<P ALIGN=center><b><u>CERTIFICADO</u></b></P>
<br><br>
<?php
// paso mis variables de fecha a formato dia de mes del año
$fincotratoformato = strftime("%d de %B de %Y", strtotime($registro['fincontrato'])); 
$contratoformato= strftime("%d de %B de %Y", strtotime($registro['ingreso'])); 
?> 
<dd>Quien suscribe,Encargado de Recursos Humanos del Departamento de Salud de la I. Municipalidad de La</dd> Unión, R.U.T.: 69.200.800-6, representada legalmente por Don Juan Andrés Reinoso Carrillo, Cedula de Identidad N° 8.810.114-6, ambos con domicilio en Arturo Prat 680 de La Unión, certifica que:
<br> <br> 
<dd>Don <b> <?php echo ($primernombre . " " . $primerapellido . " " . $segundoapellido);?></b>, R.U.T: <b><?php echo ($rut . " - ". $dv);?></b>, es funcionario del Departamento de Salud de la I.</dd> Municipalidad de La Unión, 
<?php if($registro['fincontrato'] == "0000-00-00" || empty($registro['fincontrato']))
{

    echo( " con contrato a plazo Indefinido, regido por la Ley 19.378, Estatuto Administrativo de Atención Primaria de Salud, desde ".$contratoformato. " a la fecha.");
    
}
else
{
   
   
   echo("con contrato a plazo fijo, desde ".$contratoformato." y hasta el ".$fincotratoformato. " ,  regido por la Ley 19.378, Estatuto Administrativo de Atención Primaria de Salud.");

}
 ?> 
<br><br><dd>Actualmente se desempeña como,  <?php echo ($funcion);?></b>, Categoría <?php echo ($tipocategoria);?>, nivel <?php echo ($nivel);?>, con jornada de <?php echo ($horas);?> horas</dd> semanales.

<br><br>
<dd>Se extiende el presente certificado a petición del interesado para los fines que estime conveniente</dd>
</head>
<BR><BR><br><br>

<BR><BR><br>
<p ALIGN=center><img src="http://localhost/salud/images/firma.png" alt="Imagen de ejemplo"  height="45%" width="45%"/>
<P ALIGN=center><b>VICTOR HUGO PERALTA RIVAS</b></P>
<P ALIGN=center>RRHH DESAM LA UNIÓN</P>
<br>
<br>

<br>
Fecha de Impresión <br>
<?php
   $fecha_actual = date('d/m/Y');
   echo strftime("%d de %B de %Y", strtotime(str_replace('/', '-', $fecha_actual))); ?>

<body>
    
</body>
</html>

<?php 
$HTML=ob_get_clean();

use Dompdf\Dompdf;
use Dompdf\Options;
require_once("../../libs/autoload.inc.php");
$options = new Options();
$options->set('isRemoteEnabled', TRUE);
$dompdf= new Dompdf($options);
$dompdf ->loadHTML($HTML);
$dompdf -> setPaper('letter');
$dompdf -> render();
$dompdf ->stream("archivo.pdp",array ("Attachment"=>false))


?>

