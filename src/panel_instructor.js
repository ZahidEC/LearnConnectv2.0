// Obtener elementos del DOM
const cursos = document.getElementById('cursos');
const crear = document.getElementById('crear');
const agregar = document.getElementById('agregar');
const prueba = document.getElementById('prueba');
const comentarios = document.getElementById('comentarios');

// Obtener elementos del DOM
const creados = document.querySelector('.creados');
const crearCurso = document.querySelector('.crear');
const agregarLeccion = document.querySelector('.agregar');
const agregarPrueba = document.querySelector('.prueba');
const mensajes = document.querySelector('.cometarios');

// Mostrar cursos creados
cursos.addEventListener('click', () => {
    creados.style.display = 'flex';
    crearCurso.style.display = 'none';
    agregarLeccion.style.display = 'none';
    agregarPrueba.style.display = 'none';
    mensajes.style.display = 'none';
});

// Mostrar crear curso
crear.addEventListener('click', () => {
    creados.style.display = 'none';
    crearCurso.style.display = 'flex';
    agregarLeccion.style.display = 'none';
    agregarPrueba.style.display = 'none';
    mensajes.style.display = 'none';
});

// Mostrar agregar lección
agregar.addEventListener('click', () => {
    creados.style.display = 'none';
    crearCurso.style.display = 'none';
    agregarLeccion.style.display = 'flex';
    agregarPrueba.style.display = 'none';
    mensajes.style.display = 'none';
});

// Mostrar agregar prueba
prueba.addEventListener('click', () => {
    creados.style.display = 'none';
    crearCurso.style.display = 'none';
    agregarLeccion.style.display = 'none';
    agregarPrueba.style.display = 'flex';
    mensajes.style.display = 'none';
});

// Mostrar mensajes
comentarios.addEventListener('click', () => {
    creados.style.display = 'none';
    crearCurso.style.display = 'none';
    agregarLeccion.style.display = 'none';
    agregarPrueba.style.display = 'none';
    mensajes.style.display = 'flex';
});