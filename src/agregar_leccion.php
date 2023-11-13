<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera los datos del formulario
    $curso_id = $_POST["curso_id"];
    $titulo = $_POST["titulo"];
    $contenido = $_POST["contenido"];

    // Realiza la inserción en la tabla 'lecciones' de la base de datos
    $conexion = mysqli_connect("localhost", "root", "", "cursos_pi");

    // Verifica la conexión
    if ($conexion === false) {
        die("Error de conexión a la base de datos: " . mysqli_connect_error());
    }

    $sql = "INSERT INTO lecciones (curso_id, titulo, contenido) VALUES (?, ?, ?)";
    $sentencia = mysqli_prepare($conexion, $sql);

    // Verifica la preparación de la sentencia
    if ($sentencia === false) {
        die("Error al preparar la sentencia SQL: " . mysqli_error($conexion));
    }

    mysqli_stmt_bind_param($sentencia, 'iss', $curso_id, $titulo, $contenido);

    $exito = mysqli_stmt_execute($sentencia);

    // Verifica si la inserción fue exitosa
    if ($exito) {
        header("Location: ../instructor_dashboard.php");
    } else {
        echo "<script>
            alert('Error al agregar lección');
            window.location = 'cursos.php';
        </script>";
    }

    // Cierra la conexión y la sentencia
    mysqli_stmt_close($sentencia);
    mysqli_close($conexion);
}
?>
