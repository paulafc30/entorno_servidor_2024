<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2</title>
    <?php
        error_reporting(E_ALL);
        ini_set("display_errors", 1);  
    ?>
</head>
<body>
    <h1>Formulario</h1>
    <form action="" method="post">
        <label for="dni">DNI:</label><br>
        <input type="text" id="dni" name="dni"><br><br>
        
        <label for="nombre">Nombre:</label><br>
        <input type="text" id="nombre" name="nombre"><br><br>
        
        <label for="primer_apellido">Primer Apellido:</label><br>
        <input type="text" id="primer_apellido" name="primer_apellido" ><br><br>
        
        <label for="segundo_apellido">Segundo Apellido:</label><br>
        <input type="text" id="segundo_apellido" name="segundo_apellido"><br><br>
        
        <label for="fecha_nacimiento">Fecha de Nacimiento:</label><br>
        <input type="date" id="fecha_nacimiento" name="fecha_nacimiento"><br><br>
        
        <label for="correo">Correo Electrónico:</label><br>
        <input type="email" id="correo" name="correo"><br><br>
        
        <input type="submit" value="Enviar">
    </form>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $dni = $_POST['dni'];
            $nombre = $_POST['nombre'];
            $primer_apellido = $_POST['primer_apellido'];
            $segundo_apellido = $_POST['segundo_apellido'];
            $fecha_nacimiento = $_POST['fecha_nacimiento'];
            $correo = $_POST['correo'];
        }
    ?>
</body>
</html>