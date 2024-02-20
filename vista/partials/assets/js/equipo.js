function ValidarCamposEquipo() {
  // equipo, proveedor,ref proveedor, modelo, num serie, procesador, ram, mac address, bateria, adaptador, version so, descripcion
  let equipo = document.getElementById("equipo").value.trim();
  let proveedor = document.getElementById("proveedor").value.trim();
  let referencia_proveedor = document
    .getElementById("referencia_proveedor")
    .value.trim();
  let modelo = document.getElementById("modelo").value.trim();
  let numero_serie = document.getElementById("numero_serie").value.trim();
  let procesador = document.getElementById("procesador").value.trim();
  let ram = document.getElementById("ram").value.trim();
  let mac_address = document.getElementById("mac_address").value.trim();
  let bateria = document.getElementById("bateria").value.trim();
  let adaptador = document.getElementById("adaptador").value.trim();
  let version_so = document.getElementById("version_so").value.trim();
  let descripcion = document.getElementById("descripcion").value.trim();

  let equipoValido = /^.{5,100}$/.test(equipo);
  let proveedorValido = /^.{5,100}$/.test(proveedor);
  let referencia_proveedorValido = /^.{5,100}$/.test(referencia_proveedor);
  let modeloValido = /^.{5,100}$/.test(modelo);
  let numero_serieValido = /^.{5,100}$/.test(numero_serie);
  let procesadorValido = /^.{5,100}$/.test(procesador);
  let ramValido = /^.{5,100}$/.test(ram);
  let mac_addressValido = /^.{5,100}$/.test(mac_address);
  let bateriaValido = /^.{5,100}$/.test(bateria);
  let adaptadorValido = /^.{5,100}$/.test(adaptador);
  let version_soValido = /^.{5,100}$/.test(version_so);
  let descripcionValido = /^.{5,100}$/.test(descripcion);

  let submitButton = document.getElementById("submitButton");
  if (
    equipoValido &&
    proveedorValido &&
    referencia_proveedorValido &&
    modeloValido &&
    numero_serieValido &&
    procesadorValido &&
    ramValido &&
    mac_addressValido &&
    bateriaValido &&
    adaptadorValido &&
    version_soValido &&
    descripcionValido
  ) {
    submitButton.disabled = false;
    console.log("boton disabled");
    console.log(
      equipoValido,
      " && ",
      proveedorValido,
      "&&",
      referencia_proveedorValido,
      "&&",
      modeloValido,
      "&&",
      numero_serieValido,
      "&&",
      procesadorValido,
      "&&",
      ramValido,
      "&&",
      mac_addressValido,
      "&&",
      bateriaValido,
      "&&",
      adaptadorValido,
      "&&",
      version_soValido,
      "&&",
      descripcionValido
    );
  } else {
    submitButton.disabled = true;
    console.log("boton enabled");
    console.log(
      equipoValido,
      " && ",
      proveedorValido,
      "&&",
      referencia_proveedorValido,
      "&&",
      modeloValido,
      "&&",
      numero_serieValido,
      "&&",
      procesadorValido,
      "&&",
      ramValido,
      "&&",
      mac_addressValido,
      "&&",
      bateriaValido,
      "&&",
      adaptadorValido,
      "&&",
      version_soValido,
      "&&",
      descripcionValido
    );
  }
}

function mostrarElemento(id) {
  document.getElementById(id).hidden = false;
}

function ocultarElemento(id) {
  document.getElementById(id).hidden = true;
}

function ValidarNombreEquipo(elemento) {
  let inputValue = elemento.value.trim();
  let errorSpan = document.getElementById("equipoError");

  // Validación de longitud
  let equipoValido = /^.{5,100}$/.test(inputValue);

  if (!equipoValido) {
    // No cumple con la longitud requerida
    elemento.style.borderColor = "red";
    errorSpan.textContent = "Nombre: 5-100 caracteres.";
    mostrarElemento("equipoError");
  } else {
    // Cumple con la longitud requerida
    elemento.style.borderColor = "green";
    errorSpan.textContent = "";
    ocultarElemento("equipoError");
  }
  ValidarCamposEquipo();
}

