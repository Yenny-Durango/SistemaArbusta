<?php
switch ($_POST['Metodo']) {
    case 'RegistrarEquipo':
        RegistrarEquipo();
        break;
    case 'ConsultarEquipo':
        ConsultarEquipo();
        break;
    case 'ModificarEquipo':
        ModificarEquipo();
        break;
    case 'EliminarEquipo':
        EliminarEquipo();
        break;
    default:
        echo "Método inválido";
        break;
}

// REGISTRAR EQUIPO DESDE EL ADMINISTRADOR ---------------
function RegistrarEquipo()
{
    require "../modelo/conexion.php";

    session_start();

    $equipo = $_POST['equipo'];
    $categoria_equipo = $_POST['categoria_equipo'];
    $compania = $_POST['compania'];
    $usado_por = $_POST['usado_por'];
    $id_usuario = $_POST['id_usuario'];
    $ubicacion_uso = $_POST['ubicacion_uso'];
    $proveedor = $_POST['proveedor'];
    $referencia_proveedor = $_POST['referencia_proveedor'];
    $modelo = $_POST['modelo'];
    $numero_serie = $_POST['numero_serie'];
    $fecha_efectiva = $_POST['fecha_efectiva'];
    $alquilado = $_POST['alquilado'];
    $seguro = $_POST['seguro'];
    $leasing = $_POST['leasing'];
    $valoracion = $_POST['valoracion'];
    $procesador = $_POST['procesador'];
    $ram = $_POST['ram'];
    $almacenamiento = $_POST['almacenamiento'];
    $mac_address = $_POST['mac_address'];
    $bateria = $_POST['bateria'];
    $adaptador = $_POST['adaptador'];
    $sistema_operativo = $_POST['sistema_operativo'];
    $version_so = $_POST['version_so'];
    $descripcion = $_POST['descripcion'];

    $sql = "SELECT * FROM equipo WHERE equipo = :equipo";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':equipo', $equipo, PDO::PARAM_STR);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        echo "El equipo ya está registrado";
    } else if ($equipo === '' || $categoria_equipo === '' || $compania === '' || $id_usuario === '' || $usado_por === '' || $ubicacion_uso === '' || $proveedor === ''  || $referencia_proveedor === ''  || $modelo === ''  || $numero_serie === ''  || $fecha_efectiva === '' || $valoracion === ''  || $procesador === ''  || $ram === ''  || $almacenamiento === ''  || $mac_address === ''  || $bateria === '' || $adaptador === ''  || $sistema_operativo === ''  || $version_so === ''  || $descripcion === '') {
        echo "Complete todos los campos";
    } else {
        $sql = "INSERT INTO equipo(id_usuario,equipo, categoria_equipo, compania, usado_por, ubicacion_uso, proveedor, referencia_proveedor, modelo, numero_serie, fecha_efectiva, alquilado, seguro, leasing, valoracion, procesador, ram, almacenamiento, mac_address, bateria, adaptador, sistema_operativo, version_so, descripcion) VALUES (:id_usuario, :equipo, :categoria_equipo, :compania, :usado_por, :ubicacion_uso, :proveedor, :referencia_proveedor, :modelo, :numero_serie, :fecha_efectiva, :alquilado, :seguro, :leasing, :valoracion, :procesador, :ram, :almacenamiento, :mac_address, :bateria, :adaptador, :sistema_operativo, :version_so, :descripcion)";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':equipo', $equipo, PDO::PARAM_STR);
        $stmt->bindParam(':categoria_equipo', $categoria_equipo, PDO::PARAM_STR);
        $stmt->bindParam(':compania', $compania, PDO::PARAM_STR);
        $stmt->bindParam(':usado_por', $usado_por, PDO::PARAM_STR);
        $stmt->bindParam(':ubicacion_uso', $ubicacion_uso, PDO::PARAM_STR);
        $stmt->bindParam(':proveedor', $proveedor, PDO::PARAM_STR);
        $stmt->bindParam(':referencia_proveedor', $referencia_proveedor, PDO::PARAM_STR);
        $stmt->bindParam(':modelo', $modelo, PDO::PARAM_STR);
        $stmt->bindParam(':numero_serie', $numero_serie, PDO::PARAM_STR);
        $stmt->bindParam(':fecha_efectiva', $fecha_efectiva, PDO::PARAM_STR);
        $stmt->bindParam(':alquilado', $alquilado, PDO::PARAM_INT);
        $stmt->bindParam(':seguro', $seguro, PDO::PARAM_INT);
        $stmt->bindParam(':leasing', $leasing, PDO::PARAM_INT);
        $stmt->bindParam(':valoracion', $valoracion, PDO::PARAM_INT);
        $stmt->bindParam(':procesador', $procesador, PDO::PARAM_STR);
        $stmt->bindParam(':ram', $ram, PDO::PARAM_STR);
        $stmt->bindParam(':almacenamiento', $almacenamiento, PDO::PARAM_STR);
        $stmt->bindParam(':mac_address', $mac_address, PDO::PARAM_STR);
        $stmt->bindParam(':bateria', $bateria, PDO::PARAM_STR);
        $stmt->bindParam(':adaptador', $adaptador, PDO::PARAM_STR);
        $stmt->bindParam(':sistema_operativo', $sistema_operativo, PDO::PARAM_STR);
        $stmt->bindParam(':version_so', $version_so, PDO::PARAM_STR);
        $stmt->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
        $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_STR);

        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            echo "Registrado correctamente";
        } else {
            echo "Hubo un problema al intentar registrar la información";
        }
    }

    $pdo = null;
}
// FIN REGISTRAR EQUIPO DESDE EL ADMINISTRADOR ---------------

