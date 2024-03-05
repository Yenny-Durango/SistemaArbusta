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
function MostrarContrasenaRegistro() {
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
    OcultarElemento("CorreoError");
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
    OcultarElemento("ContrasenaError");
    ValidarCamposLogin();
  }
}
// FIN VALIDACIONES DE LOS CAMPOS CORREO, CONTRASEÑA Y CONFIRMAR CONTRASEÑA DEL LOGIN  ----------------------

// VALIDACIONES DE LOS CAMPOS NOMBRE, APELLIDO, CORREO, TELEFONO, CONTRASEÑA Y CONFIRMAR CONTRASEÑA DEL REGISTRO -------
function ValidarCamposRegistro() {
  let nombre = document.getElementById('nombre').value;
  let apellido = document.getElementById('apellido').value;
  let correo = document.getElementById("correo").value;
  let telefono = document.getElementById("telefono").value;
  let contrasena = document.getElementById("contrasena").value;
  let confirmar_contrasena = document.getElementById("confirmar_contrasena").value;

  let NombreValido = /^([A-Za-z\s]{2,30})$/.test(nombre);
  let ApellidoValido = /^([A-Za-z\s]{3,30})$/.test(apellido);
  let CorreoValido = /^[a-zA-Z0-9._%+-\/\s]+@arbusta\.net$/.test(correo);
  let TelefonoValido = /^\d{10}$/.test(telefono);
  let ContrasenaValida = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9]).{5,20}$/.test(contrasena);
  let ConfirmarContrasenaValida = contrasena === confirmar_contrasena;

  let BotonEnviarRegistro = document.getElementById('BotonEnviarRegistro');
  console.log('NombreValido', NombreValido, 'ApellidoValido', ApellidoValido, 'CorreoValido', CorreoValido, 'TelefonoValido', TelefonoValido, 'ContrasenaValida', ContrasenaValida, 'ConfirmarContrasenaValida', ConfirmarContrasenaValida);

  if (NombreValido && ApellidoValido && CorreoValido && TelefonoValido && ContrasenaValida && ConfirmarContrasenaValida) {
    BotonEnviarRegistro.disabled = false;
    console.log("boton habilitado")
  } else if (NombreValido === "" && ApellidoValido === "" && CorreoValido === "" && TelefonoValido === "" && ContrasenaValida === "" && ConfirmarContrasenaValida === "") {
    BotonEnviarRegistro.disabled = false;
    console.log("campo vacio");
  } else {
    BotonEnviarRegistro.disabled = true;
    console.log("boton deshabilitado");
  };
}

function ValidarNombreRegistro(elemento) {
  let inputValue = elemento.value.trim();
  let ErrorSpan = document.getElementById("NombreError");
  if (inputValue == "") {
    elemento.style.borderColor = "red";
    ErrorSpan.textContent = "Campo obligatorio";
    MostrarElemento("NombreError");
  } else if (!(/^([A-Za-z\s]{2,30})$/.test(inputValue))) {
    elemento.style.borderColor = "red";
    ErrorSpan.textContent = "Formato incorrecto. El nombre debe contener minimo 2 caracteres maximo 30, no debe contener numeros ni caracteres especiales.";
    MostrarElemento("NombreError");
  } else {
    elemento.style.borderColor = "green";
    ErrorSpan.textContent = "";
    OcultarElemento("NombreError");
    ValidarCamposRegistro();
  }
}

function ValidarApellidoRegistro(elemento) {
  let inputValue = elemento.value.trim();
  let ErrorSpan = document.getElementById("ApellidoError");
  if (inputValue == "") {
    elemento.style.borderColor = "red";
    ErrorSpan.textContent = "Campo obligatorio";
    MostrarElemento("ApellidoError");
  } else if (!(/^([A-Za-z\s]{3,30})$/.test(inputValue))) {
    elemento.style.borderColor = "red";
    ErrorSpan.textContent = "Formato incorrecto. El apellido debe contener minimo 3 caracteres maximo 30, no debe contener numeros ni caracteres especiales.";
    MostrarElemento("ApellidoError");
  } else {
    elemento.style.borderColor = "green";
    ErrorSpan.textContent = "";
    OcultarElemento("ApellidoError");
    ValidarCamposRegistro();
  }
}

function ValidarCorreoRegistro(elemento) {
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
    OcultarElemento("CorreoError");
    ValidarCamposRegistro();
  }
}

function ValidarTelefonoRegistro(elemento) {
  let inputValue = elemento.value.trim();
  let ErrorSpan = document.getElementById("TelefonoError");
  if (inputValue == "") {
    elemento.style.borderColor = "red";
    ErrorSpan.textContent = "Campo obligatorio";
    MostrarElemento("TelefonoError");
  } else if (!(/^\d{10}$/.test(inputValue))) {
    elemento.style.borderColor = "red";
    ErrorSpan.textContent = "Formato incorrecto. El telefono debe tener 10 caracteres, no se permiten letras ni caracteres especiales";
    MostrarElemento("TelefonoError");
  } else {
    elemento.style.borderColor = "green";
    ErrorSpan.textContent = "";
    OcultarElemento("TelefonoError");
    ValidarCamposRegistro();
  }
}

