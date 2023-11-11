<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>

    <link rel="stylesheet" href="./css/style_register.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>

<body>
    <header>
        <nav>
            <ul>
                <div class="logo">
                    <h1 style="color:white">LearnConnect</h1>
                </div>
                <div class="enlaces">
                    <li><a href="index.php">Inicio</a></li>
                    <li><a href="index.php#cursoss">Cursos</a></li>
                    <li><a href="index.php#acerca">Acerca de nosotros</a></li>
                </div>
                <div class="sesion">
                    <li><a href="login.php">Iniciar Sesión</a></li>
                    <li><a href="register.php" class="registro">Registrarse</a></li>
                </div>
            </ul>
        </nav>
    </header>

    <main>

        <div class="formulario" data-aos="fade-right" data-aos-duration="2000">
            <div class="titulo">
                <h1>Registro</h1>
            </div>
            <form action="./src/procesar_registro.php" method="POST">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required>
                <br>
                <label for="correo">Correo Electrónico:</label>
                <input type="email" id="correo" name="correo" required>
                <br>
                <label for="contrasena">Contraseña:</label>
                <input type="password" id="contrasena" name="contrasena" required>
                <br>
                <label for="tipo_usuario">Tipo de Usuario:</label>
                <select id="tipo_usuario" name="tipo_usuario">
                    <option value="estudiante">Estudiante</option>
                    <option value="instructor">Instructor</option>
                </select>

                <button type="submit">Registrarse</button>
            </form>
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

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>