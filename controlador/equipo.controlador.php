<?php
// Switch que maneja las diferentes funciones según el método enviado por POST.
switch ($_POST['Metodo']) {
  case 'RegistrarEquipo':
    RegistrarEquipo();
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
