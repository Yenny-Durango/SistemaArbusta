<?php
// Switch que maneja las diferentes funciones según el método enviado por POST.
switch ($_POST['Metodo']) {
  case 'RegistrarUsuario':
    RegistrarUsuario();
    break;
  case 'RegistrarUsuarioAdmin':
    RegistrarUsuarioAdmin();
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
  case 'RecuperarContrasena':
    RecuperarContrasena();
    break;
  case 'Ingresar':
    Ingresar();
    break;
}

// REGISTRAR USUARIO DESDE EL ADMINISTRADOR --------------------------------------
function RegistrarUsuarioAdmin()
{
  require "../modelo/conexion.php";

  session_start();

  $nombre = $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $correo = $_POST['correo'];
  $telefono = $_POST['telefono'];
  $contrasena = $_POST['contrasena'];
  $confirmar_contrasena = $_POST['confirmar_contrasena'];
  $tipo_usuario = $_POST['tipo_usuario'];
  $nombre_completo = $apellido . ' , ' . $nombre;

  $sql = "SELECT * FROM usuario WHERE correo = :correo";
  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(':correo', $correo, PDO::PARAM_STR);
  $stmt->execute();

  if ($stmt->rowCount() > 0) {
    echo "El correo ya está registrado";
  } else if ($nombre === '' || $apellido === '' || $correo === '' || $contrasena === '' || $confirmar_contrasena === '' || $tipo_usuario === '') {
    echo "Complete todos los campos";
  } else {
    $contrasena_bd = md5($contrasena);
    $sql = "INSERT INTO usuario(nombre_completo, correo, telefono, contrasena, tipo_usuario) VALUES (:nombre_completo, :correo, :telefono, :contrasena, :tipo_usuario)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':nombre_completo', $nombre_completo, PDO::PARAM_STR);
    $stmt->bindParam(':correo', $correo, PDO::PARAM_STR);
    $stmt->bindParam(':telefono', $telefono, PDO::PARAM_STR);
    $stmt->bindParam(':contrasena', $contrasena_bd, PDO::PARAM_STR);
    $stmt->bindParam(':tipo_usuario', $tipo_usuario, PDO::PARAM_STR);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
      echo "Registrado correctamente";
    } else {
      echo "Hubo un problema al intentar registrar la información";
    }
  }

  $pdo = null;
}
// FIN REGISTRAR USUARIO DESDE EL ADMINISTRADOR --------------------------------------

// REGISTRAR USUARIO --------------------------------------
function RegistrarUsuario()
{
  require "../modelo/conexion.php";

  session_start();

  $nombre = $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $correo = $_POST['correo'];
  $telefono = $_POST['telefono'];
  $contrasena = $_POST['contrasena'];
  $confirmar_contrasena = $_POST['confirmar_contrasena'];
  $nombre_completo = $apellido . ' , ' . $nombre;

  $sql = "SELECT * FROM usuario WHERE correo = :correo";
  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(':correo', $correo, PDO::PARAM_STR);
  $stmt->execute();

  if ($stmt->rowCount() > 0) {
    echo "El correo ya está registrado";
  } else if ($nombre === '' || $apellido === '' || $correo === '' || $contrasena === '' || $confirmar_contrasena === '') {
    echo "Complete todos los campos";
  } else {
    $contrasena_bd = md5($contrasena);
    $sql = "INSERT INTO usuario(nombre_completo, correo, telefono, contrasena) VALUES (:nombre_completo, :correo, :telefono, :contrasena)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':nombre_completo', $nombre_completo, PDO::PARAM_STR);
    $stmt->bindParam(':correo', $correo, PDO::PARAM_STR);
    $stmt->bindParam(':telefono', $telefono, PDO::PARAM_STR);
    $stmt->bindParam(':contrasena', $contrasena_bd, PDO::PARAM_STR);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
      echo "Registrado correctamente";
    } else {
      echo "Hubo un problema al intentar registrar la información";
    }
  }

  $pdo = null;
}
// REGISTRAR USUARIO --------------------------------------

// INGRESAR AL APLICATIVO DEL USUARIO ----------------------------------------------------------------
function Ingresar()
{
  require "../modelo/conexion.php";
  session_start();

  $correo = $_POST['correo'];
  $contrasena = $_POST['contrasena'];

  if (empty($correo) || empty($contrasena)) {
    echo "Complete todos los campos";
    return;
  }
  $sql = "SELECT id_usuario, correo, contrasena, nombre_completo, tipo_usuario FROM usuario WHERE correo = :correo";
  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(':correo', $correo, PDO::PARAM_STR);
  $stmt->execute();

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
    echo 'El usuario no existe';
  }
  $pdo = null;
}
// FIN INGRESAR AL APLICATIVO DEL USUARIO ----------------------------------------------------------------

