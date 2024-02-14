<?php
// Incluir archivo de conexión a la base de datos
require "../../modelo/conexion.php";
require "header-admin.php";

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
            <th>Teléfono</th>
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
            <td>";
        if ($row["tipo_usuario"] == 0) {
            echo "Empleado";
        } else {
            echo "Administrador";
        }
        echo "</td>
            <td><button type=\"button\" class=\"btn btn-warning btn-block\" onclick=\"window.modal.showModal(); ConsultarUsuario(" . $row['id_usuario'] . ")\">Modificar</button></td>
            <td><button type=\"button\" class=\"btn btn-danger btn-block\" onclick=\"EliminarUsuario(" . $row["id_usuario"] . ")\">Eliminar</button></td>
        </tr>";
    }
    echo "
    </tbody>
    <tfoot>
        <tr>
            <th>ID</th>
            <th>Nombre Completo</th>
            <th>Correo</th>
            <th>Teléfono</th>
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

<dialog id="modal">
    <div class="modal-body">
        ....
    </div>
    <br><br>
    <div class="Boton">
        <button class="btn btn-success" id="submitButton" onclick="ModificarUsuario()">Modificar</button>
        <button class="btn btn-danger" onclick="CerrarModal()">Cancelar</button>
    </div>
</dialog>
<?php
require "footer-scripts.php";
?>
</body>

</html>