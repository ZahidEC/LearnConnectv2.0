<?php
// Iniciar sesión si no se ha iniciado
session_start();

// Comprobar si el usuario ha iniciado sesión como instructor
if (!isset($_SESSION["nombre"]) || $_SESSION["tipo_usuario"] !== "instructor") {
    // Redirigir a una página de inicio de sesión o mostrar un mensaje de error
    header("Location: ../login.php"); // Cambia "login.php" al nombre de tu página de inicio de sesión
    exit();
}

// Conectar a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$database = "cursos_pi";

$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión a la base de datos
if ($conn->connect_error) {
    die("Conexión a la base de datos fallida: " . $conn->connect_error);
}

// Verificar si se ha enviado una imagen de portada
if (isset($_FILES['imagen_portada']) && $_FILES['imagen_portada']['error'] === UPLOAD_ERR_OK) {
    // Ruta donde se guardarán las imágenes de portada (asegúrate de que la carpeta exista y tenga permisos de escritura)
    $ruta_imagen = "../portada";

    // Generar un nombre de archivo único para la imagen de portada
    $nombre_imagen = uniqid("portada_") . "_" . $_FILES['imagen_portada']['name'];

    // Mover la imagen de portada al directorio de destino
    if (move_uploaded_file($_FILES['imagen_portada']['tmp_name'], $ruta_imagen . $nombre_imagen)) {
        // La imagen se movió con éxito, ahora puedes guardar el nombre del archivo en la base de datos
        $nombre_imagen_en_db = $nombre_imagen;
    } else {
        // Hubo un error al mover la imagen
        echo "Error al cargar la imagen de portada.";
        exit();
    }
} else {
    // No se proporcionó una imagen de portada
    $nombre_imagen_en_db = null;
}

// Recuperar los datos del formulario
$nombre = $_POST["nombre"];
$descripcion = $_POST["descripcion"];
$categoria = $_POST["categoria"];
$nivel = $_POST["nivel"];

// Obtener el ID del instructor desde la sesión
$instructor_id = $_SESSION["usuario_id"];

// Insertar el nuevo curso en la base de datos, incluyendo el nombre del archivo de imagen de portada
$sql = "INSERT INTO cursos (nombre, descripcion, categoria, nivel, instructor_id, imagen_portada) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssis", $nombre, $descripcion, $categoria, $nivel, $instructor_id, $nombre_imagen_en_db);

if ($stmt->execute()) {
    // El curso se creó con éxito
    header("Location: ../instructor_dashboard.php");
} else {
    // Hubo un error al crear el curso
    echo "Error al crear el curso.";
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
