<?php
// Datos de conexión a la base de datos
$host = "localhost"; 
$usuario = "root"; 
$contrasena = ""; 
$bd = "garaje"; // Cambia esto al nombre de tu base de datos

// Establecer conexión a la base de datos
$cone = new mysqli($host, $usuario, $contrasena, $bd);

// Verificar la conexión
if ($cone->connect_error) {
    die("Error de conexión  " . $cone->connect_error);
}

// Recuperar datos del formulario de registro
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $email = $_POST["email"];
    $password = $_POST["password"]; // Aquí ya no utilizamos password_hash

    // Consulta SQL para insertar el nuevo usuario en la base de datos
    $consulta = "INSERT INTO usuarios (nombre, apellido, email, password) VALUES ('$nombre', '$apellido', '$email', '$password')";

    if ($cone->query($consulta) === TRUE) {
        echo "Registro exitoso.";
        header("Location: login.html");
    } else {
        echo "Error en el registro: " . $cone->error;
    }
}


// Cerrar la conexión a la base de datos
$cone->close();
?>
