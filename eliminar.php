<?php
include('conexion.php');
//verificar si se ha enviado el parametro "id" a travez de URL
if (isset($_GET['id'])) {
    $id=$_GET['id'];

    //Preparar el comando para eliminar el registro almacenado en el sql
    $sql="DELETE FROM usuarios WHERE id=$id";

    if ($conexion->query($sql)==TRUE) {
        echo"Usuario eliminado: . <a href=adm_usuarios.php>REGRESAR</a>";
    }else{
        echo"Error al aliminar el usuario:".$conexion->error;
    }
    }else{
        echo"No se proporciono ningun id para eliminar.";
    }
    $conexion->close();
?>