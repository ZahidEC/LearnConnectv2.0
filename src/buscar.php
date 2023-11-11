<?php
if (isset($_GET['q'])) {
    $search_query = $_GET['q'];

    // Conecta a la base de datos y realiza la consulta de búsqueda
    $conn = mysqli_connect("localhost", "root", "", "cursos_pi");
    $sql = "SELECT * FROM cursos WHERE nombre LIKE '%$search_query%'";
    $resultado = mysqli_query($conn, $sql);
    $cursos_encontrados = mysqli_fetch_all($resultado, MYSQLI_ASSOC);

    // Luego, puedes mostrar los cursos encontrados o realizar cualquier otra acción
    // como redirigir a una página de resultados de búsqueda.
} else {
    // El formulario de búsqueda está vacío, puedes mostrar un mensaje o hacer algo diferente.
}
?>
