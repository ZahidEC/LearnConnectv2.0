<?php
session_start(); // Iniciar la sesión

// Conexión a la base de datos (configura tus propias credenciales)
$servername = "localhost";
$username = "root";
$password = "";
$database = "cursos_pi";
$conexion = mysqli_connect($servername, $username, $password, $database);

// Verificar la conexión a la base de datos
if (!$conexion) {
    die("Error en la conexión a la base de datos: " . mysqli_connect_error());
}

// Supongamos que los datos del formulario se guardan en un arreglo llamado $_POST
if (isset($_POST['submit'])) {
    $total_respuestas_correctas = 0;

    foreach ($_POST as $key => $value) {
        if (strpos($key, 'respuesta_') !== false) {
            $pregunta_id = substr($key, 10);
            $respuesta_usuario = $value;

            // Consultar la respuesta correcta desde la base de datos
            $query_respuesta_correcta = "SELECT es_correcta FROM respuestas WHERE pregunta_id = $pregunta_id AND respuesta = '$respuesta_usuario'";
            $result_respuesta_correcta = mysqli_query($conexion, $query_respuesta_correcta);

            if ($row_respuesta_correcta = mysqli_fetch_assoc($result_respuesta_correcta)) {
                if ($row_respuesta_correcta['es_correcta'] == 1) {
                    // La respuesta es correcta
                    $total_respuestas_correctas++;
                }
            }
        }
    }

    // Puedes realizar cualquier otra acción aquí, como calcular el puntaje total, enviar un correo electrónico, etc.

    // Ejemplo: Insertar el puntaje en una tabla de puntuación
    $usuario_id = $_SESSION['usuario_id']; // Asume que tienes el ID del usuario en la sesión
    $puntaje = $total_respuestas_correctas;

    $insert_puntaje_query = "INSERT INTO puntajes (usuario_id, puntaje) VALUES ($usuario_id, $puntaje)";
    mysqli_query($conexion, $insert_puntaje_query);

    // Redirigir al usuario a una página de resultados o a donde desees
    header("Location: ../resultado.php?total_respuestas_correctas=$total_respuestas_correctas");
    exit;
} else {
    // El formulario no se ha enviado correctamente
    echo "Error: Formulario no enviado correctamente.";
}

// Cierra la conexión a la base de datos
mysqli_close($conexion);
?>
