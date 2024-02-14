<?php
require "../../modelo/conexion.php";
require "header-user.php";
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
                <th>Teléfono</th>
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
                <th>Teléfono</th>
                <th>Nombre</th>
                <th>Modificar</th>
                <th>Eliminar</th>
            </tr>
        </tfoot>
    </table>";
} else {
    echo "
        <div class=\"card-body no_tickets\">
        <h1 class=\"h1\">
        Aún no has registrado ningún ticket
        </h1>
        <img src=\"assets/img/empty.png\" alt=\"imagen\">
        </div>
        ";
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

<?php
require "footer-scripts.php";
?>