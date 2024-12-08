<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php 
        error_reporting( E_ALL );
        ini_set("display_errors", 1 );  
        
        require ('../util/conexion.php'); 
        require ('../util/depurar.php');
    ?>
    <style>
        .error {
            color: red;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Registro</h1>
        <?php
        if($_SERVER["REQUEST_METHOD"]== "POST"){
            $usuario = depurar($_POST["usuario"]);
            $contrasena = depurar($_POST["contrasena"]); 
            
            $usuario_valido = true;
            $contrasena_valida = true;
            
            if ($usuario == '') {
                $err_usuario = "El usuario es obligatorio";
                $usuario_valido = false;
            }else{
                $patron = "/^[a-zA-Z0-9]{3,15}$/";
                if(!preg_match($patron, $usuario)){
                    $err_usuario = "El usuario debe tener entre 3 y 15 caracteres y solo puede contener letras y números";
                    $usuario_valido = false;
                }else{
                    $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
                    $resultado = $_conexion->query($sql);
                    if ($resultado && $resultado->num_rows > 0) {
                        $err_usuario = "El usuario ya está registrado, tienes que iniciar sesión";
                        $usuario_valido = false;
                    }else{
                        $usuario_valido = true;
                    }
                }
            }
            
            if ($contrasena == '') {
                $err_contrasena = "La contraseña es obligatoria";
                $contrasena_valida = false;
            }else{
                $patron = "/^(?=(.*[a-z]))(?=(.*[A-Z]))(?=(.*\d)).{8,15}$/";
                if(!preg_match($patron, $contrasena)){
                    $err_contrasena = "La contraseña debe tener entre 8 y 15 caracteres, incluir letras en mayúsculas, minúsculas, números y puede tener un carácteres especiales";
                    $contrasena_valida = false;
                }else{
                    $contrasena_valida = true;
                }
            }


            if($usuario_valido && $contrasena_valida) {

                $contrasena_cifrada = password_hash($contrasena, PASSWORD_DEFAULT);
                // registrado?
                // si

                $sql_insertar = "INSERT INTO usuarios (usuario, contrasena) VALUES ('$usuario', '$contrasena_cifrada')";
                 
                if ($_conexion->query($sql_insertar))  {
                    header("location: iniciar_sesion.php");
                    exit;
                } else {
                    $err_contrasena = "No se ha podido registrar el usuario";
                }
                
            }
         
        }
    ?>
        <form class="col-6" action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Usuario</label>
                <input class="form-control" type="text" name="usuario">
                <?php if(isset($err_usuario)) echo "<span class='error'>$err_usuario</span>" ?>
            </div>

            <div class="mb-3">
                <label class="form-label">Contraseña</label>
                <input class="form-control" type="password" name="contrasena">
                <?php if(isset($err_contrasena)) echo "<span class='error'>$err_contrasena</span>" ?>
            </div>

            <div class="mb-3">
                <input class="btn btn-primary" type="submit" value="Registrarse"><br><br><br>
                <h5>O si ya tienes cuenta, inicia sesión</h5>
                <a class="btn btn-secondary" href="iniciar_sesion.php">Iniciar sesión</a><br><br>
                
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>