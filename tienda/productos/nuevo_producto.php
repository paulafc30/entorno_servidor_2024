<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php 
        error_reporting( E_ALL );
        ini_set("display_errors", 1 );  
        
        require ('../util/conexion.php'); 
        require ('../util/depurar.php');

        session_start();
        if(isset($_SESSION["usuario"])){
            echo "<h4>Bienvenid@ ".$_SESSION["usuario"] . "</h4>";
        }else{
            header("location: usuario/iniciar_sesion.php");
            exit;
        }
    ?>
    <style>
        .error {
            color: red;
        }
    </style>
</head>
<body>
    
    <div class="container">
        <h1>Nuevo producto</h1>
        <?php

        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $tmp_nombre = depurar($_POST["nombre"]);
            $tmp_precio = depurar($_POST["precio"]);
            if (isset($_POST['categoria'])) {
                $tmp_categoria = depurar($_POST['categoria']);
            } else {
                $tmp_categoria = '';  
            }
            $tmp_stock = depurar($_POST["stock"]);
            $tmp_descripcion = depurar($_POST["descripcion"]);

            /*if ($_FILES["imagen"]["size"] > 0) {
                $nombre_imagen = $_FILES["imagen"]["name"];
                $ubicacion_temporal = $_FILES["imagen"]["tmp_name"];
                $ubicacion_final = "./imagenes/$nombre_imagen";
                move_uploaded_file($ubicacion_temporal, $ubicacion_final);
            } else {
                $nombre_imagen = NULL;
            }*/

            if($tmp_nombre == '') {
                $err_nombre = "El nombre es obligatorio";
            } else {
                $patron = "/^[a-zA-ZáéíóúÁÉÍÚÓ0-9 ]{2,50}$/";
                if(!preg_match($patron, $tmp_nombre)) {
                    $err_nombre = "El nombre debe contener de 2 a 50 letras, 
                        números o espacios";
                } else {
                    $nombre = $tmp_nombre;
                }
            }

            if($tmp_precio == '') {
                $err_precio = "El precio es obligatorio";
            } else {
                if(is_numeric($tmp_precio)){  
                    $patron = "/^[0-9]{1,4}(\.[0-9]{1,2})?$/";
                    if(!preg_match($patron, $tmp_precio)) {
                        $err_precio = "El precio debe ser un numero de máximo 4 y 2 decimales. Ejemplo: 9999.99";
                    } else {
                        if ($tmp_precio > 9999.99 || $tmp_precio < 0) {
                            $err_precio = "El precio no puede ser mayor que 9999.99";
                        } else {
                            $precio = $tmp_precio;  
                        }
                    }
                }else{
                    $err_precio = "El precio debe ser un numero entero o decimal y llevar punto en vez de coma"; 
                }

            }

            //echo "<h1>Precio: " . $precio . "</h1><br>";


            if($tmp_descripcion == '') {
                $err_descripcion = "El descripcion es obligatoria";
            } else {
                if(strlen($tmp_descripcion) < 2 || strlen($tmp_descripcion) > 255){
                    $err_descripcion = "El descripcion debe contener máximo 255 caracteres";
                } else {
                    $descripcion = $tmp_descripcion;
                }
            }

            if ($tmp_categoria == '') {
                $err_categoria = "Debes seleccionar una categoría.";
            } else {
                $categoria = $tmp_categoria;
            }

            if($tmp_stock == '') {
                $tmp_stock = 0;  
            } else {
                if(is_numeric($tmp_stock)) { 
                    if($tmp_stock < 0 || $tmp_stock > 9999) {  
                        $err_stock = "El stock debe ser un número entre 0 y 9999";
                    } else {
                        $stock = $tmp_stock; 
                    }
                } else {
                    $err_stock = "El stock debe ser un número"; 
                }
            }

            $nombre_imagen = NULL;

            /* Utilizo este if para comprobar que las variables err no estén vacias, 
            y eso significa que la validación ha ido bien y así se puede insertar a la 
            base de datos sin que a ésta le lleguen datos erroneos*/
            if(!isset($err_nombre) && !isset($err_precio) && !isset($err_descripcion) && !isset($err_categoria) && !isset($err_stock)) {
                $sql = "INSERT INTO productos (nombre, precio, categoria, stock, imagen, descripcion) 
                        VALUES ('$nombre', $precio, '$categoria', $stock, '$nombre_imagen', '$descripcion')";
                $_conexion->query($sql);
            }

        }

        $sql = "SELECT categoria FROM categorias ORDER BY categoria";
        $resultado = $_conexion->query($sql);
        $array_categorias = [];
        if ($resultado->num_rows > 0) {
            while ($fila = $resultado->fetch_assoc()) {
                $array_categorias[] = $fila;
            }
        }

        //print_r($array_categorias);
        ?>

        <form class="col-6" action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input class="form-control" type="text" name="nombre">
                <?php if(isset($err_nombre)) echo "<span class='error'>$err_nombre</span>" ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Precio (ejemplo: 9999.99)</label>
                <input class="form-control" type="text" name="precio">
                <?php if(isset($err_precio)) echo "<span class='error'>$err_precio</span>" ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Categorias</label>
                <select class="form-select" name="categoria">
                    <option value="" selected disabled hidden>--- Elige la categoria ---</option>
                    <?php
                    foreach($array_categorias as $categoria){ ?>
                        <option value="<?php echo $categoria['categoria'];?>">
                            <?php echo $categoria['categoria']; ?>
                        </option>
                    <?php } ?>
            </select>
            <?php if(isset($err_categoria)) echo "<span class='error'>$err_categoria</span>" ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Stock</label>
                <input class="form-control" type="text" name="stock">
                <?php if(isset($err_stock)) echo "<span class='error'>$err_stock</span>" ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Imagen</label>
                <input class="form-control" type="file" name="imagen" disabled>
                <?php if(isset($err_imagen)) echo "<span class='error'>$err_imagen</span>" ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Descripcion</label>
                <input class="form-control" type="text" name="descripcion">
                <?php if(isset($err_descripcion)) echo "<span class='error'>$err_descripcion</span>" ?>
            </div>
            <div class="mb-3">                
                <input class="btn btn-primary" type="submit" value="Insertar">
                <a class="btn btn-secondary" href="index.php">Volver</a><br><br>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>