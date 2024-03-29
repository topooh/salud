<?php
include("../../../../bd.php");
session_start();
$nombrecompleto= $_SESSION['nombre'].' '.$_SESSION['apellido_pat'];
switch ($_GET['type']) {
    case 'jefedirecto':
        //logica guardado jefe directo
        $sentencia=$conexion->prepare("UPDATE tbl_permisos SET jefedirecto={$_POST['check']} WHERE id = {$_POST['id']}");
        $sentencia->execute();
        echo json_encode(['error'=>false, 'msg' => 'Guardada aprobacion jefe directo']);
        break;
    case 'jefecesfam':
        //logica guardado jefe cesfam
        $sentencia=$conexion->prepare("UPDATE tbl_permisos SET jefecesfam={$_POST['check']}, firmacesfam='{$nombrecompleto}' WHERE id = {$_POST['id']}");
        $sentencia->execute();
        echo json_encode(['error'=>false, 'msg' => 'Guardada aprobacion jefe Cesfam']);
        break;

    case 'rrhh':
        //logica guardado jefe cesfam
        $sentencia=$conexion->prepare("UPDATE tbl_permisos SET rrhh={$_POST['check']} WHERE id = {$_POST['id']}");
        $sentencia->execute();
        echo json_encode(['error'=>false, 'msg' => 'Guardada aprobacion RRHH']);
        break;
    case 'estado_permiso':
        //logica guardado jefe cesfam
        $sentencia=$conexion->prepare("UPDATE tbl_permisos SET estado_permiso=? WHERE id = ?");
        $sentencia->execute([$_POST['select'], $_POST['id']]);
        $sentencia->execute();
        echo json_encode(['error'=>false, 'msg' => 'Guardada Estado Permiso']);
        break;
    default:
        echo json_encode(['error'=>true]);
}