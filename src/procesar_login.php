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

// Inicio de sesión
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = $_POST["correo"];
    $contrasena = $_POST["contrasena"];

    // Validación básica para prevenir ataques de inyección SQL
    $correo = mysqli_real_escape_string($conn, $correo);
    $contrasena = mysqli_real_escape_string($conn, $contrasena);

    // Consulta para verificar las credenciales del usuario y obtener el tipo de usuario
    $sql = "SELECT usuario_id, nombre, tipo_usuario FROM usuarios WHERE correo = '$correo' AND contrasena = '$contrasena'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();

        // Inicio de sesión exitoso
        session_start();
        $_SESSION["usuario_id"] = $row["usuario_id"];
        $_SESSION["nombre"] = $row["nombre"];
        $_SESSION["tipo_usuario"] = $row["tipo_usuario"];

        // Redirigir al usuario según el tipo de usuario
        if ($row["tipo_usuario"] === "estudiante") {
            header("Location: ../student_dashboard.php");
            exit; // Importante: asegúrate de salir para evitar ejecución adicional
        } elseif ($row["tipo_usuario"] === "instructor") {
            header("Location: ../instructor_dashboard.php");
            exit; // Importante: asegúrate de salir para evitar ejecución adicional
        }
    } else {
        // Mostrar una alerta de error en el navegador y luego redirigir
        echo "<script>alert('Credenciales inválidas. Inténtalo de nuevo.'); window.location = '../login.php';</script>";
    }
}

$conn->close();
?>