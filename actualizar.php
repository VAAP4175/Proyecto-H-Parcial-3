<?php
include('conexion.php');

if (isset($_GET['id'])) {
    $id=intval($_GET['id']); //intval si es de tipo texto lo pasa a numerico

    $sql= "SELECT*FROM usuarios WHERE id=?";
    $stmt=$conexion->prepare($sql);
    $stmt->bind_param("i",$id);
    $stmt->execute();
    $result=$stmt->get_result();

    if ($result->num_rows>0) {
        $row=$result->fetch_assoc();
        $nombre=$row['nombre'];
        $correo=$row['correo'];
        $contraseña=$row['contraseña'];
        $cargo=$row['cargo'];
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
    $nombre=$_POST['name'];
    $correo=$_POST['email'];
    $contraseña=password_hash($_POST['password'],PASSWORD_DEFAULT);
    $cargo=$_POST['cargo'];

    $sql="UPDATE usuarios SET nombre=?,correo=?,contraseña=?,cargo=? WHERE id=?";
    $stmt=$conexion->prepare($sql);
    $stmt->bind_param("ssssi",$nombre,$correo,$contraseña,$cargo,$id);

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
    <h1>Actualizar empleados</h1>
</header>
<main>
<section>
<article>
<form action="" method="post">
<fieldset>
        <legend>Rellena los campos</legend>
        <input type="text" id="nombre" name="name" placeholder="Nombre" required> <br><br>
                        <input type="email" id="edad" name="email" placeholder="Correo" required> <br><br>
                        <input type="password" id="cedula" name="password" placeholder="Contraseña" required> <br><br>

                        <label for="cargo">Cargo:</label>
                        <select name="cargo" id="cargo">
                            <option value="Docente">Docente</option>
                            <option value="Administrador">Administrador</option>
                        </select> <br><br>
                        <button type="submit">Actualizar</button>
        <button type="button" onclick="window.location.href='adm_usuarios.php'">Regresar</button>

</fieldset>
</form>
</article>
</section>
</main>
<footer></footer>
</body>
</html>
