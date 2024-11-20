<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
<body>
<!--
    Equipos de la liga

    - Nombre (letra con tilde, ñ, espacios en blanco y punto)
    - Inicial (3 letras)
    - Liga (select con las opciones: Liga EA Sports, Liga Hypermotion, Liga Primera RFEF)
    - Cuidad (letra con tilde, ñ, ç y espacios en blanco)
    - Tiene titulo de liga (select si o no)
    - Fecha de fundacion (entre hoy y el 18 de diciembre de 1889)
    - Numero de juegadores (entre 19 y 32)
    - 
-->
    <?php 
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $tmp_nombre = depurar($_POST["nombre"]);
        $tmp_inicial = depurar($_POST["inicial"]);
        $tmp_liga = depurar($_POST["liga"]);
        $tmp_ciudad = depurar($_POST["cuidad"]);
        //$tmp_titulo = depurar($_POST["titulo"]);
        $tmp_fecha_fundacion = depurar($_POST["fecha_fundacion"]);
        $tmp_numero_jugadores = depurar($_POST["numero_jugadores"]);

        if($tmp_nombre == ''){
            $err_titulo = "El titulo es un campo OBLIGATORIO";
        }else{
            if(strlen($tmp_titulo) < 3 || strlen($tmp_titulo) > 20) {
                $err_nombre = "El nombre debe tener entre 3 y 20 caracteres";
            } else {
                $patron = "/^[a-zA-ZáéíóúñÁÉÍÓÚÑ .]$/";
                if(!preg_match($patron, $tmp_nombre)) {
                    $err_nombre = "El nombre solo puede contener letras, puntos o espacio";
                } else {
                    $nombre = $tmp_nombre;
                } 
            } 
        }

        if($tmp_inicial == ''){
            $err_inicial = "La iniciales son obligatorias";
        }else{
            if(strlen($tmp_titulo) < 2 || strlen($tmp_titulo) > 4){
                $err_inicial = "Las iniciales deben contener obligatoriamente 3 letras";
            }else{
                $patron = "/^[a-zA-Z]+$/";
                if(!preg_match($patron, $tmp_inicial)){
                    $err_inicial = "Solo puede contener 3 letras";
                }else{
                    $inicial = $tmp_inicial;
                }
            }
        }

        if (isset($_POST['titulo'])) { 
            $tmp_titulo = depurar($_POST['titulo']); 
        } else { 
            $tmp_titulo = "";
        }

        if($tmp_titulo == ''){
            $err_titulo = "La titulo es obligatoria";
        }else{
            $titulo_validos = ["si", "no"];
            if(!in_array($tmp_titulo, $titulo_validos)){
                $err_titulo = "El titulo no es valido";
            }else{
                $titulo = $tmp_titulo;
            }
        }

        if($tmp_numero_jugadores == ''){
            $err_numero_jugadores = "EL numero es obligatorio";
            if(filter_var($tmp_numero_jugadores, FILTER_VALIDATE_INT) == FALSE){
                $err_numero_jugadores = "El numero de jugadores debe ser un numero";
            }else{
                if($tmp_numero_jugadores < 19 || $tmp_numero_jugadores > 32){
                    $err_numero_jugadores = "El numero de jugadores debe ser entre 19 y 32";
                }
            }
        }

    }
    
    ?>

    <form action="" method="post">
        <div>
            <label>Nombre: </label>
            <input type="text" name="nombre">
        </div>
        <div>
            <label>Inicial: </label>
            <input type="text" name="inicial">
        </div>
        <div>
            <label>Liga: </label>
            <select name="liga"> 
                <option value="LigaEASports">Liga EA Sports</option> 
                <option value="LigaHypermotion">Liga Hypermotion</option> 
                <option value="LigaPrimeraRFEF">Liga Primera RFEF</option> 
            </select>
        </div>
        <div>
            <label>Ciudad: </label>
            <input type="text" name="ciudad">
        </div>
        <div>
            <label>Titulo de Liga: </label>
            <select name="titulo"> 
                <option value="si">Si</option> 
                <option value="no">No</option> 
            </select>
        </div>
        <div>
            <label>Fecha de fundación</label>
            <input type="date" name="fecha_fundacion">
        </div>
        <div>
            <label>Numero de Juegadores</label>
            <input type="text" name="numero_jugadores">
        </div>
    </form>
</body>
</html>