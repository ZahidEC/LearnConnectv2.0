<?php
session_start(); // Iniciar la sesión
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel del Estudiante</title>

    <!-- Estilos CSS -->
    <link rel="stylesheet" href="./css/style_student.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

</head>

<style>
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
h1 {
      color: black; /* Cambia el color a azul */
    }
</style>

<body>
    <header>
        <!-- Barra de navegación -->
        <nav>
            <ul>
                <div class="logo">
                <h1 style="color:white">LearnConnect</h1>
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
                    <li>Perfil de
                        <?php echo $_SESSION["nombre"]; ?>
                    </li>
                    <li><a href="login.php">Cerrar Sesión</a></li>
                </div>
            </ul>
        </nav>
    </header>

    <main>
        <h1>Panel de <span>Estudiantes.</span></h1>
        <div class="Disponibles">
            <?php

            // Conectar a la base de datos
            $conn = mysqli_connect("localhost", "root", "", "cursos_pi");

            // Consulta para obtener los cursos disponibles con el nombre del instructor
            $query = "SELECT c.curso_id, c.nombre, c.descripcion, u.nombre as instructor_nombre FROM cursos c
              JOIN usuarios u ON c.instructor_id = u.usuario_id";
            $result = mysqli_query($conn, $query);

            ?>
            <div class="titulo">
                <h2>Cursos disponibles para inscribirse</h2>
            </div>

            <div class="cursos_disponibles">
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>

                    <div class="course">
                        <h3>
                            <?php echo $row['nombre']; ?>
                        </h3>
                        <p>
                            <?php echo $row['descripcion']; ?>
                        </p>
                        <p>
                            Instructor:
                            <?php echo $row['instructor_nombre']; ?>
                        </p>

                        <form action="./src/inscribir.php" method="post">
                            <input type="hidden" name="curso_id" value="<?php echo $row['curso_id']; ?>">
                            <button type="submit">Inscribirse</button>
                        </form>

                    </div>

                <?php } ?>
            </div>
        </div>

        <div class="general">
            <div class="inscritos">
                <?php
                // Verificar si el usuario ha iniciado sesión
                if (isset($_SESSION['usuario_id'])) {
                    $usuario_id = $_SESSION['usuario_id'];

                    // Conectar a la base de datos
                    $servername = "localhost"; // Cambia a la dirección de tu servidor MySQL
                    $username = "root"; // Cambia a tu nombre de usuario de MySQL
                    $password = ""; // Cambia a tu contraseña de MySQL
                    $database = "cursos_pi"; // Cambia al nombre de tu base de datos
                
                    $conn = new mysqli($servername, $username, $password, $database);

                    if ($conn->connect_error) {
                        die("Error de conexión a la base de datos: " . $conn->connect_error);
                    }

                    // Realiza una consulta para obtener los cursos en los que el usuario está inscrito
                    $sql = "SELECT c.nombre, c.curso_id
            FROM cursos c
            JOIN inscripciones i ON c.curso_id = i.curso_id
            WHERE i.estudiante_id = $usuario_id";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        echo "<h2>Cursos en los que estás inscrito:</h2>";
                        echo "<ul>";
                        while ($fila = $result->fetch_assoc()) {
                            // Crea un enlace a course.php con el id del curso como parámetro
                            echo "<li><a href='course.php?curso_id=" . $fila['curso_id'] . "'>" . $fila['nombre'] . "</a></li>";
                        }
                        echo "</ul>";
                    } else {
                        echo "No estás inscrito en ningún curso.";
                    }

                    // Cerrar la conexión a la base de datos
                    $conn->close();
                } else {
                    echo "Debes iniciar sesión para ver los cursos inscritos.";
                }
                ?>

            </div>


            <div class="comentarios">
                <h2>Comentarios de curso</h2>
                <form action="./src/agregar_comentario.php" method="post">
                    <label for="curso_id">Curso:</label>
                    <select name="curso_id" id="curso_id">

                        <?php

                        // Conexión a la BD
                        $conn = mysqli_connect("localhost", "root", "", "cursos_pi");

                        // Array para guardar los ids de cursos inscritos
                        $cursos_inscritos = array();

                        // Consulta para obtener los cursos inscritos 
                        $sql = "SELECT c.curso_id, c.nombre
        FROM cursos c
        JOIN inscripciones i ON c.curso_id = i.curso_id 
        WHERE i.estudiante_id = $usuario_id";

                        $result = $conn->query($sql);

                        while ($fila = $result->fetch_assoc()) {

                            $cursos_inscritos[] = $fila['curso_id'];

                        }


                        // Consulta para obtener el nombre de cada curso
                        $sql2 = "SELECT c.curso_id, c.nombre  
         FROM cursos c 
         WHERE c.curso_id IN (" . implode(",", $cursos_inscritos) . ")";

                        $result2 = $conn->query($sql2);

                        while ($row = $result2->fetch_assoc()) {
                            ?>

                            <option value="<?php echo $row['curso_id']; ?>">
                                <?php echo $row['nombre']; ?>
                            </option>

                        <?php } ?>

                    </select>
                    <label for="comentario">Comentario:</label>
                    <textarea name="comentario" id="comentario" rows="4" cols="50"></textarea>
                    <button>Enviar</button>
                </form>
            </div>

        </div>

    </main>

    <footer>
        <div class="redes-sociales">
            <a href=""><ion-icon name="logo-facebook"></ion-icon></a>
            <a href=""><ion-icon name="logo-twitter"></ion-icon></a>
            <a href=""><ion-icon name="logo-instagram"></ion-icon></a>
        </div>
    </footer>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>