function ValidarContrasenaRegistro(elemento) {
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
    OcultarElemento("ContrasenaError");
    ValidarCamposRegistro();
  }
}

function ValidarConfimarContrasenaRegistro(elemento) {
  let inputValue = elemento.value.trim();
  let ErrorSpan = document.getElementById("ConfirmarContrasenaError");
  let contrasena = document.getElementById("contrasena").value.trim();
  if (inputValue == "") {
    elemento.style.borderColor = "red";
    ErrorSpan.textContent = "Campo obligatorio";
    MostrarElemento("ConfirmarContrasenaError");
  } else if (!(inputValue === contrasena)) {
    elemento.style.borderColor = "red";
    ErrorSpan.textContent = "Formato incorrecto. La confirmacion de contraseña debe ser igual a el campo contraseña";
    MostrarElemento("ConfirmarContrasenaError");
  } else {
    elemento.style.borderColor = "green";
    ErrorSpan.textContent = "";
    OcultarElemento("ConfirmarContrasenaError");
    ValidarCamposRegistro();
  }
}

// FIN VALIDACIONES DE LOS CAMPOS NOMBRE, APELLIDO, CORREO, TELEFONO, CONTRASEÑA Y CONFIRMAR CONTRASEÑA DEL REGISTRO -------

// RECUPERAR CONTRASEÑA
function RecuperarContrasena() {
  event.preventDefault();
  let redirijirA;

  $.ajax({
    type: "POST",
    url: "../controlador/usuario.controlador.php",
    data: {
      'correo': $('#correo').val(),
      'Metodo': 'RecuperarContrasena'
    },
    success: function (data) {
      let title, text, icon;

      if (data === "Correo no registrado") {
        title = "Advertencia";
        text = "Correo no registrado";
        icon = "warning";
        // redirijirA = "";
        console.log(data);
      } else if (data === "Complete todos los campos") {
        title = "Alerta";
        text = "Complete todos los campos";
        icon = "info";
        // redirijirA = "";
        console.log(data);
      } else if (data === "Error al enviar email") {
        title = "Error";
        text = "Error al enviar email";
        icon = "error";
        // redirijirA = "";
        console.log(data);
      } else if (data === "Error al recuperar la contraseña:") {
        title = "Error";
        text = "Error al recuperar la contraseña:";
        icon = "error";
        // redirijirA = "";
        console.log(data);
      } else if (data === "Hemos enviado un correo electronico para restablecer tu contraseña") {
        title = "Exito";
        text = "Hemos enviado un correo electronico para restablecer tu contraseña";
        icon = "success";
        // redirijirA = "";
        console.log(data);
      } else if (data === "Error al enviar email") {
        title = "Error";
        text = "Error al enviar email";
        icon = "error";
        // redirijirA = "";
        console.log(data);
      }
      else {
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
      });
    }
  });
}
// FIN RECUPERAR CONTRASENA

// VALIDACION DEL CAMPO CORREO DE RECUPERAR CONTRASEÑA --------------------------------------------
function ValidarCamposRecuperarContrasena() {
  let correo = document.getElementById("correo").value;

  let CorreoValido = /^[a-zA-Z0-9._%+-\/\s]+@arbusta\.net$/.test(correo);

  let BotonRecuperarContrasena = document.getElementById('BotonRecuperarContrasena');
  console.log('CorreoValido', CorreoValido);

  if (CorreoValido) {
    BotonRecuperarContrasena.disabled = false;
    console.log("boton habilitado")
  } else if (CorreoValido === "") {
    BotonRecuperarContrasena.disabled = false;
    console.log("campo vacio");
  } else {
    BotonRecuperarContrasena.disabled = true;
    console.log("boton deshabilitado");
  };
}

function ValidarCorreoRecuperarContrasena(elemento) {
  let inputValue = elemento.value.trim();
  let ErrorSpan = document.getElementById("CorreoError");
  // si el campo esta vacio indicar que es un campo obligatorio 
  if (inputValue == "") {
    elemento.style.borderColor = "red";
    ErrorSpan.textContent = "Campo obligatorio";
    MostrarElemento("CorreoError");
    // si no cumple el formato, se  muestra mensaje de error y se colorea el campo en rojo
  } else if (!(/^[a-zA-Z0-9._%+-\/\s]+@arbusta\.net$/.test(inputValue))) {
    elemento.style.borderColor = "red";
    ErrorSpan.textContent = "Formato incorrecto. El correo debe contener el dominio @arbusta.net";
    MostrarElemento("CorreoError");
    // si todo esta correcto, se oculta el span de error y se pinta en verde el campo
  } else {
    elemento.style.borderColor = "green";
    ErrorSpan.textContent = "";
    OcultarElemento("CorreoError");
    ValidarCamposRecuperarContrasena();
  }
}
// FIN VALIDACION DEL CAMPO CORREO DE RECUPERAR CONTRASEÑA --------------------------------------------