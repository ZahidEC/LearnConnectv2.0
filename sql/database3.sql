-- Crear la base de datos
CREATE DATABASE cursos_pi;

-- Seleccionar la base de datos
USE cursos_pi;

-- Tabla de usuarios
CREATE TABLE usuarios (
  usuario_id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(255),
  correo VARCHAR(255) UNIQUE NOT NULL,
  contrasena VARCHAR(255) NOT NULL,
  tipo_usuario ENUM('estudiante', 'instructor') NOT NULL
);

-- Tabla de cursos
CREATE TABLE cursos (
  curso_id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(255),
  descripcion TEXT,
  categoria VARCHAR(50),
  nivel VARCHAR(50),
  instructor_id INT,
  FOREIGN KEY (instructor_id) REFERENCES usuarios(usuario_id)
);

-- Tabla de lecciones
CREATE TABLE lecciones (
  leccion_id INT AUTO_INCREMENT PRIMARY KEY,
  titulo VARCHAR(255),
  contenido TEXT,
  archivo_adjunto BLOB,
  curso_id INT,
  FOREIGN KEY (curso_id) REFERENCES cursos(curso_id)
);

-- Tabla de preguntas (con la nueva columna curso_id)
CREATE TABLE preguntas (
  pregunta_id INT AUTO_INCREMENT PRIMARY KEY,
  enunciado TEXT,
  curso_id INT,
  FOREIGN KEY (curso_id) REFERENCES cursos(curso_id)
);

-- Tabla de respuestas
CREATE TABLE respuestas (
  respuesta_id INT AUTO_INCREMENT PRIMARY KEY,
  respuesta TEXT,
  es_correcta BOOLEAN,
  pregunta_id INT,
  FOREIGN KEY (pregunta_id) REFERENCES preguntas(pregunta_id)
);

-- Tabla de pruebas
CREATE TABLE pruebas (
  prueba_id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(255),
  curso_id INT,
  FOREIGN KEY (curso_id) REFERENCES cursos(curso_id)
);

-- Tabla intermedia para relacionar pruebas y preguntas
CREATE TABLE pruebas_preguntas (
  prueba_id INT,
  pregunta_id INT,
  FOREIGN KEY (prueba_id) REFERENCES pruebas(prueba_id),
  FOREIGN KEY (pregunta_id) REFERENCES preguntas(pregunta_id)
);

-- Tabla de comentarios
CREATE TABLE comentarios (
  comentario_id INT AUTO_INCREMENT PRIMARY KEY,
  comentario TEXT,
  usuario_id INT,
  curso_id INT,
  FOREIGN KEY (usuario_id) REFERENCES usuarios(usuario_id),
  FOREIGN KEY (curso_id) REFERENCES cursos(curso_id)
);

-- Tabla de sesiones de usuario
CREATE TABLE sesiones_usuario (
  sesion_id INT AUTO_INCREMENT PRIMARY KEY,
  usuario_id INT,
  fecha_inicio DATETIME,
  fecha_fin DATETIME,
  FOREIGN KEY (usuario_id) REFERENCES usuarios(usuario_id)
);

-- Tabla de inscripciones
CREATE TABLE inscripciones (
  inscripcion_id INT AUTO_INCREMENT PRIMARY KEY,
  estudiante_id INT,
  curso_id INT,
  fecha_inscripcion DATE,
  FOREIGN KEY (estudiante_id) REFERENCES usuarios(usuario_id),
  FOREIGN KEY (curso_id) REFERENCES cursos(curso_id)
);
