<?php
// Incluir el archivo de conexión
require "../../modelo/conexion.php";
require "header-admin.php";

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Preparar y ejecutar la consulta SQL
    $stmt = $pdo->query("SELECT * FROM usuario");
    $stmt->execute();

    // Obtener los resultados
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
<br>
<h1 class="h1">GENERADOR DE FIRMA</h1>
<br>
<div class="w3-center form-align-top w3-animate-bottom ">
    <div>
        <!-- nombre y apellido -->
        <div class="form-floating mb-3 mb-md-0">
            <input class="form-control" data-toggle="tooltip" title="Ingresa tu nombre y apellido" type="text" name="nombre" id="nombre" placeholder="Nombre y apellido" value="<?php echo $results[0]['nombre_completo']; ?>" required>
            <label for="Nombre y Apellido">Nombre y Apellido</label>
        </div>
        <br>
        <!-- sede -->
        <div class="form-floating mb-3 mb-md-0">
            <select class="form-select" type="text" name="loc" id="loc" placeholder="Selecciona tu sede" data-toggle="tooltip" title="Selecciona tu sede, (vacío para roles Staff)">
                <option value=""></option>
                <option value="Buenos Aires, Argentina">Argentina - Buenos Aires</option>
                <option value="Rosario, Argentina">Argentina - Rosario</option>
                <option value="Medellin, Colombia">Colombia - Medellín</option>
                <option value="Montevideo, Uruguay">Uruguay - Montevideo</option>
            </select>
            <label for="Sede">Sede</label>
        </div>
        <br>
        <!-- numero de teléfono -->
        <div class="form-floating mb-3 mb-md-0">
            <input class="form-control" type="number" name="num_cel" id="num_cel" placeholder="Ingresa tu número de teléfono" data-toggle="tooltip" title="Ingresa tu número de teléfono" value="<?php echo $results[0]['telefono']; ?>">
            <label for="Telefono">Teléfono</label>
        </div>
        <br>
        <!-- correo -->
        <div class="form-floating mb-3 mb-md-0">
            <input class="form-control" type="text" name="mail" id="mail" placeholder="correo" data-toggle="tooltip" title="Ingresa tu correo de Arbusta" value="<?php echo $results[0]['correo']; ?>" required>
            <label for="Correo">Correo</label>
        </div>
        <br>
        <!-- rol de trabajo -->
        <div class="form-floating mb-3 mb-md-0">
            <input class="form-control" data-toggle="tooltip" title="Ingresa tu puesto / rol" type="text" name="puesto" id="puesto" placeholder="* Ingresa tu puesto / rol" required>
            <label for="Puesto / Rol de trabajo">Puesto / Rol de trabajo</label>
        </div>
        <br>
        <!-- boton de generar de firma -->
        <div class="form-floating mb-3 mb-md-0" style="height:50px">
            <button class="btn btn-primary" name="generar" id="generar" onclick="ejecutar();">Generar firma</button>
        </div>
        <br>
        <!-- Div para mostrar la firma generada -->
        <div id="firma" class="firma"></div>
    </div>
</div>
<?php
require "footer-scripts.php";
?>
</body>

</html>