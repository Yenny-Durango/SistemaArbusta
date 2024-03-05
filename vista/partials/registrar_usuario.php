<?php
require "header-admin.php";
?>
<br>
<form method="POST" action="">
    <!-- Título del formulario -->
    <h1 class=".h1">REGISTRAR USUARIO</h1>
    <br>

    <!-- Sección de datos personales -->
    <div class="row mb-3">
        <div class="col-md-6">
            <!-- Campo de nombres -->
            <div class="form-floating mb-3 mb-md-0">
                <input class="form-control" id="nombre" name="nombre" type="text" placeholder="nombre" onkeyup="ValidarNombreUsuarioR(this)" />
                <label for="nombre">Nombres</label>
            </div>
            <!-- Mensaje de error para el campo de nombres -->
            <span id="nombreError" class="alert alert-danger" hidden></span>
        </div>
        <div class="col-md-6">
            <!-- Campo de apellidos -->
            <div class="form-floating">
                <input class="form-control" id="apellido" name="apellido" type="text" placeholder="apellido" onkeyup="ValidarApellidoUsuarioR(this)" />
                <label for="apellido">Apellido</label>
            </div>
            <!-- Mensaje de error para el campo de apellidos -->
            <span id="apellidoError" class="alert alert-danger" hidden></span>
        </div>
    </div>

    <!-- Sección de información de contacto -->
    <div class="row mb-3">
        <div class="col-md-6">
            <!-- Campo de correo electrónico -->
            <div class="form-floating mb-3 mb-md-0">
                <input class="form-control" id="correo" name="correo" type="email" placeholder="name@arbusta.net" value="@arbusta.net" onkeyup="ValidarCorreoUsuarioR(this)" />
                <label for="correo">Correo</label>
            </div>
            <!-- Mensaje de error para el campo de correo electrónico -->
            <span id="correoError" class="alert alert-danger" hidden></span>
        </div>
        <div class="col-md-6">
            <!-- Campo de número de teléfono -->
            <div class="form-floating mb-3 mb-md-0">
                <input class="form-control" id="telefono" name="telefono" type="number" placeholder="telefono" onkeyup="ValidarTelefonoUsuarioR(this)" />
                <label for="Teléfono">Teléfono</label>
            </div>
            <!-- Mensaje de error para el campo de número de teléfono -->
            <span id="telefonoError" class="alert alert-danger" hidden></span>
        </div>
    </div>

    <!-- Sección de contraseña -->
    <div class="row mb-3">
        <div class="col-md-6">
            <!-- Campo de contraseña -->
            <div class="form-floating mb-3 mb-md-0">
                <input class="form-control" id="contrasena" name="contrasena" type="password" placeholder="contrasena" onkeyup="ValidarContrasenaUsuarioR(this)" />
                <label for="Contraseña">Contraseña</label>
            </div>
            <!-- Mensaje de error para el campo de contraseña -->
            <span id="contrasenaError" class="alert alert-danger" hidden></span>
        </div>
        <div class="col-md-6">
            <!-- Campo de confirmación de contraseña -->
            <div class="form-floating mb-3 mb-md-0">
                <input class="form-control" id="confirmar_contrasena" name="confirmar_contrasena" type="password" placeholder="confirmarcontrasena" onkeyup="ValidarConfimarContrasenaUsuario(this)" />
                <label for="Confirmar contraseña">Confirmar contraseña</label>
            </div>
            <!-- Mensaje de error para el campo de confirmación de contraseña -->
            <span id="confirmarContrasenaError" class="alert alert-danger" hidden></span>
        </div>
       <hr>
        <div class="form-floating">
            <div class="form-floating mb-3 mb-md-0">
                <select name="tipo_usuario" id="tipo_usuario" class="form-select">
                    <!-- Opciones de categoría del equipo -->
                    <option value="1">Administrador</option>
                    <option value="0">Usuario</option>
                </select>
                <label for="Tipo de usuario">Tipo de usuario</label>
            </div>
        </div>
    </div>

    <!-- Botón para mostrar/ocultar la contraseña -->
    <span id="verContrasena" class="text-primary" title="Ver contraseña" onclick="mostrarContrasena()">Ver contraseña</span>

    <!-- Botón de envío del formulario -->
    <div class="mt-4 mb-0">
        <div class="d-grid"><button type="submit" id="submitButton" value="guardar" class="btn btn-primary btn-block" onclick="RegistrarUsuarioAdmin()" disabled>Registrar usuario</button></div>
    </div>
</form>

<?php
require "footer-scripts.php";
?>