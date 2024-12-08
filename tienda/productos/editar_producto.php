<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
        error_reporting( E_ALL );
        ini_set("display_errors", 1 );    

        require('../util/conexion.php');
        require('../util/depurar.php');

        session_start();
        if(isset($_SESSION["usuario"])) {
            echo "<h4>Bienvenid@ " . $_SESSION["usuario"] . "</h4>";
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
        <h1>Editar producto</h1>
        <?php

            $id_producto = $_GET["id_producto"];
            $sql = "SELECT * FROM productos WHERE id_producto = '$id_producto'";
            $resultado = $_conexion -> query($sql);
        
            while($fila = $resultado -> fetch_assoc()) {
                $nombre = $fila["nombre"];
                $precio = $fila["precio"];
                $categoria = $fila["categoria"];
                $stock = $fila["stock"];
                $descripcion = $fila["descripcion"];
            }

        $sql = "SELECT * FROM categorias ORDER BY categoria";
        $resultado = $_conexion -> query($sql);
        $array_categorias = [];

        while($fila = $resultado -> fetch_assoc()) {
            array_push($array_categorias, $fila["categoria"]);
        }

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
                    $err_precio = "El precio debe ser un numero"; 
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

            $sql = "UPDATE productos SET
                nombre = '$nombre',
                precio = $precio,
                categoria = '$categoria',
                stock = $stock,
                imagen = NULL,
                descripcion = '$descripcion'
                WHERE id_producto = $id_producto
            ";
            $_conexion -> query($sql);
        }
        ?>
        <form class="col-6" action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input class="form-control" type="text" name="nombre" value="<?php echo $nombre ?>">
                <?php if(isset($err_nombre)) echo "<span class='error'>$err_nombre</span>" ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Precio</label>
                <input class="form-control" type="text" name="precio" value="<?php echo $precio ?>">
                <?php if(isset($err_precio)) echo "<span class='error'>$err_precio</span>" ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Categoria</label>
                <select class="form-select" name="categoria">
                    <option value="<?php echo $categoria ?>" selected hidden><?php echo $categoria ?></option>
                    <?php
                    foreach($categorias as $categoria) { ?>
                        <option value="<?php echo $categoria ?>">
                            <?php echo $categoria ?>
                        </option>
                    <?php } ?>
                </select>
                <?php if(isset($err_categoria)) echo "<span class='error'>$err_categoria</span>" ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Stock</label>
                <input class="form-control" type="text" name="stock" value="<?php echo $stock ?>">
                <?php if(isset($err_stock)) echo "<span class='error'>$err_stock</span>" ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Imagen</label>
                <input class="form-control" type="file" name="imagen" disabled>
            </div>
            <div class="mb-3">
                <label class="form-label">Descripcion</label>
                <input class="form-control" type="text" name="descripcion" value="<?php echo $descripcion ?>">
                <?php if(isset($err_descripcion)) echo "<span class='error'>$err_descripcion</span>" ?>
            </div>
            <div class="mb-3">
                <input type="hidden" name="id_producto" value="<?php echo $id_producto ?>">
                <input class="btn btn-primary" type="submit" value="Confirmar">
                <a class="btn btn-secondary" href="index.php">Volver</a>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>