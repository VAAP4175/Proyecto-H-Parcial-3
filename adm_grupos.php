<?php
include('conexion.php');
//Consulta los datos de la tabla en la base de datos
$sql="SELECT id_grup,carrera,grado FROM grupos";
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
<body>
<header>
<h2>Grupos  UICSLP</h2>
</header>
<section>
    <div class="sidebar">
    <div class="logo">
      <img src="imgPH/logo2.png" alt="Logo UICSLP">
    </div>
    <ul class="menu">
    <li class="active"><i>🏠</i>Inicio</li>
      <li><i>👤</i>Usuarios</li>
      <li><i>📜</i>Grupos</li>
      <li><i>📄</i>Horarios</li>
      <li><i>⚙</i>Salir</li>
    </ul>
</section>
<!--------------------------------------------------------->
<section>
<h1>Lista de grupos</h1>
<form action="registro_G.php" method="post">
    <button type="submit">Registar grupo</button>      
</form>
</section>
<section>
    <table>
<tr>
                <th>id</th>
                <th>carrera</th>
                <th>grado</th>
                <th colspan="2">Acciones</th><!--Colspan son las columnas que utiliza-->
</tr>
<?php
    if ($result->num_rows>0) {
    while($row=$result->fetch_assoc()){
        echo"<tr>
        <td>".$row['id_grup']."</td>
        <td>".$row['grado']."</td>
        <td>".$row['carrera']."</td>
        <td><a href='eliminar_G.php?id=".$row['id_grup']."'>Eliminar</a>
        <td><a href='actualizar_G.php?id=".$row['id_grup']."'>Actualizar</a>
        </tr>";
        }
    }
?>
</table>
    </section>
    <footer> © 2025 UICSLP</footer>
</body>

</html>