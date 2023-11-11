<?php
session_start(); // Iniciar la sesión
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">


    
    <title>Panel del Instructor</title>

    <!-- Estilos CSS -->
    <script defer src="./main.js"></script>
    <link rel="stylesheet" href="./css/style_instructor.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="./tinymce/tinymce.min.js" referrerpolicy="origin"></script>
<style>
    h1 {
      color: bisque; /* Cambia el color a azul */
    }
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400&display=swap');

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Montserrat', sans-serif;
}

/* Crear variables para colores */
:root {
    --color_primario: #16181f;
    --color_secundario: #5f7174;
    --color_terciario: #a5e66a;
    --color_cuaternario: #00a5c0;
    --color_quintenario: #32d9cb;
    --color__sexto: #e4d1c2;
}

html {
    scroll-behavior: smooth;
}

/* Estilos para el header */
header {
    width: 100%;
    height: 75px;
    background-color: var(--color_primario);
    display: flex;
    justify-content: center;
    align-items: center;
}

header nav {
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0 35px;
}

header nav ul {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    align-items: center;
    width: 100%;
    height: 100%;
    gap: 10%;
}

header nav ul img {
    width: 100px;
    height: 100px;
}

header nav ul .enlaces {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    align-items: center;
    height: 100%;
    width: 100%;
}

header nav ul .sesion {
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: center;
    height: 100%;
    width: 100%;
    gap: 10%;
}

header nav ul .sesion li {
    color: white;
}

header nav ul li {
    list-style: none;
    margin: 0 10px;
}

header nav ul li a {
    text-decoration: none;
    color: white;
    font-size: 1.2rem;
    font-weight: 100;
    transition: all 0.3s ease;
}

header nav ul li a:hover {
    scale: 1.1;
    font-size: 1.5rem;
}

header nav ul li a.registro {
    background-color: var(--color_cuaternario);
    padding: 10px 20px;
    border-radius: 5px;
    color: white;
    font-weight: 500;
}

.panel {
    width: 100%;
    height: 100px;
    display: flex;
    justify-content: center;
    align-items: center;
}

.panel span {
    color: var(--color_cuaternario);
}

/* General */
.general {
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: space-between;
    align-items: center;


}

.panel_select {
    width: 20%;
    height: 60vh;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
    display: flex;
    justify-content: center;
    align-items: center;
    position: sticky;
    top: 50px;
}

.panel_select nav {
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
}

.panel_select nav ul {
    width: 100%;
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: space-around;
    align-items: center;
}

.panel_select nav ul li {
    list-style: none;
    font-size: 1.2rem;
    transition: all 0.3s ease;
    cursor: pointer;
}

.panel_select nav ul li:hover {
    scale: 1.1;
    font-size: 1.5rem;
}

main {
    width: 80%;
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: space-around;
    align-items: center;
}

/* Cursos creados */
.creados {
    width: 100%;
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: space-around;
    align-items: center;
}

.creados h2 {
    margin-bottom: 20px;
}

