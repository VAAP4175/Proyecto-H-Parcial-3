<?php
include('conexion.php'); // Conexión a la base de datos

// Inicia sesión para almacenar datos
session_start();

// Verifica si el formulario ha sido enviado mediante el método POST
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    
    $usuario = $_POST['email_log'];
    $password = $_POST['password_log'];

    if (empty($usuario) || empty($password)) {
        echo "Por favor, rellena todos los campos.";
    } else {
        // Evita inyecciones SQL
        $sql = "SELECT id, contraseña, cargo FROM usuarios WHERE correo=?";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("s", $usuario);
        $stmt->execute();
        $result = $stmt->get_result();

        // Verifica si el usuario existe en la base de datos
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc(); // Obtiene los datos del usuario
            
            // Verifica si la contraseña ingresada coincide con la almacenada
            if (password_verify($password, $row['contraseña'])) {
                // Guarda el ID y el cargo del usuario en la sesión
                $_SESSION['usuarios'] = $row['id'];
                $_SESSION['cargo'] = $row['cargo'];

                // Redirige según el cargo del usuario
                if ($row['cargo'] == "Administrador") {
                    header("Location: inicio_adm.php");
                } elseif ($row['cargo'] == "Docente") {
                    header("Location: H_docentes.php");
                } else {
                    echo "Cargo no reconocido.";
                }
                exit();
            } else {
                echo "Contraseña incorrecta.";
            }
        } else {
            echo "Usuario no encontrado.";
        }

        // Cierra la consulta preparada
        $stmt->close();
    }
}

$conexion->close();
?>
