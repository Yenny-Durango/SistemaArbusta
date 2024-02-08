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
    <h1 class="h1">DATOS TÉCNICOS</h1>
    <br>
    <?php
    if ($results) {
    ?>
        <div class="row mb-3">
            <!-- valoración -->
            <div class="col-md-6">
                <div class="form-floating mb-3 mb-md-0">
                    <input class="form-control" id="valoracion" name="valoracion" type="text" placeholder="valoracion" value="<?php echo $results[0]['valoracion']; ?>" disabled />
                    <label for="valoración">Valoración</label>
                </div>
            </div>
            <!-- procesador -->
            <div class="col-md-6">
                <div class="form-floating">
                    <input class="form-control" id="procesador" name="procesador" type="text" placeholder="procesador" value="<?php echo $results[0]['procesador']; ?>" disabled />
                    <label for="Procesador">Procesador</label>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <!-- ram -->
            <div class="col-md-6">
                <div class="form-floating mb-3 mb-md-0">
                    <input class="form-control" id="ram" name="ram" type="text" placeholder="ram" value="<?php echo $results[0]['ram']; ?>" disabled />
                    <label for="RAM">RAM</label>
                </div>
            </div>
            <!-- almacenamiento -->
            <div class="col-md-6">
                <div class="form-floating">
                    <input class="form-control" id="almacenamiento" name="almacenamiento" type="text" placeholder="almacenamiento" value="<?php echo $results[0]['almacenamiento']; ?>" disabled />
                    <label for="Almacenamiento">Almacenamiento</label>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <!-- mac address -->
            <div class="col-md-6">
                <div class="form-floating mb-3 mb-md-0">
                    <input class="form-control" id="mac_address" name="mac_address" type="text" placeholder="mac_address" value="<?php echo $results[0]['mac_address']; ?>" disabled />
                    <label for="mac_address">MAC address</label>
                </div>
            </div>
            <!-- bateria -->
            <div class="col-md-6">
                <div class="form-floating">
                    <input class="form-control" id="bateria" name="bateria" type="text" placeholder="bateria" value="<?php echo $results[0]['bateria']; ?>" disabled />
                    <label for="Batería">Batería</label>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <!-- adaptador -->
            <div class="col-md-6">
                <div class="form-floating mb-3 mb-md-0">
                    <input class="form-control" id="adaptador" name="adaptador" type="text" placeholder="adaptador" value="<?php echo $results[0]['adaptador']; ?>" disabled />
                    <label for="Adaptador">Adaptador</label>
                </div>
            </div>
            <!-- sistema operativo -->
            <div class="col-md-6">
                <div class="form-floating">
                    <input class="form-control" id="sistema_operativo" name="sistema_operativo" type="text" placeholder="sistema_operativo" value="<?php echo $results[0]['sistema_operativo']; ?>" disabled />
                    <label for="sistema_operativo">Sistema operativo (SO)</label>
                </div>
            </div>
        </div>
        <!-- version del sistema operativo -->
        <div class="form-floating">
            <input class="form-control" id="version_so" name="version_so" type="text" placeholder="version_so" value="<?php echo $results[0]['version_so']; ?>" disabled />
            <label for="so_version">SO Version</label>
        </div>
    <?php
    } else {
    ?>
        <div class="row mb-3">
            <div class="col-md-6">
                <div class="form-floating mb-3 mb-md-0">
                    <input class="form-control" id="valoracion" name="valoracion" type="text" placeholder="valoracion" value="no asignado" disabled />
                    <label for="valoración">Valoración</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating">
                    <input class="form-control" id="procesador" name="procesador" type="text" placeholder="procesador" value="no asignado" disabled />
                    <label for="Procesador">Procesador</label>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <div class="form-floating mb-3 mb-md-0">
                    <input class="form-control" id="ram" name="ram" type="text" placeholder="ram" value="no asignado" disabled />
                    <label for="RAM">RAM</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating">
                    <input class="form-control" id="almacenamiento" name="almacenamiento" type="text" placeholder="almacenamiento" value="no asignado" disabled />
                    <label for="Almacenamiento">Almacenamiento</label>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <div class="form-floating mb-3 mb-md-0">
                    <input class="form-control" id="mac_address" name="mac_address" type="text" placeholder="mac_address" value="no asignado" disabled />
                    <label for="mac_address">MAC address</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating">
                    <input class="form-control" id="bateria" name="bateria" type="text" placeholder="bateria" value="no asignado" disabled />
                    <label for="Batería">Batería</label>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <div class="form-floating mb-3 mb-md-0">
                    <input class="form-control" id="adaptador" name="adaptador" type="text" placeholder="adaptador" value="no asignado" disabled />
                    <label for="Adaptador">Adaptador</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating">
                    <input class="form-control" id="sistema_operativo" name="sistema_operativo" type="text" placeholder="sistema_operativo" value="no asignado" disabled />
                    <label for="sistema_operativo">Sistema operativo (SO)</label>
                </div>
            </div>
        </div>
        <div class="form-floating">
            <input class="form-control" id="version_so" name="version_so" type="text" placeholder="version_so" value="no asignado" disabled />
            <label for="so_version">SO Version</label>
        </div>
    <?php
    }
    ?>
</form>