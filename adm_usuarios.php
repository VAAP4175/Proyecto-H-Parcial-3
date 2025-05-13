<?php
include('conexion.php');
//Consulta los datos de la tabla en la base de datos
$sql="SELECT id,nombre,correo,contraseña,cargo FROM usuarios";
$result=$conexion->query($sql);//almacena la consulta
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="tabla.css">
    <link rel="stylesheet" href="menu_adm.css">
</head>
<!------------------------------------------------->
<body>
<header>
<h2>Lista de usuarios</h2>
</header>

<aside class="sidebar">
    <ul class="menu">
    <li class="active" onclick="window.location.href='inicio_adm.php'"><i>🏠</i>Inicio</li>
      <li onclick="window.location.href='adm_usuarios.php'"><i>👤</i>Usuarios</li>
      <li onclick="window.location.href='adm_grupos.php'"><i>📜</i>Grupos</li>
      <li onclick="window.location.href='adm_horarios.php'"><i>📄</i>Horarios</li>
      <li onclick="window.location.href='index.php'"><i>🔙</i>Salir</li>
    </ul>

</aside>
<main>

<!------------------------------------------------->
<section class="secregistroG">

<!------------------------------------------------->
<form action="buscar.php" method="post">
<label for="filtro">Buscar por:</label>
<select name="filtro" id="">
    <option value="id">ID</option>
    <option value="nombre">Nombre</option>
</select>
<input type="text" name="buscar" placeholder="Buscar..." required>
<input type="submit" value="buscar">
<button type="submit" onclick="window.location.href='adm_registro.php'">Registar usuario</button>
</form>
</section>
<!------------------------------------------------>
<section>
<table>
<tr>
                <th>id</th>
                <th>Nombre</th>
                <th>correo</th>
                <th>Cargo</th>
                <th colspan="2">Acciones</th><!--Colspan son las columnas que utiliza-->
</tr>
<?php
    if ($result->num_rows>0) {
    while($row=$result->fetch_assoc()){
        echo"<tr>
        <td>".$row['id']."</td>
        <td>".$row['nombre']."</td>
        <td>".$row['correo']."</td>
        <td>".$row['cargo']."</td>
        <td><a href='eliminar.php?id=".$row['id']."'>Eliminar</a>
        <td><a href='actualizar.php?id=".$row['id']."'>Actualizar</a>
        </tr>";
        }
    }
?>
</table>
</section>
</main>
<footer>UICSLP © 2025 </footer>
</body>
</html>