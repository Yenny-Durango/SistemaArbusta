<?php
// Switch que maneja las diferentes funciones según el método enviado por POST.
switch ($_POST['Metodo']) {
  case 'RegistrarUsuario':
    RegistrarUsuario();
    break;
  case 'ConsultarUsuario':
    ConsultarUsuario();
    break;
  case 'ModificarUsuario':
    ModificarUsuario();
    break;
  case 'EliminarUsuario':
    EliminarUsuario();
    break;
  case 'Ingresar':
    Ingresar();
    break;
}

// Función para registrar un nuevo usuario en la base de datos.
function RegistrarUsuario()
{
  // Requiere el archivo de conexión a la base de datos
  require "../modelo/conexion.php";

  // Inicia la sesión
  session_start();

  // Obtiene los datos del formulario por POST
  $nombre = $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $correo = $_POST['correo'];
  $telefono = $_POST['telefono'];
  $contrasena = $_POST['contrasena'];
  $confirmar_contrasena = $_POST['confirmar_contrasena'];
  $nombre_completo = $apellido . ' , ' . $nombre;

  // Verifica si el correo electrónico ya existe en la base de datos
  $sql = "SELECT * FROM usuario WHERE correo = :correo";
  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(':correo', $correo, PDO::PARAM_STR);
  $stmt->execute();

  if ($stmt->rowCount() > 0) {
    // El correo electrónico ya existe, muestra un mensaje de alerta
    echo "El correo ya está registrado";
  } else if ($nombre === '' || $apellido === '' || $correo === '' || $contrasena === '' || $confirmar_contrasena === '') {
    echo "Complete todos los campos";
  } else {
    // La consulta preparada con parámetros para insertar el nuevo usuario
    $contrasena_bd = md5($contrasena);
    $sql = "INSERT INTO usuario(nombre_completo, correo, telefono, contrasena) VALUES (:nombre_completo, :correo, :telefono, :contrasena)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':nombre_completo', $nombre_completo, PDO::PARAM_STR);
    $stmt->bindParam(':correo', $correo, PDO::PARAM_STR);
    $stmt->bindParam(':telefono', $telefono, PDO::PARAM_STR);
    $stmt->bindParam(':contrasena', $contrasena_bd, PDO::PARAM_STR);
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

function Ingresar()
{
  // Requiere el archivo de conexión a la base de datos
  require "../modelo/conexion.php";

  // Inicia la sesión
  session_start();

  // Obtén las credenciales del formulario
  $correo = $_POST['correo'];
  $contrasena = $_POST['contrasena'];

  if (empty($correo) || empty($contrasena)) {
    echo "Complete todos los campos";
    return;
  }

  // Consulta preparada con parámetros
  $sql = "SELECT id_usuario, correo, contrasena, nombre_completo, tipo_usuario FROM usuario WHERE correo = :correo";
  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(':correo', $correo, PDO::PARAM_STR);
  $stmt->execute();

  // Obtener resultados
  $row = $stmt->fetch(PDO::FETCH_ASSOC);

  $contrasena_bd = md5($contrasena);
  if ($row) {
    if ($contrasena_bd == $row['contrasena']) {
      if ($row['tipo_usuario'] === 1) {
        $_SESSION['id_usuario'] = $row['id_usuario'];
        $_SESSION['correo'] = $row['correo'];
        $_SESSION['nombre_completo'] = $row['nombre_completo'];
        $_SESSION['tiporol'] = $row['tipo_usuario'];
        echo "ingresaste correctamente admin";
      } else {
        $_SESSION['id_usuario'] = $row['id_usuario'];
        $_SESSION['correo'] = $row['correo'];
        $_SESSION['nombre_completo'] = $row['nombre_completo'];
        $_SESSION['tiporol'] = $row['tipo_usuario'];
        echo "ingresaste correctamente usuario";
      }
    } else {
      echo 'Credenciales incorrectas';
    }
  } else {
    // Usuario no existe
    echo 'El usuario no existe';
  }

  $pdo = null; // Cerrar la conexion
}

function ConsultarUsuario()
{
  // Requiere el archivo de conexión a la base de datos
  require "../modelo/conexion.php";

  // Inicia la sesión
  session_start();

  // Obtiene los datos del formulario por POST
  $id_usuario = $_POST['id_usuario'];

  // Verifica si el correo electrónico ya existe en la base de datos
  $sql = "SELECT * FROM usuario WHERE id_usuario = $id_usuario";
  $result = $pdo->query($sql);
  foreach ($result as $key => $results) {
    echo '
    <form method="POST">
    <h1 class=".h1">MODIFICAR USUARIO</h1>
    <br>
    <input id="id_usuario" type="hidden" value="' . $results["id_usuario"] . '">

    <!-- Sección de datos personales -->
    <div class="form-floating">
      <input class="form-control" id="nombre_completo" name="nombre_completo" type="text" placeholder="nombre_completo" value="' . $results["nombre_completo"] . '" onkeyup="ValidarNombreUsuario(this)"/>
      <label for="Nombre Completo">Nombre Completo</label>
      <!-- Mensaje de error para el campo de nombres -->
      <span id="nombreError" class="alert alert-danger" hidden></span>
    </div>
    <br>
    <div class="form-floating">
      <input class="form-control" id="correo" name="correo" type="text" placeholder="correo" value="' . $results["correo"] . '" onkeyup="ValidarCorreoUsuario(this)"/>
      <label for="Correo">Correo</label>
      <!-- Mensaje de error para el campo de nombres -->
      <span id="correoError" class="alert alert-danger" hidden></span>
    </div>
    <br>
    <div class="form-floating">
      <input class="form-control" id="telefono" name="telefono" type="number" placeholder="telefono" value="' . $results["telefono"] . '" onkeyup="ValidarTelefonoUsuario(this)"/>
      <label for="Telefono">Telefono</label>
      <!-- Mensaje de error para el campo de nombres -->
      <span id="telefonoError" class="alert alert-danger" hidden></span>
    </div>
    <br>
    <div class="form-floating">';
    if ($results["tipo_usuario"] == 1) {
      echo '<select name="tipo_usuario" id="tipo_usuario" class="form-select" onkeyup="ValidarCategoriaEquipo(this)">
              <!-- Opciones de categoría del equipo -->
              <option value="1">Administrador</option>
              <option value="0">Empleado</option>
            </select>';
    } else {
      echo '<select name="tipo_usuario" id="tipo_usuario" class="form-select" onkeyup="ValidarCategoriaEquipo(this)">
              <!-- Opciones de categoría del equipo -->
              <option value="0">Empleado</option>
              <option value="1">Administrador</option>
            </select>';
    }
    echo '<label for="tipo_usuario">Tipo Usuario</label>
    </div>
    <br>
    </form>';
  }
}

function ModificarUsuario()
{
  // Requiere el archivo de conexión a la base de datos
  require "../modelo/conexion.php";

  $id_usuario = $_POST["id_usuario"];
  $nombre_completo = $_POST["nombre_completo"];
  $correo = $_POST["correo"];
  $telefono = $_POST["telefono"];
  $tipo_usuario = $_POST["tipo_usuario"];

  $sql = "UPDATE usuario SET nombre_completo = '" . $nombre_completo . "',
    correo = '" . $correo . "',
    telefono = '" . $telefono . "',
    tipo_usuario = '" . $tipo_usuario . "'
    WHERE id_usuario = " . $id_usuario;

  $data = $pdo->query($sql);

  if ($data == true) {
    echo "modificado correctamente";
  } else {
    echo "no fue posible modificar";
  }
}

function EliminarUsuario()
{
  // Requiere el archivo de conexión a la base de datos
  require "../modelo/conexion.php";

  $id_usuario = $_POST['id_usuario'];

  // Prepara la consulta SQL para eliminar al usuario
  $sql = "DELETE FROM usuario WHERE id_usuario = $id_usuario";
  $data = $pdo->query($sql);

  // Ejecuta la consulta
  if ($data) {
    echo "Usuario eliminado correctamente";
  } else {
    echo "Hubo un problema al intentar eliminar la información";
  }

  // Cierra la conexión a la base de datos
  $pdo = null;
}
