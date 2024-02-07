<?php
require "../../modelo/conexion.php";
session_start();

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Preparar y ejecutar la consulta SQL
    $stmt = $pdo->query("SELECT nombre_completo, correo, telefono FROM usuario WHERE id_usuario = " . $_SESSION["id_usuario"]);
    $stmt->execute();

    // Obtener los resultados
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Firma Arbusta</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script type="text/javascript" src="./firmail.js"></script>
    <script>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</head>

<body>
    <br>
    <h1 class=".h1">GENERADOR DE FIRMA</h1>
    <br>
    <div class="w3-center form-align-top w3-animate-bottom ">
        <div>
            <div class="form-floating mb-3 mb-md-0">
                <input class="form-control" data-toggle="tooltip" title="Ingresa tu nombre y apellido" type="text" name="nombre" id="nombre" placeholder="Nombre y apellido" value="<?php echo $results[0]['nombre_completo']; ?>" required>
                <label for="Nombre y Apellido">Nombre y Apellido</label>
            </div>
            <br>
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
            <div class="form-floating mb-3 mb-md-0">
                <input class="form-control" type="number" name="num_cel" id="num_cel" placeholder="Ingresa tu número de telefono" data-toggle="tooltip" title="Ingresa tu número de telefono" value="<?php echo $results[0]['telefono']; ?>">
                <label for="Telefono">Telefono</label>
            </div>
            <br>
            <div class="form-floating mb-3 mb-md-0">
                <input class="form-control" type="text" name="mail" id="mail" placeholder="correo" data-toggle="tooltip" title="Ingresa tu correo de arbusta" value="<?php echo $results[0]['correo']; ?>" required>
                <label for="Correo">Correo</label>
            </div>
            <br>
            <div class="form-floating mb-3 mb-md-0">
                <input class="form-control" data-toggle="tooltip" title="Ingresa tu puesto / rol" type="text" name="puesto" id="puesto" placeholder="* Ingresa tu puesto / rol" required>
                <label for="Puesto / Rol de trabajo">Puesto / Rol de trabajo</label>
            </div>
            <br>
            <div class="form-floating mb-3 mb-md-0" style="height:50px">
                <button class="btn btn-primary" name="generar" id="generar" onclick="ejecutar();">Generar firma</button>
            </div>
            <br>
            <div id="firma" class="firma"></div>
        </div>
    </div>
</body>

</html>