<?php
include('conexion.php');
//verificar si se ha enviado el formulario de busqueda
if (isset($_POST['buscar'])) {
    $filtro=$_POST['filtro'];
    $busqueda=$_POST['buscar'];

    //Usamos sentencia preparada para evitar inyeccion SQL
    $sql="SELECT*FROM usuarios WHERE $filtro LIKE ?";// LIKE busca el registro
    $stmt=$conexion->prepare($sql);
    $param="%$busqueda%";
    $stmt->bind_param("s",$param);
    $stmt->execute();
    $result=$stmt->get_result();
}else{
//si  no hay busqueda, mostramos todos los empleados
    $sql="SELECT*FROM usuarios";
    $result=$conexion->query($sql);
}

if ($result->num_rows > 0) {
    echo"<table border='1'>
    <tr>
    <th>ID</th>
    <th>Nombre</th>
    <th>Correo</th>
    <th>Cargo</th>
     <th colspan='2'>Acciones</th>
    </tr>";

    while($row=$result->fetch_assoc()){
        echo" <tr>
        <td>".$row['id']."</td>
        <td>".$row['nombre']."</td>
        <td>".$row['correo']."</td>
        <td>".$row['cargo']."</td>
         <td><a href='eliminar.php?id=".$row['id']."'>Eliminar</a>
        <td><a href='actualizar.php?id=".$row['id']."'>Actualizar</a>
        </tr>";
    }
    echo"<table>";
    echo"<a href='adm_usuarios.php'>Regresar</a>";
}else{
    echo"0 resultados";
}

$conexion->close();
?>