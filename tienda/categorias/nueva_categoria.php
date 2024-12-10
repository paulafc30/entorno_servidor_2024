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
        require ('../util/depurar.php');

        session_start();
        if(isset($_SESSION["usuario"])){
            echo "<h2>Bienvenid@ ".$_SESSION["usuario"] . "</h2>";
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
        <h1>Nueva categoria</h1>
        <?php
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $tmp_categoria = depurar($_POST["categoria"]);
            $tmp_descripcion = depurar($_POST["descripcion"]);

            if($tmp_categoria == '') {
                $err_categoria = "La categoría es obligatoria";
            } else {  
                $patron = "/^[a-zA-ZáéíóúÁÉÍÚÓ ]{2,30}$/";
                if(!preg_match($patron, $tmp_categoria)) {
                    $err_categoria = "La categoria solo puede contener de 2 a 30 letras y espacios";
                } else {
                    $sql_check = "SELECT * FROM categorias WHERE categoria = '$tmp_categoria'";
                    $resultado_check = $_conexion->query($sql_check);

                    if ($resultado_check->num_rows > 0) {
                        $err_categoria = "La categoría ya existe";
                    } else {
                        $categoria = $tmp_categoria;
                    }
                }
            }

            if($tmp_descripcion == '') {
                $err_descripcion = "La descripcion es obligatoria ";
            } else {
                if(strlen($tmp_descripcion) < 2 || strlen($tmp_descripcion) > 255) {
                    $err_descripcion = "La descripcion puede tener minimo 2 y máximo 255 caracteres";
                } else {
                    $descripcion = $tmp_descripcion;
                 
                }
            }

            if (!isset($err_categoria) && !isset($err_descripcion)) {
                $sql = "INSERT INTO categorias (categoria, descripcion) 
                VALUES ('$categoria', '$descripcion')";
                
                $_conexion -> query($sql);
            }
            
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
                <?php if(isset($err_categoria)) echo "<span class='error'>$err_categoria</span>" ?>
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