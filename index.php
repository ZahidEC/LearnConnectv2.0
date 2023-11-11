<?php

// Conexión a la DB
$conn = mysqli_connect("localhost", "root", "", "cursos_pi");

// Consulta para obtener todos los cursos
$sql = "SELECT * FROM cursos";
$resultado = mysqli_query($conn, $sql);
$cursos = mysqli_fetch_all($resultado, MYSQLI_ASSOC);

// Ordenar cursos aleatoriamente 
shuffle($cursos);

// Tomar solo los primeros 3 cursos
$cursos_aleatorios = array_slice($cursos, 0, 3);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Agrega estos estilos en la sección <head> de tu documento HTML -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Principal</title>

    <!-- Estilos CSS -->
    <link rel="stylesheet" href="./css/style_index.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<style>

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

html{
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

/* Estilo acerca */
.acerca {
    width: 100%;
    height: 90vh;
    background-image: linear-gradient(to right top, #008399, #0098a9, #00aeb7, #11c3c2, #32d9cb);
    display: grid;
    grid-template-columns: 1fr 1fr;
    grid-template-rows: 1fr;
    gap: 5%;
    overflow: hidden;
    padding: 0 8%;
    /* aplicar una sombra en la parte inferior */
    box-shadow: 0px 10px 10px rgba(0, 0, 0, 0.25);
}

.acerca .texto {
    background-color: var(--color_primario);
    padding: 8%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    background-color: var(--color_primario);
    height: 80%;
    width: 100%;
    border-radius: 10px;
    margin-top: 14%;
    color: white;
    box-shadow: 10px 0px 10px rgba(0, 0, 0, 0.25);
    font-weight: 100;
}

.acerca .texto h1 {
    font-size: 2.3rem;
    font-weight: 500;
    margin-bottom: 5%;
}

.acerca .texto p {
    font-size: 1.1rem;
    font-weight: 100;
}

.acerca .texto .texto_inicio {
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: center;
    border: 0.1px solid white;
    border-radius: 50px;
    padding: 5px 10px;
    height: 50px;
    width: 100%;
    gap: 10%;
}

.acerca .texto .texto_inicio a {
    text-decoration: none;
    color: var(--color_cuaternario);
    font-size: 1.2rem;
    font-weight: 100;
    transition: all 0.3s ease;
}

.acerca .texto .texto_inicio a:hover {
    color: var(--color_quintenario);
    scale: 1.1;
    font-size: 1.3rem;
}

.acerca .fondo {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    height: 100%;
    width: 100%;
}

.fondo img {
    width: 50%;
    height: 75%;
}

.fondo .imagen1 {
    position: relative;
    width: 100%;
    height: 100%;
}

.fondo .imagen1 img {
    width: 450px;
    height: 500px;
    position: absolute;
    top: 10%;
    left: 45%;
}

.fondo .imagen2 {
    position: relative;
    width: 100%;
    height: 100%;
}

.fondo .imagen2 img {
    width: 350px;
    height: 400px;
    position: absolute;
    top: -2%;
    left: 3%;
}

.fondo .imagen2 .maceta {
    width: 100px;
    height: 150px;
    position: absolute;
    top: -2%;
    left: 45%;
}

/* Estilo info */
.info {
    width: 100%;
    height: 100vh;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}

.info .texto {
    width: 100%;
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    padding: 0 5%;
    text-align: center;
    border-bottom: 5px solid var(--color_quintenario);
}

.info .texto h1 {
    font-size: 2.3rem;
    font-weight: 500;
    color: var(--color_cuaternario);
}

.info .texto p {
    font-size: 1.1rem;
    font-weight: 2500;
}

.info .fondo {
    width: 100%;
    height: 100%;
    /* Efecto paralax */
    background-attachment: fixed;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    background-image: url("./img/inde_img1.jpg");
    border-bottom: 5px solid var(--color_quintenario);
}

/* Estilo sugerencias */
.sugerencias {
    width: 100%;
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    padding-top: 45px;
}

.sugerencias .titulo {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    height: 100%;
    width: 100%;
    margin-bottom: 25px;
}

.sugerencias .titulo h1 {
    font-size: 2.3rem;
    font-weight: 500;
    color: var(--color_cuaternario);
    margin-bottom: 10px;
}

.sugerencias__curso {
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: center;
    height: 100%;
    width: 100%;
}

.sugerencias section {
    background-image: linear-gradient(to right top, #008399, #0098a9, #00aeb7, #11c3c2, #32d9cb);
    padding: 20px;
    border-radius: 10px;
    margin: 20px;

    display: inline-block;
    color: white;
    cursor: pointer;

    width: auto;
    min-width: 250px;

    min-height: 120px;

    /* hacer que el cambio de background-image: linear-gradient sea suave  */
    transition: all 0.5s ease-in-out;
}

.sugerencias section:hover {
    scale: 1.1;
    transition: all 0.5s ease-in-out;
}

.sugerencias h2 {
    color: white;
}



/* footer */
footer {
    background-color: var(--color_primario);
    width: 100%;
    height: 10vh;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
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

    .container-card {
    width: 100%;
    max-width: 1080px; /* Cambiado de 1100px para que coincida con el estilo */
    margin: auto;
    display: flex;
    flex-wrap: wrap; /* Agregado flex-wrap para permitir que las tarjetas se ajusten en pantallas pequeñas */
}

.title-cards {
    width: 100%;
    max-width: 1080px;
    margin: auto;
    padding: 20px;
    margin-top: 20px;
    text-align: center;
    color: #7a7a7a;
}

.card {
    width: calc(33.33% - 40px); /* Cambiado para ajustar a tres tarjetas por fila */
    margin: 20px;
    border-radius: 6px;
    overflow: hidden;
    background: #fff;
    box-shadow: 0px 1px 10px rgba(0, 0, 0, 0.2);
    transition: all 400ms ease-out;
    cursor: pointer;
    text-align: center;
}

.card:hover {
    box-shadow: 5px 5px 20px rgba(0, 0, 0, 0.4);
    transform: translateY(-3%);
}

.card img {
    width: 100%;
    height: 210px;
}

.card .contenido-card {
    padding: 15px;
}

.card .contenido-card h3 {
    margin-bottom: 15px;
    color: #7a7a7a;
    font-size: 1.5rem; /* Cambiado el tamaño de fuente */
}

.card .contenido-card p {
    line-height: 1.6;
    color: #6a6a6a;
    font-size: 14px;
    margin-bottom: 10px; /* Cambiado el margen inferior */
}

.card .contenido-card a {
    display: inline-block;
    padding: 10px;
    margin-top: 10px;
    text-decoration: none;
    color: #2fb4cc;
    border: 1px solid #2fb4cc;
    border-radius: 4px;
    transition: all 400ms ease;
    margin-bottom: 5px;
}

.card .contenido-card a:hover {
    background: #2fb4cc;
    color: #fff;
}


</style>
</head>

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
                    <li><a href="login.php">Iniciar Sesión</a></li>
                    <li><a href="register.php" class="registro">Registrarse</a></li>
                </div>
            </ul>
        </nav>
    </header>

    <div class="acerca">
        <div class="texto" data-aos="fade-up" data-aos-duration="1600">
            <h1>Bienvenidos a LearnConect</h1>
            <br>
            <p>Tu puerta de entrada al emocionante mundo del aprendizaje en
                línea.
                <br><br>
                En un
                mundo en constante evolución, la adquisición de conocimientos es esencial para alcanzar tus metas y
                aspiraciones.
                <br><br><br><br>
            <div class="texto_inicio">
                <p>Inicia ahora mismo.</p>
                <a href="login.php">Iniciar Sesión</a>
            </div>
            </p>
        </div>
        <div class="fondo">
            <div class="imagen1">
                <img src="./img/paginas.png" alt="" data-aos="fade-left" data-aos-duration="2200">
            </div>
            <div class="imagen2">
                <img src="./img/maceta.png" alt="" class="maceta" data-aos="fade-up" data-aos-duration="2100">
                <img src="./img/computadora.png" alt="" data-aos="fade-up" data-aos-duration="1800">
            </div>
        </div>
    </div>

    <div class="info" id="acerca">
        <div class="texto">
            <br>
            <br>
            <h1 data-aos="fade-right" data-aos-duration="1200">¡Acerca de nosotros!</h1>
            <br><br>
            <p data-aos="fade-right" data-aos-duration="1400">En LearnConect, creemos en el poder de la educación como
                motor de cambio y crecimiento. Fundada por un
                equipo apasionado de educadores y expertos en tecnología, nuestra plataforma se ha convertido en un faro
                de conocimiento y desarrollo personal. Nuestra visión es simple: hacer que la educación sea accesible
                para todos. Ya sea que desees adquirir nuevas habilidades, explorar pasiones, o avanzar en tu carrera,
                estamos aquí para brindarte la guía y el apoyo que necesitas.</p>
            <br>
            <p data-aos="fade-right" data-aos-duration="1600">Lo que nos distingue es nuestro compromiso con la calidad
                y la diversidad. Colaboramos con instructores
                excepcionales de todo el mundo, cada uno experto en su campo, para ofrecerte una amplia gama de cursos
                que se adaptan a tus necesidades e intereses. Además, hemos diseñado una plataforma intuitiva y fácil de
                usar que te permite aprender a tu propio ritmo.</p>
            <br>
            <p data-aos="fade-right" data-aos-duration="1800">En LearnConect, tu éxito es nuestra prioridad. Nos
                enorgullece ser parte de tu viaje de aprendizaje y
                estamos emocionados de ser testigos de tu crecimiento y logros. Únete a nosotros en este emocionante
                viaje de descubrimiento y desarrollo. ¡Bienvenidos a LearnConect!
           </p>
           <br>
           <br>
        </div>
        <div class="fondo">
        </div>
    </div>

    <div class="sugerencias" id="cursos">

        <div class="titulo">
            <div class="texto">
                <h1 data-aos="fade-right" data-aos-duration="1200">Sugerencias de Cursos</h1>
                <p data-aos="fade-right" data-aos-duration="1500">¿No sabes por dónde empezar? Aquí te dejamos algunas sugerencias de cursos que te pueden interesar.
                </p>
            </div>
        </div>

<div class="container-card">
    <?php
    // Iterar cursos aleatorios
    foreach ($cursos_aleatorios as $curso) {
        $imagen_portada = $curso['imagen_portada'];

        echo '<div class="card">';
        echo '<figure>';
        echo "<img src='{$imagen_portada}'>";
        echo '</figure>';
        echo '<div class="contenido-card">';
        echo "<h3>{$curso['nombre']}</h3>";
        echo "<p>{$curso['descripcion']}</p>";
        
        // Verificar si el usuario ha iniciado sesión
        if (isset($_SESSION["nombre"])) {
            // Si ha iniciado sesión, mostrar el botón de inscripción
            echo '<a href="inscribirse.php?curso_id=' . $curso['curso_id'] . '">Inscribirse</a>';
        } else {
            // Si no ha iniciado sesión, mostrar un enlace a la página de inicio de sesión
            echo '<a href="register.php">Inscribirse</a>';
        }

        echo '</div>';
        echo '</div>';
    }
    ?>
</div>



    </div>



    <footer>
        <div class="redes-sociales">
            <a href=""><ion-icon name="logo-facebook"></ion-icon></a>
            <a href=""><ion-icon name="logo-twitter"></ion-icon></a>
            <a href=""><ion-icon name="logo-instagram"></ion-icon></a>
        </div>
    </footer>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>