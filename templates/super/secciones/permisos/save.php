<?php
include("../../../../bd.php");

switch ($_GET['type']) {
    case 'jefedirecto':
        //logica guardado jefe directo
        $sentencia=$conexion->prepare("UPDATE tbl_permisos SET jefedirecto={$_POST['check']} WHERE id = {$_POST['id']}");
        $sentencia->execute();
        echo json_encode(['error'=>false, 'msg' => 'Guardada aprobacion jefe directo']);
        break;
    case 'jefecesfam':
        //logica guardado jefe cesfam
        $sentencia=$conexion->prepare("UPDATE tbl_permisos SET jefecesfam={$_POST['check']} WHERE id = {$_POST['id']}");
        $sentencia->execute();
        echo json_encode(['error'=>false, 'msg' => 'Guardada aprobacion jefe directo']);
        break;

    default:
        echo json_encode(['error'=>true]);
}