function ValidarProveedor(elemento) {
  let inputValue = elemento.value.trim();
  let errorSpan = document.getElementById("proveedorError");

  if (inputValue.length < 5 || inputValue.length > 100) {
    // No cumple con las reglas
    elemento.style.borderColor = "red";
    errorSpan.textContent = "Proveedor: 5-100 caracteres";
    mostrarElemento("proveedorError"); // Corregido: se pasa el id como cadena
  } else {
    // Cumple con las reglas
    elemento.style.borderColor = "green";
    errorSpan.textContent = "";
    ocultarElemento("proveedorError"); // Corregido: se pasa el id como cadena
  }
  ValidarCamposEquipo();
}

function ValidarReferenciaProveedor(elemento) {
  let inputValue = elemento.value.trim();
  let errorSpan = document.getElementById("referenciaProveedorError");

  if (inputValue.length < 5 || inputValue.length > 100) {
    // No cumple con las reglas
    elemento.style.borderColor = "red";
    errorSpan.textContent =
      "La referencia del proveedor debe tener entre 5 y 100 caracteres";
    mostrarElemento("referenciaProveedorError"); // Corregido: se pasa el id como cadena
  } else {
    // Cumple con las reglas
    elemento.style.borderColor = "green";
    errorSpan.textContent = "";
    ocultarElemento("referenciaProveedorError"); // Corregido: se pasa el id como cadena
  }
  ValidarCamposEquipo();
}

function ValidarModelo(elemento) {
  let inputValue = elemento.value.trim();
  let errorSpan = document.getElementById("modeloError");

  if (inputValue.length < 5 || inputValue.length > 100) {
    // No cumple con las reglas
    elemento.style.borderColor = "red";
    errorSpan.textContent = "El modelo debe tener entre 5 y 100 caracteres.";
    mostrarElemento("modeloError"); // Corregido: se pasa el id como cadena
  } else {
    // Cumple con las reglas
    elemento.style.borderColor = "green";
    errorSpan.textContent = "";
    ocultarElemento("modeloError"); // Corregido: se pasa el id como cadena
  }
  ValidarCamposEquipo();
}

function ValidarNumeroSerie(elemento) {
  let inputValue = elemento.value.trim();
  let errorSpan = document.getElementById("numeroSerieError");

  if (inputValue.length < 5 || inputValue.length > 100) {
    // No cumple con las reglas
    elemento.style.borderColor = "red";
    errorSpan.textContent =
      "El número de serie debe contener entre 5 y 100 caracteres.";
    mostrarElemento("numeroSerieError"); // Corregido: se pasa el id como cadena
  } else {
    // Cumple con las reglas
    elemento.style.borderColor = "green";
    errorSpan.textContent = "";
    ocultarElemento("numeroSerieError"); // Corregido: se pasa el id como cadena
  }
  ValidarCamposEquipo();
}

function ValidarProcesador(elemento) {
  let inputValue = elemento.value.trim();
  let errorSpan = document.getElementById("procesadorError");

  if (inputValue.length < 5 || inputValue.length > 100) {
    // No cumple con las reglas
    elemento.style.borderColor = "red";
    errorSpan.textContent =
      "El procesador debe tener entre 5 y 100 caracteres.";
    mostrarElemento("procesadorError"); // Corregido: se pasa el id como cadena
  } else {
    // Cumple con las reglas
    elemento.style.borderColor = "green";
    errorSpan.textContent = "";
    ocultarElemento("procesadorError"); // Corregido: se pasa el id como cadena
  }
  ValidarCamposEquipo();
}

