let imagenCount = 0;
let imagenesSeleccionadas = [];

function agregarCampoImagen() {
  const contenedor = document.getElementById('contenedor-imagenes');
  const input = document.createElement('input');
  input.type = 'file';
  input.name = 'imagenes[]';
  input.accept = 'image/*';
  contenedor.appendChild(input);
}

function ValidarCamposTicket() {
  let fecha_creacion = document.getElementById("fecha_creacion").value.trim();
  let resumen_problema = document.getElementById("resumen_problema").value.trim();
  let detalle_problema = document.getElementById("detalle_problema").value.trim();
  let correo = document.getElementById("correo").value.trim();
  let telefono = document.getElementById("telefono").value.trim();
  let nombre_completo = document.getElementById("nombre_completo").value.trim();
  let imagenes = document.getElementById('imagenes')[0].value;


  let fechaCreacionValido = fecha_creacion.length >= 5 && fecha_creacion.length <= 100;
  let resumenProblemaValido = resumen_problema.length >= 5 && resumen_problema.length <= 100;
  let detalleProblemaValido = detalle_problema.length >= 5 && detalle_problema.length <= 500;
  let detalleNoIgualResumen = detalle_problema !== resumen_problema;
  let correoValido = /^[\w.-]+@arbusta\.net$/.test(correo);
  let telefonoValido = /^[0-9]{10}$/.test(telefono);
  let nombreCompletoValido = nombre_completo.length >= 5 && nombre_completo.length <= 100;
  let imagenesValidas = mostrarImagen(imagenes);

  let submitButton = document.getElementById("submitButton");
  if (fechaCreacionValido & resumenProblemaValido && detalleProblemaValido && detalleNoIgualResumen && correoValido && telefonoValido && nombreCompletoValido) {
    submitButton.disabled = false;
    console.log('boton disabled')
  } else {
    submitButton.disabled = true;
    console.log('boton enabled')
  }
}

function mostrarElemento(id) {
  document.getElementById(id).hidden = false;
}

function ocultarElemento(id) {
  document.getElementById(id).hidden = true;
}

function ValidarFechaCreacion(elemento) {
  let inputValue = elemento.value.trim();
  let errorSpan = document.getElementById("fechaCreacionError");

  if (inputValue.length < 5 || inputValue.length > 100) {
    elemento.style.borderColor = "red";
    errorSpan.textContent = "La fecha debe tener el formato YYYY-MM-DD.";
    mostrarElemento("fechaCreacionError");
  } else {
    elemento.style.borderColor = "green";
    errorSpan.textContent = "";
    ocultarElemento("fechaCreacionError");
  }

  ValidarCamposTicket();
}

function ValidarResumenProblema(elemento) {
  let inputValue = elemento.value.trim();
  let errorSpan = document.getElementById("resumenProblemaError");

  if (inputValue.length < 5 || inputValue.length > 100) {
    // No cumple con las reglas
    elemento.style.borderColor = "red";
    errorSpan.textContent = "El resumen del problema debe tener entre 5 y 100 caracteres.";
    mostrarElemento("resumenProblemaError");  // Corregido: se pasa el id como cadena
  } else {
    // Cumple con las reglas
    elemento.style.borderColor = "green";
    errorSpan.textContent = "";
    ocultarElemento("resumenProblemaError");  // Corregido: se pasa el id como cadena
  }
  ValidarCamposTicket();
}
function ValidarDetalleProblema(elemento) {
  let inputValue = elemento.value.trim();
  let errorSpan = document.getElementById("detalleProblemaError");
  let resumenProblemaValue = document.getElementById("resumen_problema").value.trim();  // Obtén el valor del campo resumen_problema

  // Dividir la cadena en palabras
  let palabras = inputValue.split(/\s+/);

  if (inputValue.length < 5 || inputValue.length > 500 || palabras.length < 3 || inputValue === resumenProblemaValue) {
    // No cumple con las reglas
    elemento.style.borderColor = "red";

    if (inputValue.length < 5 || inputValue.length > 500) {
      errorSpan.textContent = "El detalle del problema debe tener entre 5 y 500 caracteres.";
    } else if (palabras.length < 3) {
      errorSpan.textContent = "El detalle del problema debe tener al menos 3 palabras.";
    } else {
      errorSpan.textContent = "El detalle del problema no puede ser igual al resumen del problema.";
    }

    mostrarElemento("detalleProblemaError");  // Asumo que esta función está definida en tu código
  } else {
    // Cumple con las reglas
    elemento.style.borderColor = "green";
    errorSpan.textContent = "";
    ocultarElemento("detalleProblemaError");  // Asumo que esta función está definida en tu código
  }

  ValidarCamposTicket();
}

function ValidarImagenes() {
  let elemento = document.getElementById("imagenes");
  let archivos = elemento.querySelectorAll('img'); // Obtén todas las imágenes dentro del div

  let errorSpan = document.getElementById("imagenesError");

  // Validar que solo se permitan imágenes
  let soloImagenes = Array.from(archivos).every(function (imagen) {
    return imagen.src.toLowerCase().match(/\.(jpeg|jpg|gif|png)$/) !== null;
  });

  if (!soloImagenes || archivos.length < 1 || archivos.length > 5) {
    // No cumple con las reglas
    elemento.style.borderColor = "red";
    errorSpan.textContent = "Se permiten máximo 5 imágenes y solo se permiten archivos de imagen (jpeg, jpg, gif, png).";
    mostrarElemento("imagenesError");
  } else {
    // Cumple con las reglas
    elemento.style.borderColor = "green";
    errorSpan.textContent = "";
    ocultarElemento("imagenesError");
  }
  ValidarCamposTicket();
}


