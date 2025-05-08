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
                        <button type="submit">Registrar</button>
       
                        <?php
include('conexion.php');

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['carrera']) && isset($_POST['grado'])) {
        $carrera = $_POST['carrera'];
        $grado = $_POST['grado'];

        $sql = "INSERT INTO grupos (grado, carrera) VALUES (?, ?)";
        $stmt = $conexion->prepare($sql);
        
        if ($stmt) {
            $stmt->bind_param("ss", $carrera, $grado);
            if ($stmt->execute()) {
                echo "<br><br>Datos ingresados correctamente. <a href='adm_grupos.php'>Regresar</a>";
            } else {
                echo "<br><br>Error: " . $stmt->error;
            }
            $stmt->close();
        } else {
            echo "<br><br>Error en la preparación de la consulta: " . $conexion->error;
        }
    }
}

$conexion->close();
?>

</fieldset>
</form>
</article>
</section>
</main>
</body>
</html>