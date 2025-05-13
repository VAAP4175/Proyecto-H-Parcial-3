
<!-- ------------------------------------------------------------------------------- -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="menu_adm.css">
</head>
<body>
<header>
<h2>Actualizar Usuarios</h2>
</header>
<section>
    <div class="sidebar">
    <div class="logo">
      <img src="imgPH/logo2.png" alt="Logo UICSLP">
    </div>
    <ul class="menu">
    <li class="active" onclick="window.location.href='inicio_adm.php'"><i>🏠</i>Inicio</li>
      <li onclick="window.location.href='adm_usuarios.php'"><i>👤</i>Usuarios</li>
      <li onclick="window.location.href='adm_grupos.php'"><i>📜</i>Grupos</li>
      <li onclick="window.location.href='adm_horarios.php'"><i>📄</i>Horarios</li>
      <li onclick="window.location.href='index.php'"><i>🔙</i>Salir</li>
    </ul>
</section>
<main>
<section class="registro">
<article>
<form action="" method="post">

        <label for="carrera">Selecciona la carrera</label> <br><br>
        <select name="carrera" id="carrera">
            <option value="Infromatica Administrativa">Informatica</option>
            <option value="Licenciatura en derecho">Derecho</option>
            <option value="Ingenieria Industrial">Ingenieria</option>
        </select> <br><br>
        <label for="grado">Selecciona un grado</label> <br><br>
        <select name="grado" id="grado">
            <option value="1°">Primero</option>
            <option value="2°">Segundo</option>
            <option value="3°">Tercero</option>
            <option value="4°">Cuarto</option>
            <option value="5°">Quinto</option>
            <option value="6°">Sexto</option>
            <option value="7°">Septimlo</option>
            <option value="8°">Octavo</option>
            <option value="9°">Noveno</option>
        </select> <br><br>
        <label for="grupo">Selecciona un grupo</label> <br><br>
        <select name="grupo" id="turno">
            <option value="A">A</option>
            <option value="B">B</option>
             <option value="Unico">Unico</option>
            </select> <br><br>
        <label for="turno">Turno</label> <br><br>
        <select name="turno" id="turno">
            <option value="Matutino">Mañana</option>
            <option value="Vespertino">Tarde</option>
            </select> <br><br>

                        <button type="submit">Actualizar</button>
                        <button type="button" onclick="window.location.href='adm_grupos.php'">Regresar</button> <br><br>
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
        $turno=$row['turno'];
        $grupo=$row['grupo'];
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
    $turno=$_POST['turno'];
    $grupo=$_POST['grupo'];

    $sql="UPDATE grupos SET grado=?,carrera=?,grupo=?,turno=? WHERE id_grup=?";
    $stmt=$conexion->prepare($sql);
    $stmt->bind_param("ssssi",$carrera,$grado,$grupo,$turno,$id);

    if ($stmt->execute()===TRUE) {
        echo"Registro actualizado exitosamente";
    }else{
        echo"Error al actualizar el registro ". $stmt->error;
    }
    $stmt->close();
}
?>


</form>
</article>
</section>
</main>
<footer>UICSLP © 2025</footer>
</body>
</html>
