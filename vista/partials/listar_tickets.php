<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar equipos</title>
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
    $sql = "SELECT * FROM tickets INNER JOIN usuario ON tickets.id_usuario = usuario.id_usuario WHERE tickets.id_usuario = ". $_SESSION["id_usuario"];
    
    $result = $pdo->query($sql);

    if ($result->rowCount() > 0) {
        echo "<br><br>
    <h1 class=\"mt-4\">MIS TICKETS</h1>
    <div class=\"card mb-4\">
        <div class=\"card-body\">
            Aquí se presenta la interfaz para la visualización de los registros de tickets. Este espacio proporciona acceso a la información detallada de los tickets que han sido previamente registrados en el sistema.
        </div>
    </div>
    <div class=\"card mb-4\">
        <div class=\"card-header\">
            <svg class=\"svg-inline--fa fa-table me-1\" aria-hidden=\"true\" focusable=\"false\" data-prefix=\"fas\" data-icon=\"table\" role=\"img\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 512 512\" data-fa-i2svg=\"\">
                <path fill=\"currentColor\" d=\"M64 256V160H224v96H64zm0 64H224v96H64V320zm224 96V320H448v96H288zM448 256H288V160H448v96zM64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64z\"></path>
            </svg>
            Tickets registrados
        </div>
        <div class=\"card-body\">
            <div class=\"datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns\">
                <div class=\"datatable-top\">
                    <div class=\"datatable-dropdown\">
                        <label>
                            <select class=\"datatable-selector\">
                                <option value=\"5\">5</option>
                                <option value=\"10\" selected=\"\">10</option>
                                <option value=\"15\">15</option>
                                <option value=\"20\">20</option>
                                <option value=\"25\">25</option>
                            </select> entradas por página
                        </label>
                    </div>
                    <div class=\"datatable-search\">
                        <input class=\"datatable-input\" placeholder=\"Search...\" type=\"search\" title=\"Search within table\" aria-controls=\"datatablesSimple\">
                    </div>
                </div>
                <div class=\"datatable-container\">
                    <table id=\"datatablesSimple\" class=\"datatable-table\">
                        <thead>
                            <tr>
                                <th data-sortable=\"true\" style=\"width: auto;\"><a href=\"#\" class=\"datatable-sorter\">ID</a></th>
                                <th data-sortable=\"true\" style=\"width: auto;\"><a href=\"#\" class=\"datatable-sorter\">Fecha</a></th>
                                <th data-sortable=\"true\" style=\"width: auto;\"><a href=\"#\" class=\"datatable-sorter\">Resumen</a></th>
                                <th data-sortable=\"true\" style=\"width: auto;\"><a href=\"#\" class=\"datatable-sorter\">Detalle</a></th>
                                <th data-sortable=\"true\" style=\"width: auto;\"><a href=\"#\" class=\"datatable-sorter\">Imagenes</a></th>
                                <th data-sortable=\"true\" style=\"width: auto;\"><a href=\"#\" class=\"datatable-sorter\">Correo</a></th>
                                <th data-sortable=\"true\" style=\"width: auto;\"><a href=\"#\" class=\"datatable-sorter\">Telefono</a></th>
                                <th data-sortable=\"true\" style=\"width: auto;\"><a href=\"#\" class=\"datatable-sorter\">Nombre Completo</a></th>
                                <th data-sortable=\"true\" style=\"width: auto;\"><a href=\"#\" class=\"datatable-sorter\">Modificar</a></th>
                                <th data-sortable=\"true\" style=\"width: auto;\"><a href=\"#\" class=\"datatable-sorter\">Eliminar</a></th>
                            </tr>
                        </thead>
                        <tbody>";
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr data-index=\"0\">
                            <td>" . $row["id_ticket"] . "</td>
                            <td>" . $row["fecha_creacion"] . "</td>
                            <td>" . $row["resumen_problema"] . "</td>
                            <td>" . $row["detalle_problema"] . "</td>
                            <td>" . $row["capturas"] . "</td>
                            <td>" . $row["correo"] . "</td>
                            <td>" . $row["telefono"] . "</td>
                            <td>" . $row["nombre_completo"] . "</td>
                            <td><button type=\"button\" class=\"btn btn-warning btn-block\" onclick=\"ModificarTicket(" . $row["id_ticket"] . ")\">Modificar</button></td>
                            <td><button type=\"button\" class=\"btn btn-danger btn-block\" onclick=\"eliminarTicket(" . $row["id_ticket"] . ")\">Eliminar</button></td>
                          </tr>";
        }
    }
    ?>
    </tbody>
    </table>
    </div>
    <div class="datatable-bottom">
        <div class="datatable-info">Mostrando 1 a 10 de 57 entradas</div>
        <nav class="datatable-pagination">
            <ul class="datatable-pagination-list">
                <li class="datatable-pagination-list-item datatable-hidden datatable-disabled"><a data-page="1" class="datatable-pagination-list-item-link">‹</a></li>
                <li class="datatable-pagination-list-item datatable-active"><a data-page="1" class="datatable-pagination-list-item-link">1</a></li>
                <li class="datatable-pagination-list-item"><a data-page="2" class="datatable-pagination-list-item-link">2</a></li>
                <li class="datatable-pagination-list-item"><a data-page="3" class="datatable-pagination-list-item-link">3</a></li>
                <li class="datatable-pagination-list-item"><a data-page="4" class="datatable-pagination-list-item-link">4</a></li>
                <li class="datatable-pagination-list-item"><a data-page="5" class="datatable-pagination-list-item-link">5</a></li>
                <li class="datatable-pagination-list-item"><a data-page="6" class="datatable-pagination-list-item-link">6</a></li>
                <li class="datatable-pagination-list-item"><a data-page="2" class="datatable-pagination-list-item-link">›</a></li>
            </ul>
        </nav>
    </div>
    </div>
    </div>
    </div>