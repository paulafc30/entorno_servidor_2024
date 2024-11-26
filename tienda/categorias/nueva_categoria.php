<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo categoria</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php 
        error_reporting( E_ALL );
        ini_set("display_errors", 1 );  
        
        require ('../util/conexion.php'); 
    ?>
</head>
<body>
    <div class="container">
        <h1>Nueva categoria</h1>
        <?php
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $categoria = $_POST["categoria"];
            $descripcion = $_POST["descripcion"];
            
            $sql = "INSERT INTO categorias (categoria, descripcion) 
                VALUES ('$categoria', '$descripcion')";

            $_conexion -> query($sql);
        }

        $sql = "SELECT * FROM categorias ORDER BY categoria";
        $resultado = $_conexion -> query($sql);
        $categorias = [];
        while($fila = $resultado -> fetch_assoc()){
            array_push($categorias, $fila["categoria"]);?>
            
            <?php } ?>

        

        <form class="col-6" action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Categoria</label>
                <input class="form-control" type="text" name="categoria">
            </div>
            <div class="mb-3">
                <label class="form-label">Descripcion</label>
                <input class="form-control" type="text" name="descripcion">
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