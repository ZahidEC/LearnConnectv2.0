<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera los datos del formulario
    $curso_id = $_POST["curso_id"];
    $titulo = $_POST["titulo"];
    $contenido = $_POST["contenido"];

    // Verifica si se ha subido un archivo
    if (isset($_FILES["archivo"]) && $_FILES["archivo"]["error"] == 0) {
        $archivo_nombre = $_FILES["archivo"]["name"];
        $archivo_tmp_name = $_FILES["archivo"]["tmp_name"];

        // Mueve el archivo subido a una ubicación deseada (por ejemplo, la carpeta de carga)
        move_uploaded_file($archivo_tmp_name, "./ruta_a_la_carpeta_de_carga/$archivo_nombre");
    } else {
        // No se ha subido un archivo
        $archivo_nombre = null;
    }

    // Realiza la inserción en la tabla 'lecciones' de la base de datos
    $conexion = mysqli_connect("localhost", "root", "", "cursos_pi");
    $sql = "INSERT INTO lecciones (titulo, contenido, archivo_adjunto, curso_id) VALUES (?, ?, ?, ?)";
    $sentencia = mysqli_prepare($conexion, $sql);
    mysqli_stmt_bind_param($sentencia, 'sssi', $titulo, $contenido, $archivo_nombre, $curso_id);
    $exito = mysqli_stmt_execute($sentencia);

    // Verifica si la inserción fue exitosa
    if ($exito) {
        header("Location: ../instructor_dashboard.php");
    } else {
        echo "<script>
        alert('Error al agregar leccion');
        window.location = 'cursos.php';
      </script>";
    }

    // Cierra la conexión
    mysqli_close($conexion);
}
?>