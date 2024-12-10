<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index de Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
        error_reporting( E_ALL );
        ini_set("display_errors", 1 );    

        require('../util/conexion.php');

        session_start();
        if(isset($_SESSION["usuario"])){
            echo "<h4>Bienvenid@ ".$_SESSION["usuario"] . "</h4>";
        }else{
            header("location: ../usuario/iniciar_sesion.php");
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
    <h1>Tabla de productos</h1>
    <br>
    <div class="mb-3">
        <a class="btn btn-success" href="nuevo_producto.php">Insertar nuevo producto</a>
        <a class="btn btn-secondary" href="../index.php">Volver a Inicio</a>
    </div>
    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $id_producto = $_POST["id_producto"];
                   
            $sql_nombre = "SELECT nombre FROM productos WHERE id_producto = $id_producto";
            $resultado_nombre = $_conexion->query($sql_nombre);
            $nombre_producto = ''; 
    
            if ($resultado_nombre->num_rows > 0) {
                $fila = $resultado_nombre->fetch_assoc();
                $nombre_producto = $fila["nombre"];
            }
    
            // borrar 
            $sql_borrar = "DELETE FROM productos WHERE id_producto = $id_producto";
            $_conexion->query($sql_borrar);
            echo "<h4>El producto $nombre_producto ha sido borrado</h4>";
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
                <th></th>
                <th></th>
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
                        <td>
                            <a class="btn btn-primary" 
                            href="editar_producto.php?id_producto=<?php echo $fila["id_producto"] ?>">Editar</a>
                        </td>
                        <td>
                            <form action="" method="post">
                                <input type="hidden" name="id_producto" value="<?php echo $fila["id_producto"] ?>">
                                <input class="btn btn-danger" type="submit" value="Borrar">
                            </form>
                        </td>
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