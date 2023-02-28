<?php
include("../../../../bd.php");

switch ($_GET['type']) {
    case 'rrhh':
        //logica guardado jefe directo
        $sentencia=$conexion->prepare("UPDATE tbl_permisos SET rrhh={$_POST['check']} WHERE id = {$_POST['id']}");
        $sentencia->execute();
        echo json_encode(['error'=>false, 'msg' => 'Guardada aprobacion RRHH']);
        break;
    case 'jefecesfam':
        //logica guardado jefe cesfam
        break;
    default:
        echo json_encode(['error'=>true]);
}