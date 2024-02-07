<?php
// Switch que maneja las diferentes funciones según el método enviado por POST.
switch ($_POST['Metodo']) {
  case 'RegistrarEquipo':
    RegistrarEquipo();
    break;
  case 'ModificarEquipo':
    ModificarEquipo();
    break;
  default:
    echo "Método inválido";
    break;
}

// Función para registrar un nuevo id_usuario en la base de datos.
function RegistrarEquipo()
{
  // Requiere el archivo de conexión a la base de datos
  require "../modelo/conexion.php";

  // Inicia la sesión
  session_start();

  // Obtiene los datos del formulario por POST
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

  // Suponiendo que estos son los nombres de tus checkboxes
  $checkboxes = ['alquilado', 'seguro', 'leasing'];

  foreach ($checkboxes as $checkbox) {
    if (isset($_POST[$checkbox]) && $_POST[$checkbox] == 'on') {
      // The checkbox is checked and its value is 1
      $$checkbox = 1;
    } else {
      // The checkbox is not checked and its value is 0
      $$checkbox = 0;
    }
  }


  // Verifica si el equipo ya existe en la base de datos
  $sql = "SELECT * FROM equipo WHERE equipo = :equipo";
  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(':equipo', $equipo, PDO::PARAM_STR);
  $stmt->execute();

  if ($stmt->rowCount() > 0) {
    // El equipo ya está registrado, muestra un mensaje de alerta
    echo "El equipo ya está registrado";
  } else if ($equipo === '' || $categoria_equipo === '' || $compania === '' || $id_usuario === '' || $usado_por === '' || $ubicacion_uso === '' || $proveedor === ''  || $referencia_proveedor === ''  || $modelo === ''  || $numero_serie === ''  || $fecha_efectiva === '' || $valoracion === ''  || $procesador === ''  || $ram === ''  || $almacenamiento === ''  || $mac_address === ''  || $bateria === '' || $adaptador === ''  || $sistema_operativo === ''  || $version_so === ''  || $descripcion === '') {
    // Faltan campos por completar, muestra un mensaje
    echo "Complete todos los campos";
  } else {
    // Realiza la inserción de datos en la base de datos
    $sql = "INSERT INTO equipo(id_usuario,equipo, categoria_equipo, compania, usado_por, ubicacion_uso, proveedor, referencia_proveedor, modelo, numero_serie, fecha_efectiva, alquilado, seguro, leasing, valoracion, procesador, ram, almacenamiento, mac_address, bateria, adaptador, sistema_operativo, version_so, descripcion) VALUES (:id_usuario, :equipo, :categoria_equipo, :compania, :usado_por, :ubicacion_uso, :proveedor, :referencia_proveedor, :modelo, :numero_serie, :fecha_efectiva, :alquilado, :seguro, :leasing, :valoracion, :procesador, :ram, :almacenamiento, :mac_address, :bateria, :adaptador, :sistema_operativo, :version_so, :descripcion)";

    $stmt = $pdo->prepare($sql);
    // Vincula los parámetros con los valores proporcionados
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

    // Verifica si la inserción fue exitosa y muestra un mensaje correspondiente
    if ($stmt->rowCount() > 0) {
      echo "Registrado correctamente";
    } else {
      echo "Hubo un problema al intentar registrar la información";
    }
  }

  // Cierra la conexión a la base de datos
  $pdo = null;
}

