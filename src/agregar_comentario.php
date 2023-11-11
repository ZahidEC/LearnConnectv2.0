<?php
// Inicia la sesión
session_start();

// Verificar si se ha enviado un formulario de comentario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar los datos del formulario
    $curso_id = $_POST["curso_id"];
    $comentario = $_POST["comentario"];

    // Validar y procesar los datos (puedes agregar más validaciones según tus necesidades)
    if (empty($curso_id) || empty($comentario)) {
        echo "Por favor, complete todos los campos.";
    } else {
        // Conectar a la base de datos
        $conn = mysqli_connect("localhost", "root", "", "cursos_pi");

        if (!$conn) {
            die("La conexión a la base de datos falló: " . mysqli_connect_error());
        }

        // Prevenir inyección SQL escapando los datos
        $curso_id = mysqli_real_escape_string($conn, $curso_id);
        $comentario = mysqli_real_escape_string($conn, $comentario);

        // Obtener el ID del usuario actual (asumiendo que estás usando sesiones)
        $estudiante_id = isset($_SESSION['usuario_id']) ? $_SESSION['usuario_id'] : 0;

        // Insertar el comentario en la base de datos
        $sql = "INSERT INTO comentarios (comentario, usuario_id, curso_id) VALUES ('$comentario', $estudiante_id, $curso_id)";

        if (mysqli_query($conn, $sql)) {
            header("Location: ../student_dashboard.php");
        } else {
            echo "Error al agregar el comentario: " . mysqli_error($conn);
        }

        // Cerrar la conexión a la base de datos
        mysqli_close($conn);
    }
} else {
    echo "Acceso no permitido.";
}
?>

