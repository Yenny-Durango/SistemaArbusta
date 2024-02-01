<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar usuarios</title>
    <!-- Enlace al archivo de estilo de DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <!-- Agregamos estilos personalizados -->
    <style>
        #example {
            width: 100%;
            overflow: auto;
            /* Añadir overflow auto para permitir el desplazamiento */
        }

        #example th,
        #example td {
            text-align: center; /* Centrar el texto en las celdas */
        }
    </style>
</head>

<body>

    <?php
    // Incluir archivo de conexión a la base de datos
    require "../../modelo/conexion.php";

    // Consultar todos los usuarios
    $sql = "SELECT * FROM usuario";
    $result = $pdo->query($sql);

    if ($result->rowCount() > 0) {
        echo "<h1 class=\"mt-4\">Listar usuarios</h1>
        <table id=\"example\" class=\"display\" style=\"width:100%\">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre Completo</th>
                <th>Correo</th>
                <th>Telefono</th>
                <th>Tipo de Usuario</th>
                <th>Modificar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>";
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr data-index=\"0\">
              <td>" . $row["id_usuario"] . "</td>
              <td>" . $row["nombre_completo"] . "</td>
              <td>" . $row["correo"] . "</td>
              <td>" . $row["telefono"] . "</td>
              <td>" . $row["tipo_usuario"] . "</td>
              <td><button type=\"button\" class=\"btn btn-warning btn-block\" onclick=\"modificarUsuario()\">Modificar</button></td>
              <td><button type=\"button\" class=\"btn btn-danger btn-block\" onclick=\"eliminarUsuario(" . $row["id_usuario"] . ")\">Eliminar</button></td>
            </tr>";
        }

        echo "
        </tbody>
        <tfoot>
            <tr>
                <th>ID</th>
                <th>Nombre Completo</th>
                <th>Correo</th>
                <th>Telefono</th>
                <th>Tipo de Usuario</th>
                <th>Modificar</th>
                <th>Eliminar</th>
            </tr>
        </tfoot>
    </table>";
    } else {
        echo "0 resultados";
    }
    // Cerrar la conexión a la base de datos
    $pdo = null;
    ?>

    <!-- Incluimos las bibliotecas de jQuery y DataTables -->
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

    <!-- Inicializamos DataTables con configuraciones de desplazamiento -->
    <script>
        new DataTable('#example', {
            scrollX: true,
            scrollY: 250,
            autoWidth: true
        });
    </script>

</body>

</html>