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

  session_start();

  // Obtener datos del formulario por POST
  $fecha_creacion = $_POST['fecha_creacion'];
  $resumen_problema = $_POST['resumen_problema'];
  $detalle_problema = $_POST['detalle_problema'];
  $imagenes = $_FILES['imagenes'];
  $correo = $_POST['correo'];
  $telefono = $_POST['telefono'];
  $nombre_completo = $_POST['nombre_completo'];
  $id_usuario = $_SESSION['id_usuario'];

  // Validar si todos los campos requeridos están completos
  if ($fecha_creacion === '' || $resumen_problema === '' || $detalle_problema === '' || $correo === '' || $telefono === '' || $nombre_completo === '' || $imagenes === '') {
    echo "Complete todos los campos";
  } else {
    // Preparar y ejecutar la consulta SQL para insertar el nuevo ticket
    $sql = "INSERT INTO tickets (fecha_creacion, resumen_problema, detalle_problema, imagenes, correo, telefono, nombre_completo, id_usuario) VALUES (:fecha_creacion, :resumen_problema, :detalle_problema, :imagenes, :correo, :telefono, :nombre_completo, :id_usuario)";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':fecha_creacion', $fecha_creacion, PDO::PARAM_STR);
    $stmt->bindParam(':resumen_problema', $resumen_problema, PDO::PARAM_STR);
    $stmt->bindParam(':detalle_problema', $detalle_problema, PDO::PARAM_STR);
    $stmt->bindParam(':imagenes', $imagenes, PDO::PARAM_STR);
    $stmt->bindParam(':correo', $correo, PDO::PARAM_STR);
    $stmt->bindParam(':telefono', $telefono, PDO::PARAM_STR);
    $stmt->bindParam(':nombre_completo', $nombre_completo, PDO::PARAM_STR);
    $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_STR);
    $stmt->execute();

    // Verificar si la inserción fue exitosa y mostrar un mensaje correspondiente
    if ($stmt->rowCount() > 0) {
      echo "Registrado correctamente";
    } else {
      echo "Hubo un problema al intentar registrar la información";
    }
  }

  // Cerrar la conexión a la base de datos
  $pdo = null;
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
    <div class="form-floating">
        <input class="form-control" id="fecha_creacion" name="fecha_creacion" type="date" placeholder="fecha_creacion" value="' . $results["fecha_creacion"] . '" onkeyup="ValidarFechaCreacion(this)" />
        <label for="Fecha Creación">Fecha Creación</label>
        <!-- Mensaje de error para el campo de fecha de creación -->
        <span id="fechaCreacionError" class="alert alert-danger" hidden></span>
    </div>
    <br>
    <div class="form-floating">
        <input class="form-control" id="resumen_problema" name="resumen_problema" type="text" placeholder="resumen_problema" value="' . $results["resumen_problema"] . '" onkeyup="ValidarResumenProblema(this)" />
        <label for="Resumen Problema">Resumen Problema</label>
        <!-- Mensaje de error para el campo de resumen del problema -->
        <span id="resumenProblemaError" class="alert alert-danger" hidden></span>
    </div>
    <br>
    <div class="form-floating">
        <textarea class="form-control" id="detalle_problema" name="detalle_problema" cols="30" rows="10" class="form-control" placeholder="detalle_problema" style="height: 100px;" onkeyup="ValidarDetalleProblema(this)">' . $results["resumen_problema"] . '</textarea>
        <label for="Detalle Problema">Detalle Problema</label>
        <span id="detalleProblemaError" class="alert alert-danger" hidden></span>
    </div>
    <br>
    <div class="form-floating">
        <input type="file" name="imagenes" id="imagenes" onchange="mostrarImagen(event)" accept="image/*" class="form-control">
        <label for="imagenes">Subir imágenes</label>
        <input type="hidden" id="inputImagenes" name="inputImagenes">
        <div id="imagenesPrevias" class="card mt-3"></div>
    </div>
    <br>
    <div class="form-floating">
        <input class="form-control" id="correo" name="correo" type="email" placeholder="correo" onkeyup="ValidarCorreo(this)" value="' . $results["correo"] . '" />
        <label for="Correo">Correo</label>
        <!-- Mensaje de error para el campo de correo electrónico -->
        <span id="correoError" class="alert alert-danger" hidden></span>
    </div>
    <br>
    <div class="form-floating">
        <input class="form-control" id="telefono" name="telefono" type="number" placeholder="telefono" value="' . $results["telefono"] . '" onkeyup="ValidarTelefono(this)" />
        <label for="Telefono">Telefono</label>
        <!-- Mensaje de error para el campo de número de teléfono -->
        <span id="telefonoError" class="alert alert-danger" hidden></span>
    </div>
    <br>
    <div class="form-floating">
        <input class="form-control" id="nombre_completo" name="nombre_completo" type="text" placeholder="nombre_completo" onkeyup="ValidarNombreCompleto(this)" value="' . $results["nombre_completo"] . '" />
        <label for="Nombre Completo">Nombre Completo</label>
        <span id="nombreCompletoError" class="alert alert-danger" hidden></span>
    </div>
    <br>
    <!-- Botón de envío del formulario -->
    <div class="mt-4 mb-0">
        <div class="d-grid"><button type="submit" id="submitButton" value="guardar" class="btn btn-primary btn-block" onclick="RegistrarTicket()">Registrar Ticket</button></div>
    </div>
</form>
    ';
  }
}
