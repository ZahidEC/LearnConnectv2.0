<?php
session_start(); // Iniciar la sesión

// Conexión a la base de datos (reemplaza los valores con tus propios datos)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cursos_pi";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Recuperar cursos creados por el instructor
$instructor_id = $_SESSION["usuario_id"]; // Asegúrate de que esta variable se defina correctamente en tu sistema

$sql = "SELECT * FROM cursos WHERE instructor_id = $instructor_id";
$result = $conn->query($sql);

$cursos = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $cursos[] = $row;
    }
}

// Procesar formulario de agregar lección
if (isset($_POST['nombre_leccion'])) {
    $nombre_leccion = $_POST['nombre_leccion'];
    $curso_id = 1; // Reemplaza con el curso correcto

    $sql = "INSERT INTO lecciones (titulo, contenido, curso_id) VALUES ('$nombre_leccion', '', $curso_id)";

    if ($conn->query($sql) === TRUE) {
        echo "Lección agregada con éxito";
    } else {
        echo "Error al agregar la lección: " . $conn->error;
    }
}

// Procesar formulario de subir archivo multimedia
if (isset($_FILES['multimedia'])) {
    $curso_id = 1; // Reemplaza con el curso correcto

    $target_dir = "uploads/"; // Directorio donde se guardarán los archivos multimedia
    $target_file = $target_dir . basename($_FILES["multimedia"]["name"]);

    if (move_uploaded_file($_FILES["multimedia"]["tmp_name"], $target_file)) {
        $sql = "INSERT INTO recursos_multimedia (nombre_archivo, tipo, curso_id) VALUES ('$target_file', 'imagen', $curso_id)";
        if ($conn->query($sql) === TRUE) {
            echo "Archivo multimedia subido con éxito";
        } else {
            echo "Error al subir el archivo multimedia: " . $conn->error;
        }
    } else {
        echo "Error al subir el archivo multimedia";
    }
}

// Procesar formulario de agregar prueba
if (isset($_POST['pregunta'])) {
    $pregunta = $_POST['pregunta'];
    $curso_id = 1; // Reemplaza con el curso correcto

    // Puedes agregar código para procesar las opciones de respuesta aquí

    $sql = "INSERT INTO pruebas (nombre, preguntas, curso_id) VALUES ('$pregunta', '', $curso_id)";

    if ($conn->query($sql) === TRUE) {
        echo "Prueba agregada con éxito";
    } else {
        echo "Error al agregar la prueba: " . $conn->error;
    }
}

// Cerrar la conexión a la base de datos
$conn->close();
?>