// CONSULTAR EQUIPO (MUESTRA LOS DATOS DEL EQUIPO A MODIFICAR EN UN MODAL) ----------------------------
function ConsultarEquipo()
{
    require "../modelo/conexion.php";

    session_start();

    $id_equipo = $_POST['id_equipo'];

    $sql = "SELECT * FROM equipo INNER JOIN usuario ON equipo.id_usuario = usuario.id_usuario WHERE id_equipo = $id_equipo";

    $sqly = "SELECT * FROM usuario";
    $resulta = $pdo->query($sqly);
    $result = $pdo->query($sql);
    foreach ($result as $key => $results) {
        echo '
    <form method="post" action="">
    <!-- Título del formulario -->
    <h1 class=".h1">Modificar Equipo</h1>
    <br>
    <input id="id_equipo" type="hidden" value="' . $results["id_equipo"] . '">
    <!-- Campo de nombre del equipo -->
    <div class="form-floating">
        <input class="form-control" id="equipo" name="equipo" type="text" placeholder="equipo" value="' . $results["equipo"] . '" onkeyup="ValidarNombreEquipo(this)" />
        <label for="Nombre del equipo">Nombre del equipo </label>
        <!-- Mensaje de error para el campo de nombre del equipo -->
        <span id="equipoError" class="alert alert-danger" hidden></span>
    </div>
    <br>
    <!-- Campo de categoría del equipo -->
    <div class="form-floating">

    <select name="categoria_equipo" id="categoria_equipo" class="form-select">';
        $categorias = ['Notebooks', 'Desktops', 'Celulares', 'Tablets', 'Conectividad', 'Impresoras', 'Accesorios', 'Monitores', 'Personal'];
        foreach ($categorias as $categoria) {
            if ($categoria == $results["categoria_equipo"]) {
                echo '<option value="' . $categoria . '" selected>' . $categoria . '</option>';
            } else {
                echo '<option value="' . $categoria . '">' . $categoria . '</option>';
            }
        }
        echo '</select>
        <label for="categoria_equipo">Categoría del equipo </label>
    </div>';
        echo '<br>
    <!-- Campo de compañía -->
    <div class="form-floating">
        <select name="compania" id="compania" class="form-select">';
        $companias = ['Arbusta S.A.S', 'Arbusta S.R.L', 'Sumilar S.A.'];
        foreach ($companias as $compania) {
            if ($compania == $results["compania"]) {
                echo '<option value="' . $compania . '" selected>' . $compania . '</option>';
            } else {
                echo '<option value="' . $compania . '">' . $compania . '</option>';
            }
        }
        echo '</select>
        <label for="Compañía">Compañía </label>
    </div>';
        echo '<br>
    <div class="form-floating">
        <select name="usado_por" id="usado_por" class="form-select">';
        $usadopor = ['Departamento', 'Empleado'];
        foreach ($usadopor as $usado_por) {
            if ($usado_por == $results["usado_por"]) {
                echo '<option value="' . $usado_por . '" selected>' . $usado_por . '</option>';
            } else {
                echo '<option value="' . $usado_por . '">' . $usado_por . '</option>';
            }
        }
        echo '</select>
        <label for="Usado por:">Usado por: </label>
    </div>';
        echo '<br>
    <div class="form-floating">
        <select name="id_usuario" id="id_usuario" class="form-select">
            <option value="' . $results["id_usuario"] . '" selected>' . $results["nombre_completo"] . '</option>';
        foreach ($resulta as $sqly => $resultados) {
            if ($results["id_usuario"] != $resultados["id_usuario"]) {
                echo '<option value="' . $resultados["id_usuario"] . '" selected>' . $resultados["nombre_completo"] . '</option>';
            }
        }
        echo '
        </select>
        <label for="Empleado">Empleado </label>
    </div>';
        echo '<br>
    <div class="form-floating">
        <select name="ubicacion_uso" id="ubicacion_uso" class="form-select">';
        $ubicacionuso = ['BUE', 'ROS', 'MED', 'MON'];
        foreach ($ubicacionuso as $ubicacion_uso) {
            if ($ubicacion_uso == $results["ubicacion_uso"]) {
                echo '<option value="' . $ubicacion_uso . '" selected>' . $ubicacion_uso . '</option>';
            } else {
                echo '<option value="' . $ubicacion_uso . '">' . $ubicacion_uso . '</option>';
            }
        }
        echo '</select>
        <label for="Ubicación de uso">Ubicación de uso </label>
    </div>';
        echo '<br>
    <div class="form-floating">
        <input class="form-control" id="proveedor" name="proveedor" type="text" placeholder="proveedor" value="' . $results["proveedor"] . '" onkeyup="ValidarProveedor(this)" />
        <label for="Proveedor">Proveedor</label>
        <!-- Mensaje de error para el campo de proveedor -->
        <span id="proveedorError" class="alert alert-danger" hidden></span>
    </div>
    <br>
    <div class="form-floating">
        <input class="form-control" id="referencia_proveedor" name="referencia_proveedor" type="text" placeholder="referencia_proveedor" value="' . $results["referencia_proveedor"] . '" onkeyup="ValidarReferenciaProveedor(this)" />
        <label for="Referencia proveedor">Referencia proveedor</label>
        <!-- Mensaje de error para el campo de referencia del proveedor -->
        <span id="referenciaProveedorError" class="alert alert-danger" hidden></span>
    </div>
    <br>
    <div class="form-floating">
        <input class="form-control" id="modelo" name="modelo" type="text" placeholder="modelo" value="' . $results["modelo"] . '" onkeyup="ValidarModelo(this)" />
        <label for="Modelo">Modelo </label>
        <!-- Mensaje de error para el campo de modelo -->
        <span id="modeloError" class="alert alert-danger" hidden></span>
    </div>
    <br>
    <div class="form-floating">
        <input class="form-control" id="numero_serie" name="numero_serie" type="text" placeholder="numero_serie" value="' . $results["numero_serie"] . '"onkeyup="ValidarNumeroSerie(this)" />
        <label for="Numero de serie">Número de serie </label>
        <!-- Mensaje de error para el campo de número de serie -->
        <span id="numeroSerieError" class="alert alert-danger" hidden></span>
    </div>
    <br>
    <div class="form-floating">
        <input class="form-control" id="fecha_efectiva" name="fecha_efectiva" type="date" value="' . $results["fecha_efectiva"] . '" placeholder="fecha_efectiva" onkeyup="ValidarFechaEfectiva(this)" />
        <label for="Fecha Efectiva">Fecha Efectiva </label>
        <!-- Mensaje de error para el campo de fecha efectiva -->
        <span id="fechaError" class="alert alert-danger" hidden></span>
    </div>
    <br>
    <div class="checkboxes">
        <!-- Opciones de checkbox para alquilado, seguro y leasing -->
        <label class="form-check-label" for="Alquilado">Alquilado</label>
        <input type="checkbox" name="alquilado" id="alquilado" value="' . $results["alquilado"] . '">
        <label class="form-check-label" for="Seguro">Seguro</label>
        <input type="checkbox" name="seguro" id="seguro" value="' . $results["seguro"] . '">
        <label class="form-check-label" for="Leasing">Leasing</label>
        <input type="checkbox" name="leasing" id="leasing" value="' . $results["leasing"] . '">
    </div>
    <br>
    <div class="form-floating">
                <select name="valoracion" id="valoracion" class="form-select">';
        $valoraciones = ['Inaceptable', 'Insatisfactorio', 'Aceptable', 'Bueno', 'Excelente'];
        foreach ($valoraciones as $valoracion) {
            if ($valoracion == $results["valoracion"]) {
                echo '<option value="' . $valoracion . '" selected>' . $valoracion . '</option>';
            } else {
                echo '<option value="' . $valoracion . '">' . $valoracion . '</option>';
            }
        }
        echo '</select>
                <label for="Valoración">Valoración</label>
            </div>';
        echo '<br>
    <div class="form-floating">
            <input class="form-control" id="procesador" name="procesador" type="text" placeholder="procesador" value="' . $results["procesador"] . '" onkeyup="ValidarProcesador(this)" />
            <label for="Procesador">Procesador</label>
        </div>
        <!-- Mensaje de error para el campo de procesador -->
        <span id="procesadorError" class="alert alert-danger" hidden></span>
    </div>
    <br>
    <div class="form-floating">
        <input class="form-control" id="ram" name="ram" type="text" placeholder="ram" value="' . $results["ram"] . '" onkeyup="ValidarRam(this)" />
        <label for="ram">RAM</label>
        <!-- Mensaje de error para el campo de RAM -->
        <span id="ramError" class="alert alert-danger" hidden></span>
    </div>
    <br>
    <div class="form-floating">
        <select name="almacenamiento" id="almacenamiento" class="form-select">';
        $almacenamientos = ['HDD 250GB', 'HDD 500GB', 'HDD 1TB', 'SDD 120GB', 'SDD 240GB', 'SDD 500GB'];
        foreach ($almacenamientos as $almacenamiento) {
            if ($almacenamiento == $results["almacenamiento"]) {
                echo '<option value="' . $almacenamiento . '" selected>' . $almacenamiento . '</option>';
            } else {
                echo '<option value="' . $almacenamiento . '">' . $almacenamiento . '</option>';
            }
        }
        echo '</select>
        <label for="Almacenamiento">Almacenamiento</label>
    </div>';
        echo '<br>
    <div class="form-floating">
        <input class="form-control" id="mac_address" name="mac_address" type="text" placeholder="mac_address" value="' . $results["mac_address"] . '" onkeyup="ValidarMacAddress(this)" />
        <label for="Mac address">Mac address</label>
        <!-- Mensaje de error para el campo de dirección MAC -->
        <span id="macAddressError" class="alert alert-danger" hidden></span>
    </div>
    <br>
    <div class="form-floating">
        <input class="form-control" id="bateria" name="bateria" type="text" placeholder="bateria" value="' . $results["bateria"] . '" onkeyup="ValidarBateria(this)" />
        <label for="Batería">Batería</label>
        <!-- Mensaje de error para el campo de batería -->
        <span id="bateriaError" class="alert alert-danger" hidden></span>
    </div>
    <br>
    <div class="form-floating">
        <input class="form-control" id="adaptador" name="adaptador" type="text" placeholder="adaptador" value="' . $results["adaptador"] . '" onkeyup="ValidarAdaptador(this)" />
        <label for="Adaptador">Adaptador</label>
        <!-- Mensaje de error para el campo de adaptador -->
        <span id="adaptadorError" class="alert alert-danger" hidden></span>
    </div>
    <br>
    <div class="form-floating">
        <select name="sistema_operativo" id="sistema_operativo" class="form-select">';
        $sistemas_operativos = ['Android', 'iOS', 'Linux', 'Windows'];
        foreach ($sistemas_operativos as $sistema_operativo) {
            if ($sistema_operativo == $results["sistema_operativo"]) {
                echo '<option value="' . $sistema_operativo . '" selected>' . $sistema_operativo . '</option>';
            } else {
                echo '<option value="' . $sistema_operativo . '">' . $sistema_operativo . '</option>';
            }
        }
        echo '</select>
        <label for="Sistema operativo">Sistema operativo (SO)</label>
    </div>';
        echo '<br>
    <div class="form-floating">
        <input class="form-control" id="version_so" name="version_so" type="text" placeholder="version_so" value="' . $results["version_so"] . '" onkeyup="ValidarVersionSo(this)" />
        <label for="Version SO">Versión SO </label>
        <!-- Mensaje de error para el campo de versión del sistema operativo -->
        <span id="versionSoError" class="alert alert-danger" hidden></span>
    </div>
    <br>
    <div class="form-floating">
        <textarea name="descripcion" id="descripcion" cols="30" rows="10" class="form-control" placeholder="Descripcion" style="height: 200px;" onkeyup="ValidarDescripcion(this)">' . $results["descripcion"] . '</textarea>
        <label for="Descripción">Descripción</label>
        <!-- Mensaje de error para el campo de descripción del equipo -->
        <span id="descripcionError" class="alert alert-danger" hidden></span>
    </div>
</form>';
    }
}
// CONSULTAR EQUIPO (MUESTRA LOS DATOS DEL EQUIPO A MODIFICAR EN UN MODAL) ----------------------------

