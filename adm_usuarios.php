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
    <link rel="stylesheet" href="menu_adm.cs">
</head>
<!------------------------------------------------->
<body>
<header>
<h1>usuarios</h1>
</header>
<main>
    <section><div class="sidebar">
    <div class="logo">
      <img src="" alt="Logo UICSLP">
    </div>
    <ul class="menu">
    <li class="active"><i>🏠</i>Inicio</li>
      <li><i>👤</i><a href="adm_usuarios.php">Usuarios</a></li>
      <li><i>📜</i>Grupos</li>
      <li><i>📄</i>Horarios</li>
      <li><i>⚙</i>Opciones</li>
    </ul>
    <div class="footer"> © 2025</div>
  </div>
</section>
<!------------------------------------------------->
<section>
<h1>Lista de usuarios</h1>
<form action="adm_registro.php" method="post">
            <button type="submit">Registar usuario</button>      
</form>
<!------------------------------------------------->
<form action="buscar.php" method="post">
<label for="filtro">Buscar por:</label>
<select name="filtro" id="">
    <option value="id">ID</option>
    <option value="nombre">Nombre</option>
</select>
<input type="text" name="buscar" placeholder="Buscar..." required>
<input type="submit" value="buscar">
</form>
</section>
<!------------------------------------------------>
<section>
<table>
<tr>
                <th>id</th>
                <th>Nombre</th>
                <th>correo</th>
                <th>Contraseña</th>
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
        <td>".$row['contraseña']."</td>
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
</body>
<footer>
<h1>UICSLP</h1>
</footer>
</html>