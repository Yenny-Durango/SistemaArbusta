// REGISTRAR USUARIO ----------------------------------------------------------
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
        title = "Fallo";
        text = "Algo esta fallando";
        icon = "question";
        console.log(data);
      }

      console.log(data);

      Swal.fire({
        title: title,
        text: text,
        icon: icon,
        timer: 2000,
        timerProgressBar: true,
        confirmButtonText: 'Aceptar',
      });

      $('#nombre').val('');
      $('#apellido').val('');
      $('#correo').val('');
      $('#contrasena').val('');
      $('#confirmar_contrasena').val('');
      $('#telefono').val('');
    }
  });
}
// FIN REGISTRAR USUARIO ----------------------------------------------------------

// REGISTRAR USUARIO DESDE  EL ADMINISTRADOR ----------------------------------------------------------
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
        title = "Fallo";
        text = "Algo esta fallando";
        icon = "question";
        console.log(data);
      }

      console.log(data);

      Swal.fire({
        title: title,
        text: text,
        icon: icon,
        timer: 2000,
        timerProgressBar: true,
        confirmButtonText: 'Aceptar',
      });

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
// FIN REGISTRAR USUARIO DESDE  EL ADMINISTRADOR ----------------------------------------------------------


// INGRESAR AL APLICATIVO DEL USUARIO ----------------------------------------------------------------
function Ingresar() {
  event.preventDefault();
  let redirijirA;

  $.ajax({
    type: "POST",
    url: "../controlador/usuario.controlador.php",
    data: {
      'correo': $('#correo').val(),
      'contrasena': $('#contrasena').val(),
      'token': $('#token').val(),
      'action': $('#action').val(),
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
        title = "Fallo";
        text = "Algo está fallando";
        icon = "question";
        console.log(data);
      }

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
    }
  });
}
// FIN INGRESAR AL APLICATIVO DEL USUARIO ----------------------------------------------------------------

// MOSTRAR CONTRASEÑA DEL FORMULARIO DE REGISTRO  ----------------------------------------------------------
function mostrarContrasena() {
  var contrasena = document.getElementById("contrasena");
  var confirmar_contrasena = document.getElementById("confirmar_contrasena");
  var VerContrasena = document.getElementById("VerContrasena");

  if (contrasena.type === "password") {
    contrasena.type = "text";
    confirmar_contrasena.type = "text";
    VerContrasena.textContent = "Ocultar contraseña";
  } else {
    contrasena.type = "password";
    confirmar_contrasena.type = "password";
    VerContrasena.textContent = "Ver contraseña";
  }
}
// FIN MOSTRAR CONTRASEÑA DEL FORMULARIO DE REGISTRO  ----------------------------------------------------------

// MOSTRAR CONTRASEÑA DEL FORMULARIO DEL LOGIN  -----------------------------------------------------------
function MostrarContrasenaLogin() {
  var contrasena = document.getElementById("contrasena");
  var VerContrasena = document.getElementById("VerContrasena");

  if (contrasena.type === "password") {
    contrasena.type = "text";
    VerContrasena.textContent = "Ocultar contraseña";
  } else {
    contrasena.type = "password";
    VerContrasena.textContent = "Ver contraseña";
  }
}
// FIN MOSTRAR CONTRASEÑA DEL FORMULARIO DEL LOGIN  -----------------------------------------------------------

// CONSULTAR USUARIO (MUESTRA LOS DATOS DEL USUARIO A MODIFICAR EN UN MODAL)  -----------------------
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
// FIN CONSULTAR USUARIO (MUESTRA LOS DATOS DEL USUARIO A MODIFICAR EN UN MODAL)  -----------------------

// MODIFICAR USUARIO   --------------------------------------------------------------------------------
function ModificarUsuario() {
  event.preventDefault();
  let redirijirA;

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
        title = "Fallo";
        text = "Algo esta fallando";
        icon = "question";
        console.log(data);
      }
      console.log(data);
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

      $('#id_usuario').val('');
      $('#nombre_completo').val('');
      $('#correo').val('');
      $('#telefono').val('');
      $('#tipo_usuario').val('');
      CerrarModal();
    }
  });
}
// FIN MODIFICAR USUARIO   --------------------------------------------------------------------------------

