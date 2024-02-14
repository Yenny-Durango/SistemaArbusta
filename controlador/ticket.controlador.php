<?php
// Switch que maneja las diferentes funciones según el método enviado por POST.
switch ($_POST['Metodo']) {
  case 'RegistrarTicket':
    RegistrarTicket();
    break;
  case 'ModificarTicket':
    ModificarTicket();
    break;
  default:
    echo "Método inválido";
    break;
}

// Función para registrar un nuevo ticket en la base de datos.
function RegistrarTicket()
{
  require "../modelo/conexion.php";
  
}


// Función para modificar un ticket existente en la base de datos.
function ModificarTicket()
{
  // Requiere el archivo de conexión a la base de datos
  require "../modelo/conexion.php";

  // Inicia la sesión
  session_start();

  // Obtiene los datos del formulario por POST
  $id_usuario = $_POST['id_usuario'];

  // Verifica si el correo electrónico ya existe en la base de datos
  $sql = "SELECT * FROM tickets WHERE id_usuario = $id_usuario";
  $result = $pdo->query($sql);
  foreach ($result as $key => $results) {
    echo '
    <form method="POST" action="" enctype="multipart/form-data">
    <!-- Título del formulario -->
    <h1 class=".h1">Modificar Ticket</h1>
    <br>
    <!-- Sección de información del ticket -->
    <div class="row mb-3">
        <div class="col-md-6">
            <!-- Campo de fecha de creación -->
            <div class="form-floating mb-3 mb-md-0">
                <input class="form-control" id="fecha_creacion" name="fecha_creacion" type="date" placeholder="fecha_creacion" onkeyup="ValidarFechaCreacion(this)" value="' . $results["fecha_creacion"] . '" />
                <label for="Fecha Creación">Fecha Creación</label>
            </div>
            <!-- Mensaje de error para el campo de fecha de creación -->
            <span id="fechaCreacionError" class="alert alert-danger" hidden></span>
        </div>
        <div class="col-md-6">
            <!-- Campo de resumen del problema -->
            <div class="form-floating">
                <input class="form-control" id="resumen_problema" name="resumen_problema" type="text" placeholder="resumen_problema" onkeyup="ValidarResumenProblema(this)" value="' . $results["resumen_problema"] . '"/>
                <label for="Resumen Problema">Resumen Problema</label>
            </div>
            <!-- Mensaje de error para el campo de resumen del problema -->
            <span id="resumenProblemaError" class="alert alert-danger" hidden></span>
        </div>
    </div>

    <!-- Campo de detalle del problema -->
    <div class="form-floating">
        <textarea class="form-control" id="detalle_problema" name="detalle_problema" cols="30" rows="10" class="form-control" placeholder="detalle_problema" style="height: 100px;" onkeyup="ValidarDetalleProblema(this)">'.$results["detalle_problema"].'</textarea>
        <label for="Detalle Problema">Detalle Problema</label>
        <span id="detalleProblemaError" class="alert alert-danger" hidden></span>
    </div>

    <!-- Campo para cargar imágenes -->
    <br>
    <div class="form-floating">
        <input type="file" name="imagenes" id="imagenes" onchange="mostrarImagen(event)" accept="image/*" class="form-control" value="' . $results["imagenes"] . '">
        <label for="imagenes">Subir imágenes</label>
        <input type="hidden" id="inputImagenes" name="inputImagenes">
        <div id="imagenesPrevias" class="card mt-3"></div>
    </div>
    <br>

    <!-- Sección de información de contacto -->
    <div class="row mb-3">
        <div class="col-md-6">
            <!-- Campo de correo electrónico -->
            <div class="form-floating">
                <input class="form-control" id="correo" name="correo" type="email" placeholder="correo" onkeyup="ValidarCorreo(this)" value="' . $results["correo"] . '" />
                <label for="Correo">Correo</label>
            </div>
            <!-- Mensaje de error para el campo de correo electrónico -->
            <span id="correoError" class="alert alert-danger" hidden></span>
        </div>
        <div class="col-md-6">
            <!-- Campo de número de teléfono -->
            <div class="form-floating mb-3 mb-md-0">
                <input class="form-control" id="telefono" name="telefono" type="number" placeholder="telefono" onkeyup="ValidarTelefono(this)" value="' . $results["telefono"] . '" />
                <label for="Telefono">Telefono</label>
            </div>
            <!-- Mensaje de error para el campo de número de teléfono -->
            <span id="telefonoError" class="alert alert-danger" hidden></span>
        </div>
    </div>

    <!-- Campo de nombre completo -->
    <div class="form-floating mb-3 mb-md-0">
        <input class="form-control" id="nombre_completo" name="nombre_completo" type="text" placeholder="nombre_completo" onkeyup="ValidarNombreCompleto(this)" value="' . $results["nombre_completo"] . '" />
        <label for="Nombre Completo">Nombre Completo</label>
        <span id="nombreCompletoError" class="alert alert-danger" hidden></span>
    </div>
    ';
  }
}
