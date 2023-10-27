
<?php

$host = "localhost"; // Cambia esto al host de tu base de datos
$usuario = "root"; // Cambia esto a tu nombre de usuario de la base de datos
$pass = ""; // Cambia esto a tu contraseña de la base de datos
$db = "garaje "; 

// Establecer conexión a la base de datos
$cone = new mysqli($host, $usuario, $pass, $db);

// Verificar la conexión
if ($cone->connect_error) {
    die("Error de conexión  " . $cone->connect_error);
}

// Recuperar datos del formulario de inicio de sesión
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["contraseña"];

    // Consulta SQL para verificar las credenciales
    $consulta = "SELECT * FROM usuarios WHERE email = '$email' AND contraseña = '$password'";
    $resultado = $cone->query($consulta);

    if ($resultado->num_rows == 1) {
        // Inicio de sesión exitoso, redireccionar a la página de inicio
        header("Location: inicio.php");
    } else {
        // Credenciales incorrectas, mostrar un mensaje de error
        echo "Credenciales incorrectas. Inténtalo de nuevo.";
    }
}

// Cerrar la conexión a la base de datos
$cone->close();
?>