function ValidarRam(elemento) {
  let inputValue = elemento.value.trim();
  let errorSpan = document.getElementById("ramError");

  if (inputValue.length < 3 || inputValue.length > 100) {
    // No cumple con las reglas
    elemento.style.borderColor = "red";
    errorSpan.textContent = "La ram debe tener entre 3 y 100 caracteres.";
    mostrarElemento("ramError"); // Corregido: se pasa el id como cadena
  } else {
    // Cumple con las reglas
    elemento.style.borderColor = "green";
    errorSpan.textContent = "";
    ocultarElemento("ramError"); // Corregido: se pasa el id como cadena
  }
  ValidarCamposEquipo();
}

function ValidarMacAddress(elemento) {
  let inputValue = elemento.value.trim();
  let errorSpan = document.getElementById("macAddressError");

  if (inputValue.length < 5 || inputValue.length > 100) {
    // No cumple con las reglas
    elemento.style.borderColor = "red";
    errorSpan.textContent =
      "El mac address debe tener entre 5 y 100 caracteres.";
    mostrarElemento("macAddressError"); // Corregido: se pasa el id como cadena
  } else {
    // Cumple con las reglas
    elemento.style.borderColor = "green";
    errorSpan.textContent = "";
    ocultarElemento("macAddressError"); // Corregido: se pasa el id como cadena
  }
  ValidarCamposEquipo();
}

function ValidarBateria(elemento) {
  let inputValue = elemento.value.trim();
  let errorSpan = document.getElementById("bateriaError");

  if (inputValue.length < 5 || inputValue.length > 100) {
    // No cumple con las reglas
    elemento.style.borderColor = "red";
    errorSpan.textContent = "La bateria debe tener entre 5 y 100 caracteres.";
    mostrarElemento("bateriaError"); // Corregido: se pasa el id como cadena
  } else {
    // Cumple con las reglas
    elemento.style.borderColor = "green";
    errorSpan.textContent = "";
    ocultarElemento("bateriaError"); // Corregido: se pasa el id como cadena
  }
  ValidarCamposEquipo();
}

function ValidarAdaptador(elemento) {
  let inputValue = elemento.value.trim();
  let errorSpan = document.getElementById("adaptadorError");

  if (inputValue.length < 5 || inputValue.length > 100) {
    // No cumple con las reglas
    elemento.style.borderColor = "red";
    errorSpan.textContent = "El adaptador debe tener entre 5 y 100 caracteres";
    mostrarElemento("adaptadorError"); // Corregido: se pasa el id como cadena
  } else {
    // Cumple con las reglas
    elemento.style.borderColor = "green";
    errorSpan.textContent = "";
    ocultarElemento("adaptadorError"); // Corregido: se pasa el id como cadena
  }
  ValidarCamposEquipo();
}

function ValidarVersionSo(elemento) {
  let inputValue = elemento.value.trim();
  let errorSpan = document.getElementById("versionSoError");

  if (inputValue.length < 2 || inputValue.length > 50) {
    // No cumple con las reglas
    elemento.style.borderColor = "red";
    errorSpan.textContent = "La version SO debe tener entre 2 y 50 caracteres";
    mostrarElemento("versionSoError"); // Corregido: se pasa el id como cadena
  } else {
    // Cumple con las reglas
    elemento.style.borderColor = "green";
    errorSpan.textContent = "";
    ocultarElemento("versionSoError"); // Corregido: se pasa el id como cadena
  }
  ValidarCamposEquipo();
}

function ValidarDescripcion(elemento) {
  let inputValue = elemento.value.trim();
  let errorSpan = document.getElementById("descripcionError");

  if (inputValue.length < 1 || inputValue.length > 500) {
    // No cumple con las reglas
    elemento.style.borderColor = "red";
    errorSpan.textContent =
      "La descripcion debe tener entre 1 y 500 caracteres";
    mostrarElemento("descripcionError"); // Corregido: se pasa el id como cadena
  } else {
    // Cumple con las reglas
    elemento.style.borderColor = "green";
    errorSpan.textContent = "";
    ocultarElemento("descripcionError"); // Corregido: se pasa el id como cadena
  }
  ValidarCamposEquipo();
}

