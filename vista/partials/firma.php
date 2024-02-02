<br>
<form method="post" action="">
    <!-- Título del formulario -->
    <h1 class="h1">CREA TU FIRMA</h1>
    <br>

    <div class="row mb-3">
        <!-- Sección de nombre y apellido -->
        <div class="col-md-6">
            <div class="form-floating mb-3 mb-md-0">
                <!-- Campo de nombre y apellido -->
                <input class="form-control" id="nombre_apellido" name="nombre_apellido" type="text" placeholder="nombre_apellido" onkeyup="ValidarNombreApellido(this)" />
                <label for="Nombre y Apellido">Nombre y Apellido</label>
            </div>
            <!-- Mensaje de error para el campo de nombre y apellido -->
            <span id="nombre_apellidoError" class="alert alert-danger" hidden></span>
        </div>

        <!-- Sección de sede -->
        <div class="col-md-6">
            <div class="form-floating">
                <!-- Menú desplegable para la selección de la sede -->
                <select name="sede" id="sede" class="form-control" onkeyup="ValidarSede(this)">
                    <!-- Opciones de categoría del equipo -->
                    <option value="Selecciona una opcion">Selecciona una opción</option>
                    <option value="ARGENTINA_BUENOS_AIRES">ARGENTINA - BUENOS AIRES</option>
                    <option value="ARGENTINA_ROSARIO">ARGENTINA - ROSARIO</option>
                    <option value="URUGUAY_MONTEVIDEO">URUGUAY - MONTEVIDEO</option>
                    <option value="COLOMBIA_MEDELLIN">COLOMBIA - MEDELLIN</option>
                </select>
                <label for="sede">Sede</label>
            </div>
        </div>
    </div>

    <!-- Sección de información adicional del equipo -->
    <div class="row mb-3">
        <!-- Campo de teléfono -->
        <div class="col-md-6">
            <div class="form-floating mb-3 mb-md-0">
                <input class="form-control" id="telefono" name="telefono" type="number" placeholder="telefono" onkeyup="ValidarTelefono(this)" />
                <label for="Telefono (Opcional)">Teléfono (Opcional)</label>
            </div>
            <!-- Mensaje de error para el campo de teléfono -->
            <span id="telefonoError" class="alert alert-danger" hidden></span>
        </div>

        <!-- Campo de correo electrónico -->
        <div class="col-md-6">
            <div class="form-floating mb-3 mb-md-0">
                <input class="form-control" id="correo" name="correo" type="text" placeholder="correo" onkeyup="ValidarCorreo(this)" />
                <label for="Correo">Correo electrónico</label>
            </div>
            <!-- Mensaje de error para el campo de correo electrónico -->
            <span id="correoError" class="alert alert-danger" hidden></span>
        </div>
    </div>

    <!-- Campo de rol/puesto de trabajo -->
    <div class="form-floating">
        <div class="form-floating mb-3 mb-md-0">
            <input class="form-control" id="rol_trabajo" name="rol_trabajo" type="text" placeholder="rol_trabajo" onkeyup="ValidarRolTrabajo(this)" />
            <label for="Rol/Puesto de trabajo">Escribe tu Rol/Puesto de trabajo</label>
        </div>
        <!-- Mensaje de error para el campo de rol/puesto de trabajo -->
        <span id="rolError" class="alert alert-danger" hidden></span>
    </div>

    <!-- Botón de submit para enviar el formulario -->
    <div class="mt-4 mb-0">
        <div class="d-grid"><button type="submit" id="submitButton" class="btn btn-primary btn-block" onclick="GenerarFirma()">Generar Firma</button></div>
    </div>
</form>

<div id="firma" class="firma"></div>

<script>
    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>