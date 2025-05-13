<?php
include('conexion.php');
//Consulta los datos de la tabla en la base de datos
$sql="SELECT id_grup,grado FROM grupos";
$result=$conexion->query($sql);//almacena la consulta
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seleccion Alumnos</title>
    <link rel="stylesheet" href="h_alumnos.css">
</head>
<body>
    <header><h2>Horarios</h2></header>
<main>
    <section>
       <?php

$query = "SELECT id_grup,grado, carrera FROM grupos";
$resultado = $conexion->query($query);

echo "<select name='opcion'>";
while ($fila = $resultado->fetch_assoc()) {
    echo "<option value='" . $fila['id_grup'] . "'>" . $fila['carrera'] ." ". $fila['grado'] . "</option>";
}
echo "</select>";

?>

    </section>
</main>
<footer>
  <!-- Íconos de Font Awesome para los símbolos -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <div class="footer">
    <div>Universidad Intercultural de San Luis Potosí</div>
    <div><i class="fas fa-map-marker-alt"></i> Rectoría: Mariano Arista 925, Col. Tequisquiapan</div>
    <div><i class="fas fa-phone-alt"></i>  Tel. (444)8138070</div>
    <div>San Luis Potosí, S.L.P. &nbsp; 2025</div>
  </div>
</footer>
</body>
</html>