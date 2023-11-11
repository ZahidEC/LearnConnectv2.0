<?php
// Configuración de la base de datos
$servername = "localhost"; // Cambia a la dirección de tu servidor MySQL
$username = "root"; // Cambia a tu nombre de usuario de MySQL
$password = ""; // Cambia a tu contraseña de MySQL
$database = "cursos_pi"; // Cambia al nombre de tu base de datos

// Conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
}

// Procesar el registro
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $correo = $_POST["correo"];
    $contrasena = $_POST["contrasena"];
    $tipo_usuario = $_POST["tipo_usuario"];

    // Consulta para insertar el nuevo usuario en la base de datos
    $sql = "INSERT INTO usuarios (nombre, correo, contrasena, tipo_usuario) VALUES ('$nombre', '$correo', '$contrasena', '$tipo_usuario')";

    if ($conn->query($sql) === true) {
        // Registro exitoso, puedes redirigir al usuario a la página de inicio de sesión
        header("Location: ../login.php");
    } else {
        echo "<script>
            alert('Error al crear la lección');
            window.location = 'cursos.php';
          </script>";
    }
}

$conn->close();
?>
