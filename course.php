<?php
session_start(); // Iniciar la sesión
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curso</title>

    <link rel="stylesheet" href="./img/portadas/">
   

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400&display=swap');

        * {
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
        
        header nav h1{
            color: white;
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
            margin: 0;
            padding: 0;
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
            font-size: 1.5rem;
        }

        header nav ul li {
            list-style: none;
            margin: 0 10px;
            font-size: 1.5rem;
        }

        header nav ul li a {
            text-decoration: none;
            color: white;
            font-size: 2.3rem;
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

        /* Seccion de main */
        main {
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: center;
       
        }

        /* Seccion de lecciones */
        main .lecciones_curso {
            width: 80%;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: center;
            padding: 0 35px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            border-radius: 10px;
            padding-bottom: 30px;
        }

        main .lecciones_curso .titulo {
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            margin-top: 50px;
        }

        main .lecciones_curso .titulo h2 {
            font-size: 2rem;
            color: var(--color_primario);
        }

        main .lecciones_curso .titulo h2 span {
            font-size: 2rem;
            color: var(--color_cuaternario);
        }

       
        main .lecciones_curso .leccion div {
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
       
            
        }

 

        main .lecciones_curso .leccion div a {
            color: black;
        }

       
        
        /*BARRA DE NAVEGACION */
        .container{
    padding:30px 0px;
    width:100%;
}
.category{
    background:#fff;
    font-size: 1.6rem;
    border-radius:3px;
   
}
.ctghead{
    padding: 2px 40px;
    border-bottom: 1px solid rgba(0, 0, 0, 0.09);

}
.ctghead h3{
    display: inline-flex;
    align-items: center;
    font-size: 2.3rem;
}
.ctghead h3 i{
    font-size:2.9rem;
    margin-right:7px;
   
}

.ctgul{
    margin-top:16px;
    padding:0 0 16px 0;
}
.ctgulChild{
    margin: 0 0 0 30px;
    padding:0 0 10px 0;

}

.ctgliChild{
    font-size: 1.2rem;
    display: block;
    position: relative;
    list-style: none;
    transition:.3s linear;
    /* box-shadow: transparent 0px 14px 13px -12px, transparent 0px 26px 32px -22px; */

}

.ctgli:hover{
    border-left: 4px solid var(--hove);
    background:#d2ffe221;
    /* box-shadow: rgba(50, 50, 93, 0.08) 0px 14px 13px -12px, rgba(0, 0, 0, 0.16) 0px 26px 32px -22px; */
}

.ctga, .ctgaChild{
    
    width: 100%;
    display: inline-flex;
    align-items: center;
    cursor: pointer;
    font-size: 1.7rem;
    line-height: 2.3rem;
    color: #333;
    text-decoration: none;
    padding: 13px 40px 13px 34px;
    
    position: relative;
    right: 0;
    transition: right linear .3s;
}
.ctga i{
    margin-right:10px;}

.ctgaChild{
    font-size: 1.5rem;
    padding: 13px 13px 13px 36px;
}
.ctga:hover, .ctgaChild:hover{
    /* right:-4px; */
    color:var(--hove);
    
}
.ctgaChild::before {
    top: 50%;
    transform:translateY(-50%);
    left: 20px;
    position: absolute;
    border-style: solid;
    border-color: transparent transparent transparent var(--hove);
    border-width:4px;
    content: "";
    
}
.down{
    position: absolute;
    font-size:1.3rem;
   right:10%;
   top: 50%;
   transform: translateY(-50%) rotate(360deg);
}
.ctgulChild{
    
    display:none;
}
.ctgli{
    display: block;
    position: relative;
    list-style: none;
    border-left: 4px solid transparent;
    transition:.3s linear;
}
.showed{
    background:#d2ffe221;
    border-left:4px solid #52c3d7;
}

.showed .ctga{
    color: var(--color_cuaternario);
    font-weight:bold;
   }

.showed .ctga i{
    
    font-weight:bold;
    
}
.down {
  -webkit-transition: .5s ease;
  transition: .5s ease;
}
.wtok .down {
  -webkit-transform: translateY(-50%) rotate(180deg);
          transform: translateY(-50%) rotate(180deg);
}

/*  base.css*/
@import url('https://fonts.googleapis.com/css?family=Oswald&display=swap');

:root{

    --white:#fff;
    --black:#000;
    --textColor:#333;
    --hove:#04ca88;
}
html{
    font-size:62.5%;
    font-family: 'Muli', sans-serif ;
    line-height:1.6 rem;
    box-sizing: border-box;
}
*{
    box-sizing: inherit;
}
a{
  text-decoration: none;
}
p{
    font-size:large;

}


.grid{
    margin : 0 auto;
    max-width: 1280px;
}

.row{
  display:flex;
  width: 196px;
  flex-wrap: wrap;
  margin: 0 -12px 0 -12px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
    border-radius: 10px;
}


.col-3{

  width:calc((100%/12)*3);

}

/* Agrega estas líneas al final de tu archivo CSS */

.grid {
    display: flex;
    flex-wrap: wrap;
}

.col-3 {
    width: calc((100% / 12) * 3);
}

.lecciones_curso {
    width: calc((100% / 12) * 9); /* El ancho del contenedor de lecciones */
    margin-left: 27px; /* Ajusta el margen izquierdo según tus preferencias */
}

/* Asegúrate de quitar la propiedad width: 100%; del estilo main .lecciones_curso */

.hacer-examen {
    margin-top: 10px;
    text-align: right;
}

.hacer-examen a {
    color: #007bff;
    text-decoration: none;
    font-weight: bold;
    font-size: 2rem;
}


    </style>
    <link rel="stylesheet" href="./curso.js">
</head>

<body>
    <header>
        <!-- Barra de navegación -->
        <nav>
            <ul>
                <div class="logo">
                <h1 style="color:white; font-size: 2.7rem;">LearnConnect</h1>
          </div>
                <div class="enlaces">
                    <li><a href="index.php">Inicio</a></li>
                    <li><a href="#cursos">Cursos</a></li>
                    <li><a href="#acerca">Acerca de nosotros</a></li>
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
    <body>
    <div class="container">
    <div class="grid">
        <div class="row">
            <div class="col-3">
                <!-- category -->
                <nav class="category">
                    <div class="ctghead">
                        <h3><i class="ti-list"></i>Lecciones</h3>
                    </div>

                    <ul class="ctgul">
                    <?php
                        // Obtener el ID del curso
                        $curso_id = $_GET['curso_id'];

                        // Conectar a la BD
                        $conn = mysqli_connect("localhost", "root", "", "cursos_pi");

                        // Consulta para obtener las lecciones
                        $sql = "SELECT * FROM lecciones WHERE curso_id = $curso_id";
                        $result = mysqli_query($conn, $sql);

                        // Mostrar enlaces de lecciones en la barra de navegación
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<li class='ctgli showed'>";
                            echo "<a href='javascript:void(0);' class='ctga' onclick='mostrarContenido(" . $row['leccion_id'] . ")'>" . $row['titulo'] . "</a>";
                            echo "</li>";
                        }
                        ?>
                    </ul>
                </nav>
            </div>
        </div>

        <div class="lecciones_curso">
            <div class="titulo">
            <h2 class="a" style="font-size: 5rem;">Lecci<span style="font-size: 5rem;">ones</span></h2>
            </div>
            <?php
// Volver a ejecutar la consulta para obtener las lecciones
$result = mysqli_query($conn, $sql);

// Mostrar lecciones en el contenedor
while ($row = mysqli_fetch_assoc($result)) {
    echo "<div class='leccion' id='leccion_" . $row['leccion_id'] . "'>";
    echo "<div class='titulo-contenedor'>";
    echo "</div>";
    echo "<div class='contenido-contenedor' style='display:none;'>" . $row['contenido'] . "</div>";

    // Agregar enlace para hacer examen (inicialmente oculto)
    echo "<div class='hacer-examen' style='display:none;'>";
    echo "<a href='javascript:void(0);' onclick='mostrarExamen(" . $row['leccion_id'] . ")'>Hacer Examen</a>";
    echo "</div>";

    // Contenedor del contenido del examen
    echo "<div class='examen-contenedor' style='display:none;'>";
    echo "<div class='titulo'>";
    echo "<h2>Exám<span>enes</span></h2>";
    echo "</div>";
    echo "<div class='examenes'>";
    // AQUÍ VA TU CÓDIGO DE EXÁMENES (el bloque que proporcionaste)
    echo "<div class='examenes_curso'>";
    echo "<div class='titul'>";
       echo "<h2>Exám<span>enes</span></h2>";
    echo "</div>";
    echo "<div class='examenes'>";
        
        // Establece la conexión a la base de datos (debes configurar tus propias credenciales)
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "cursos_pi";

        $conexion = mysqli_connect($servername, $username, $password, $database);

        // Verifica la conexión a la base de datos
        if (!$conexion) {
            die("Error en la conexión a la base de datos: " . mysqli_connect_error());
        }

        // Obtiene el ID del curso desde la URL
        if (isset($_GET['curso_id'])) {
            $curso_id = $_GET['curso_id'];

            // Consulta para obtener el nombre del curso
            $query_nombre_curso = "SELECT nombre FROM cursos WHERE curso_id = $curso_id";
            $result_nombre_curso = mysqli_query($conexion, $query_nombre_curso);

            // Verifica si se encontró el nombre del curso
            if ($row_nombre_curso = mysqli_fetch_assoc($result_nombre_curso)) {
                $nombre_curso = $row_nombre_curso['nombre'];
                echo '<h1>Curso: ' . $nombre_curso . '</h1>';
            }

            // Consulta para recuperar las pruebas relacionadas con el curso
            $query_pruebas = "SELECT prueba_id, nombre FROM pruebas WHERE curso_id = $curso_id";
            $result_pruebas = mysqli_query($conexion, $query_pruebas);

            // Verifica si se encontraron pruebas
            if (mysqli_num_rows($result_pruebas) > 0) {
                while ($row_prueba = mysqli_fetch_assoc($result_pruebas)) {
                    $prueba_id = $row_prueba['prueba_id'];
                    $nombre_prueba = $row_prueba['nombre'];

                    echo '<h2>Prueba: ' . $nombre_prueba . '</h2>';
                    echo '<form method="post" action="./src/procesar_respuestas.php">';

                    // Consulta para recuperar las preguntas y opciones relacionadas con esta prueba
                    $query_preguntas = "SELECT p.pregunta_id, p.enunciado, r.respuesta, r.es_correcta
                                FROM preguntas p
                                INNER JOIN respuestas r ON p.pregunta_id = r.pregunta_id
                                WHERE p.curso_id = $prueba_id";
                    $result_preguntas = mysqli_query($conexion, $query_preguntas);

                    // Verifica si se encontraron preguntas
                    if (mysqli_num_rows($result_preguntas) > 0) {
                        $current_question_id = null;

                        while ($row_pregunta = mysqli_fetch_assoc($result_preguntas)) {
                            $pregunta_id = $row_pregunta['pregunta_id'];
                            $enunciado = $row_pregunta['enunciado'];
                            $respuesta = $row_pregunta['respuesta'];
                            $es_correcta = $row_pregunta['es_correcta'];

                            if ($pregunta_id !== $current_question_id) {
                                if ($current_question_id !== null) {
                                    echo '</div>';
                                }
                                echo '<div>';
                                echo '<p>' . $enunciado . '</p>';
                                $current_question_id = $pregunta_id;
                            }

                            echo '<input type="radio" name="respuesta_' . $pregunta_id . '" value="' . $respuesta . '">' . $respuesta;
                            echo '<input type="hidden" style= "font-size:2rem;"name="correcta_' . $pregunta_id . '" value="' . $es_correcta . '">';
                        }

                        echo '</div>';
                        echo '<button type="submit" name="submit">Enviar respuestas</button>';
                        echo '</form>';
                    } else {
                        echo 'No se encontraron preguntas para esta prueba.';
                    }
                }
            } else {
                echo 'No se encontraron pruebas para este curso.';
            }
        } else {
            echo 'ID del curso no especificado en la URL.';
        }

        // Cierra la conexión a la base de datos
        mysqli_close($conexion);
        
   echo "</div>";
echo "</div>";
    echo "</div>";
    echo "</div>";

    echo "</div>";
}

// Botón de "Regresar Arriba" (inicialmente oculto)
echo "<div class='regresar-arriba' onclick='regresarArriba()' style='display:none;'>Regresar Arriba</div>";

// JavaScript para mostrar/ocultar contenido al hacer clic en el enlace de la barra de navegación y examen, y para el botón de "Regresar Arriba"
echo "<script>
    function mostrarContenido(leccionId) {
        var leccion = document.getElementById('leccion_' + leccionId);
        var contenidoLeccion = leccion.querySelector('.contenido-contenedor');
        var hacerExamen = leccion.querySelector('.hacer-examen');
        var regresarArriba = document.querySelector('.regresar-arriba');

        if (contenidoLeccion.style.display === 'none') {
            contenidoLeccion.style.display = 'block';
            hacerExamen.style.display = 'block'; 
            regresarArriba.style.display = 'block'; 
        } else {
            contenidoLeccion.style.display = 'none';
            hacerExamen.style.display = 'none'; 
            regresarArriba.style.display = 'none'; 
        }
    }

    function mostrarExamen(leccionId) {
        var leccion = document.getElementById('leccion_' + leccionId);
        var examenContenedor = leccion.querySelector('.examen-contenedor');

        if (examenContenedor.style.display === 'none') {
            examenContenedor.style.display = 'block';
        } else {
            examenContenedor.style.display = 'none';
        }
    }

    function regresarArriba() {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }
</script>";
// Cerrar la conexión a la base de datos
mysqli_close($conn);
?>

        </div>
    </div>
</div>



        
    </main>


</body>

</html>