.creados p {
    width: 40%;
    height: 100px;
    border-radius: 50px;
    background-image: linear-gradient(to right top, #00a5c0, #00babd, #00ccab, #60db8d, #a5e66a);
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 10px 0;
    color: white;
    font-size: 1.2rem;
    transition: all 0.3s ease;
}

.creados p:hover {
    width: 50%;
    font-size: 1.5rem;
}

/* Crear nuevos cursos */
.crear {
    display: none;
    flex-direction: column;
    justify-content: space-around;
    align-items: center;
    width: 100%;
    height: 60vh;
}

.crear .titulo {
    width: 100%;
    height: 10%;
    display: flex;
    justify-content: center;
    align-items: center;
    padding-top: 40px;
}

.crear .titulo h2 {
    font-size: 2rem;
}

.crear .formulario {
    width: 100%;
    height: 108%;
    display: flex;
    justify-content: center;
    align-items: center;
    padding-top: 20px;
}

.crear .formulario form {
    width: 50%;
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    
}

.crear .formulario form label {
    font-size: 1.2rem;
}

.crear .formulario form input {
    width: 100%;
    height: 40px;
    border-radius: 5px;
    border: 1px solid var(--color_secundario);
    padding: 5px;
}

.crear .formulario form textarea {
    width: 100%;
    height: 100px;
    border-radius: 5px;
    border: 1px solid var(--color_secundario);
    padding: 5px;
    resize: none;
}

.crear .formulario form button {
    width: 100%;
    height: 40px;
    border-radius: 5px;
    background-color: var(--color_cuaternario);
    color: white;
    font-size: 1.2rem;
    font-weight: 500;
    transition: all 0.3s ease;
}

.crear .formulario form button:hover {
    scale: 1.1;
    font-size: 1.5rem;
}

/* Agregar nuevas lecciones */
.agregar {
    display: none;
    flex-direction: column;
    justify-content: space-around;
    align-items: center;
    width: 100%;
    height: 60vh;
}

.agregar .titulo {
    width: 100%;
    height: 10%;
    display: flex;
    justify-content: center;
    align-items: center;
}

.agregar .titulo h2 {
    font-size: 2rem;
}

.agregar .fomulario {
    padding-top: 100px;
    width: 100%;
    height: 90%;
    display: flex;
    justify-content: center;
    align-items: center;
    
}

.agregar .fomulario form {
    width: 90%;
    height: 350%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    padding-top: 210px;
}

.agregar .fomulario form label {
    font-size: 1.2rem;
}

.agregar .fomulario form select {
    width: 100%;
    height: 40px;
    border-radius: 5px;
    border: 1px solid var(--color_secundario);
    padding: 5px;
}

.agregar .fomulario form input {
    width: 100%;
    height: 40px;
    border-radius: 5px;
    border: 1px solid var(--color_secundario);
    padding: 5px;
}

.agregar .fomulario form textarea {
    
    border-radius: none;
    border: 1px solid var(--color_secundario);
    padding: 5px;
    resize: none;
}


.agregar .fomulario form button:hover {
    scale: 1.1;
    font-size: 1.5rem;
}

/* Agregar examen */
.prueba {
    display: none;
    flex-direction: column;
    justify-content: space-around;
    align-items: center;
    width: 100%;
    height: 100%;
}

.prueba h2 {
    font-size: 2rem;
}

.prueba form {
    width: 50%;
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}

.prueba form label {
    font-size: 1.2rem;
    margin-top: 25px;
}

.prueba form select {
    width: 100%;
    height: 40px;
    border-radius: 5px;
    border: 1px solid var(--color_secundario);
    padding: 5px;
}

.prueba form input {
    width: 100%;
    height: 40px;
    border-radius: 5px;
    border: 1px solid var(--color_secundario);
    padding: 5px;
}

.prueba form button {
    width: 100%;
    height: 40px;
    border-radius: 5px;
    background-color: var(--color_cuaternario);
    color: white;
    font-size: 1.2rem;
    font-weight: 500;
    transition: all 0.3s ease;
    margin-bottom:10px ;
}

.prueba form button:hover {
    scale: 1.1;
    font-size: 1.5rem;
}

/* Seccion de comentarios */
.cometarios {
    display: none;
    flex-direction: column;
    justify-content: space-around;
    align-items: center;
    width: 100%;
    height: 100%;
}

.cometarios h2 {
    font-size: 2rem;
}

.cometarios p {
    width: 40%;
    height: 100px;
    border-radius: 5px;
    background-image: linear-gradient(to right top, #00a5c0, #00babd, #00ccab, #60db8d, #a5e66a);
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 10px 0;
    color: white;
    font-size: 1.2rem;
    transition: all 0.3s ease;
}

.cometarios p:hover {
    width: 50%;
    font-size: 1.5rem;
}

/* Estilos para el footer */
footer {
    background-color: var(--color_primario);
    width: 100%;
    height: 10vh;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    margin-top: 320px;
}

.redes-sociales ion-icon {
    font-size: 30px;
    color: white;
    margin: 0 10px;
    transition: all 0.5s ease-in-out;
}

.redes-sociales ion-icon:hover {
    font-size: 45px;
    color: var(--color_cuaternario);
}
* button{
    border: none;
}

.container-input {
    position: relative;
  }
  
  .input {
    width: 150px;
    padding: 10px 0px 10px 40px;
    border-radius: 9999px;
    border: solid 1px #333;
    transition: all .2s ease-in-out;
    outline: none;
    opacity: 0.8;
  }
  
  .container-input svg {
    position: absolute;
    top: 50%;
    left: 10px;
    transform: translate(0, -50%);
  }
  
  .input:focus {
    opacity: 1;
    width: 250px;
  }
</style>
</head>

<body>

    <header>
        <!-- Barra de navegación -->
        <nav>
            <ul>
                <div class="logo">
                <h1>LearnConnect</h1>
                </div>
                <div class="enlaces">
                    <li><a href="index.php">Inicio</a></li>
                    <li><a href="#cursos">Cursos</a></li>
                    <li><a href="#acerca">Acerca de nosotros</a></li>
                </div>

                <div class="container-input">
                    <form action="search.php">
                        <input type="text" placeholder="Buscar" name="q" class="input">
                        <svg fill="#000000" width="20px" height="20px" viewBox="0 0 1920 1920" xmlns="http://www.w3.org/2000/svg">
                            <path d="M790.588 1468.235c-373.722 0-677.647-303.924-677.647-677.647 0-373.722 303.925-677.647 677.647-677.647 373.723 0 677.647 303.925 677.647 677.647 0 373.723-303.924 677.647-677.647 677.647Zm596.781-160.715c120.396-138.692 193.807-319.285 193.807-516.932C1581.176 354.748 1226.428 0 790.588 0S0 354.748 0 790.588s354.748 790.588 790.588 790.588c197.647 0 378.24-73.411 516.932-193.807l516.028 516.142 79.963-79.963-516.142-516.028Z" fill-rule="evenodd"></path>
                        </svg>
                    </form>
</div>


                <div class="sesion">
                    <li>
                        <?php echo $_SESSION["nombre"]; ?>
                    </li>
                    <li><a href="login.php">Cerrar Sesión</a></li>
                </div>
            </ul>
        </nav>
    </header>

    <div class="panel">
        <h1 class="x" style="color:#16181f">Panel del <span>Instructor</span></h1>
    </div>

    <div class="general">
        <div class="panel_select">
            <nav>
                <ul>
                    <li id="cursos">Cursos Creados</li>
                    <li id="crear">Crear Curso</li>
                    <li id="agregar">Agregar Lección</li>
                    <li id="prueba">Agregar Examen</li>
                    <li id="comentarios">Mensajes o Dudas</li>
                </ul>
            </nav>
        </div>

        <main>
            <div class="creados">

                <h2>Cursos Creados</h2>

                <?php

                // Obtener el ID del instructor
                $instructor_id = $_SESSION['usuario_id'];

                // Conectar a la BD  
                $conexion = mysqli_connect("localhost", "root", "", "cursos_pi");

                // Consulta para obtener los cursos
                $sql = "SELECT * FROM cursos WHERE instructor_id = $instructor_id";

                $resultado = mysqli_query($conexion, $sql);

                // Recorrer resultados
                while ($fila = mysqli_fetch_assoc($resultado)) {

                    echo "<p>" . $fila['nombre'] . "</p>";

                }

                // Cerrar conexión
                mysqli_close($conexion);

                ?>

            </div>

            <div class="crear">
                <div class="titulo">
                    <h2>Crear Curso</h2>
                </div>
                <div class="formulario">
                <form action="./src/crear_curso.php" method="POST" enctype="multipart/form-data">
    <label for="nombre">Nombre del Curso:</label>
    <input type="text" name="nombre" required><br>

    <label for="descripcion">Descripción:</label>
    <textarea name="descripcion" required></textarea><br>

    <label for="categoria">Categoría:</label>
    <input type="text" name="categoria" required><br>

    <label for="nivel">Nivel:</label>
    <input type text="name" required><br>

    <label for="imagen_portada">Imagen de Portada:</label>
    <input type="file" name="imagen_portada" accept="image/*" required><br>

    <button>Crear Curso</button>
</form>

                </div>
            </div>

            <div class="agregar">
                <div class="titulo">
                    <h2>Agregar Nueva Lección</h2>
                </div>
                <div class="fomulario">
                    <form action="./src/agregar_leccion.php" method="POST" enctype="multipart/form-data">
                        <label for="curso_id">Seleccione un Curso:</label>
                        <select name="curso_id" required>
                            <?php
                            // ID del instructor logueado
                            $instructor_id = $_SESSION['usuario_id'];

                            // Conexión a la BD
                            $conexion = mysqli_connect("localhost", "root", "", "cursos_pi");

                            // Consulta para obtener los cursos del instructor
                            $sql = "SELECT curso_id, nombre  
        FROM cursos
        WHERE instructor_id = ? ";

                            // Preparar consulta 
                            $sentencia = mysqli_prepare($conexion, $sql);
                            mysqli_stmt_bind_param($sentencia, 'i', $instructor_id);

                            // Ejecutar consulta
                            mysqli_stmt_execute($sentencia);

                            // Obtener resultados
                            $resultado = mysqli_stmt_get_result($sentencia);

                            // Mostrar opciones en el dropdown
                            while ($fila = mysqli_fetch_assoc($resultado)) {

                                $curso_id = $fila['curso_id'];
                                $nombre = $fila['nombre'];

                                echo "<option value='$curso_id'>$nombre</option>";

                            }

                            // Cerrar sentencia y conexión
                            mysqli_stmt_close($sentencia);
                            mysqli_close($conexion);
                            ?>
                        </select><br>

                        <label for="titulo">Título de la Lección:</label>
                        <input type="text" name="titulo" required><br>

                        <label for "contenido">Contenido de la Lección:</label>
                        <textarea  id="editor" name="contenido" required> Crea tu leccion aqui... <br> 
                        Puedes arrastrar imagenes y generar links para hacer un curso mas completo.</textarea><br>
                        

                        <button name="boton" type="submit" style="background-color: var(--color_cuaternario); color: #fff; border: none; padding: 10px 20px; border-radius: 5px; font-weight: bold;">Agregar Lección</button>
                    </form>
                </div>
            </div>

            <div class="prueba">
    <h2>Agregar Examen</h2>
    <form id="formularioExamen" action="./src/agregar_prueba.php" method="POST">
        <label for="nombre_prueba">Nombre de la Prueba:</label>
        <input type="text" name="nombre_prueba" required><br>

        <label for="curso_id">Seleccione un Curso:</label>
        <select name="curso_id" required>
            <?php
            // ID del instructor logueado
            $instructor_id = $_SESSION['usuario_id'];

            // Conexión a la BD
            $conexion = mysqli_connect("localhost", "root", "", "cursos_pi");

            // Consulta para obtener los cursos del instructor
            $sql = "SELECT curso_id, nombre  
                FROM cursos
                WHERE instructor_id = ? ";

            // Preparar consulta 
            $sentencia = mysqli_prepare($conexion, $sql);
            mysqli_stmt_bind_param($sentencia, 'i', $instructor_id);

            // Ejecutar consulta
            mysqli_stmt_execute($sentencia);

            // Obtener resultados
            $resultado = mysqli_stmt_get_result($sentencia);

            // Mostrar opciones en el dropdown
            while ($fila = mysqli_fetch_assoc($resultado)) {
                $curso_id = $fila['curso_id'];
                $nombre = $fila['nombre'];
                echo "<option value='$curso_id'>$nombre</option>";
            }

            // Cerrar sentencia y conexión
            mysqli_stmt_close($sentencia);
            mysqli_close($conexion);
            ?>
        </select><br>

        <label for="prueba_id">Seleccione una Prueba:</label>
        <select name="prueba_id" required>
            <?php
            // Conexión a la BD
            $conexion = mysqli_connect("localhost", "root", "", "cursos_pi");

            // Consulta para obtener las pruebas
            $sqlPruebas = "SELECT prueba_id, nombre FROM pruebas";

            // Ejecutar consulta
            $resultPruebas = mysqli_query($conexion, $sqlPruebas);

            // Mostrar opciones en el dropdown
            while ($rowPrueba = mysqli_fetch_assoc($resultPruebas)) {
                $prueba_id = $rowPrueba['prueba_id'];
                $nombrePrueba = $rowPrueba['nombre'];
                echo "<option value='$prueba_id'>$nombrePrueba</option>";
            }

            // Cerrar conexión
            mysqli_close($conexion);
            ?>
        </select><br>

        <button type="button" id="agregarPregunta">Agregar Pregunta</button>
        <div id="preguntasContainer">
            <!-- Aquí se agregarán las preguntas dinámicamente -->
        </div>
        <button type="submit">Enviar Examen</button>
    </form>
</div>


            <div class="cometarios">

                <h2>Mensajes o Dudas</h2>

                <?php

                // Obtener el ID del instructor
                $instructor_id = $_SESSION['usuario_id'];

                // Conectar a la BD
                $conexion = mysqli_connect("localhost", "root", "", "cursos_pi");

                // Consulta JOIN para obtener curso, comentario e instructor
                $sql = "SELECT c.comentario, cr.nombre AS curso  
              FROM comentarios c
              INNER JOIN cursos cr ON c.curso_id = cr.curso_id
              INNER JOIN usuarios u ON cr.instructor_id = u.usuario_id
              WHERE u.usuario_id = $instructor_id";

                $resultado = mysqli_query($conexion, $sql);

                // Mostrar curso y comentario
                while ($fila = mysqli_fetch_assoc($resultado)) {

                    echo "<p>";
                    echo "Curso: " . $fila['curso'];
                    echo "<br>";
                    echo "Comentario: " . $fila['comentario'];
                    echo "</p>";

                }

                // Cerrar conexión
                mysqli_close($conexion);

                ?>

            </div>
        </main>
    </div>



    <footer>
        <div class="redes-sociales">
            <a href=""><ion-icon name="logo-facebook"></ion-icon></a>
            <a href=""><ion-icon name="logo-twitter"></ion-icon></a>
            <a href=""><ion-icon name="logo-instagram"></ion-icon></a>
        </div>
    </footer>

    <script src="./src/panel_instructor.js"></script>
    <script src="./src/form_dinamic.js"></script>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>