<?php
require "header-admin.php";
require "../../modelo/conexion.php";

// Obtener la lista de usuarios para el campo de selección
$sql = "SELECT id_usuario, nombre_completo FROM usuario";
$statement = $pdo->query($sql);
$usuarios = $statement->fetchAll();
?>
<br>
<form method="post" action="">
    <!-- Título del formulario -->
    <h1 class=".h1">EQUIPO</h1>
    <br>
    <!-- Sección de información del equipo -->
    <div class="row mb-3">
        <div class="col-md-6">
            <!-- Campo de nombre del equipo -->
            <div class="form-floating mb-3 mb-md-0">
                <input class="form-control" id="equipo" name="equipo" type="text" placeholder="equipo" onkeyup="ValidarNombreEquipo(this)" />
                <label for="Nombre del equipo">Nombre del equipo </label>
            </div>
            <!-- Mensaje de error para el campo de nombre del equipo -->
            <span id="equipoError" class="alert alert-danger" hidden></span>
        </div>
        <div class="col-md-6">
            <!-- Campo de categoría del equipo -->
            <div class="form-floating">
                <select name="categoria_equipo" id="categoria_equipo" class="form-select" onkeyup="ValidarCategoriaEquipo(this)">
                    <!-- Opciones de categoría del equipo -->
                    <option value="Notebooks">Notebooks</option>
                    <option value="Desktops">Desktops</option>
                    <option value="Celulares">Celulares</option>
                    <option value="Tablets">Tablets</option>
                    <option value="Conectividad">Conectividad</option>
                    <option value="Impresoras">Impresoras</option>
                    <option value="Accesorios">Accesorios</option>
                    <option value="Monitores">Monitores</option>
                    <option value="Personal">Personal</option>
                </select>
                <label for="categoria_equipo">Categoría del equipo </label>
            </div>
        </div>
    </div>

    <!-- Sección de información adicional del equipo -->
    <div class="row mb-3">
        <div class="col-md-6">
            <!-- Campo de compañía -->
            <div class="form-floating mb-3 mb-md-0">
                <select name="compania" id="compania" class="form-select">
                    <!-- Opciones de compañía -->
                    <option value="ARBUSTA S.R.L">ARBUSTA S.R.L.</option>
                    <option value="ARBUSTA S.A.S">ARBUSTA S.A.S.</option>
                    <option value="Sumilar S.A">Sumilar S.A.</option>
                </select>
                <label for="Compañía">Compañía </label>
            </div>
        </div>
        <div class="col-md-6">
            <!-- Campo de uso del equipo -->
            <div class="form-floating">
                <select name="usado_por" id="usado_por" class="form-select">
                    <!-- Opciones de uso del equipo -->
                    <option value="Departamento">Departamento</option>
                    <option value="Empleado">Empleado</option>
                </select>
                <label for="Usado por:">Usado por: </label>
            </div>
        </div>
    </div>

    <!-- Campo de selección de usuario -->
    <div class="row mb-3">
        <div class="col-md-6">
            <div class="form-floating mb-3 mb-md-0">
                <select name="id_usuario" id="id_usuario" class="form-select">
                    <!-- Opción vacía y opciones de usuarios -->
                    <option value=""></option>
                    <?php foreach ($usuarios as $usuario) : ?>
                        <option value="<?php echo $usuario['id_usuario']; ?>"><?php echo $usuario['nombre_completo']; ?></option>
                    <?php endforeach; ?>
                </select>
                <label for="Empleado">Empleado </label>
            </div>
        </div>
        <div class="col-md-6">
            <!-- Campo de ubicación de uso -->
            <div class="form-floating mb-3 mb-md-0">
                <select name="ubicacion_uso" id="ubicacion_uso" class="form-select">
                    <!-- Opciones de ubicación de uso -->
                    <option value="BUE">BUE</option>
                    <option value="ROS">ROS</option>
                    <option value="MED">MED</option>
                    <option value="MON">MON</option>
                </select>
                <label for="Ubicación de uso">Ubicación de uso </label>
            </div>
        </div>
    </div>

    <!-- Sección de proveedor y referencia del equipo -->
    <div class="row mb-3">
        <div class="col-md-6">
            <!-- Campo de proveedor -->
            <div class="form-floating mb-3 mb-md-0">
                <input class="form-control" id="proveedor" name="proveedor" type="text" placeholder="proveedor" onkeyup="ValidarProveedor(this)" />
                <label for="Proveedor">Proveedor</label>
            </div>
            <!-- Mensaje de error para el campo de proveedor -->
            <span id="proveedorError" class="alert alert-danger" hidden></span>
        </div>
        <div class="col-md-6">
            <!-- Campo de referencia del proveedor -->
            <div class="form-floating">
                <input class="form-control" id="referencia_proveedor" name="referencia_proveedor" type="text" placeholder="referencia_proveedor" onkeyup="ValidarReferenciaProveedor(this)" />
                <label for="Referencia proveedor">Referencia proveedor</label>
            </div>
            <!-- Mensaje de error para el campo de referencia del proveedor -->
            <span id="referenciaProveedorError" class="alert alert-danger" hidden></span>
        </div>
    </div>

    <!-- Sección de detalles del equipo -->
    <div class="row mb-3">
        <div class="col-md-6">
            <!-- Campo de modelo -->
            <div class="form-floating mb-3 mb-md-0">
                <input class="form-control" id="modelo" name="modelo" type="text" placeholder="modelo" onkeyup="ValidarModelo(this)" />
                <label for="Modelo">Modelo </label>
            </div>
            <!-- Mensaje de error para el campo de modelo -->
            <span id="modeloError" class="alert alert-danger" hidden></span>
        </div>
        <div class="col-md-6">
            <!-- Campo de número de serie -->
            <div class="form-floating mb-3 mb-md-0">
                <input class="form-control" id="numero_serie" name="numero_serie" type="text" placeholder="numero_serie" onkeyup="ValidarNumeroSerie(this)" />
                <label for="Numero de serie">Número de serie </label>
            </div>
            <!-- Mensaje de error para el campo de número de serie -->
            <span id="numeroSerieError" class="alert alert-danger" hidden></span>
        </div>
    </div>

    <!-- Sección de fechas y opciones adicionales -->
    <div class="row mb-3">
        <div class="col-md-6">
            <!-- Campo de fecha efectiva -->
            <div class="form-floating mb-3 mb-md-0">
                <input class="form-control" id="fecha_efectiva" name="fecha_efectiva" type="date" placeholder="fecha_efectiva" onkeyup="ValidarFechaEfectiva(this)" />
                <label for="Fecha Efectiva">Fecha Efectiva </label>
            </div>
            <!-- Mensaje de error para el campo de fecha efectiva -->
            <span id="fechaError" class="alert alert-danger" hidden></span>
        </div>
        <div class="checkboxes">
            <!-- Opciones de checkbox para alquilado, seguro y leasing -->
            <label class="form-check-label" for="Alquilado">Alquilado</label>
            <input type="checkbox" name="alquilado" id="alquilado" value="">
            <label class="form-check-label" for="Seguro">Seguro</label>
            <input type="checkbox" name="seguro" id="seguro" value="">
            <label class="form-check-label" for="Leasing">Leasing</label>
            <input type="checkbox" name="leasing" id="leasing" value="">
        </div>
    </div>

    <!-- Sección de detalles adicionales del equipo -->
    <div class="row mb-3">
        <div class="col-md-6">
            <!-- Campo de valoración -->
            <div class="form-floating">
                <select name="valoracion" id="valoracion" class="form-select">
                    <!-- Opciones de categoría del equipo -->
                    <option value="Inaceptable">Inaceptable</option>
                    <option value="Insatisfactorio">Insatisfactorio</option>
                    <option value="Aceptable">Aceptable</option>
                    <option value="Bueno">Bueno</option>
                    <option value="Excelente">Excelente</option>
                </select>
                <label for="Valoración">Valoración</label>
            </div>
            <!-- Mensaje de error para el campo de valoración -->
            <span id="valoracionError" class="alert alert-danger" hidden></span>
        </div>
        <div class="col-md-6">
            <!-- Campo de procesador -->
            <div class="form-floating mb-3 mb-md-0">
                <input class="form-control" id="procesador" name="procesador" type="text" placeholder="procesador" onkeyup="ValidarProcesador(this)" />
                <label for="Procesador">Procesador</label>
            </div>
            <!-- Mensaje de error para el campo de procesador -->
            <span id="procesadorError" class="alert alert-danger" hidden></span>
        </div>
    </div>

    <!-- Sección de especificaciones de hardware -->
    <div class="row mb-3">
        <div class="col-md-6">
            <!-- Campo de RAM -->
            <div class="form-floating mb-3 mb-md-0">
                <input class="form-control" id="ram" name="ram" type="text" placeholder="ram" onkeyup="ValidarRam(this)" />
                <label for="ram">RAM</label>
            </div>
            <!-- Mensaje de error para el campo de RAM -->
            <span id="ramError" class="alert alert-danger" hidden></span>
        </div>
        <div class="col-md-6">
            <!-- Campo de almacenamiento -->
            <div class="form-floating mb-3 mb-md-0">
                <select name="almacenamiento" id="almacenamiento" class="form-select">
                    <!-- Opciones de almacenamiento -->
                    <option value="HDD 250GB">HDD 250GB</option>
                    <option value="HDD 500GB">HDD 500GB</option>
                    <option value="HDD 1TB">HDD 1TB</option>
                    <option value="SDD 120GB">SDD 120GB</option>
                    <option value="SDD 240GB">SDD 240GB</option>
                    <option value="SDD 500GB">SDD 500GB</option>
                </select>
                <label for="Almacenamiento">Almacenamiento</label>
            </div>
        </div>
    </div>

    <!-- Sección de detalles de red y alimentación -->
    <div class="row mb-3">
        <div class="col-md-6">
            <!-- Campo de dirección MAC -->
            <div class="form-floating mb-3 mb-md-0">
                <input class="form-control" id="mac_address" name="mac_address" type="text" placeholder="mac_address" onkeyup="ValidarMacAddress(this)" />
                <label for="Mac address">Mac address</label>
            </div>
            <!-- Mensaje de error para el campo de dirección MAC -->
            <span id="macAddressError" class="alert alert-danger" hidden></span>
        </div>
        <div class="col-md-6">
            <!-- Campo de batería -->
            <div class="form-floating mb-3 mb-md-0">
                <input class="form-control" id="bateria" name="bateria" type="text" placeholder="bateria" onkeyup="ValidarBateria(this)" />
                <label for="Batería">Batería</label>
            </div>
            <!-- Mensaje de error para el campo de batería -->
            <span id="bateriaError" class="alert alert-danger" hidden></span>
        </div>
    </div>

    <!-- Sección de adaptador y sistema operativo -->
    <div class="row mb-3">
        <div class="col-md-6">
            <!-- Campo de adaptador -->
            <div class="form-floating mb-3 mb-md-0">
                <input class="form-control" id="adaptador" name="adaptador" type="text" placeholder="adaptador" onkeyup="ValidarAdaptador(this)" />
                <label for="Adaptador">Adaptador</label>
            </div>
            <!-- Mensaje de error para el campo de adaptador -->
            <span id="adaptadorError" class="alert alert-danger" hidden></span>
        </div>
        <div class="col-md-6">
            <!-- Campo de sistema operativo -->
            <div class="form-floating mb-3 mb-md-0">
                <select name="sistema_operativo" id="sistema_operativo" class="form-select">
                    <!-- Opciones de sistema operativo -->
                    <option value="Android">Android</option>
                    <option value="iOS">iOS</option>
                    <option value="Linux">Linux</option>
                    <option value="Windows">Windows</option>
                </select>
                <label for="Sistema operativo">Sistema operativo (SO)</label>
            </div>
        </div>
    </div>

    <!-- Campo de versión del sistema operativo -->
    <div class="form-floating">
        <div class="form-floating mb-3 mb-md-0">
            <input class="form-control" id="version_so" name="version_so" type="text" placeholder="version_so" onkeyup="ValidarVersionSo(this)" />
            <label for="Version SO">Versión SO </label>
        </div>
        <!-- Mensaje de error para el campo de versión del sistema operativo -->
        <span id="versionSoError" class="alert alert-danger" hidden></span>
    </div>

    <!-- Línea divisoria y campo de descripción del equipo -->
    <hr>
    <div class="form-floating">
        <textarea name="descripcion" id="descripcion" cols="30" rows="10" class="form-control" placeholder="Descripcion" style="height: 200px;" onkeyup="ValidarDescripcion(this)"></textarea>
        <label for="Descripción">Descripción</label>
        <!-- Mensaje de error para el campo de descripción del equipo -->
        <span id="descripcionError" class="alert alert-danger" hidden></span>
    </div>

    <!-- Botón de submit para enviar el formulario -->
    <div class="mt-4 mb-0">
        <div class="d-grid"><button type="submit" id="submitButton" class="btn btn-primary btn-block" onclick="RegistrarEquipo()">Registrar equipo</button></div>
    </div>
</form>
<?php
require "footer-scripts.php";
?>