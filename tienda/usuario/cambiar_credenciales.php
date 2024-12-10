<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambiar Credenciales</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php

        require('../util/conexion.php');
        require('../util/depurar.php');

        session_start();

        if (!isset($_SESSION["usuario"])) {
            header("Location: ../usuario/iniciar_sesion.php");
            exit;
        }

        $usuario = $_SESSION["usuario"];
    ?>
     <style>
        .error {
            color: red;
        }
    </style>
</head>
<body>
<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $tmp_contrasena_actual = $_POST["contrasena_actual"];
        $tmp_contrasena_nueva = depurar($_POST["contrasena_nueva"]);

        $contrasena_actual_valida = true;
        $contrasena_nueva_valida = true;

        if ($tmp_contrasena_actual == '') {
            $err_contrasena_actual = "La contraseña actual es obligatoria";
            $contrasena_actual_valida = false;
        } else {
            $sql = "SELECT contrasena FROM usuarios WHERE usuario = '$usuario'";
            $resultado = $_conexion->query($sql);

            if ($resultado->num_rows > 0) {
                $datos_usuario = $resultado->fetch_assoc();
                if (!password_verify($tmp_contrasena_actual, $datos_usuario["contrasena"])) {
                    $err_contrasena_actual = "La contraseña actual es incorrecta";
                    $contrasena_actual_valida = false;
                }
            } else {
                $err_contrasena_actual = "No se ha encontrado la contraseña del usuario";
                $contrasena_actual_valida = false;
            }
        }
 
        if ($tmp_contrasena_nueva == '') {
            $err_contrasena_nueva = "La nueva contraseña es obligatoria";
            $contrasena_nueva_valida = false;
        } else {
            $patron = "/^(?=(.*[a-z]))(?=(.*[A-Z]))(?=(.*\d)).{8,15}$/"; 
            if (!preg_match($patron, $tmp_contrasena_nueva)) {
                $err_contrasena_nueva = "La contraseña debe tener entre 8 y 15 caracteres, incluir letras en mayúsculas, minúsculas, números y puede tener caracteres especiales";
                $contrasena_nueva_valida = false;
            } else {
                $contrasena_nueva_valida = true;
            }
        }

        if ($contrasena_actual_valida && $contrasena_nueva_valida) {
            $nueva_contrasena = password_hash($tmp_contrasena_nueva, PASSWORD_BCRYPT);

            $sql_update = "UPDATE usuarios SET contrasena = '$nueva_contrasena' WHERE usuario = '$usuario'";

            if ($_conexion->query($sql_update)) {
                $err_contrasena_nueva = "Contraseña actualizada correctamente";
            } else {
                $err_contrasena_nueva = "No se ha podido actualizar la contraseña";
            }
        }
    }
?>      


    <div class="container">
        <h1>Cambiar Credenciales</h1>

        <form class="col-6" action="" method="post">
            <div class="mb-3">
                <label class="form-label">Contraseña Actual</label>
                <input class="form-control" type="password" name="contrasena_actual">
                <?php if (isset($err_contrasena_actual)) echo "<span class='error'>$err_contrasena_actual</span>"; ?>
            </div>

            <div class="mb-3">
                <label class="form-label">Nueva Contraseña</label>
                <input class="form-control" type="password" name="contrasena_nueva">
                <?php if (isset($err_contrasena_nueva)) echo "<span class='error'>$err_contrasena_nueva</span>"; ?>
            </div>

            <div class="mb-3">
                <input class="btn btn-primary" type="submit" value="Actualizar Contraseña">
            </div>
        </form>

        <a class="btn btn-secondary" href="../index.php">Volver al inicio</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