function ValidarCorreo(elemento) {
  let inputValue = elemento.value.trim();
  let errorSpan = document.getElementById("correoError");

  if (!/^[a-zA-Z0-9._%+-]+@arbusta\.net$/.test(inputValue)) {
    // No cumple con las reglas
    elemento.style.borderColor = "red";
    errorSpan.textContent = "Ingrese un correo electrónico válido con el dominio @arbusta.net.";
    mostrarElemento("correoError");  // Corregido: se pasa el id como cadena
  } else {
    // Cumple con las reglas
    elemento.style.borderColor = "green";
    errorSpan.textContent = "";
    ocultarElemento("correoError");  // Corregido: se pasa el id como cadena

  }
  ValidarCamposTicket();
}

function ValidarTelefono(elemento) {
  let inputValue = elemento.value.trim();
  let errorSpan = document.getElementById("telefonoError");

  if (!/^[0-9]{10,10}$/.test(inputValue)) {
    // No cumple con las reglas
    elemento.style.borderColor = "red";
    errorSpan.textContent = "El Teléfono debe contener solo números y tener una longitud de 10 caracteres.";
    mostrarElemento("telefonoError");  // Corregido: se pasa el id como cadena
  } else {
    // Cumple con las reglas
    elemento.style.borderColor = "green";
    errorSpan.textContent = "";
    ocultarElemento("telefonoError");  // Corregido: se pasa el id como cadena

  }
  ValidarCamposTicket();
}

function ValidarNombreCompleto(elemento) {
  let inputValue = elemento.value.trim();
  let errorSpan = document.getElementById("nombreCompletoError");

  if (inputValue.length < 5 || inputValue.length > 100) {
    // No cumple con las reglas
    elemento.style.borderColor = "red";
    errorSpan.textContent = "El nombre debe tener entre 5 y 100 caracteres.";
    mostrarElemento("nombreCompletoError");  // Corregido: se pasa el id como cadena
  } else {
    // Cumple con las reglas
    elemento.style.borderColor = "green";
    errorSpan.textContent = "";
    ocultarElemento("nombreCompletoError");  // Corregido: se pasa el id como cadena
  }
  ValidarCamposTicket();
}

function mostrarImagen(event) {
  if (imagenCount < 5) {
    const imagenesPrevias = document.getElementById("imagenesPrevias");
    const imagen = document.createElement("img");
    const file = event.target.files[0]; // Obtener el archivo seleccionado

    // Estilos de las imágenes
    var imagenes = document.getElementById("imagenesPrevias");

    imagenes.style.display = 'grid';
    imagenes.style.gridTemplateColumns = 'repeat(2, 1fr)';
    imagenes.style.gap = '10px';
    imagenes.style.backgroundColor = '#ffffff21';
    imagenes.style.overflow = 'auto';
    imagenes.style.width = '100%';
    imagen.style.width = '100%';
    imagen.style.height = '100%';


    // Verificar que se haya seleccionado un archivo
    if (file) {
      imagen.src = URL.createObjectURL(file);

      const eliminarBtn = document.createElement("button");
      eliminarBtn.textContent = "Eliminar";
      eliminarBtn.onclick = function () {
        imagenesPrevias.removeChild(imagen.parentElement);
        imagenCount--;

        // Eliminar el nombre del archivo del array al hacer clic en "Eliminar"
        const index = imagenesSeleccionadas.indexOf(file.name);
        if (index !== -1) {
          imagenesSeleccionadas.splice(index, 1);
        }
      };

      // Estilos del botón eliminar imagen (Bootstrap)
      eliminarBtn.className = 'btn btn-danger btn-sm';
      eliminarBtn.title = 'Eliminar';
      eliminarBtn.style.display = 'flex';
      eliminarBtn.style.margin = '5px auto';
      eliminarBtn.style.width = '50%';
      eliminarBtn.style.textAlign = 'center';
      eliminarBtn.style.justifyContent = 'center';
      eliminarBtn.style.alignItems = 'center';
      eliminarBtn.style.fontSize = '15px';


      const contenedor = document.createElement("div");
      contenedor.className = 'position-relative'; // Estilo Bootstrap adicional para posicionar el botón sobre la imagen
      contenedor.appendChild(imagen);
      contenedor.appendChild(eliminarBtn);
      imagenesPrevias.appendChild(contenedor);

      imagenCount++;

      // Almacenar el nombre del archivo en el array al mostrar la imagen
      imagenesSeleccionadas.push(file.name);

      // Verificar que se haya seleccionado un archivo y que el campo no esté vacío
      if (!file || file.trim() === '') {
        alert("Por favor, inserta una imagen de referencia");
        return false; // Detener el envío del formulario
      }
    }
  } else {
    alert("Solo se permiten hasta 5 imágenes.");
  }
}

function prepararEnvio() {
  // Asignar el array de nombres de imágenes al campo oculto del formulario
  const inputImagenes = document.getElementById("inputImagenes");
  inputImagenes.value = JSON.stringify(imagenesSeleccionadas);
  return validarFormulario(); // Validar el formulario antes del envío
}

function ModificarTicket(id_usuario) {
  window.modal.showModal();
  $.ajax({
    type: 'POST',
    url: "../controlador/ticket.controlador.php",
    data: {
      'id_usuario': id_usuario,
      'Metodo': "ModificarTicket"
    },
    success: function (data) {
      $('.modal-body').text("");
      $('.modal-body').append(data);
    }
  });
}