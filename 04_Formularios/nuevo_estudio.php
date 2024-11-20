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
        require('../05_funciones/depurar.php');
    ?>
    <style>
        .error {
            color: red;
        }
    </style>
</head>
<!--El formulario de los estudios lo crearemos en un fichero llamado “nuevo_estudio.php” y tendrá los siguientes campos:
nombre_estudio: Es obligatorio y solo podrá contener letras, números y espacios en blanco.
ciudad: Es obligatorio y solo podrá contener letras y espacios en blanco.-->
<body>
    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $tmp_nombre_estudio = depurar($_POST["nombre_estudio"]);
            $tmp_ciudad = depurar($_POST["ciudad"]);

            if($tmp_nombre_estudio == ''){
                $err_nombre_estudio = "El nombre es obligatorio";
            }else{
                $patron = "/^[a-zA-Z0-9 áéíóúÁÉÍÓÚÑñ]*$/";
                if(!preg_match($patron, $tmp_nombre_estudio)) {
                    $err_nombre_estudio = "Solo puede contener letras, números y espacios en blanco";
                } else {
                    $nombre_estudio = $tmp_nombre_estudio;
                }             
            }

            if($tmp_ciudad == ''){
                $err_ciudad = "La ciudad es obligatoria";
            }else{
                $patron = "/^[a-zA-Z áéíóúÁÉÍÓÚÑñ]*$/";
                if(!preg_match($patron, $tmp_ciudad)) {
                    $err_ciudad = "Solo puede contener letras y espacios en blanco";
                } else {
                    $ciudad = $tmp_ciudad;
                }             
            }
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