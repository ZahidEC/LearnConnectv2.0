<?php
// inscribir.php

// Inicio de sesión
session_start();

// Conexión a la BD 
$conn = mysqli_connect("localhost", "root", "", "cursos_pi");

// Datos del formulario
$curso_id = $_POST['curso_id'];
$estudiante_id = $_SESSION['usuario_id'];

// Validar curso_id 
if (!is_numeric($curso_id)) {
    exit("Datos no válidos");
}

// Verificar que no está ya inscrito
$query = "SELECT * FROM inscripciones
          WHERE estudiante_id = $estudiante_id AND curso_id = $curso_id";

$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {

    echo "Ya estás inscrito en este curso";

} else {

    // Insertar inscripción
    $query = "INSERT INTO inscripciones (estudiante_id, curso_id, fecha_inscripcion) 
            VALUES ($estudiante_id, $curso_id, NOW())";

    if (mysqli_query($conn, $query)) {

        header("Location: ../student_dashboard.php");

    } else {

        echo "<script>
            alert('Error al inscribir al curso');
            window.location = '../student_dashboard.php';
          </script>";

    }

}
?>