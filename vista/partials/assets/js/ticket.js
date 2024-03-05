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

function mostrarImagen(event) {
  if (imagenCount < 5) {
    const imagenesPrevias = document.getElementById("imagenesPrevias");
    const imagen = document.createElement("img");
    const file = event.target.files[0]; // Obtener el archivo seleccionado

    // Estilos de las imágenes
    var imagenes = document.getElementById("imagenesPrevias");

    imagenes.style.display = 'grid';
    imagenes.style.gridTemplateColumns = 'repeat(5, 1fr)';
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
      eliminarBtn.title = 'X';

      const contenedor = document.createElement("div");
      contenedor.className = 'position-relative'; // Estilo Bootstrap adicional para posicionar el botón sobre la imagen
      contenedor.appendChild(imagen);
      contenedor.appendChild(eliminarBtn);
      imagenesPrevias.appendChild(contenedor);
      imagenCount++;

      // Almacenar el nombre del archivo en el array al mostrar la imagen
      imagenesSeleccionadas.push(file.name);
    }
  } else {
    // alerta con sweetalert2
    Swal.fire({
      icon: 'warning',
      title: 'Aviso',
      text: 'Solo puedes subir maximo 5 imágenes!',
      timer: 2000,
      timerProgressBar: true,
    });
  }
}

function prepararEnvio() {
  // Asignar el array de nombres de imágenes al campo oculto del formulario
  const inputImagenes = document.getElementById("inputImagenes");
  inputImagenes.value = JSON.stringify(imagenesSeleccionadas);
  return validarFormulario(); // Validar el formulario antes del envío
}