function RegistrarEquipo() {
  event.preventDefault();
  $.ajax({
    type: "POST",
    url: "../../controlador/equipo.controlador.php",
    data: {
      equipo: $("#equipo").val(),
      categoria_equipo: $("#categoria_equipo").val(),
      compania: $("#compania").val(),
      usado_por: $("#usado_por").val(),
      ubicacion_uso: $("#ubicacion_uso").val(),
      proveedor: $("#proveedor").val(),
      referencia_proveedor: $("#referencia_proveedor").val(),
      modelo: $("#modelo").val(),
      numero_serie: $("#numero_serie").val(),
      fecha_efectiva: $("#fecha_efectiva").val(),
      alquilado: $("#alquilado").val(),
      seguro: $("#seguro").val(),
      leasing: $("#leasing").val(),
      valoracion: $("#valoracion").val(),
      procesador: $("#procesador").val(),
      ram: $("#ram").val(),
      almacenamiento: $("#almacenamiento").val(),
      mac_address: $("#mac_address").val(),
      bateria: $("#bateria").val(),
      adaptador: $("#adaptador").val(),
      sistema_operativo: $("#sistema_operativo").val(),
      version_so: $("#version_so").val(),
      descripcion: $("#descripcion").val(),
      id_usuario: $("#id_usuario").val(),
      Metodo: "RegistrarEquipo",
    },
    success: function (data) {
      let title, text, icon;
      if (data === "El equipo ya está registrado") {
        title = "Advertencia";
        text = "El equipo ya está registrado.";
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
      } else if (
        data === "Hubo un problema al intentar registrar la información"
      ) {
        title = "Error";
        text =
          "Hubo un problema al intentar registrar la información. Por favor, inténtalo de nuevo más tarde.";
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
      // Mostrar la alerta de SweetAlert5
      Swal.fire({
        title: title,
        text: text,
        icon: icon,
        timer: 2000,
        timerProgressBar: true,
        confirmButtonText: "Aceptar",
      });

      // Limpiar los valores del formulario (o realizar otras acciones según tu lógica)
      $("#equipo").val("");
      $("#categoria_equipo").val("");
      $("#compania").val("");
      $("#usado_por").val("");
      $("#ubicacion_uso").val("");
      $("#proveedor").val("");
      $("#referencia_proveedor").val("");
      $("#modelo").val("");
      $("#numero_serie").val("");
      $("#fecha_efectiva").val("");
      $("#alquilado").val("");
      $("#seguro").val("");
      $("#leasing").val("");
      $("#valoracion").val("");
      $("#procesador").val("");
      $("#ram").val("");
      $("#almacenamiento").val("");
      $("#mac_address").val("");
      $("#bateria").val("");
      $("#adaptador").val("");
      $("#sistema_operativo").val("");
      $("#version_so").val("");
      $("#descripcion").val("");
      $("#id_usuario").val("");
    },
  });
}

// Cerrar modal
function CerrarModal() {
  event.preventDefault();
  const modal = document.querySelector("#modal");
  modal.classList.add("hide");
  modal.addEventListener("animationend", function close() {
    modal.classList.remove("hide");
    modal.close();
    modal.removeEventListener("animationend", close);
  });
}

function ConsultarEquipo(id_equipo) {
  window.modal.showModal();
  $.ajax({
    type: "POST",
    url: "../../controlador/equipo.controlador.php",
    data: {
      id_equipo: id_equipo,
      Metodo: "ConsultarEquipo",
    },
    success: function (data) {
      $(".modal-body").text("");
      $(".modal-body").append(data);
    },
  });
}

function ModificarEquipo() {
  event.preventDefault();
  let redirijirA;

  $.ajax({
    type: "POST",
    url: "../../controlador/equipo.controlador.php",
    data: {
      id_equipo: $("#id_equipo").val(),
      equipo: $("#equipo").val(),
      categoria_equipo: $("#categoria_equipo").val(),
      compania: $("#compania").val(),
      usado_por: $("#usado_por").val(),
      id_usuario: $("#id_usuario").val(),
      ubicacion_uso: $("#ubicacion_uso").val(),
      proveedor: $("#proveedor").val(),
      referencia_proveedor: $("#referencia_proveedor").val(),
      modelo: $("#modelo").val(),
      numero_serie: $("#numero_serie").val(),
      fecha_efectiva: $("#fecha_efectiva").val(),
      alquilado: $("#alquilado").val(),
      seguro: $("#seguro").val(),
      leasing: $("#leasing").val(),
      valoracion: $("#valoracion").val(),
      procesador: $("#procesador").val(),
      ram: $("#ram").val(),
      almacenamiento: $("#almacenamiento").val(),
      mac_address: $("#mac_address").val(),
      bateria: $("#bateria").val(),
      adaptador: $("#adaptador").val(),
      sistema_operativo: $("#sistema_operativo").val(),
      version_so: $("#version_so").val(),
      descripcion: $("#descripcion").val(),
      Metodo: "ModificarEquipo",
    },
    success: function (data) {
      let title, text, icon;
      if (data === "Modificado correctamente") {
        title = "¡Exito!";
        text = "Modificado correctamente";
        icon = "success";
        redirijirA = "listar_equipos.php";
        console.log(data);
      } else if (data === "No fue posible modificar") {
        title = "Error";
        text = "No fue posible modificar";
        icon = "error";
        redirijirA = "listar_equipos.php";
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
        timer: 2000,
        timerProgressBar: true,
        confirmButtonText: "Aceptar",
      }).then(function () {
        window.location.href = redirijirA;
      });

      // Limpiar los valores del formulario (o realizar otras acciones según tu lógica)
      $("#equipo").val("");
      $("#categoria_equipo").val("");
      $("#compania").val("");
      $("#usado_por").val("");
      $("#ubicacion_uso").val("");
      $("#proveedor").val("");
      $("#referencia_proveedor").val("");
      $("#modelo").val("");
      $("#numero_serie").val("");
      $("#fecha_efectiva").val("");
      $("#alquilado").val("");
      $("#seguro").val("");
      $("#leasing").val("");
      $("#valoracion").val("");
      $("#procesador").val("");
      $("#ram").val("");
      $("#almacenamiento").val("");
      $("#mac_address").val("");
      $("#bateria").val("");
      $("#adaptador").val("");
      $("#sistema_operativo").val("");
      $("#version_so").val("");
      $("#descripcion").val("");
      $("#id_usuario").val("");
      CerrarModal();
    },
  });
}

function EliminarEquipo(id_equipo) {
  // Aquí puedes realizar las acciones necesarias para eliminar el usuario con el id proporcionado
  // Puedes hacer una llamada AJAX para enviar la solicitud al servidor, por ejemplo
  $.ajax({
    type: "POST",
    url: "../../../../controlador/equipo.controlador.php",
    data: {
      id_equipo: id_equipo,
      Metodo: "EliminarEquipo",
    },
    success: function (data) {
      let title, text, icon;
      if (data === "Equipo eliminado correctamente") {
        title = "¡Exito!";
        text = "Equipo eliminado correctamente";
        icon = "success";
        redirijirA = "listar_equipos.php";
        console.log(data);
      } else if (
        data === "Hubo un problema al intentar eliminar la información"
      ) {
        title = "Error";
        text = "Hubo un problema al intentar eliminar la información";
        icon = "error";
        redirijirA = "listar_equipos.php";
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
        confirmButtonText: "Aceptar",
      }).then(function () {
        window.location.href = redirijirA;
      });
      CerrarModal();
    },
  });
}
