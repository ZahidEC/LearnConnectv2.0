<?php

// Conexión a la base de datos
$conn = mysqli_connect("localhost", "root", "", "cursos_pi");

// Verificar conexión
if (!$conn) {
  die("Error de conexión: " . mysqli_connect_error());  
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // El formulario se ha enviado, procesa los datos aquí

  // Definir variables 
  $nombre_prueba = $_POST['nombre_prueba'];
  $curso_id = $_POST['curso_id'];

  // Insertar prueba  
  $sql = "INSERT INTO pruebas (nombre, curso_id) VALUES ('$nombre_prueba', '$curso_id')";

  if (mysqli_query($conn, $sql)) {

    // Obtener ID de la prueba insertada
    $prueba_id = mysqli_insert_id($conn);

    // Iterar por las preguntas
    for ($i = 1; $i <= 20; $i++) {
      
      // Verificar si existe la pregunta
      if (isset($_POST['pregunta_' . $i])) {
        
        $pregunta = $_POST['pregunta_' . $i];
        $respuesta = $_POST['respuesta_' . $i];
        
        // Insertar pregunta
        $sql = "INSERT INTO preguntas (enunciado, curso_id) 
                VALUES ('$pregunta', '$curso_id')";
                
        if (mysqli_query($conn, $sql)) {
        
          // Obtener ID de la pregunta
          $pregunta_id = mysqli_insert_id($conn);
          
          // Insertar relación pregunta-prueba
          $sql = "INSERT INTO pruebas_preguntas (prueba_id, pregunta_id)
                  VALUES ('$prueba_id', '$pregunta_id')";
                  
          mysqli_query($conn, $sql);
          
          // Insertar respuestas  
          $respuestas = explode(",", $_POST['opciones_' . $i]);
        
          foreach ($respuestas as $key => $respuesta) {
            $es_correcta = $respuesta == $respuesta;
          
            $sql = "INSERT INTO respuestas (respuesta, es_correcta, pregunta_id) 
                    VALUES ('$respuesta', '$es_correcta', '$pregunta_id')";
            
            mysqli_query($conn, $sql);  
          }
        }
      }
    }
  }

  // Cerrar conexión
  mysqli_close($conn);

  // Redirigir al usuario a la misma página
  echo "<script>window.location = '../instructor_dashboard.php';</script>";
}
?>