// MODIFICAR EQUIPO ---------------------------------------
function ModificarEquipo()
{
    require "../modelo/conexion.php";

    $id_equipo = $_POST["id_equipo"];
    $equipo = $_POST["equipo"];
    $categoria_equipo = $_POST["categoria_equipo"];
    $compania = $_POST["compania"];
    $usado_por = $_POST["usado_por"];
    $ubicacion_uso = $_POST["ubicacion_uso"];
    $proveedor = $_POST["proveedor"];
    $referencia_proveedor = $_POST["referencia_proveedor"];
    $modelo = $_POST["modelo"];
    $numero_serie = $_POST["numero_serie"];
    $fecha_efectiva = $_POST["fecha_efectiva"];
    $alquilado = $_POST["alquilado"];
    $seguro = $_POST["seguro"];
    $leasing = $_POST["leasing"];
    $valoracion = $_POST["valoracion"];
    $procesador = $_POST["procesador"];
    $ram = $_POST["ram"];
    $almacenamiento = $_POST["almacenamiento"];
    $mac_address = $_POST["mac_address"];
    $bateria = $_POST["bateria"];
    $adaptador = $_POST["adaptador"];
    $sistema_operativo = $_POST["sistema_operativo"];
    $version_so = $_POST["version_so"];
    $descripcion = $_POST["descripcion"];
    $id_usuario = $_POST["id_usuario"];

    $sql = "UPDATE equipo SET equipo='" . $equipo . "',categoria_equipo= '" . $categoria_equipo . "',compania= '" . $compania . "',usado_por= '" . $usado_por . "',ubicacion_uso= '" . $ubicacion_uso . "',proveedor= '" . $proveedor . "',referencia_proveedor= '" . $referencia_proveedor . "',modelo= '" . $modelo . "',numero_serie = '" . $numero_serie . "',fecha_efectiva='" . $fecha_efectiva . "',alquilado='" . $alquilado . "',seguro='" . $seguro . "',leasing='" . $leasing . "',valoracion='" . $valoracion . "',procesador='" . $procesador . "',ram='" . $ram . "',almacenamiento='" . $almacenamiento . "',mac_address='" . $mac_address . "',bateria='" . $bateria . "',adaptador='" . $adaptador . "',sistema_operativo='" . $sistema_operativo . "',version_so='" . $version_so . "',descripcion='" . $descripcion . "',id_usuario=" . $id_usuario . " WHERE id_equipo = " . $id_equipo;

    $data = $pdo->query($sql);

    if ($data == true) {
        echo "modificado correctamente";
    } else {
        echo "no fue posible modificar";
    }
}
// FIN MODIFICAR EQUIPO -----------------------------------

// ELIMINAR EQUIPO ----------------------------------------
function EliminarEquipo()
{
    require "../modelo/conexion.php";

    $id_equipo = $_POST['id_equipo'];

    $sql = "DELETE FROM equipo WHERE id_equipo = $id_equipo";
    $data = $pdo->query($sql);

    if ($data) {
        echo "Equipo eliminado correctamente";
    } else {
        echo "Hubo un problema al intentar eliminar la información";
    }

    $pdo = null;
}
// FIN ELIMINAR EQUIPO ------------------------------------
