<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados</title>
</head>

<body>
    <h1>Resultados de la Prueba</h1>

    <?php
    if (isset($_GET['total_respuestas_correctas'])) {
        $total_respuestas_correctas = $_GET['total_respuestas_correctas'];

        echo "<p>Total de respuestas correctas: $total_respuestas_correctas</p>";

        // Puedes mostrar un mensaje personalizado basado en el puntaje o realizar otras acciones según los resultados.
        if ($total_respuestas_correctas >= 7) {
            echo "<p>Felicidades, has aprobado la prueba.</p>";
        } else {
            echo "<p>Lo sentimos, no has alcanzado el puntaje mínimo requerido.</p>";
        }
    } else {
        echo "<p>No se ha proporcionado un puntaje válido.</p>";
    }
    ?>

    <!-- Puedes agregar enlaces o botones para que el usuario regrese a la página principal o realice otras acciones. -->
    <a href="./course.php">Volver al curso</a>
</body>

</html>