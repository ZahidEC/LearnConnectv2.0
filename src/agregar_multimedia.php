<?php

// Iniciar sesión 
session_start();

// Comprobar tipo de usuario 
if ($_SESSION["tipo_usuario"] !== "instructor") {
  header("Location: login.php"); 
  exit();
}

// Conectar a la BD
$servername = "localhost";
$username = "root";  
$password = "";
$database = "cursos_pi";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
  die("Conexión fallida: " . mysqli_connect_error());
}

// Obtener datos del formulario
$curso_id = $_POST['curso_id'];
$tipo = $_POST['tipo'];

// Obtener nombre de archivo
$archivo_nombre = $_FILES['archivo']['name']; 

// Insertar nombre de archivo en la BD 
$sql = "INSERT INTO recursos_multimedia (nombre_archivo, tipo, curso_id)
         VALUES (?, ?, ?)";

$stmt = $conn->prepare($sql);

$stmt->bind_param("ssi", $archivo_nombre, $tipo, $curso_id);

if ($stmt->execute()) {
  echo "Archivo subido exitosamente";
} else {
  echo "Error al subir archivo: " . $conn->error;  
}

$stmt->close();
$conn->close();

?>
