document.addEventListener("DOMContentLoaded", function () {
  const agregarPreguntaButton = document.getElementById("agregarPregunta");
  const preguntasContainer = document.getElementById("preguntasContainer");
  let preguntaCount = 0;

  agregarPreguntaButton.addEventListener("click", () => {
    preguntaCount++;

    const preguntaDiv = document.createElement("div");
    preguntaDiv.className = "pregunta";
    preguntaDiv.innerHTML = `<br>
          <label for="pregunta_${preguntaCount}">Pregunta ${preguntaCount}:</label>
          <input type="text" name="pregunta_${preguntaCount}" id="pregunta_${preguntaCount}" required>
          <button type="button" class="eliminarPregunta">Eliminar</button>
          <div class="opciones">
              <label for="opciones_${preguntaCount}">Opciones:</label>
              <input type="text" name="opciones_${preguntaCount}" id="opciones_${preguntaCount}" required>
          </div>
          <label for="respuesta_${preguntaCount}">Respuesta correcta:</label>
          <select name="respuesta_${preguntaCount}" id="respuesta_${preguntaCount}" required>
              <option value="">Selecciona una respuesta</option>
          </select>
      `;

    preguntasContainer.appendChild(preguntaDiv);
    const respuestaSelect = preguntaDiv.querySelector(`#respuesta_${preguntaCount}`);

    // Agregar opciones de respuesta
    const opcionesInput = preguntaDiv.querySelector(`#opciones_${preguntaCount}`);
    opcionesInput.addEventListener("input", () => {
      respuestaSelect.innerHTML = '';
      const opciones = opcionesInput.value.split(',');
      opciones.forEach((opcion, index) => {
        const option = document.createElement("option");
        option.value = opcion;
        option.text = opcion;
        respuestaSelect.appendChild(option);
      });
    });

    // Eliminar pregunta
    const eliminarPreguntaButton = preguntaDiv.querySelector(".eliminarPregunta");
    eliminarPreguntaButton.addEventListener("click", () => {
      preguntasContainer.removeChild(preguntaDiv);
    });
  });

  // Evitar el envío del formulario al hacer clic en "Eliminar"
  preguntasContainer.addEventListener("click", (event) => {
    if (event.target.className === "eliminarPregunta") {
      event.preventDefault();
    }
  });
});