function ModificarEquipo()
{
  // Requiere el archivo de conexión a la base de datos
  require "../modelo/conexion.php";

  // Inicia la sesión
  session_start();

  // Obtiene los datos del formulario por POST
  $id_equipo = $_POST['id_equipo'];

  // Verifica si el correo electrónico ya existe en la base de datos
  $sql = "SELECT * FROM equipo WHERE id_equipo = $id_equipo";
  $result = $pdo->query($sql);
  foreach ($result as $key => $results) {
    echo '
    <form method="post" action="">
    <!-- Título del formulario -->
    <h1 class=".h1">Modificar Equipo</h1>
    <br>
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
        <select name="categoria_equipo" id="categoria_equipo" class="form-select" onkeyup="ValidarCategoriaEquipo(this)">
            <!-- Opciones de categoría del equipo -->
            <option value="'.$results["categoria_equipo"].'">'.$results["categoria_equipo"].'</option>
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
    <br>
    <!-- Campo de compañía -->
    <div class="form-floating">
        <select name="compania" id="compania" class="form-select">
            <!-- Opciones de compañía -->
            <option value="' .$results["compania"]. '">'.$results["compania"]. '</option>
            <option value="ARBUSTA S.R.L">ARBUSTA S.R.L.</option>
            <option value="ARBUSTA S.A.S">ARBUSTA S.A.S.</option>
            <option value="Sumilar S.A">Sumilar S.A.</option>
        </select>
        <label for="Compañía">Compañía </label>
    </div>
    <br>
    <div class="form-floating">
        <select name="usado_por" id="usado_por" class="form-select">
            <!-- Opciones de uso del equipo -->
            <option value="'.$results["usado_por"].'">'.$results["usado_por"].'</option>
            <option value="Departamento">Departamento</option>
            <option value="Empleado">Empleado</option>
        </select>
        <label for="Usado por:">Usado por: </label>
    </div>
    <br>
    <div class="form-floating">
        <select name="id_usuario" id="id_usuario" class="form-select">
            <!-- Opción vacía y opciones de usuarios -->
            <option value="'.$results["id_usuario"].'">'.$results["id_usuario"].'</option>
        </select>
        <label for="Empleado">Empleado </label>
    </div>
    <br>
    <div class="form-floating">
        <select name="ubicacion_uso" id="ubicacion_uso" class="form-select">
            <!-- Opciones de ubicación de uso -->
            <option value="'.$results["ubicacion_uso"].'">'.$results["ubicacion_uso"].'</option>
            <option value="BUE">BUE</option>
            <option value="ROS">ROS</option>
            <option value="MED">MED</option>
            <option value="MON">MON</option>
        </select>
        <label for="Ubicación de uso">Ubicación de uso </label>
    </div>
    <br>
    <div class="form-floating">
        <input class="form-control" id="proveedor" name="proveedor" type="text" placeholder="proveedor" value="'.$results["proveedor"].'" onkeyup="ValidarProveedor(this)" />
        <label for="Proveedor">Proveedor</label>
        <!-- Mensaje de error para el campo de proveedor -->
        <span id="proveedorError" class="alert alert-danger" hidden></span>
    </div>
    <br>
    <div class="form-floating">
        <input class="form-control" id="referencia_proveedor" name="referencia_proveedor" type="text" placeholder="referencia_proveedor" value="'.$results["referencia_proveedor"].'" onkeyup="ValidarReferenciaProveedor(this)" />
        <label for="Referencia proveedor">Referencia proveedor</label>
        <!-- Mensaje de error para el campo de referencia del proveedor -->
        <span id="referenciaProveedorError" class="alert alert-danger" hidden></span>
    </div>
    <br>
    <div class="form-floating">
        <input class="form-control" id="modelo" name="modelo" type="text" placeholder="modelo" value="'.$results["modelo"].'" onkeyup="ValidarModelo(this)" />
        <label for="Modelo">Modelo </label>
        <!-- Mensaje de error para el campo de modelo -->
        <span id="modeloError" class="alert alert-danger" hidden></span>
    </div>
    <br>
    <div class="form-floating">
        <input class="form-control" id="numero_serie" name="numero_serie" type="text" placeholder="numero_serie" value="'.$results["numero_serie"].'"onkeyup="ValidarNumeroSerie(this)" />
        <label for="Numero de serie">Número de serie </label>
        <!-- Mensaje de error para el campo de número de serie -->
        <span id="numeroSerieError" class="alert alert-danger" hidden></span>
    </div>
    <br>
    <div class="form-floating">
        <input class="form-control" id="fecha_efectiva" name="fecha_efectiva" type="date" value="'.$results["fecha_efectiva"].'" placeholder="fecha_efectiva" onkeyup="ValidarFechaEfectiva(this)" />
        <label for="Fecha Efectiva">Fecha Efectiva </label>
        <!-- Mensaje de error para el campo de fecha efectiva -->
        <span id="fechaError" class="alert alert-danger" hidden></span>
    </div>
    <br>
    <div class="checkboxes col-md-6">
        <!-- Opciones de checkbox para alquilado, seguro y leasing -->
        <label class="form-check-label" for="Alquilado">Alquilado</label>
        <input type="checkbox" name="alquilado" id="alquilado" value="'.$results["alquilado"].'">
        |
        <label class="form-check-label" for="Seguro">Seguro</label>
        <input type="checkbox" name="seguro" id="seguro" value="'.$results["seguro"].'">
        |
        <label class="form-check-label" for="Leasing">Leasing</label>
        <input type="checkbox" name="leasing" id="leasing" value="'.$results["leasing"].'">
    </div>
    <br>
    <div class="form-floating">
        <input class="form-control" id="valoracion" name="valoracion" type="number" placeholder="valoracion" value="'.$results["valoracion"].'" onkeyup="ValidarValoracion(this)" />
        <label for="Valoracion">Valoración</label>
        <!-- Mensaje de error para el campo de valoración -->
        <span id="valoracionError" class="alert alert-danger" hidden></span>
    </div>
    <br>
    <div class="form-floating">
            <input class="form-control" id="procesador" name="procesador" type="text" placeholder="procesador" value="'.$results["procesador"].'" onkeyup="ValidarProcesador(this)" />
            <label for="Procesador">Procesador</label>
        </div>
        <!-- Mensaje de error para el campo de procesador -->
        <span id="procesadorError" class="alert alert-danger" hidden></span>
    </div>
    <br>
    <div class="form-floating">
        <input class="form-control" id="ram" name="ram" type="text" placeholder="ram" value="'.$results["ram"].'" onkeyup="ValidarRam(this)" />
        <label for="ram">RAM</label>
        <!-- Mensaje de error para el campo de RAM -->
        <span id="ramError" class="alert alert-danger" hidden></span>
    </div>
    <br>
    <div class="form-floating">
        <select name="almacenamiento" id="almacenamiento" class="form-select">
            <!-- Opciones de almacenamiento -->
            <option>'.$results["almacenamiento"].'</option>
            <option value="HDD 250GB">HDD 250GB</option>
            <option value="HDD 500GB">HDD 500GB</option>
            <option value="HDD 1TB">HDD 1TB</option>
            <option value="SDD 120GB">SDD 120GB</option>
            <option value="SDD 240GB">SDD 240GB</option>
            <option value="SDD 500GB">SDD 500GB</option>
        </select>
        <label for="Almacenamiento">Almacenamiento</label>
    </div>
    <br>
    <div class="form-floating">
        <input class="form-control" id="mac_address" name="mac_address" type="text" placeholder="mac_address" value="'.$results["mac_address"].'" onkeyup="ValidarMacAddress(this)" />
        <label for="Mac address">Mac address</label>
        <!-- Mensaje de error para el campo de dirección MAC -->
        <span id="macAddressError" class="alert alert-danger" hidden></span>
    </div>
    <br>
    <div class="form-floating">
        <input class="form-control" id="bateria" name="bateria" type="text" placeholder="bateria" value="'.$results["bateria"].'" onkeyup="ValidarBateria(this)" />
        <label for="Batería">Batería</label>
        <!-- Mensaje de error para el campo de batería -->
        <span id="bateriaError" class="alert alert-danger" hidden></span>
    </div>
    <br>
    <div class="form-floating">
        <input class="form-control" id="adaptador" name="adaptador" type="text" placeholder="adaptador" value="'.$results["adaptador"].'" onkeyup="ValidarAdaptador(this)" />
        <label for="Adaptador">Adaptador</label>
        <!-- Mensaje de error para el campo de adaptador -->
        <span id="adaptadorError" class="alert alert-danger" hidden></span>
    </div>
    <br>
    <div class="form-floating">
        <select name="sistema_operativo" id="sistema_operativo" class="form-select">
            <!-- Opciones de sistema operativo -->
            <option value="'.$results["sistema_operativo"].'">'.$results["sistema_operativo"].'</option>
            <option value="Android">Android</option>
            <option value="iOS">iOS</option>
            <option value="Linux">Linux</option>
            <option value="Windows">Windows</option>
        </select>
        <label for="Sistema operativo">Sistema operativo (SO)</label>
    </div>
    <br>
    <div class="form-floating">
        <input class="form-control" id="version_so" name="version_so" type="text" placeholder="version_so" value="'.$results["version_so"].'" onkeyup="ValidarVersionSo(this)" />
        <label for="Version SO">Versión SO </label>
        <!-- Mensaje de error para el campo de versión del sistema operativo -->
        <span id="versionSoError" class="alert alert-danger" hidden></span>
    </div>
    <br>
    <div class="form-floating">
        <textarea name="descripcion" id="descripcion" cols="30" rows="10" class="form-control" placeholder="Descripcion" style="height: 200px;" onkeyup="ValidarDescripcion(this)">'.$results["descripcion"].'</textarea>
        <label for="Descripción">Descripción</label>
        <!-- Mensaje de error para el campo de descripción del equipo -->
        <span id="descripcionError" class="alert alert-danger" hidden></span>
    </div>
</form>';
  }
}
