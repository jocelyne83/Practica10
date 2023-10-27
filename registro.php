<?php
// Datos de conexión a la base de datos
$host = "localhost"; 
$usuario = "root"; 
$contrasena = ""; 
$bd = " "; // Cambia esto al nombre de tu base de datos

// Establecer conexión a la base de datos
$cone = new mysqli($host, $usuario, $contrasena, $base_de_datos);

// Verificar la conexión
if ($cone->connect_error) {
    die("Error de conexión a la base de datos: " . $cone->connect_error);
}

// Recuperar datos del formulario de registro
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $email = $_POST["email"];
    $password = $_POST["contraseña"];

    // Hash de la contraseña (debes mejorar esto con una técnica de hashing segura)
    $hashed_password = md5($password);

    // Consulta SQL para insertar el nuevo usuario en la base de datos
    $consulta = "INSERT INTO usuarios (nombre, apellido, email, contraseña) VALUES ('$nombre', '$apellido', '$email', '$hashed_password')";

    if ($cone->query($consulta) === TRUE) {
        echo "Registro exitoso. Ahora puedes <a href='login.html'>iniciar sesión</a>.";
    } else {
        echo "Error en el registro: " . $cone->error;
    }
}

// Cerrar la conexión a la base de datos
$cone->close();
?>
