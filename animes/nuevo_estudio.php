<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo estudio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
        error_reporting( E_ALL );
        ini_set("display_errors", 1 );  
        //require('../05_funciones/depurar.php');
    ?>
    <style>
        .error {
            color: red;
        }
    </style>
</head>
<body>
    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $tmp_nombre_estudio = depurar($_POST["nombre_estudio"]);
            $tmp_ciudad = depurar($_POST["ciudad"]);

            // SI DA SYCTAX ERROR ES QUE ESTE SQL ESTA MAL
            $sql = "INSERT INTO animes (nombre_estudio, ciudad) 
                VALUES ('$nombre_estudio', '$ciudad')";

            $_conexion -> query($sql);
        }
    ?>
<div class="container">
        <h1>Formulario estudios</h1>
        <form class="col-4" action="" method="post">
            <div class="mb-3">
                <label class="form-label">Nombre estudio: </label>
                <input class="form-control" type="text" name="nombre_estudio">
                <?php if(isset($err_nombre_estudio)) echo "<span class='error'>$err_nombre_estudio</span>" ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Ciudad: </label>
                <input class="form-control" type="text" name="ciudad">
                <?php if(isset($err_ciudad)) echo "<span class='error'>$err_ciudad</span>" ?>
            </div>
            <div class="mb-3">
                <input class="btn btn-primary" type="submit" value="Enviar">
            </div>
        </form>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>