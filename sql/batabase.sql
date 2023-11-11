-- Crear la base de datos cursos_pi
CREATE DATABASE cursos_pi;

-- Seleccionar la base de datos
USE cursos_pi;

-- Crear la tabla de usuarios
CREATE TABLE usuarios (
    usuario_id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255),
    correo VARCHAR(255) UNIQUE NOT NULL,
    contrasena VARCHAR(255) NOT NULL,
    tipo_usuario ENUM('estudiante', 'instructor') NOT NULL
);

-- Crear la tabla de cursos
CREATE TABLE cursos (
    curso_id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255),
    descripcion TEXT,
    categoria VARCHAR(50),
    nivel VARCHAR(50),
    instructor_id INT, -- Clave foránea relacionada con usuario_id en la tabla de usuarios
    FOREIGN KEY (instructor_id) REFERENCES usuarios(usuario_id)
);

-- Crear la tabla de lecciones
CREATE TABLE lecciones (
    leccion_id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255),
    contenido TEXT,
    curso_id INT, -- Clave foránea relacionada con curso_id en la tabla de cursos
    FOREIGN KEY (curso_id) REFERENCES cursos(curso_id)
);

-- Crear la tabla de pruebas
CREATE TABLE pruebas (
    prueba_id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255),
    preguntas TEXT,
    curso_id INT, -- Clave foránea relacionada con curso_id en la tabla de cursos
    FOREIGN KEY (curso_id) REFERENCES cursos(curso_id)
);

-- Crear la tabla de comentarios
CREATE TABLE comentarios (
    comentario_id INT AUTO_INCREMENT PRIMARY KEY,
    comentario TEXT,
    usuario_id INT, -- Clave foránea relacionada con usuario_id en la tabla de usuarios
    curso_id INT, -- Clave foránea relacionada con curso_id en la tabla de cursos
    FOREIGN KEY (usuario_id) REFERENCES usuarios(usuario_id),
    FOREIGN KEY (curso_id) REFERENCES cursos(curso_id)
);

-- Crear la tabla de sesiones de usuario
CREATE TABLE sesiones_usuario (
    sesion_id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT, -- Clave foránea relacionada con usuario_id en la tabla de usuarios
    fecha_inicio DATETIME,
    fecha_fin DATETIME,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(usuario_id)
);

-- Crear tabla de imágenes y videos (si es necesario)
CREATE TABLE recursos_multimedia (
    recurso_id INT AUTO_INCREMENT PRIMARY KEY,
    nombre_archivo VARCHAR(255),
    tipo ENUM('imagen', 'video') NOT NULL,
    curso_id INT, -- Clave foránea relacionada con curso_id en la tabla de cursos
    FOREIGN KEY (curso_id) REFERENCES cursos(curso_id)
);
