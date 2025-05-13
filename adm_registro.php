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
<h2>Registro de usuarios</h2>
</header>

<aside class="sidebar">

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

</aside>
<main>
<section class="registro">
        <form action="" method="post">
                        <legend>Registrar usuario</legend>
                        <input type="text" id="name" name="name" placeholder="Nombre" required> <br><br>
                        <input type="email" id="email" name="email" placeholder="Correo" required> <br><br>
                        <input type="password" id="password" name="password" placeholder="Contraseña" required> <br><br>

                        <label for="cargo">Cargo:</label>
                        <select name="cargo" id="cargo">
                            <option value="Docente">Docente</option>
                            <option value="Administrador">Administrador</option>
                        </select> <br><br>
                        <button type="submit">Enviar</button>
                        <?php
include('conexion.php');

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['name']) && isset($_POST['password']) && isset($_POST['email']) && isset($_POST['cargo'])) {
        $name = $_POST['name'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $email = $_POST['email'];
        $cargo = $_POST['cargo'];

        $sql = "INSERT INTO usuarios (nombre, correo, contraseña, cargo) VALUES (?, ?, ?, ?)";
        $stmt = $conexion->prepare($sql);
        
        if ($stmt) {
            $stmt->bind_param("ssss", $name, $email, $password, $cargo);
            if ($stmt->execute()) {
                echo "<br><br>Datos ingresados correctamente. <a href='adm_usuarios.php'>Regresar</a>";
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

        </form>
    </section>
    </main>
    <footer>UICSLP © 2025 </footer>
</body>
</html>