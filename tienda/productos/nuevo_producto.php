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
    ?>
</head>
<body>
    
    <div class="container">
        <h1>Nuevo producto</h1>
        <?php
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $id_producto = $_POST["id_producto"];
            $nombre = $_POST["nombre"];
            $precio = $_POST["precio"];
            $categoria = $_POST["categoria"];
            $stock = $_POST["stock"];
            $imagen = $_POST["imagen"];
            $descripcion = $_POST["descripcion"];
            
            $sql = "INSERT INTO producto (id_producto, nombre, precio, categoria, stock, imagen, descripcion) 
                VALUES ($id_producto, '$nombre', $precio,'$categoria',$stock,'$imagen', '$descripcion')";

            $_conexion -> query($sql);
        }

        $sql = "SELECT * FROM categorias ORDER BY categoria";
        $resultado = $_conexion -> query($sql);
        $array_categorias = [];
        while($fila = $resultado -> fetch_assoc()){
            array_push($array_categorias, $fila["categoria"]);?>
            
            <?php }
            print_r($array_categorias); ?>

        

        <form class="col-6" action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input class="form-control" type="text" name="nombre">
            </div>
            <div class="mb-3">
                <label class="form-label">Precio</label>
                <input class="form-control" type="text" name="precio" >
            </div>
            <div class="mb-3">
                <label class="form-label">Categorias</label>
                <select class="form-select" name="categoria">
                    <option value="" selected disabled hidden>--- Elige la categoria ---</option>
                    <?php
                    foreach($categorias as $categoria){ ?>
                    <option value="<?php echo $categoria ?>">
                        <?php echo $categoria ?>
                    </option>
                    <?php } ?>
            </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Stock</label>
                <input class="form-control" type="text" name="stock">
            </div>
            <div class="mb-3">
                <label class="form-label">Imagen</label>
                <input class="form-control" type="file" name="imagen">
            </div>
            <div class="mb-3">
                <label class="form-label">Descripcion</label>
                <input class="form-control" type="text" name="descripcion">
            </div>
            <div class="mb-3">
                <input type="hidden" name="id_producto">
                
                <input class="btn btn-primary" type="submit" value="Insertar">
                <a class="btn btn-secondary" href="index.php">Volver</a><br><br>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>