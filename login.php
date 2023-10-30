<?php

$host = "localhost"; // Cambia esto al host de tu base de datos
$usuario = "root"; // Cambia esto a tu nombre de usuario de la base de datos
$pass = ""; // Cambia esto a tu contraseña de la base de datos
$db = "garaje";

// Establecer conexión a la base de datos
$cone = new mysqli($host, $usuario, $pass, $db);

// Verificar la conexión
if ($cone->connect_error) {
    die("Error de conexión  " . $cone->connect_error);
}

// Recuperar datos del formulario de inicio de sesión
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $consulta = "SELECT * FROM usuarios WHERE email = '$email'";
    $resultado = $cone->query($consulta);

    if ($resultado->num_rows == 1) {
        $row = $resultado->fetch_assoc();
        $stored_password = $row['password'];

        if ($password == $stored_password) { // Comparamos sin hash
            // Inicio de sesión exitoso, redireccionar a la página de inicio
            header("Location:Carro.html");
        } else {
            // Credenciales incorrectas, mostrar un mensaje de error
            echo "Credenciales incorrectas. Inténtalo de nuevo.";
        }
    } else {
        // Usuario no encontrado, mostrar un mensaje de error
        echo "Usuario no encontrado. Inténtalo de nuevo.";
    }
}

// Cerrar la conexión a la base de datos
$cone->close();
?>
