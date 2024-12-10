<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index de Tienda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
        error_reporting( E_ALL );
        ini_set("display_errors", 1 );    

        require('./util/conexion.php');

        session_start();
        if(isset($_SESSION["usuario"])){
            echo "<h4>Bienvenid@ ".$_SESSION["usuario"] . "</h4>";
        }
    
    ?>
</head>
<body>
    
    <ul class="nav justify-content-center">
    <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="./index.php">Inicio</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="./productos/index.php">Productos</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="./categorias/index.php">Categorias</a>
    </li>
    </ul>
    <hr>

    <div class="container">
    <!--<h1>Tabla de productos</h1>-->

    <?php 
        if(!isset($_SESSION["usuario"])){
            ?>
                <a class="btn btn-info" href="usuario/iniciar_sesion.php">Iniciar sesión</a><br> 
            <?php
        }else{
            ?>
                <a class="btn btn-secondary" href="./usuario/cambiar_credenciales.php">Modificar Contraseña</a>
                <a class="btn btn-warning" href="usuario/cerrar_sesion.php">Cerrar sesión</a><br>
            <?php
        }
    
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $id_producto = $_POST["id_producto"];     
        }

        $sql = "SELECT * FROM productos";
        $resultado = $_conexion -> query($sql);
    ?>
    <table class="table table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Categoria</th>
                <th>Stock</th>
                <th>Imagen</th>
                <th>Descripcion</th>
            </tr>
        </thead>
        <tbody>
            <?php
                while($fila = $resultado -> fetch_assoc()) {  
                    echo "<tr>";
                    echo "<td>" . $fila["nombre"] . "</td>";
                    echo "<td>" . $fila["precio"] . "</td>";
                    echo "<td>" . $fila["categoria"] . "</td>";
                    echo "<td>" . $fila["stock"] . "</td>";
                    echo "<td>"  ?> <img width="100" height="200" src="<?php echo $fila["imagen"] ?>"><?php  "</td>";
                    echo "<td>" . $fila["descripcion"] . "</td>";
                    ?>
                    <?php
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>