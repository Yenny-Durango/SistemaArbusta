<?php
require "header-admin.php";
require "../../modelo/conexion.php";

$sql = "SELECT id_usuario, nombre_completo FROM usuario";
$statement = $pdo->query($sql);
$usuarios = $statement->fetchAll();
?>
<form method="post" action="">
    <h1 class=".h1">REGISTRAR EQUIPO</h1>
    <div class="row mb-3">
        <div class="col-md-6">
            <div class="form-floating mb-3 mb-md-0">
                <input class="form-control" id="equipo" name="equipo" type="text" placeholder="equipo" onkeyup="ValidarEquipo(this)" />
                <label for="Nombre del equipo">Nombre del equipo </label>
            </div>
            <span id="EquipoError" class="alert alert-danger" hidden></span>
        </div>
        <div class="col-md-6">
            <div class="form-floating">
                <select name="categoria_equipo" id="categoria_equipo" class="form-select">
                    <option value="">Seleccione una categoría</option>
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

    <div class="row mb-3">
        <div class="col-md-6">
            <!-- Campo de compañía -->
            <div class="form-floating mb-3 mb-md-0">
                <select name="compania" id="compania" class="form-select">
                    <!-- Opciones de compañía -->
                    <option value="">Seleccione una compañía</option>
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
                    <option value="">Seleccione una opción</option>
                    <option value="Departamento">Departamento</option>
                    <option value="Empleado">Empleado</option>
                </select>
                <label for="Usado por:">Usado por: </label>
            </div>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
            <div class="form-floating mb-3 mb-md-0">
                <select name="id_usuario" id="id_usuario" class="form-select">
                    <option value="">Seleccione un empleado</option>
                    <?php foreach ($usuarios as $usuario) : ?>
                        <option value="<?php echo $usuario['id_usuario']; ?>"><?php echo $usuario['nombre_completo']; ?></option>
                    <?php endforeach; ?>
                </select>
                <label for="Empleado">Empleado </label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-floating mb-3 mb-md-0">
                <select name="ubicacion_uso" id="ubicacion_uso" class="form-select">
                    <option value="">Selecciona una ubicación</option>
                    <option value="BUE">BUE</option>
                    <option value="ROS">ROS</option>
                    <option value="MED">MED</option>
                    <option value="MON">MON</option>
                </select>
                <label for="Ubicación de uso">Ubicación de uso </label>
            </div>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
            <div class="form-floating mb-3 mb-md-0">
                <input class="form-control" id="proveedor" name="proveedor" type="text" placeholder="proveedor" onkeyup="ValidarProveedor(this)" />
                <label for="Proveedor">Proveedor</label>
            </div>
            <span id="ProveedorError" class="alert alert-danger" hidden></span>
        </div>
        <div class="col-md-6">
            <div class="form-floating">
                <input class="form-control" id="referencia_proveedor" name="referencia_proveedor" type="text" placeholder="referencia_proveedor" onkeyup="ValidarReferenciaProveedor(this)" />
                <label for="Referencia proveedor">Referencia proveedor</label>
            </div>
            <!-- Mensaje de error para el campo de referencia del proveedor -->
            <span id="ReferenciaProveedorError" class="alert alert-danger" hidden></span>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
            <div class="form-floating mb-3 mb-md-0">
                <input class="form-control" id="modelo" name="modelo" type="text" placeholder="modelo" onkeyup="ValidarModelo(this)" />
                <label for="Modelo">Modelo </label>
            </div>
            <span id="ModeloError" class="alert alert-danger" hidden></span>
        </div>
        <div class="col-md-6">
            <div class="form-floating mb-3 mb-md-0">
                <input class="form-control" id="numero_serie" name="numero_serie" type="text" placeholder="numero_serie" onkeyup="ValidarNumeroSerie(this)" />
                <label for="Numero de serie">Número de serie </label>
            </div>
            <span id="NumeroSerieError" class="alert alert-danger" hidden></span>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
            <div class="form-floating mb-3 mb-md-0">
                <input class="form-control" id="fecha_efectiva" name="fecha_efectiva" type="date" placeholder="fecha_efectiva" onkeyup="ValidarFechaEfectiva(this)" />
                <label for="Fecha Efectiva">Fecha Efectiva </label>
            </div>
            <span id="FechaEfectivaError" class="alert alert-danger" hidden></span>
        </div>
        <div class="col-md-2">
            <div class="form-floating">
                <select name="alquilado" id="alquilado" class="form-select">
                    <option value="">Seleccione una opción</option>
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                </select>
                <label for="Alquilado">Alquilado</label>
            </div>
            <span id="AlquiladoError" class="alert alert-danger" hidden></span>
        </div>
        <div class="col-md-2">
            <div class="form-floating">
                <select name="seguro" id="seguro" class="form-select">
                    <option value="">Seleccione una opción</option>
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                </select>
                <label for="Seguro">Seguro</label>
            </div>
            <span id="SeguroError" class="alert alert-danger" hidden></span>
        </div>
        <div class="col-md-2">
            <div class="form-floating">
                <select name="leasing" id="leasing" class="form-select">
                    <option value="">Seleccione una opción</option>
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                </select>
                <label for="Leasing">Leasing</label>
            </div>
            <span id="LeasingError" class="alert alert-danger" hidden></span>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
            <div class="form-floating">
                <select name="valoracion" id="valoracion" class="form-select">
                    <option value="">Seleccione una opción</option>
                    <option value="Inaceptable">Inaceptable</option>
                    <option value="Insatisfactorio">Insatisfactorio</option>
                    <option value="Aceptable">Aceptable</option>
                    <option value="Bueno">Bueno</option>
                    <option value="Excelente">Excelente</option>
                </select>
                <label for="Valoración">Valoración</label>
            </div>
            <span id="valoracionError" class="alert alert-danger" hidden></span>
        </div>
        <div class="col-md-6">
            <div class="form-floating mb-3 mb-md-0">
                <input class="form-control" id="procesador" name="procesador" type="text" placeholder="procesador" onkeyup="ValidarProcesador(this)" />
                <label for="Procesador">Procesador</label>
            </div>
            <span id="ProcesadorError" class="alert alert-danger" hidden></span>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
            <div class="form-floating mb-3 mb-md-0">
                <input class="form-control" id="ram" name="ram" type="text" placeholder="ram" onkeyup="ValidarRam(this)" />
                <label for="ram">RAM</label>
            </div>
            <span id="ramError" class="alert alert-danger" hidden></span>
        </div>
        <div class="col-md-6">
            <div class="form-floating mb-3 mb-md-0">
                <select name="almacenamiento" id="almacenamiento" class="form-select">
                    <option value="">Seleccione una opción</option>
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
                    <option value="">Seleccione un sistema operativo</option>
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
        <div class="d-grid"><button type="submit" id="BotonEnviarEquipo" class="btn btn-primary btn-block" onclick="RegistrarEquipo()" disabled>Registrar equipo</button></div>
    </div>
</form>
<?php
require "footer-scripts.php";
?>