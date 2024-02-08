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
            text-align: center;
            /* Centrar el texto en las celdas */
        }
    </style>
</head>

<body>

    <?php
    require "../../modelo/conexion.php";
    session_start();
    $sql = "SELECT * FROM tickets INNER JOIN usuario ON tickets.id_usuario = usuario.id_usuario WHERE tickets.id_usuario = " . $_SESSION["id_usuario"];

    $result = $pdo->query($sql);

    if ($result->rowCount() > 0) {
        echo "<h1 class=\"mt-4\">Listar tickets</h1>
        <table id=\"example\" class=\"display\" style=\"width:100%\">
        <thead>
            <tr>
                <th>ID</th>
                <th>Fecha</th>
                <th>Resumen</th>
                <th>Detalle</th>
                <th>Imagen/es</th>
                <th>Correo</th>
                <th>Telefono</th>
                <th>Nombre</th>
                <th>Modificar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>";
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr data-index=\"0\">
            <td>" . $row["id_ticket"] . "</td>
            <td>" . $row["fecha_creacion"] . "</td>
            <td>" . $row["resumen_problema"] . "</td>
            <td>" . $row["detalle_problema"] . "</td>
            <td>" . $row["imagenes"] . "</td>
            <td>" . $row["correo"] . "</td>
            <td>" . $row["telefono"] . "</td>
            <td>" . $row["nombre_completo"] . "</td>
            <td><button type=\"button\" class=\"btn btn-warning btn-block\" onclick=\"ModificarTicket(" . $row["id_ticket"] . ")\">Modificar</button></td>
            <td><button type=\"button\" class=\"btn btn-danger btn-block\" onclick=\"eliminarTicket(" . $row["id_ticket"] . ")\">Eliminar</button></td>
            </tr>";
        }
        echo "
        </tbody>
        <tfoot>
            <tr>
                <th>ID</th>
                <th>Fecha</th>
                <th>Resumen</th>
                <th>Detalle</th>
                <th>Imagen/es</th>
                <th>Correo</th>
                <th>Telefono</th>
                <th>Nombre</th>
                <th>Modificar</th>
                <th>Eliminar</th>
            </tr>   
        </tfoot>
    </table>";
    } else {
        echo "0 resultados";
    }
    $pdo = null;
    ?>

    <dialog id="modal">
        <div class="modal-body">
            ....
        </div>
        <br><br>
        <div class="Boton">
            <button class="btn btn-success" id="submitButton" onclick="ModificarTicket()">Modificar</button>
            <button class="btn btn-danger" onclick="CerrarModal()">Cancelar</button>
        </div>
    </dialog>

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