<?php
include('conexion.php');

if (isset($_GET['id'])) {
    $id=intval($_GET['id']); //intval si es de tipo texto lo pasa a numerico

    $sql= "SELECT*FROM grupos WHERE id_grup=?";
    $stmt=$conexion->prepare($sql);
    $stmt->bind_param("i",$id);
    $stmt->execute();
    $result=$stmt->get_result();

    if ($result->num_rows>0) {
        $row=$result->fetch_assoc();
        $nombre=$row['grado'];
        $correo=$row['carrera'];
    }else{
        echo"Registro no encontrado. ";
        exit();
    }
    $stmt->close();
}else{
    echo"No se ha proporciado un ID valido.";
    exit();
}

if ($_SERVER['REQUEST_METHOD']=="POST") {
    $carrera=$_POST['carrera'];
    $grado=$_POST['grado'];

    $sql="UPDATE grupos SET grado=?,carrera=? WHERE id_grup=?";
    $stmt=$conexion->prepare($sql);
    $stmt->bind_param("ssi",$carrera,$grado,$id);

    if ($stmt->execute()===TRUE) {
        echo"Registro actualizado exitosamente";
    }else{
        echo"Error al actualizar el registro ". $stmt->error;
    }
    $stmt->close();
}
?>
<!-- ------------------------------------------------------------------------------- -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<header>
    <h1>Actualizar grupos</h1>
</header>
<main>
<section>
<article>
<form action="" method="post">
<fieldset>
<legend>Rellena los campos</legend>
        <label for="carrera">Selecciona la carrera</label> <br><br>
        <select name="carrera" id="carrera">
            <option value="Infromatica Administrativa">Informatica</option>
            <option value="Licenciatura en derecho">Derecho</option>
            <option value="Ingenieria Industrial">Ingenieria</option>
        </select> <br><br>
        <label for="grado">Selecciona un grado</label> <br><br>
        <select name="grado" id="grado">
            <option value="1">Primero</option>
            <option value="2">Segundo</option>
            <option value="3">Tercero</option>
            <option value="4">Cuarto</option>
            <option value="5">Quinto</option>
            <option value="6">Sexto</option>
            <option value="7">Septimlo</option>
            <option value="8">Octavo</option>
            <option value="9">Noveno</option>
        </select> <br><br>
                        <button type="submit">Actualizar</button>
                        <button type="button" onclick="window.location.href='adm_grupos.php'">Regresar</button>
       
</fieldset>
</form>
</article>
</section>
</main>
</body>
</html>
