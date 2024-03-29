<?php
require "../../modelo/conexion.php";
require "header-user.php";
try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Preparar y ejecutar la consulta SQL
    $stmt = $pdo->query("SELECT * FROM usuario");
    $stmt->execute();

    // Obtener los resultados
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
<br>
<form action="" method="POST" action="" enctype="multipart/form-data">
    <!-- Título del formulario -->
    <h1 class=".h1">REGISTRAR TICKET</h1>
    <br>
    <!-- Sección de información del ticket -->
    <div class="row mb-3">
        <div class="col-md-6">
            <!-- Campo de fecha de ticket -->
            <div class="form-floating mb-3 mb-md-0 mb-3 mb-md-0">
                <input class="form-control" id="fecha_ticket" name="fecha_ticket" type="date" placeholder="fecha_ticket" onkeyup="ValidarFechaTicket(this)" />
                <label for="Fecha ticket">Fecha ticket</label>
            </div>
            <!-- Mensaje de error para el campo de fecha de ticket -->
            <span id="fechaTicketError" class="alert alert-danger" hidden></span>
        </div>
        <div class="col-md-6">
            <!-- Campo de resumen del problema -->
            <div class="form-floating mb-3 mb-md-0">
                <input class="form-control" id="resumen_problema" name="resumen_problema" type="text" placeholder="resumen_problema" onkeyup="ValidarResumenProblema(this)" />
                <label for="Resumen Problema">Resumen Problema</label>
            </div>
            <!-- Mensaje de error para el campo de resumen del problema -->
            <span id="resumenProblemaError" class="alert alert-danger" hidden></span>
        </div>
    </div>

    <!-- Campo de detalle del problema -->
    <div class="form-floating mb-3 mb-md-0">
        <textarea class="form-control" id="detalle_problema" name="detalle_problema" cols="30" rows="10" class="form-control" placeholder="detalle_problema" style="height: 100px;" onkeyup="ValidarDetalleProblema(this)"></textarea>
        <label for="Detalle Problema">Detalle Problema</label>
        <span id="detalleProblemaError" class="alert alert-danger" hidden></span>
    </div>

    <!-- Campo para cargar imágenes -->
    <br>
    <div class="form-floating mb-3 mb-md-0">
        <!-- subir varias imagenes -->
        <input class="form-control" type="file" accept="image/*" name="imagenes[]" multiple id="imagenes" onchange="mostrarImagen(event)" />
        <label for="Subir Imagen(es)">Subir Imagen(es)</label>
        <input type="hidden" id="inputImagenes" name="inputImagenes">
        <div id="imagenesPrevias" class="card mt-3"></div>
    </div>
    <br>

    <!-- Sección de información de contacto -->
    <div class="row mb-3">
        <div class="col-md-6">
            <!-- Campo de correo electrónico -->
            <div class="form-floating mb-3 mb-md-0">
                <input class="form-control" id="correo" name="correo" type="email" placeholder="correo" onkeyup="ValidarCorreo(this)" value="<?php echo $email; ?>" />
                <label for="Correo">Correo</label>
            </div>
            <!-- Mensaje de error para el campo de correo electrónico -->
            <span id="correoError" class="alert alert-danger" hidden></span>
        </div>
        <div class="col-md-6">
            <!-- Campo de número de teléfono -->
            <div class="form-floating mb-3 mb-md-0 mb-3 mb-md-0">
                <input class="form-control" id="telefono" name="telefono" type="number" placeholder="telefono" onkeyup="ValidarTelefono(this)" />
                <label for="Telefono">Telefono</label>
            </div>
            <!-- Mensaje de error para el campo de número de teléfono -->
            <span id="telefonoError" class="alert alert-danger" hidden></span>
        </div>
    </div>

    <!-- Campo de nombre completo -->
    <div class="form-floating mb-3 mb-md-0 mb-3 mb-md-0">
        <input class="form-control" id="nombre_completo" name="nombre_completo" type="text" placeholder="nombre_completo" onkeyup="ValidarNombreCompleto(this)" value="<?php echo $name ?>" />
        <label for="Nombre Completo">Nombre Completo</label>
        <span id="nombreCompletoError" class="alert alert-danger" hidden></span>
    </div>

    <!-- Botón de envío del formulario -->
    <div class="mt-4 mb-0">
        <div class="d-grid"><button type="submit" id="submitButton" value="guardar" class="btn btn-primary btn-block" onclick="RegistrarTicket()">Registrar Ticket</button></div>
    </div>
</form>

<?php
require "footer-scripts.php";
?>