<?php
require "../../modelo/conexion.php";
session_start();

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Preparar y ejecutar la consulta SQL
    $stmt = $pdo->query("SELECT * FROM equipo INNER JOIN usuario ON equipo.id_usuario = usuario.id_usuario
    WHERE equipo.id_usuario = ". $_SESSION["id_usuario"]);
    $stmt->execute();

    // Obtener los resultados
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

?>
<br><br>
<form action="">
    <h1 class=".h1">EQUIPO <img src="../assets/img/undraw_warning_re_eoyh.svg" alt=""></h1>
    <br>
    <?php
    if ($results) {
    ?>
    <div class="row mb-3">
        <div class="col-md-6">
            <div class="form-floating mb-3 mb-md-0">
                <input class="form-control" id="equipo" name="equipo" type="text" placeholder="equipo" value="<?php echo $results[0]['equipo']; ?>" disabled />
                <label for="equipo">Equipo</label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-floating">
            <input class="form-control" id="categoria_equipo" name="categoria_equipo" type="text" placeholder="categoria_equipo" value="<?php echo $results[0]['categoria_equipo']; ?>" disabled/>
                <label for="apellido">Categoría del equipo</label>
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-6">
            <div class="form-floating mb-3 mb-md-0">
                <input class="form-control" id="compania" name="compania" type="text" placeholder="compania" value="<?php echo $results[0]['compania']; ?>" disabled />
                <label for="Compañía">Compañía</label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-floating">
                <input class="form-control" id="usado_por" name="usado_por" type="text" placeholder="usado_por" value="<?php echo $results[0]['usado_por']; ?>" disabled />
                <label for="Usado por:">Usado por:</label>
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-6">
            <div class="form-floating mb-3 mb-md-0">
                <input class="form-control" id="empleado" name="empleado" type="text" placeholder="empleado" value="<?php echo $results[0]['nombre_completo']; ?>" disabled />
                <label for="mensaje">Empleado</label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-floating">
                <input class="form-control" id="ubicacion_uso" name="ubicacion_uso" type="text" placeholder="ubicacion_uso" value="<?php echo $results[0]['ubicacion_uso']; ?>" disabled />
                <label for="Ubicacion de uso">Ubicación de uso</label>
            </div>
        </div>
    </div>
    <div class="form-floating">
        <textarea name="descripcion" id="descripcion" cols="30" rows="10" class="form-control" placeholder="Descripcion" style="height: 200px;" disabled><?php echo $results[0]['descripcion']; ?></textarea>
        <label for="Descripcion">Descripción</label>
    </div>
    <?php
    }else{
    ?>
        <div class="row mb-3">
        <div class="col-md-6">
            <div class="form-floating mb-3 mb-md-0">
                <input class="form-control" id="equipo" name="equipo" type="text" placeholder="equipo" value="no asignado" disabled />
                <label for="equipo">Equipo</label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-floating">
            <input class="form-control" id="categoria_equipo" name="categoria_equipo" type="text" placeholder="categoria_equipo" value="no asignado" disabled/>
                <label for="apellido">Categoría del equipo</label>
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-6">
            <div class="form-floating mb-3 mb-md-0">
                <input class="form-control" id="compania" name="compania" type="text" placeholder="compania" value="no asignado" disabled />
                <label for="Compañía">Compañía</label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-floating">
                <input class="form-control" id="usado_por" name="usado_por" type="text" placeholder="usado_por" value="no asignado" disabled />
                <label for="Usado por:">Usado por:</label>
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-6">
            <div class="form-floating mb-3 mb-md-0">
                <input class="form-control" id="empleado" name="empleado" type="text" placeholder="empleado" value="no asignado" disabled />
                <label for="mensaje">Empleado</label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-floating">
                <input class="form-control" id="ubicacion_uso" name="ubicacion_uso" type="text" placeholder="ubicacion_uso" value="no asignado" disabled />
                <label for="Ubicacion de uso">Ubicación de uso</label>
            </div>
        </div>
    </div>
    <?php
    }
    ?>
</form>