// ELIMINAR USUARIO --------------------------------------------------------------------------------
function EliminarUsuario(id_Usuario) {
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
        title = "Fallo";
        text = "Algo esta fallando";
        icon = "question";
        console.log(data);
      }
      console.log(data);
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
// FIN ELIMINAR USUARIO --------------------------------------------------------------------------------

// MOSTRAR ELEMENTO Y OCULTAR ELEMENTO  ---------------
function MostrarElemento(id) {
  document.getElementById(id).hidden = false;
}

function OcultarElemento(id) {
  document.getElementById(id).hidden = true;
}
// FIN MOSTRAR ELEMENTO Y OCULTAR ELEMENTO  ---------------

// VALIDACIONES DE LOS CAMPOS CORREO, CONTRASEÑA Y CONFIRMAR CONTRASEÑA DEL LOGIN  ----------------------
function ValidarCamposLogin() {
  let correo = document.getElementById("correo").value;
  let contrasena = document.getElementById("contrasena").value;

  let CorreoValido = /^[a-zA-Z0-9._%+-\/\s]+@arbusta\.net$/.test(correo);
  let ContrasenaValida = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9]).{5,20}$/.test(contrasena);

  let BotonEnviarLogin = document.getElementById('BotonEnviarLogin');
  console.log('CorreoValido', CorreoValido, 'ContrasenaValida', ContrasenaValida);
  if (CorreoValido && ContrasenaValida) {
    BotonEnviarLogin.disabled = false;
    console.log("boton habilitado")
  } else if (CorreoValido === "" && ContrasenaValida === "") {
    BotonEnviarLogin.disabled = false;
    console.log("campo vacio");
  } else {
    BotonEnviarLogin.disabled = true;
    console.log("boton deshabilitado");
  };
}

function ValidarCorreoLogin(elemento) {
  let inputValue = elemento.value.trim();
  let ErrorSpan = document.getElementById("CorreoError");
  if (inputValue == "") {
    elemento.style.borderColor = "red";
    ErrorSpan.textContent = "Campo obligatorio";
    MostrarElemento("CorreoError");
  } else if (!(/^[a-zA-Z0-9._%+-\/\s]+@arbusta\.net$/.test(inputValue))) {
    elemento.style.borderColor = "red";
    ErrorSpan.textContent = "Formato incorrecto. El correo debe contener el dominio @arbusta.net";
    MostrarElemento("CorreoError");
  } else {
    elemento.style.borderColor = "green";
    ErrorSpan.textContent = "";
    ocultarElemento("CorreoError");
    ValidarCamposLogin();
  }
}

function ValidarContrasenaLogin(elemento) {
  let inputValue = elemento.value.trim();
  let ErrorSpan = document.getElementById("ContrasenaError");
  if (inputValue == "") {
    elemento.style.borderColor = "red";
    ErrorSpan.textContent = "Campo obligatorio";
    MostrarElemento("ContrasenaError");
  } else if (!(/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9]).{5,20}$/.test(inputValue))) {
    elemento.style.borderColor = "red";
    ErrorSpan.textContent = "Formato incorrecto. La contraseña debe ser de mínimo 5 caracteres y máximo 20, debe contener al menos 1 carácter especial, 1 minúscula, 1 mayúscula y 1 numero";
    MostrarElemento("ContrasenaError");
  } else {
    elemento.style.borderColor = "green";
    ErrorSpan.textContent = "";
    ocultarElemento("ContrasenaError");
    ValidarCamposLogin();
  }
}
// FIN VALIDACIONES DE LOS CAMPOS CORREO, CONTRASEÑA Y CONFIRMAR CONTRASEÑA DEL LOGIN  ----------------------
