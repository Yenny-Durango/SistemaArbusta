

// REGISTRO
function ValidarCamposUsuario() {
  let nombre = document.getElementById("nombre").value.trim();
  let apellido = document.getElementById("apellido").value.trim();
  let correo = document.getElementById("correo").value.trim();
  let contrasena = document.getElementById("contrasena").value.trim();
  let confirmar_contrasena = document.getElementById("confirmar_contrasena").value.trim();

  let nombreValido = nombre.length >= 2 && nombre.length <= 20 && /^[a-zA-Z\s]+$/.test(nombre) && !/^\s/.test(nombre) && !/\s$/.test(nombre) && !/\s\s/.test(nombre);
  let apellidoValido = apellido.length >= 3 && apellido.length <= 20 && /^[a-zA-Z\s]+$/.test(apellido) && !/^\s/.test(apellido) && !/\s$/.test(apellido) && !/\s\s/.test(apellido);
  let correoValido = /^[a-zA-Z0-9._%+-]+@arbusta\.net$/.test(correo);
  let contrasenaValido = contrasena.length >= 5 && contrasena.length <= 20 &&
    /^(?=.*[!@#$%^&*()_-])(?=.*[A-Z])(?=.*[a-z])(?=.*\d).{5,20}$/.test(contrasena) &&
    /[a-z]+.*[A-Z]+|[A-Z]+.*[a-z]+.*[!@#$%^&*()_-]+.*\d+|\d+.*[!@#$%^&*()_-]+.*[a-z]+.*[A-Z]+/.test(contrasena);
  let confirmarContrasenaValido = contrasena === confirmar_contrasena;

  let submitButton = document.getElementById("submitButton");
  console.log(nombreValido, ' && ', apellidoValido, ' && ', correoValido, ' && ', contrasenaValido, ' && ', confirmarContrasenaValido);
  if (nombreValido && apellidoValido && correoValido && contrasenaValido && confirmarContrasenaValido) {
    submitButton.disabled = false;
  } else {
    submitButton.disabled = true;
  }
}

function mostrarElemento(id) {
  document.getElementById(id).hidden = false;
}

function ocultarElemento(id) {
  document.getElementById(id).hidden = true;
}

function ValidarNombreUsuarioR(elemento) {
  let inputValue = elemento.value.trim();
  let errorSpan = document.getElementById("nombreError");

  if (inputValue.length < 2 || inputValue.length > 20 || !/^[a-zA-Z\s]+$/.test(inputValue) || /^\s/.test(inputValue) || /\s$/.test(inputValue) || /\s\s/.test(inputValue)) {
    // No cumple con las reglas
    elemento.style.borderColor = "red";
    errorSpan.textContent = "Nombre: 2-20 caracteres, sin números ni caracteres especiales.";
    mostrarElemento("nombreError");  // Corregido: se pasa el id como cadena
  } else {
    // Cumple con las reglas
    elemento.style.borderColor = "green";
    errorSpan.textContent = "";
    ocultarElemento("nombreError");  // Corregido: se pasa el id como cadena
    ValidarCamposUsuario();
  }
}

function ValidarApellidoUsuarioR(elemento) {
  let inputValue = elemento.value.trim();
  let errorSpan = document.getElementById("apellidoError");

  if (inputValue.length < 3 || inputValue.length > 20 || !/^[a-zA-Z\s]+$/.test(inputValue) || /^\s/.test(inputValue) || /\s$/.test(inputValue) || /\s\s/.test(inputValue)) {
    // No cumple con las reglas
    elemento.style.borderColor = "red";
    errorSpan.textContent = "Apellido: 3-20 caracteres, sin números ni caracteres especiales.";
    mostrarElemento("apellidoError");  // Corregido: se pasa el id como cadena
  } else {
    // Cumple con las reglas
    elemento.style.borderColor = "green";
    errorSpan.textContent = "";
    ocultarElemento("apellidoError");  // Corregido: se pasa el id como cadena
    ValidarCamposUsuario();
  }
}

function ValidarCorreoUsuarioR(elemento) {
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
    ValidarCamposUsuario();
  }
}

function ValidarContrasenaUsuarioR(elemento) {
  let inputValue = elemento.value.trim();
  let errorSpan = document.getElementById("contrasenaError");

  if (
    inputValue.length < 5 ||
    inputValue.length > 20 ||
    !/^(?=.*[!@#$%^&*()_-])(?=.*[A-Z])(?=.*[a-z])(?=.*\d).{5,20}$/.test(inputValue) ||
    !/[a-z]+.*[A-Z]+|[A-Z]+.*[a-z]+/.test(inputValue) ||
    !/\d+/.test(inputValue)
  ) {
    // No cumple con las reglas
    elemento.style.borderColor = "red";
    errorSpan.textContent = "Contraseña: 5-20 caracteres, 1 especial, 1 mayúscula, 1 minúscula, 1 número.";
    mostrarElemento("contrasenaError");
  } else {
    // Cumple con las reglas
    elemento.style.borderColor = "green";
    errorSpan.textContent = "";
    ocultarElemento("contrasenaError");
    ValidarCamposUsuario();
  }
}

function ValidarConfimarContrasenaUsuarioR(elemento) {
  let inputValue = elemento.value.trim();
  let contrasena = document.getElementById("contrasena").value.trim();
  let errorSpan = document.getElementById("confirmarContrasenaError");

  if (inputValue !== contrasena) {
    // No cumple con las reglas
    elemento.style.borderColor = "red";
    errorSpan.textContent = "Las contraseñas deben coincidir.";
    mostrarElemento("confirmarContrasenaError");  // Corregido: se pasa el id como cadena
  } else {
    // Cumple con las reglas
    elemento.style.borderColor = "green";
    errorSpan.textContent = "";
    ocultarElemento("confirmarContrasenaError");  // Corregido: se pasa el id como cadena
    ValidarCamposUsuario();
  }
}

function ValidarTelefonoUsuarioR(elemento) {
  let inputValue = elemento.value.trim();
  let errorSpan = document.getElementById("telefonoError");

  if (!/^[0-9]{10,10}$/.test(inputValue)) {
    // No cumple con las reglas
    elemento.style.borderColor = "red";
    errorSpan.textContent = "El teléfono debe tener 10 números.";
    mostrarElemento("telefonoError");  // Corregido: se pasa el id como cadena
  } else {
    // Cumple con las reglas
    elemento.style.borderColor = "green";
    errorSpan.textContent = "";
    ocultarElemento("telefonoError");  // Corregido: se pasa el id como cadena
    ValidarCamposUsuario();
  }
}

function RegistrarUsuario() {
  event.preventDefault();
  $.ajax({
    type: "POST",
    url: "../controlador/usuario.controlador.php",
    data: {
      'nombre': $('#nombre').val(),
      'apellido': $('#apellido').val(),
      'correo': $('#correo').val(),
      'contrasena': $('#contrasena').val(),
      'confirmar_contrasena': $('#confirmar_contrasena').val(),
      'telefono': $('#telefono').val(),
      'Metodo': 'RegistrarUsuario'
    },

    success: function (data) {
      let title, text, icon;

      if (data === "El correo ya está registrado") {
        title = "Advertencia";
        text = "El correo ya está registrado. Por favor, utiliza otro correo.";
        icon = "warning";
        console.log(data);
      } else if (data === "Registrado correctamente") {
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
      $('#nombre').val('');
      $('#apellido').val('');
      $('#correo').val('');
      $('#contrasena').val('');
      $('#confirmar_contrasena').val('');
      $('#telefono').val('');
    }
  });
}

function RegistrarUsuarioAdmin() {
  event.preventDefault();
  $.ajax({
    type: "POST",
    url: "../../controlador/usuario.controlador.php",
    data: {
      'nombre': $('#nombre').val(),
      'apellido': $('#apellido').val(),
      'correo': $('#correo').val(),
      'contrasena': $('#contrasena').val(),
      'confirmar_contrasena': $('#confirmar_contrasena').val(),
      'telefono': $('#telefono').val(),
      'tipo_usuario': $('#tipo_usuario').val(),
      'Metodo': 'RegistrarUsuarioAdmin'
    },

    success: function (data) {
      let title, text, icon;

      if (data === "El correo ya está registrado") {
        title = "Advertencia";
        text = "El correo ya está registrado. Por favor, utiliza otro correo.";
        icon = "warning";
        console.log(data);
      } else if (data === "Registrado correctamente") {
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
      $('#nombre').val('');
      $('#apellido').val('');
      $('#correo').val('');
      $('#contrasena').val('');
      $('#confirmar_contrasena').val('');
      $('#telefono').val('');
      $('#tipo_usuario').val('');
    }
  });
}

// LOGIN
function ValidarCamposUsuarioLogin() {
  let correo = document.getElementById("correo").value.trim();
  let contrasena = document.getElementById("contrasena").value.trim();

  let correoValido = /^[\w.-]+@[a-zA-Z\d.-]+\.[a-zA-Z]{2,20}$/.test(correo);
  let contrasenaValido = contrasena.length >= 5 && contrasena.length <= 20;

  let submitButton = document.getElementById("submitButton");

  if (correoValido && contrasenaValido) {
    submitButton.disabled = false;
    console.log('boton enabled');
  } else {
    submitButton.disabled = true;
    console.log('boton disabled');
  }
}

function ValidarCorreoUsuario(elemento) {
  let inputValue = elemento.value.trim();
  let errorSpan = document.getElementById("correoError");

  if (!/^[a-zA-Z0-9._%+-]+@arbusta\.net$/.test(inputValue)) {
    // No cumple con las reglas
    elemento.style.borderColor = "red";
    errorSpan.textContent = "Ingrese un correo electrónico válido con el dominio @arbusta.net.";
    mostrarElemento("correoError");
  } else {
    // Cumple con las reglas
    elemento.style.borderColor = "green";
    errorSpan.textContent = "";
    ocultarElemento("correoError");
  }
  ValidarCamposUsuarioLogin();
}

function ValidarContrasenaUsuario(elemento) {
  let inputValue = elemento.value.trim();
  let errorSpan = document.getElementById("contrasenaError");

  if (
    inputValue.length < 5 ||
    inputValue.length > 20 ||
    !/^(?=.*[!@#$%^&*()_-])(?=.*[A-Z])(?=.*[a-z])(?=.*\d).{5,20}$/.test(inputValue) ||
    !/[a-z]+.*[A-Z]+|[A-Z]+.*[a-z]+/.test(inputValue) ||
    !/\d+/.test(inputValue)
  ) {
    // No cumple con las reglas
    elemento.style.borderColor = "red";
    errorSpan.textContent = "Contraseña: 5-20 caracteres, 1 especial, 1 mayúscula, 1 minúscula, 1 número.";
    mostrarElemento("contrasenaError");
  } else {
    // Cumple con las reglas
    elemento.style.borderColor = "green";
    errorSpan.textContent = "";
    ocultarElemento("contrasenaError");
  }
  ValidarCamposUsuarioLogin();
}

function ValidarConfimarContrasenaUsuario(elemento) {
  let inputValue = elemento.value.trim();
  let contrasena = document.getElementById("contrasena").value.trim();
  let errorSpan = document.getElementById("confirmarContrasenaError");

  if (inputValue !== contrasena) {
    // No cumple con las reglas
    elemento.style.borderColor = "red";
    errorSpan.textContent = "Las contraseñas deben coincidir.";
    mostrarElemento("confirmarContrasenaError");  // Corregido: se pasa el id como cadena
  } else {
    // Cumple con las reglas
    elemento.style.borderColor = "green";
    errorSpan.textContent = "";
    ocultarElemento("confirmarContrasenaError");  // Corregido: se pasa el id como cadena
    ValidarCamposUsuario();
  }
}

function Ingresar() {
  event.preventDefault();
  let redirijirA;

  $.ajax({
    type: "POST",
    url: "../controlador/usuario.controlador.php",
    data: {
      'correo': $('#correo').val(),
      'contrasena': $('#contrasena').val(),
      'Metodo': 'Ingresar'
    },

    success: function (data) {
      let title, text, icon;

      if (data === "El usuario no existe") {
        title = "Advertencia";
        text = "El correo no está registrado en la base de datos.";
        icon = "warning";
        redirijirA = "";
        console.log(data);
      } else if (data === "Credenciales incorrectas") {
        title = "Error";
        text = "Correo o contraseña incorrecta";
        icon = "error";
        redirijirA = "";
        console.log(data);
      } else if (data === "Complete todos los campos") {
        title = "Alerta";
        text = "Complete todos los campos";
        icon = "info";
        redirijirA = "";
        console.log(data);
      } else if (data === "ingresaste correctamente admin") {
        title = "Exito";
        text = "ingresaste correctamente admin";
        icon = "success";
        redirijirA = "../vista/principal_administrador.php";
        console.log(data);
      } else if (data === "ingresaste correctamente usuario") {
        title = "Exito";
        text = "ingresaste correctamente usuario";
        icon = "success";
        redirijirA = "../vista/principal.php";
        console.log(data);
      } else {
        // En caso de una respuesta desconocida, puedes manejarla de acuerdo a tus necesidades.
        title = "Fallo";
        text = "Algo está fallando";
        icon = "question";
        console.log(data);
      }

      // Mostrar la alerta de SweetAlert2
      Swal.fire({
        title: title,
        text: text,
        icon: icon,
        timer: 1000,
        timerProgressBar: true,
        confirmButtonText: 'Aceptar',
      }).then(function () {
        window.location.href = redirijirA;
      });
    }
  });
}

function mostrarContrasena() {
  var contrasena = document.getElementById("contrasena");
  var confirmar_contrasena = document.getElementById("confirmar_contrasena");
  var verContrasena = document.getElementById("verContrasena");

  if (contrasena.type === "password") {
    contrasena.type = "text";
    confirmar_contrasena.type = "text";
    verContrasena.textContent = "Ocultar contraseña";
  } else {
    contrasena.type = "password";
    confirmar_contrasena.type = "password";
    verContrasena.textContent = "Ver contraseña";
  }
}

function mostrarContrasenaL() {
  var contrasena = document.getElementById("contrasena");
  var verContrasena = document.getElementById("verContrasena");

  if (contrasena.type === "password") {
    contrasena.type = "text";
    verContrasena.textContent = "Ocultar contraseña";
  } else {
    contrasena.type = "password";
    verContrasena.textContent = "Ver contraseña";
  }
}

function ConsultarUsuario(id_usuario) {
  window.modal.showModal();
  $.ajax({
    type: 'POST',
    url: "../../controlador/usuario.controlador.php",
    data: {
      'id_usuario': id_usuario,
      'Metodo': "ConsultarUsuario"
    },
    success: function (data) {
      $('.modal-body').text("");
      $('.modal-body').append(data);
    }
  });
}

function ModificarUsuario() {
  event.preventDefault();
  $.ajax({
    type: 'POST',
    url: "../../controlador/usuario.controlador.php",
    data: {
      'id_usuario': $('#id_usuario').val(),
      'nombre_completo': $('#nombre_completo').val(),
      'correo': $('#correo').val(),
      'telefono': $('#telefono').val(),
      'tipo_usuario': $('#tipo_usuario').val(),
      'Metodo': 'ModificarUsuario'
    },
    success: function (data) {
      let title, text, icon;
      if (data === "modificado correctamente") {
        title = "¡Exito!";
        text = "Modificado correctamente";
        icon = "success";
        redirijirA = "listar_usuarios.php";
        console.log(data);
      } else if (data === "no fue posible modificar") {
        title = "Error";
        text = "No fue posible modificar";
        icon = "error";
        redirijirA = "listar_usuarios.php";
        console.log(data);
        CerrarModal();
      } else {
        // En caso de una respuesta desconocida, puedes manejarla de acuerdo a tus necesidades.
        title = "Fallo";
        text = "Algo esta fallando";
        icon = "question";
        console.log(data);
      }
      console.log(data);
      // Mostrar la alerta de SweetAlert5
      Swal.fire({
        title: title,
        text: text,
        icon: icon,
        timer: 3000,
        timerProgressBar: true,
        confirmButtonText: 'Aceptar',
      }).then(function () {
        window.location.href = redirijirA;
      });

      // Limpiar los valores del formulario (o realizar otras acciones según tu lógica)
      $('#id_usuario').val('');
      $('#nombre_completo').val('');
      $('#correo').val('');
      $('#telefono').val('');
      $('#tipo_usuario').val('');
      CerrarModal();
    }
  });
}

function EliminarUsuario(id_Usuario) {
  // Aquí puedes realizar las acciones necesarias para eliminar el usuario con el id proporcionado
  // Puedes hacer una llamada AJAX para enviar la solicitud al servidor, por ejemplo
  $.ajax({
    type: "POST",
    url: "../../controlador/usuario.controlador.php",
    data: {
      'id_usuario': id_Usuario,
      'Metodo': 'EliminarUsuario'
    },
    success: function (data) {
      let title, text, icon;
      if (data === "Usuario eliminado correctamente") {
        title = "¡Exito!";
        text = "Usuario eliminado correctamente";
        icon = "success";
        redirijirA = "listar_usuarios.php";
        console.log(data);
      } else if (data === "Hubo un problema al intentar eliminar la información") {
        title = "Error";
        text = "Hubo un problema al intentar eliminar la información";
        icon = "error";
        redirijirA = "listar_usuarios.php";
        console.log(data);
        CerrarModal();
      } else {
        // En caso de una respuesta desconocida, puedes manejarla de acuerdo a tus necesidades.
        title = "Fallo";
        text = "Algo esta fallando";
        icon = "question";
        console.log(data);
      }
      console.log(data);
      // Mostrar la alerta de SweetAlert5
      Swal.fire({
        title: title,
        text: text,
        icon: icon,
        timer: 3000,
        timerProgressBar: true,
        confirmButtonText: 'Aceptar',
      }).then(function () {
        window.location.href = redirijirA;
      });
      CerrarModal();
    }
  });
}
