<?php
require "../../modelo/conexion.php";
session_start();

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Preparar y ejecutar la consulta SQL
    $stmt = $pdo->query("SELECT * FROM equipo INNER JOIN usuario ON equipo.id_usuario = usuario.id_usuario
    WHERE equipo.id_usuario = " . $_SESSION["id_usuario"]);
    $stmt->execute();

    // Obtener los resultados
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

?>
<br><br>
<form action="">
    <h1 class=".h1">INFORMACIÓN DEL PRODUCTO</h1>
    <br>
    <?php
    if ($results) {
    ?>
        <div class="row mb-3">
            <div class="col-md-6">
                <div class="form-floating mb-3 mb-md-0">
                    <input class="form-control" id="proveedor" name="proveedor" type="text" placeholder="proveedor" value="<?php echo $results[0]['proveedor']; ?>" disabled />
                    <label for="proveedor">Proveedor</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating">
                    <input class="form-control" id="referencia_proveedor" name="referencia_proveedor" type="text" placeholder="referencia_proveedor" value="<?php echo $results[0]['referencia_proveedor']; ?>" disabled />
                    <label for="referencia-proveedor">Referencia de proveedor</label>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <div class="form-floating mb-3 mb-md-0">
                    <input class="form-control" id="modelo" name="modelo" type="text" placeholder="modelo" value="<?php echo $results[0]['modelo']; ?>" disabled />
                    <label for="modelo">Modelo</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating">
                    <input class="form-control" id="numero_serie" name="numero_serie" type="text" placeholder="numero_serie" value="<?php echo $results[0]['numero_serie']; ?>" disabled />
                    <label for="Usado por:">Numero de serie</label>
                </div>
            </div>
        </div>
        <div class="form-floating">
            <input class="form-control" id="fecha_efectiva" name="fecha_efectiva" type="text" placeholder="fecha_efectiva" value="<?php echo $results[0]['fecha_efectiva']; ?>" disabled />
            <label for="fecha-efectiva">Fecha efectiva</label>
        </div>
        <br><br>
        <div class="checkboxes">
            <label class="form-check-label" for="alquilado">Alquilado</label>
            <input class="form-check-input" id="alquilado" name="alquilado" type="checkbox" value="<?php echo $results[0]['alquilado']; ?>">
            |
            <label class="form-check-label" for="seguro">Seguro</label>
            <input class="form-check-input" id="seguro" name="seguro" type="checkbox" value="<?php echo $results[0]['seguro']; ?>">
            |
            <label class="form-check-label" for="leasing">Leasing</label>
            <input class="form-check-input" id="leasing" name="checkbox" type="checkbox" value="<?php echo $results[0]['leasing']; ?>">
        </div>
    <?php
    } else {
    ?>
        <div class="row mb-3">
            <div class="col-md-6">
                <div class="form-floating mb-3 mb-md-0">
                    <input class="form-control" id="proveedor" name="proveedor" type="text" placeholder="proveedor" value="no asignado" disabled />
                    <label for="proveedor">Proveedor</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating">
                    <input class="form-control" id="referencia_proveedor" name="referencia_proveedor" type="text" placeholder="referencia_proveedor" value="no asignado" disabled />
                    <label for="referencia-proveedor">Referencia de proveedor</label>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <div class="form-floating mb-3 mb-md-0">
                    <input class="form-control" id="modelo" name="modelo" type="text" placeholder="modelo" value="no asignado" disabled />
                    <label for="modelo">Modelo</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating">
                    <input class="form-control" id="numero_serie" name="numero_serie" type="text" placeholder="numero_serie" value="no asignado" disabled />
                    <label for="Usado por:">Numero de serie</label>
                </div>
            </div>
        </div>
        <div class="form-floating">
            <input class="form-control" id="fecha_efectiva" name="fecha_efectiva" type="text" placeholder="fecha_efectiva" value="no asignado" disabled />
            <label for="fecha-efectiva">Fecha efectiva</label>
        </div>
        <br><br>
        <div class="checkboxes">
            <label class="form-check-label" for="alquilado">Alquilado</label>
            <input class="form-check-input" id="alquilado" name="alquilado" type="checkbox" value="no asignado">
            |
            <label class="form-check-label" for="seguro">Seguro</label>
            <input class="form-check-input" id="seguro" name="seguro" type="checkbox" value="no asignado">
            |
            <label class="form-check-label" for="leasing">Leasing</label>
            <input class="form-check-input" id="leasing" name="checkbox" type="checkbox" value="no asignado">
        </div>
    <?php
    }
    ?>
</form>