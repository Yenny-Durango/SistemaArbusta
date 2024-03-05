// REGISTRAR EQUIPO -----------------------------------
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
        confirmButtonText: "Aceptar",
      });

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
// FIN REGISTRAR EQUIPO -----------------------------------


// CERRAR MODAL -------------------------------------------
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
// FIN CERRAR MODAL ---------------------------------------


// CONSULTAR EQUIPO  --------------------------------------
function ConsultarEquipo(id_equipo) {
  window.modal.showModal();
  $.ajax({
    type: 'POST',
    url: "../../controlador/equipo.controlador.php",
    data: {
      'id_equipo': id_equipo,
      'Metodo': "ConsultarEquipo"
    },
    success: function (data) {
      $('.modal-body').text("");
      $('.modal-body').append(data);
    }
  });
}
// FIN CONSULTAR EQUIPO  ----------------------------------


// MODIFICAR EQUIPO ---------------------------------------
function ModificarEquipo() {
  event.preventDefault();
  let redirijirA;

  $.ajax({
    type: 'POST',
    url: "../../controlador/equipo.controlador.php",
    data: {
      'id_equipo': $('#id_equipo').val(),
      'equipo': $('#equipo').val(),
      'categoria_equipo': $('#categoria_equipo').val(),
      'compania': $('#compania').val(),
      'usado_por': $('#usado_por').val(),
      'ubicacion_uso': $('#ubicacion_uso').val(),
      'proveedor': $('#proveedor').val(),
      'referencia_proveedor': $('#referencia_proveedor').val(),
      'modelo': $('#modelo').val(),
      'numero_serie': $('#numero_serie').val(),
      'fecha_efectiva': $('#fecha_efectiva').val(),
      'alquilado': $('#alquilado').val(),
      'seguro': $('#seguro').val(),
      'leasing': $('#leasing').val(),
      'valoracion': $('#valoracion').val(),
      'procesador': $('#procesador').val(),
      'ram': $('#ram').val(),
      'almacenamiento': $('#almacenamiento').val(),
      'mac_address': $('#mac_address').val(),
      'bateria': $('#bateria').val(),
      'adaptador': $('#adaptador').val(),
      'sistema_operativo': $('#sistema_operativo').val(),
      'version_so': $('#version_so').val(),
      'descripcion': $('#descripcion').val(),
      'id_usuario': $('#id_usuario').val(),
      'Metodo': 'ModificarEquipo'
    },
    success: function (data) {
      let title, text, icon;
      if (data === "modificado correctamente") {
        title = "¡Exito!";
        text = "Modificado correctamente";
        icon = "success";
        redirijirA = "listar_equipos.php";
        console.log(data);
      } else if (data === "no fue posible modificar") {
        title = "Error";
        text = "No fue posible modificar";
        icon = "error";
        redirijirA = "listar_equipos.php";
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

      $('#id_equipo').val('');
      $('#equipo').val('');
      $('#categoria_equipo').val('');
      $('#compania').val('');
      $('#usado_por').val('');
      $('#ubicacion_uso').val('');
      $('#proveedor').val('');
      $('#referencia_proveedor').val('');
      $('#modelo').val('');
      $('#numero_serie').val('');
      $('#fecha_efectiva').val('');
      $('#alquilado').val('');
      $('#seguro').val('');
      $('#leasing').val('');
      $('#valoracion').val('');
      $('#procesador').val('');
      $('#ram').val('');
      $('#almacenamiento').val('');
      $('#mac_address').val('');
      $('#bateria').val('');
      $('#adaptador').val('');
      $('#sistema_operativo').val('');
      $('#version_so').val('');
      $('#descripcion').val('');
      $('#id_usuario').val('');
      CerrarModal();
    }
  });
}
// FIN MODIFICAR EQUIPO -----------------------------------


// ELIMINAR EQUIPO ----------------------------------------
function EliminarEquipo(id_equipo) {
  // Aquí puedes realizar las acciones necesarias para eliminar el usuario con el id proporcionado
  // Puedes hacer una llamada AJAX para enviar la solicitud al servidor, por ejemplo
  $.ajax({
    type: "POST",
    url: "../../controlador/equipo.controlador.php",
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
// FIN ELIMINAR EQUIPO ------------------------------------


function ValidarCamposEquipo() {
  let equipo = document.getElementById("equipo").value;
  let proveedor = document.getElementById("proveedor").value;
  let referencia_proveedor = document.getElementById("referencia_proveedor").value;
  let modelo = document.getElementById("modelo").value;
  let numero_serie = document.getElementById("numero_serie").value;
  let fecha_efectiva = document.getElementById("fecha_efectiva").value;
  let alquilado = document.getElementById("alquilado").value;
  let seguro = document.getElementById("seguro").value;
  let leasing = document.getElementById("leasing").value;
  let valoracion = document.getElementById("valoracion").value;
  let procesador = document.getElementById("procesador").value;
  let ram = document.getElementById("ram").value;
  let almacenamiento = document.getElementById("almacenamiento").value;
  let mac_address = document.getElementById("mac_address").value;
  let bateria = document.getElementById("bateria").value;
  let adaptador = document.getElementById("adaptador").value;
  let sistema_operativo = document.getElementById("sistema_operativo").value;
  let version_so = document.getElementById("version_so").value;
  let descripcion = document.getElementById("descripcion").value;

  let EquipoValido = /^.{5,100}$/.test(equipo);
  let ProveedorValido = /^.{5,100}$/.test(proveedor);
  let ReferenciaProveedorValido = /^.{5,100}$/.test(referencia_proveedor);
  let ModeloValido = /^.{5,100}$/.test(modelo);
  let NumeroSerieValido = /^.{6,100}$/.test(numero_serie);
  let FechaEfectivaValida = /^\d{2}\/\d{2}\/\d{4}$/.test(fecha_efectiva);
  let ProcesadorValido = /^.{5,100}$/.test(procesador);
  let RamValido = /^.{5,100}$/.test(ram);
  let AlmacenamientoValido = /^.{5,100}$/.test(almacenamiento);
  let MacAdressValida = /^.{12,100}$/.test(mac_address);
  let BateriaValida = /^.{5,100}$/.test(bateria);
  let AdaptadorValido = /^.{5,100}$/.test(adaptador);
  let SistemaOperativoValido = /^.{5,100}$/.test(sistema_operativo);
  let VersionSoValida = /^.{5,100}$/.test(version_so);
  let DescripcionValida = /^.{1,100}$/.test(descripcion);

  let BotonEnviarEquipo = document.getElementById('BotonEnviarEquipo');

  console.log('EquipoValido', EquipoValido, 'ProveedorValido', ProveedorValido, 'ReferenciaProveedorValido', ReferenciaProveedorValido, 'ModeloValido', ModeloValido, 'NumeroSerieValido', NumeroSerieValido, 'FechaEfectivaValida', FechaEfectivaValida, 'AlquiladoValido', AlquiladoValido, 'SeguroValido', SeguroValido, 'LeasingValido', LeasingValido, 'ValoracionValida', ValoracionValida, ProcesadorValido, 'ProcesadorValido', RamValido, 'RamValido', AlmacenamientoValido, 'AlmacenamientoValido', MacAdressValida, 'MacAdressValida', BateriaValida, 'BateriaValida', AdaptadorValido, 'AdaptadorValido', SistemaOperativoValido, 'SistemaOperativoValido', VersionSoValida, 'VersionSoValida', DescripcionValida, 'DescripcionValida');

  if (EquipoValido && ProveedorValido && ReferenciaProveedorValido && ModeloValido && NumeroSerieValido && FechaEfectivaValida && AlquiladoValido && SeguroValido && LeasingValido && ValoracionValida && ProcesadorValido && RamValido && AlmacenamientoValido && MacAdressValida && BateriaValida && AdaptadorValido && SistemaOperativoValido && VersionSoValida && DescripcionValida) {
    BotonEnviarEquipo.disabled = false;
    console.log("boton habilitado");
  } else if (EquipoValido === "" && ProveedorValido === "" && ReferenciaProveedorValido === "" && ModeloValido === "" && NumeroSerieValido === "" && FechaEfectivaValida === "" && AlquiladoValido === "" && SeguroValido === "" && LeasingValido === "" && ValoracionValida === "" && ProcesadorValido === "" && RamValido === "" && AlmacenamientoValido === "" && MacAdressValida === "" && BateriaValida === "" && AdaptadorValido === "" && SistemaOperativoValido === "" && VersionSoValida === "" && DescripcionValida === "") {
    BotonEnviarEquipo.disabled = false;
    console.log("campo vacio");
  } else {
    BotonEnviarEquipo.disabled = true;
    console.log("boton deshabilitado");
  }
}

function ValidarEquipo(elemento) {
  let inputValue = elemento.value.trim();
  let ErrorSpan = document.getElementById("EquipoError");
  if (inputValue == "") {
    elemento.style.borderColor = "red";
    ErrorSpan.textContent = "Campo obligatorio";
    MostrarElemento("EquipoError");
  } else if (!(/^.{5,100}$/.test(inputValue))) {
    elemento.style.borderColor = "red";
    ErrorSpan.textContent = "Nombre del equipo debe tener entre 5 y 100 caracteres.";
    MostrarElemento("EquipoError");
  } else {
    elemento.style.borderColor = "green";
    ErrorSpan.textContent = "";
    OcultarElemento("EquipoError");
    ValidarCamposEquipo();
  }
}

function ValidarProveedor(elemento) {
  let inputValue = elemento.value.trim();
  let ErrorSpan = document.getElementById("ProveedorError");
  if (inputValue == "") {
    elemento.style.borderColor = "red";
    ErrorSpan.textContent = "Campo obligatorio";
    MostrarElemento("ProveedorError");
  } else if (!(/^.{5,100}$/.test(inputValue))) {
    elemento.style.borderColor = "red";
    ErrorSpan.textContent = "Proveedor debe tener entre 5 y 100 caracteres.";
    MostrarElemento("ProveedorError");
  } else {
    elemento.style.borderColor = "green";
    ErrorSpan.textContent = "";
    OcultarElemento("ProveedorError");
    ValidarCamposEquipo();
  }
}

function ValidarReferenciaProveedor(elemento) {
  let inputValue = elemento.value.trim();
  let ErrorSpan = document.getElementById("ReferenciaProveedorError");
  if (inputValue == "") {
    elemento.style.borderColor = "red";
    ErrorSpan.textContent = "Campo obligatorio";
    MostrarElemento("ReferenciaProveedorError");
  } else if (!(/^.{5,100}$/.test(inputValue))) {
    elemento.style.borderColor = "red";
    ErrorSpan.textContent = "Referencia proveedor debe tener entre 5 y 100 caracteres.";
    MostrarElemento("ReferenciaProveedorError");
  } else {
    elemento.style.borderColor = "green";
    ErrorSpan.textContent = "";
    OcultarElemento("ReferenciaProveedorError");
    ValidarCamposEquipo();
  }
}

function ValidarModelo(elemento) {
  let inputValue = elemento.value.trim();
  let ErrorSpan = document.getElementById("ModeloError");
  if (inputValue == "") {
    elemento.style.borderColor = "red";
    ErrorSpan.textContent = "Campo obligatorio";
    MostrarElemento("ModeloError");
  } else if (!(/^.{5,100}$/.test(inputValue))) {
    elemento.style.borderColor = "red";
    ErrorSpan.textContent = "Modelo debe tener entre 5 y 100 caracteres.";
    MostrarElemento("ModeloError");
  } else {
    elemento.style.borderColor = "green";
    ErrorSpan.textContent = "";
    OcultarElemento("ModeloError");
    ValidarCamposEquipo();
  }
}
function ValidarNumeroSerie(elemento) {
  let inputValue = elemento.value.trim();
  let ErrorSpan = document.getElementById("NumeroSerieError");
  if (inputValue == "") {
    elemento.style.borderColor = "red";
    ErrorSpan.textContent = "Campo obligatorio";
    MostrarElemento("NumeroSerieError");
  } else if (!(/^.{6,100}$/.test(inputValue))) {
    elemento.style.borderColor = "red";
    ErrorSpan.textContent = "Numero serie debe tener entre 6 y 100 caracteres.";
    MostrarElemento("NumeroSerieError");
  } else {
    elemento.style.borderColor = "green";
    ErrorSpan.textContent = "";
    OcultarElemento("NumeroSerieError");
    ValidarCamposEquipo();
  }
}

function ValidarFechaEfectiva(elemento) {
  let inputValue = elemento.value.trim();
  let ErrorSpan = document.getElementById("FechaEfectivaError");
  if (inputValue == "") {
    elemento.style.borderColor = "red";
    ErrorSpan.textContent = "Campo obligatorio";
    MostrarElemento("FechaEfectivaError");
  } else if (!(/^\d{2}\/\d{2}\/\d{4}$/.test(inputValue))) {
    elemento.style.borderColor = "red";
    ErrorSpan.textContent = "Formato incorrecto: La fecha debe cumplir con el formato dd/mm/aaaa";
    MostrarElemento("FechaEfectivaError");
  } else {
    elemento.style.borderColor = "green";
    ErrorSpan.textContent = "";
    OcultarElemento("FechaEfectivaError");
    ValidarCamposEquipo();
  }
}

function ValidarProcesador(elemento) {
  let inputValue = elemento.value.trim();
  let ErrorSpan = document.getElementById("ProcesadorError");
  if (inputValue == "") {
    elemento.style.borderColor = "red";
    ErrorSpan.textContent = "Campo obligatorio";
    MostrarElemento("ProcesadorError");
  } else if (!(/^.{5,100}$/.test(inputValue))) {
    elemento.style.borderColor = "red";
    ErrorSpan.textContent = "El procesador debe contener entre 5 y 100 caracteres";
    MostrarElemento("ProcesadorError");
  } else {
    elemento.style.borderColor = "green";
    ErrorSpan.textContent = "";
    OcultarElemento("ProcesadorError");
    ValidarCamposEquipo();
  }
}
