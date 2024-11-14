<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo anime</title>
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
<!-- El formulario de los animes lo crearemos en un fichero llamado “nuevo_anime.php” y tendrá los siguientes campos:
titulo: Es obligatorio y tendrá como máximo 80 caracteres. Admite cualquier tipo de carácter.
nombre_estudio: Es obligatorio y se elegirá mediante un campo de tipo select. Para crear este select primero haremos un array unidimensional con nombres de estudios de anime (al menos 5, puedes coger los nombres de la base de datos). Los option del select se crearán de manera dinámica en un bucle recorriendo dicho array y creando un option por cada valor del mismo. 
anno_estreno: Es opcional y se elegirá mediante un campo de texto. Sólo aceptará valores numéricos entre 1960 y dentro de 5 años (inclusive). 
num_temporadas: Es obligatorio y será un valor numérico entre 1 y 99. -->
<body>
<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $tmp_titulo = depurar($_POST["titulo"]);
        $tmp_nombre = depurar($_POST["nombre"]);
        $tmp_anio = depurar($_POST["anio"]);
        $tmp_num_temporadas = depurar($_POST["num_temporadas"]);

        if($tmp_titulo == '') {
            $err_titulo = "El titulo es obligatorio";
        } else {
            if(strlen($tmp_titulo) < 1 || strlen($tmp_titulo) > 80) {
                $err_titulo = "Son máximo 80 caracteres";
            } else {
                $titulo = $tmp_titulo;
            }
        }

        if($tmp_nombre == ''){
            $err_nombre = "El nombre es obligatorio";
        }else{
            $nombre = $tmp_nombre;
        }

        if(isset($_POST['anio'])){
            $tmp_anio = depurar($_POST['anio']);
        }else{
            if(is_numeric($tmp_anio)){
                if($tmp_anio >= 1960 && $tmp_anio <= 2029){
                    $anio = $tmp_anio;
                }else{
                    $err_anio = "Tiene que ser un numero entre 1960 y 2029";
                }
            }else{
                $err_anio = "Tiene que ser un numero";
            }
        }

        if($tmp_num_temporadas == ''){
            $err_num_temporadas = "El número de temporadas es obligatorio";
        }else{
            if(is_numeric($tmp_num_temporadas)){
                if( $tmp_num_temporadas >= 1 &&  $tmp_num_temporadas <= 99){
                    $num_temporadas = $tmp_num_temporadas;
                }else{
                    $err_num_temporadas = "Tiene que ser un numero entre 1 y 99";
                }
            }else{
                $err_num_temporadas = "Tiene que ser un numero";
            }
        }
    }
?>

<div class="container">
        <h1>Formulario animes</h1>
        <form class="col-4" action="" method="post">
            <div class="mb-3">
                <label class="form-label">Titulo: </label>
                <input class="form-control" type="text" name="titulo">
                <?php if(isset($err_titulo)) echo "<span class='error'>$err_titulo</span>" ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Nombre Estudio: </label>
                <select class="form-select" aria-label="Default select example" name="nombre">
                    <!--<option selected>Open this select menu</option>-->
                    <?php 
                        $estudios = ["Kyoto Animation", "Diomedéa", "Studio Deen", "Mappa", "Studio Ghibli"];
                        foreach($estudios as $estudio){ ?>
                            <option value="<?php echo $estudio ?>"> <?php echo $estudio ?> </option>
                            
                    <?php  } ?>
                </select>
                <?php if(isset($err_nombre)) echo "<span class='error'>$err_nombre</span>" ?>
            </div>      
            <div class="mb-3">
                <label class="form-label">Año de estreno: </label>
                <input class="form-control" type="text" name="anio">
                <?php if(isset($err_anio)) echo "<span class='error'>$err_anio</span>" ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Numero de temporadas:  </label>
                <input class="form-control" type="text" name="num_temporadas">
                <?php if(isset($err_num_temporadas)) echo "<span class='error'>$err_num_temporadas</span>" ?>
            </div>
            <div class="mb-3">
                <input class="btn btn-primary" type="submit" value="Enviar">
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>