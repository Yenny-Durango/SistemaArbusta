<?php
// Se requiere el archivo de conexión
require "../../modelo/conexion.php";
require "header-user.php";

try {
    // Se crea una instancia de PDO para conectarse a la base de datos
    $pdo = new PDO($dsn, $username, $password);
    // Se establece el modo de error para lanzar excepciones en caso de errores
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Se prepara y ejecuta la consulta SQL para obtener información del equipo y usuario
    $stmt = $pdo->query("SELECT * FROM equipo INNER JOIN usuario ON equipo.id_usuario = usuario.id_usuario WHERE equipo.id_usuario = " . $_SESSION["id_usuario"]);
    $stmt->execute();

    // Se obtienen los resultados de la consulta
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    // En caso de error, se muestra el mensaje de error
    echo "Error: " . $e->getMessage();
}

?>
<br>
<form action="">
    <h1 class="h1">INFORMACIÓN DEL PRODUCTO</h1>
    <?php
    if ($results) {
    ?>
        <div class="row mb-3">
            <!-- proveedor -->
            <div class="col-md-6">
                <div class="form-floating mb-3 mb-md-0">
                    <input class="form-control" id="proveedor" name="proveedor" type="text" placeholder="proveedor" value="<?php echo $results[0]['proveedor']; ?>" disabled />
                    <label for="proveedor">Proveedor</label>
                </div>
            </div>
            <!-- referencia de proveedor -->
            <div class="col-md-6">
                <div class="form-floating">
                    <input class="form-control" id="referencia_proveedor" name="referencia_proveedor" type="text" placeholder="referencia_proveedor" value="<?php echo $results[0]['referencia_proveedor']; ?>" disabled />
                    <label for="referencia-proveedor">Referencia de proveedor</label>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <!-- modelo -->
            <div class="col-md-6">
                <div class="form-floating mb-3 mb-md-0">
                    <input class="form-control" id="modelo" name="modelo" type="text" placeholder="modelo" value="<?php echo $results[0]['modelo']; ?>" disabled />
                    <label for="modelo">Modelo</label>
                </div>
            </div>
            <!-- numero de serie -->
            <div class="col-md-6">
                <div class="form-floating">
                    <input class="form-control" id="numero_serie" name="numero_serie" type="text" placeholder="numero_serie" value="<?php echo $results[0]['numero_serie']; ?>" disabled />
                    <label for="numero-serie">Número de serie</label> <!-- Corregido el texto de la etiqueta -->
                </div>
            </div>
        </div>
        <!-- fecha efectiva -->
        <div class="form-floating">
            <input class="form-control" id="fecha_efectiva" name="fecha_efectiva" type="text" placeholder="fecha_efectiva" value="<?php echo $results[0]['fecha_efectiva']; ?>" disabled />
            <label for="fecha-efectiva">Fecha efectiva</label>
        </div>
        <br><br>
        <div class="checkboxes">
            <!-- alquilado -->
            <label class="form-check-label" for="alquilado">Alquilado</label>
            <input class="form-check-input" id="alquilado" name="alquilado" type="checkbox" value="<?php echo $results[0]['alquilado']; ?>">
            |
            <!-- seguro -->
            <label class="form-check-label" for="seguro">Seguro</label>
            <input class="form-check-input" id="seguro" name="seguro" type="checkbox" value="<?php echo $results[0]['seguro']; ?>">
            |
            <!-- leasing -->
            <label class="form-check-label" for="leasing">Leasing</label>
            <input class="form-check-input" id="leasing" name="leasing" type="checkbox" value="<?php echo $results[0]['leasing']; ?>"> <!-- Corregido el name del checkbox -->
        </div>
    <?php
    } else {
    ?>
        <div class="card-body no_tickets">
            <h1 class="h1">
                Aún no te han asignado ningun equipo
            </h1>
            <img src="assets/img/device.png" alt="imagen">
        </div>
    <?php
    }
    ?>
</form>

<?php
require "footer-scripts.php";
?>