// validar campos
function ValidarCamposTicket() {
  let resumen_problema = document.getElementById("resumen_problema").value;
  let detalle_problema = document.getElementById("detalle_problema").value;
  let imagenes = document.getElementById('imagenes').value;
  let correo = document.getElementById('correo').value;
  let telefono = document.getElementById('telefono').value;
  let nombre_completo = document.getElementById('nombre_completo').value;

  // validacion resumen del problema debe tener minimo 1 palabra maximo 10
  let resumeProblemaValido = /^[\wñáéíóú]{1,10}\s?[\wñáéíóú]+$/i.test(resumen_problema);
  let detalleProblemaValido = /^([\wñáéíóú.,?!;:/"'{}[\]()\-]+\s){2,499}[\wñáéíóú.,?!;:/"'{}[\]()\-]+$/i.test(detalle_problema);
  // validacion imagenes, debe permitir maximo 5 imagenes, solo formato  jpeg,png,jpg
  let imagenesValidas = ArchivosPermitidos(imagenes, "image/jpeg", "image/png", "image/gif");
  // validacion correo, debe permitir solo el dominio @arbusta.net
  let correoValido = /^\w+([.-]?\w+)@arbusta\.net$/.test(correo);
  // validacion telefono, debe tner maximo 10 caracteres
  let telefonoValido = /^\d{1,10}$/.test(telefono);
  // validacion nombre completo, debe permitir solo letras y espacios en blanco
  let nombreCompletoValido = /^[\w áéíóúÀÈÌÒÙäëïöüÄËÏÖÜàèìòù]{1,70}$/i.test(nombre_completo);

  let submitButton = document.getElementById('submitButton');
  console.log('resumeProblemaValido', resumeProblemaValido, 'detalleProblemaValido', detalleProblemaValido, 'imagenesValidas', imagenesValidas, 'correoValido', correoValido, 'telefonoValido', telefonoValido, 'nombreCompletoValido', nombreCompletoValido);
  if (resumeProblemaValido && detalleProblemaValido && imagenesValidas && correoValido && telefonoValido && nombreCompletoValido) {
    submitButton.disabled = false;
    console.log("button enabled");
  } else {
    submitButton.disabled = true;
    console.log("button disabled");
  }
}
function ArchivosPermitidos() {
  var archivos = arguments;
  var contador = 0;
  for (var i = 0; i < archivos.length; i++) {
    if (!archivos[i].type in archivos) {
      alert("El tipo de archivo: " + archivos[i].type + " no es permitido.");
      return false;
    } else {
      contador++;
    }
  }
}

function mostrarElemento(id) {
  document.getElementById(id).hidden = false;
}

function ocultarElemento(id) {
  document.getElementById(id).hidden = true;
}

function ValidarFechaTicket(elemento) {
  let inputValue = elemento.value.trim();
  let errorSpan = document.getElementById("fechaTicketError");
  if (inputValue == "") {
    errorSpan.textContent = "* Campo obligatorio.";
    mostrarElemento("fechaTicketError");
  } else if (!(/^(0[1-9]|1\d|2\d|3[01])-(0[1-9]|1[0-2])-\d{4}$/.test(inputValue))) {
    errorSpan.textContent = "* Formato incorrecto. Debe ser dd-mm-yyyy.";
    mostrarElemento("fechaTicketError");
  } else {
    errorSpan.textContent = "";
    ocultarElemento("fechaTicketError");
    ValidarCamposTicket();
  }
}

function ValidarResumenProblema(elemento) {
  let inputValue = elemento.value.trim().length;
  let errorSpan = document.getElementById("resumenProblemaError");
  if (inputValue < 5 || inputValue > 600) {
    elemento.style.borderColor = "red";
    errorSpan.textContent = "* Longitud del campo incorrecta. Debe tener entre 5 y 600 caracteres.";
    mostrarElemento("resumenProblemaError");
  } else {
    elemento.style.borderColor = "green";
    errorSpan.textContent = "";
    ocultarElemento("resumenProblemaError");
    ValidarCamposTicket();
  }
}

// validacion detalle del problema, no debe ser igual a resumen del problema y debe tener como minimo  5 palabras mas que el resumen
function ValidarDetalleProblema(elemento) {
  let resumen_problema = document.getElementById('resumen_problema').value.trim();
  let inputValue = elemento.value.trim();
  let errorSpan = document.getElementById("detalleProblemaError");

  // Dividir el detalle del problema en palabras
  let palabras = inputValue.split(/\s+/);

  if (inputValue == "") {
    elemento.style.borderColor = "red";
    errorSpan.textContent = "* Este campo es obligatorio.";
    mostrarElemento("detalleProblemaError");
  } else if (inputValue.toLowerCase() == resumen_problema.toLowerCase()) {
    elemento.style.borderColor = "red";
    errorSpan.textContent = "* El detalle de este campo no puede ser igual al Resumen del Problema.";
    mostrarElemento("detalleProblemaError");
  } else if (palabras.length < 3) {
    elemento.style.borderColor = "red";
    errorSpan.textContent = "* El detalle del problema debe contener al menos 3 palabras.";
    mostrarElemento("detalleProblemaError");
  } else if (inputValue.length < 5 || inputValue.length > 600) {
    elemento.style.borderColor = "red";
    errorSpan.textContent = "* Longitud del campo incorrecta. Debe tener entre 5 y 600 caracteres.";
    mostrarElemento("detalleProblemaError");
    ValidarCamposTicket();
  } else {
    elemento.style.borderColor = "green";
    errorSpan.textContent = "";
    ocultarElemento("detalleProblemaError");
    ValidarCamposTicket();
  }
}

function ValidarCorreo(elemento) {
  inputValue = elemento.value.trim();
  let errorSpan = document.getElementById("correoError");
  // correo solo debe permitir el dominio @arbusta.net
  if (inputValue.indexOf("@arbusta.net") == -1) {
    elemento.style.borderColor = "red";
    errorSpan.textContent = "* Formato de Correo Incorrecto. Por favor ingrese un correo electrónico con el formato: nombre@arbusta"
    errorSpan.textContent = 'Formato de Correo Electrónico Incorrecto';
    mostrarElemento("correoError")
  } else {
    elemento.style.borderColor = "green";
    errorSpan.textContent = '';
    ocultarElemento("correoError");
    ValidarCamposTicket();
  }
}
function ValidarTelefono(elemento) {
  let inputValue = elemento.value.trim();
  let errorSpan = document.getElementById('telefonoError');
  if (inputValue.length != 10) {
    elemento.style.borderColor = "red";
    errorSpan.textContent = '* Formato de Teléfono Incorrecto, debe contener exactamente 10 dígitos.';
    mostrarElemento('telefonoError')
  } else {
    errorSpan.textContent = "";
    elemento.style.borderColor = "green";
    ocultarElemento('telefonoError');
    ValidarCamposTicket();
  }
}

function ValidarNombreCompleto(elemento) {
  let inputValue = elemento.value.trim();
  let errorSpan = document.getElementById('nombreCompletoError');
  if (!/^[a-zA-ZáéíóúÁÉÍÓÚ\s]+$/.test(inputValue)) {
    errorSpan.textContent = "* El nombre completo no puede contener números ni caracteres especiales.";
    mostrarElemento('nombreCompletoError');
    elemento.style.borderColor = "red";
  } else {
    errorSpan.textContent = "";
    elemento.style.borderColor = "green";
    ocultarElemento('nombreCompletoError');
    ValidarCamposTicket();
  }
}

function RegistrarTicket() {
  event.preventDefault();
  $.ajax({
    type: "POST",
    url: "../../controlador/ticket.controlador.php",
    data: {
      'fecha_ticket': $('#fecha_ticket').val(),
      'resumen_problema': $('#resumen_problema').val(),
      'detalle_problema': $('#detalle_problema').val(),
      'imagenes': $('#imagenes').val(),
      'correo': $('#correo').val(),
      'telefono': $('#telefono').val(),
      'nombre_completo': $('#nombre_completo').val(),
      'Metodo': 'RegistrarTicket'
    },

    success: function (data) {
      let title, text, icon;

      if (data === "Registrado correctamente") {
        title = "Éxito";
        text = "Registrado correctamente. ¡Bienvenido!";
        icon = "success";
        console.log(data);
      } else if (data === "Complete todos los campos") {
        title = "Alerta";
        text = "Complete todos los campos";
        icon = "info";
        console.log(data);
      } else if (data === "Hubo un problema al intentar registrar la información") {
        title = "Error";
        text = "Hubo un problema al intentar registrar la información. Por favor, inténtalo de nuevo más tarde.";
        icon = "error";
        console.log(data);
      } else {
        // En caso de una respuesta desconocida, puedes manejarla de acuerdo a tus necesidades.
        title = "Fallo";
        text = "Algo esta fallando";
        icon = "question";
        console.log(data);
      }

      console.log(data);

      // Mostrar la alerta de SweetAlert2
      Swal.fire({
        title: title,
        text: text,
        icon: icon,
        timer: 2000,
        timerProgressBar: true,
        confirmButtonText: 'Aceptar',
      });

      // Limpiar los valores del formulario (o realizar otras acciones según tu lógica)
      $('#fecha_ticket').val(),
        $('#resumen_problema').val(),
        $('#detalle_problema').val(),
        $('#imagenes').val(),
        $('#correo').val(),
        $('#telefono').val(),
        $('#nombre_completo').val()
    }
  });
}