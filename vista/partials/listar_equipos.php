<?php
require "header-admin.php";
require "../../modelo/conexion.php";

$sql = "SELECT * FROM equipo INNER JOIN usuario ON equipo.id_usuario = usuario.id_usuario";
$result = $pdo->query($sql);
if ($result->rowCount() > 0) {
	echo "
		<h1 class=\"mt-4\">Listar equipos</h1>
		<table id=\"example\" class=\"display\" style=\"width:100%\">
		<thead>
			<tr>
				<th>ID</th>
				<th>Equipo</th>
				<th>Categoría</th>
				<th>Compañía</th>
				<th>Usado por</th>
				<th>Empleado</th>
				<th>Ubicación de uso</th>
				<th>Proveedor</th>
				<th>Ref. proveedor</th>
				<th>Modelo</th>
				<th>Núm. de serie</th>
				<th>Fecha efectiva</th>
				<th>Alquilado</th>
				<th>Seguro</th>
				<th>Leasing</th>
				<th>Valoración</th>
				<th>Procesador</th>
				<th>RAM</th>
				<th>Almacenamiento</th>
				<th>MAC Address</th>
				<th>Batería</th>
				<th>Adaptador</th>
				<th>Sistema operativo</th>
				<th>Versión del SO</th>
				<th>Descripción</th>
				<th>Modificar</th>
				<th>Eliminar</th>
			</tr>
		</thead>
		<tbody>
		";
	while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
		echo "<tr data-index=\"0\">
			<td>" . $row["id_equipo"] . "</td>
			<td>" . $row["equipo"] . "</td>
			<td>" . $row["categoria_equipo"] . "</td>
			<td>" . $row["compania"] . "</td>
			<td>" . $row["usado_por"] . "</td>
			<td>" . $row["nombre_completo"] . "</td>
			<td>" . $row["ubicacion_uso"] . "</td>
			<td>" . $row["proveedor"] . "</td>
			<td>" . $row["referencia_proveedor"] . "</td>
			<td>" . $row["modelo"] . "</td>
			<td>" . $row["numero_serie"] . "</td>
			<td>" . $row["fecha_efectiva"] . "</td>
			<td>" . $row["alquilado"] . "</td>
			<td>" . $row["seguro"] . "</td>
			<td>" . $row["leasing"] . "</td>
			<td>" . $row["valoracion"] . "</td>
			<td>" . $row["procesador"] . "</td>
			<td>" . $row["ram"] . "</td>
			<td>" . $row["almacenamiento"] . "</td>
			<td>" . $row["mac_address"] . "</td>
			<td>" . $row["bateria"] . "</td>
			<td>" . $row["adaptador"] . "</td>
			<td>" . $row["sistema_operativo"] . "</td>
			<td>" . $row["version_so"] . "</td>
			<td>" . $row["descripcion"] . "</td>
			<td><button type=\"button\" class=\"btn btn-warning btn-block\" onclick=\"ConsultarEquipo(" . $row["id_equipo"] . ")\">Modificar</button></td>
			<td><button type=\"button\" class=\"btn btn-danger btn-block\" onclick=\"EliminarEquipo(" . $row["id_equipo"] . ")\">Eliminar</button></td>
			</tr>";
	}
	echo "
		</tbody>
		<tfoot>
			<tr>
				<th>ID</th>
				<th>Equipo</th>
				<th>Categoría</th>
				<th>Compañía</th>
				<th>Usado por</th>
				<th>Nombre completo</th>
				<th>Ubicación de uso</th>
				<th>Proveedor</th>
				<th>Ref. proveedor</th>
				<th>Modelo</th>
				<th>Núm. de serie</th>
				<th>Fecha efectiva</th>
				<th>Alquilado</th>
				<th>Seguro</th>
				<th>Leasing</th>
				<th>Valoración</th>
				<th>Procesador</th>
				<th>RAM</th>
				<th>Almacenamiento</th>
				<th>MAC Address</th>
				<th>Batería</th>
				<th>Adaptador</th>
				<th>Sistema operativo</th>
				<th>Versión del SO</th>
				<th>Descripción</th>
				<th>Modificar</th>
				<th>Eliminar</th>
			</tr>
		</tfoot>
	</table>
		";
} else {
	echo "0 resultados";
}
$pdo = null; // Cerrar la conexión
?>

<dialog id="modal">
	<div class="modal-body">
		....
	</div>
	<br><br>
	<div class="Boton">
		<button class="btn btn-success" id="submitButton" onclick="ModificarEquipo()">Modificar</button>
		<button class="btn btn-danger" onclick="CerrarModal()">Cancelar</button>
	</div>
</dialog>

<?php
require "footer-scripts.php";
?>
<script src="../assets/js/equipo.js"></script>
</body>

</html>