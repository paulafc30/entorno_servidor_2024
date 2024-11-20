<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
        error_reporting( E_ALL );
        ini_set("display_errors", 1 );  

        function depurar($entrada) : string{   
            $salida = htmlspecialchars($entrada);
            $salida = trim($salida); 
            $salida = stripslashes($salida); 
            $salida = preg_replace('!\s!', ' ', $salida); 
            return $salida;
        }
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
            $tmp_titulo = depurar($_POST["titulo"]);
            $tmp_paginas = depurar($_POST["paginas"]);
            //$tmp_generos = $_POST["generos"];
            $tmp_secuela = depurar($_POST["secuela"]);
            $tmp_fecha = depurar($_POST["fecha"]);
            $tmp_sinopsis = depurar($_POST["sinopsis"]);

            if($tmp_titulo == '') {
                $err_titulo = "El titulo es obligatorio";
            } else {
                if(strlen($tmp_titulo) < 1 || strlen($tmp_titulo) > 40) {
                    $err_titulo = "Son máximo 40 caracteres";
                } else {
                    $patron = "/^[a-zA-Z]{1}[a-zA-Z0-9 áéíóúÁÉÍÓÚÑñ.;,]*$/";
                    if(!preg_match($patron, $tmp_titulo)) {
                        $err_titulo = "Debe empezar por una letra y solo puede contener letras (con o sin tilde y ñ), espacios en blanco, numeros, comas, punto y comas";
                    } else {
                        $titulo = $tmp_titulo;
                    }     
                }
            }

            if($tmp_paginas == ''){
                $err_paginas = "El numero de paginas es obligatorio";
            }else{
                if(!filter_var($tmp_paginas, FILTER_VALIDATE_INT)){
                    $err_paginas = "Tiene que ser un numero";
                }else{     
                    if ($tmp_paginas < 10 || $tmp_paginas > 9999) {
                        $err_paginas = "Tiene que ser un numero entre 10 y 9999";
                    }else{
                        $paginas = $tmp_paginas;
                    }  
                }
            }

            /*if (isset($_POST['generos'])) { 
                $tmp_generos = depurar($_POST['generos']); 

            } else { 
                $tmp_generos = "";
            }

            if($tmp_generos == ''){
                $err_generos = "El genero es obligatorio";
            }else{
                $generos_validos = ["Fantasia", "Ciencia_Ficcion", "Romance", "Drama"];
                if(!in_array($tmp_generos, $generos_validos)){
                    $err_generos = "El genero no es valido";
                }else{
                    $generos = $tmp_generos;
                }
            }*/


            if (isset($_POST['secuela'])) { 
                $tmp_secuela = depurar($_POST['secuela']); 
            } else { 
                $tmp_secuela = "";
            }
    
            if($tmp_secuela == ''){
                $tmp_secuela = "no";
            }else{
                $secuela_validas = [];
                $secuela_validas = ["si", "no"];
                if(!in_array($tmp_secuela, $secuela_validas)){
                    $err_secuela = "La secuela no es valida";
                }else{
                    $secuela = $tmp_secuela;
                }
            }


            if(isset($_POST['fecha'])) {
                $tmp_fecha = depurar($_POST['fecha']); 
            } else {
                $patron = "/^[0-9]{4}\-[0-9]{2}\-[0-9]{2}$/";
                if(!preg_match($patron, $tmp_fecha)) {
                    $err_fecha = "Formato de fecha incorrecto";
                } else {
                    
                    list($anno_max,$mes_max,$dia_max) = explode('-',$fecha_max);
                    list($anno,$mes,$dia) = explode('-',$tmp_fecha);

                    if($anno < 1800) {
                        $err_fecha = "No puede ser Anterior a 1800";
                    } else {
                        $anno_actual = date("Y");
                        $mes_actual = date("m");
                        $dia_actual = date("d");

                        if($anno - $anno_actual < 5){
                            $fecha = $tmp_fecha;
                        }elseif($anno - $anno_actual > 5){
                            $err_fecha = "La fecha debe ser anterior a 5 años";
                        }elseif($anno - $anno_actual == 5){
                            if($mes - $mes_actual < 0){
                                $fecha = $tmp_fecha;
                            }elseif($mes - $mes_actual > 0){
                                $err_fecha = "La fecha debe ser anterior a dentro de 5 años";
                            }elseif($mes - $mes_actual == 0){
                                if($dia - $dia_actual > 0){
                                    $fecha = $tmp_fecha;
                                }elseif($dia - $dia_actual > 0){
                                    $err_fecha = "La fecha debe ser anterior a dentro de 5 años";
                                }
                            }
                        }
                    }
                } 
            }


            if (isset($_POST['sinopsis'])) { 
                $tmp_sinopsis = depurar($_POST['sinopsis']); 
            } else { 
                if(strlen($tmp_sinopsis) < 1 || strlen($tmp_sinopsis) > 200) {
                    $err_sinopsis = "Son máximo 200 caracteres";
                } else {
                    $patron = "/^[a-zA-Z áéíóúÁÉÍÓÚÑñ]*$/";
                    if(!preg_match($patron, $tmp_sinopsis)) {
                        $err_sinopsis = "Debe empezar por una letra y solo puede contener letras (con o sin tilde y ñ), espacios en blanco, numeros, comas, punto y comas";
                    } else {
                        $sinopsis = $tmp_sinopsis;
                    }     
                }
            }
            
        }
    ?>
    <div class="container">
        <h1>Formulario libros</h1>
        <form class="col-4" action="" method="post">
            <div class="mb-3">
                <label class="form-label">Titulo: </label>
                <input class="form-control" type="text" name="titulo">
                <?php if(isset($err_titulo)) echo "<span class='error'>$err_titulo</span>" ?>
            </div>  

            <div class="mb-3">
                <label class="form-label">Paginas: </label>
                <input class="form-control" type="text" name="paginas">
                <?php if(isset($err_paginas)) echo "<span class='error'>$err_paginas</span>" ?>
            </div>

            <div class="mb-3">
            <label>Genero: </label>
                <div class="form-check">
                    <input type="radio" name="generos" value="Fantasia">
                    <label>Fantasia</label>
                </div>
                <div class="form-check">
                    <input type="radio" name="generos" value="Ciencia_Ficcion">
                    <label>Ciencia_Ficcion</label>
                </div>
                <div class="form-check">
                    <input type="radio" name="generos" value="Romance">
                    <label>Romance</label>
                </div>
                <div class="form-check">
                    <input type="radio" name="generos" value="Drama">
                    <label>Drama</label>
                </div>
                <?php if(isset($err_generos)) echo "<span class='error'>$err_generos</span>" ?>
            </div>

            <div class="mb-3">
                <label class="form-label">¿Tiene secuela?: </label>
                <select class="form-select" aria-label="Default select example" name="secuela">
                    <option value="no">No</option>
                    <option value="si">Si</option>  
                </select>
                <?php if(isset($err_secuela)) echo "<span class='error'>$err_secuela</span>" ?>
            </div>

            <div class="mb-3">
                <label class="form-label">Fecha de publicación: </label>
                <input class="form-control" type="text" name="fecha">
                <?php if(isset($err_fecha)) echo "<span class='error'>$err_fecha</span>" ?>
            </div>

            <div class="mb-3">
                <label class="form-label">Sinopsis</label>
                <input type="textarea" name="sinopsis">
                <?php if(isset($err_sinopsis)) echo "<span class='error'>$err_sinopsis</span>" ?>
            </div>

            <div class="mb-3">
                <input class="btn btn-primary" type="submit" value="Enviar">
            </div>
        </form>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>