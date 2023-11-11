<?php
// Conexión a la base de datos
$conn = new mysqli("localhost", "root", "", "cursos_pi");

// Comprobar la conexión
if ($conn->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
}

// Obtener el ID de la imagen desde la URL
if (isset($_GET['nombre_imagen_en_db'])) {
    $imagen_id = $_GET['nombre_imagen_en_db'];

    // Consultar la base de datos para obtener la imagen
    $sql = "SELECT imagen_portada FROM cursos WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $nombre_imagen_en_db);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($imagen);
        $stmt->fetch();

        // Configurar las cabeceras de respuesta para indicar que se trata de una imagen
        header("Content-Type: image/jpeg"); // Ajusta el tipo MIME según el tipo de imagen que almacenas

        // Imprime la imagen
        echo $imagen;
    }
} else {
    echo "ID de imagen no especificado.";
}

// Cierra la conexión a la base de datos
$stmt->close();
$conn->close();
?>
