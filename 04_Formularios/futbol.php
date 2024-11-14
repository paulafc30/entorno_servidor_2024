<!--Malaga C.F
Equipos de la liga
- Nombre (letras con tilde, ñ, espacios en blanco y punto)
- Inicial (3 letras)
- Liga (select con las opciones. Liga EA Sports, Liga Hypermotion, Liga Primera RFEF)
- Ciudad (letras con tilde, ñ, ç y espacios en blanco)
- Tiene nombre liga (select con si o no)
- Fecha de fundacion (entre hoy y el 18 de diciembre de 1889)
- Numero de jugadores (entre 22 y 32)
-->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Futbol</title>
    <?php
        error_reporting( E_ALL );
        ini_set("display_errors", 1 );  
        require('../04_Formularios/depurar.php');
    ?>
    <style>
        .error {
            color: red;
        }
    </style>
</head>
<body>
    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $tmp_nombre = $_POST["nombre"];
            $tmp_inicial = $_POST["inicial"];
            $tmp_liga = $_POST["liga"];
            $tmp_ciudad = $_POST["ciudad"];
            $tmp_titulos = $_POST["titulos"];
            $tmp_fecha = $_POST["fecha"];
            $tmp_jugadores = $_POST["jugadores"];

            if($tmp_nombre == '') {
                $err_nombre = "El nombre es obligatorio";
            } else {
                $patron = "/^[a-zA-Z0-9_\-.+]+@([a-zA-Z0-9-]+.)+[a-zA-Z]+$/";
                if(!preg_match($patron, $tmp_correo)) {
                    $err_nombre = "El correo no es válido";
                } else {
                    $palabras_baneadas = ["caca","peo","recorcholis","caracoles","repampanos"];

                    $palabras_encontradas = "";
                    foreach($palabras_baneadas as $palabra_baneada) {
                        if(str_contains($tmp_correo,$palabra_baneada)) {
                            $palabras_encontradas = "$palabra_baneada, " . $palabras_encontradas;
                        }
                        if($palabras_encontradas != '') {
                            $err_correo = "No se permiten las palabras: $palabras_encontradas";
                        } else {
                            $correo = $tmp_correo;
                        }
                    }
                }
            }
        }
    ?>
    <div class="container">

        <h1>Formulario de futbol</h1>

        <form class="col-4" action="" method="post">
            <div class="mb-3">
                <label class="form-label">Nombre:</label>
                <input class="form-control" type="text" name="nombre">
                <?php if(isset($err_nombre)) echo "<span class='error'>$err_nombre</span>" ?>
            </div> <br>

            <div class="mb-3">
                <label class="form-label">Inicial:</label>
                <input class="form-control" type="text" name="inicial">
                <?php if(isset($err_inicial)) echo "<span class='error'>$err_inicial</span>" ?>
            </div> <br>

            <div class="mb-3">
                <label class="form-label">Liga:</label>
                <select name="liga">
                    <option value="ligaea">Liga EA Sports</option>
                    <option value="ligahyper">Liga Hypermotion</option>
                    <option value="ligaprimera">Liga Primera RFEF</option>
                </select>
                <?php if(isset($err_liga)) echo "<span class='error'>$err_liga</span>" ?>
            </div> <br>

            <div class="mb-3">
                <label class="form-label">Ciudad:</label>
                <input class="form-control" type="text" name="ciudad">
                <?php if(isset($err_ciudad)) echo "<span class='error'>$err_ciudad</span>" ?>
            </div> <br>

            <div class="mb-3">
                <label class="form-label">Tiene nombres?:</label>
                <select name="nombres_liga">
                    <option value="si">Si</option>
                    <option value="no">No</option>
                </select>
                <?php if(isset($err_titulos)) echo "<span class='error'>$err_titulos</span>" ?>
            </div> <br>

            <div class="mb-3">
                <label class="form-label">Fecha de fundacion:</label>
                <input class="form-control" type="date" name="fecha">
                <?php if(isset($err_fecha)) echo "<span class='error'>$err_fecha</span>" ?>
            </div> <br>

            <div class="mb-3">
                <label class="form-label">Numero jugadores:</label>
                <input class="form-control" type="text" name="jugadores">
                <?php if(isset($err_jugadores)) echo "<span class='error'>$err_jugadores</span>" ?>
            </div> <br>

            <div class="mb-3">
                <input class="btn btn-primary" type="submit" value="Enviar">
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>