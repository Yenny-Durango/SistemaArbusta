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
  require "../modelo/conexion.php";

  session_start();

  // Obtener datos del formulario por POST
  $id_ticket = $_POST['id_ticket'];
  $fecha_creacion = $_POST['fecha_creacion'];
  $resumen_problema = $_POST['resumen_problema'];
  $detalle_problema = $_POST['detalle_problema'];
  $correo = $_POST['correo'];
  $telefono = $_POST['telefono'];
  $nombre_completo = $_POST['nombre_completo'];

  // Procesar cada imagen cargada
  $imagePaths = [];
  if (isset($_FILES["image_uploads"]) && count($_FILES["image_uploads"]["name"]) > 0) {
    for ($i = 0; $i < count($_FILES["image_uploads"]["name"]); $i++) {
      $targetDir = "../vista/assets/img/";
      $targetFile = $targetDir . basename($_FILES["image_uploads"]["name"][$i]);
      if (move_uploaded_file($_FILES["image_uploads"]["tmp_name"][$i], $targetFile)) {
        $imagePaths[] = $targetFile;
      }
    }
  }

  // Convertir rutas de imágenes a una cadena separada por comas
  $imagePathsStr = implode(",", $imagePaths);

  // Validar si todos los campos requeridos están completos
  if ($fecha_creacion === '' || $resumen_problema === '' || $detalle_problema === '' || $correo === '' || $telefono === '' || $nombre_completo === '') {
    echo "Complete todos los campos";
  } else {
    // Preparar y ejecutar la consulta SQL para modificar el ticket existente
    $sql = "UPDATE tickets SET fecha_creacion=:fecha_creacion, resumen_problema=:resumen_problema, detalle_problema=:detalle_problema, imagenes=:imagenes, correo=:correo, telefono=:telefono, nombre_completo=:nombre_completo WHERE id_ticket=:id_ticket";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':fecha_creacion', $fecha_creacion, PDO::PARAM_STR);
    $stmt->bindParam(':resumen_problema', $resumen_problema, PDO::PARAM_STR);
    $stmt->bindParam(':detalle_problema', $detalle_problema, PDO::PARAM_STR);
    $stmt->bindParam(':imagenes', $imagePathsStr, PDO::PARAM_STR);
    $stmt->bindParam(':correo', $correo, PDO::PARAM_STR);
    $stmt->bindParam(':telefono', $telefono, PDO::PARAM_STR);
    $stmt->bindParam(':nombre_completo', $nombre_completo, PDO::PARAM_STR);
    $stmt->bindParam(':id_ticket', $id_ticket, PDO::PARAM_INT);
    $stmt->execute();

    // Verificar si la modificación fue exitosa y mostrar un mensaje correspondiente
    if ($stmt->rowCount() > 0) {
      echo "Ticket modificado correctamente";
    } else {
      echo "Hubo un problema al intentar modificar el ticket";
    }
  }

  // Cerrar la conexión a la base de datos
  $pdo = null;
}