// CONSULTAR USUARIO (MUESTRA LOS DATOS DEL USUARIO A MODIFICAR EN UN MODAL)  -----------------------
function ConsultarUsuario()
{
  require "../modelo/conexion.php";

  session_start();

  $id_usuario = $_POST['id_usuario'];

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
// FIN CONSULTAR USUARIO (MUESTRA LOS DATOS DEL USUARIO A MODIFICAR EN UN MODAL)  -----------------------

// MODIFICAR USUARIO ---------------------------------------------
function ModificarUsuario()
{
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
// FIN MODIFICAR USUARIO ---------------------------------------------

// ELIMINAR USUARIO -----------------------------------------------
function EliminarUsuario()
{
  require "../modelo/conexion.php";

  $id_usuario = $_POST['id_usuario'];

  $sql = "DELETE FROM usuario WHERE id_usuario = $id_usuario";
  $data = $pdo->query($sql);

  if ($data) {
    echo "Usuario eliminado correctamente";
  } else {
    echo "Hubo un problema al intentar eliminar la información";
  }

  $pdo = null;
}
// FIN ELIMINAR USUARIO -----------------------------------------------

// RECUPERAR CONTRASEÑA MEDIANTE CORREO ---------------------------------
function RecuperarContrasena()
{
  require "../modelo/conexion.php";
  session_start();

  $correo = $_POST['correo'];

  if (empty($correo)) {
    echo "Complete todos los campos";
    return;
  }

  try {
    // Verificamos si el correo existe en nuestra base de datos
    $sql = "SELECT * FROM usuario WHERE correo = :correo";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':correo', $correo, PDO::PARAM_STR);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // si el correo no existe, mostramos mensaje de error
    if (!$result) {
      echo "Correo no registrado";
    } else {
      // datos del usuario
      $id_usuario = GetValor('id_usuario', 'correo', $correo);
      $nombre = GetValor('nombre_completo', 'correo', $correo);

      // Generamos un token
      $token = GenerarTokenPass($correo);

      $url = 'http://' . $_SERVER["SERVER_NAME"] . '../vista/cambiar_contrasena.php?id_usuario=' . $id_usuario . '&token=' . $token;

      $asunto = 'Recuperación de Contraseña';
      $cuerpo = "<html><body style='font-family: Arial, sans-serif;'>
              <h2 style='color: #333;'>Hola $nombre,</h2>
              <p style='color: #666;'>Se ha solicitado un reinicio de contraseña.</p>
              <p style='color: #666;'>Para restaurar la contraseña, por favor visita la siguiente dirección:</p>
              <a href='$url' style='background-color: #4CAF50; color: white; padding: 10px 20px; text-decoration: none; display: inline-block;'>Restaurar contraseña</a>
            </body></html>";
      EnviarEmail($correo, $asunto, $cuerpo, $nombre);
    }
  } catch (PDOException $e) {
    // Manejar la excepción
    echo "Error al recuperar la contraseña: " . $e->getMessage();
  }
}

function EnviarEmail($correo, $nombre, $asunto, $cuerpo)
{
  $headers = "From: Sistema de Login <admin@sistemalogin.com>\r\n";
  $headers .= "Content-type: text/html; charset=UTF-8\r\n";
  mail($correo, $nombre, $cuerpo, $headers);
  // Enviamos el correo electrónico
  if (mail($correo, $asunto, $cuerpo, $headers)) {
    echo "Hemos enviado un correo electronico para restablecer tu contraseña";
  } else {
    echo "Error al enviar email";
  }
}

function GetValor($campo, $campoWhere, $valor)
{
  require '../modelo/conexion.php';

  try {
    $sql = "SELECT $campo FROM usuario WHERE $campoWhere = :valor LIMIT 1";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':valor', $valor, PDO::PARAM_STR);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
      return $result[$campo];
    } else {
      return false;
    }
  } catch (PDOException $e) {
    echo "Error al ejecutar la consulta: " . $e->getMessage();
    return false;
  }
}

function generateToken($length = 32)
{
  return bin2hex(random_bytes($length / 2));
}

function GenerarTokenPass($id_usuario)
{
  require '../modelo/conexion.php';

  // Generamos el token
  $token = generateToken();

  $stmt = $pdo->prepare("UPDATE usuario SET token_password=?, password_request=1 WHERE id_usuario = ?");
  $stmt->bindParam(1, $token);
  $stmt->bindParam(2, $id_usuario);
  $stmt->execute();
  $stmt = null;
  return $token;
}
