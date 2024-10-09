<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edades</title>
</head>
<body>
    <!--
    CREAR UN FORMULARIO QUE RECIBA EL NOMBRE Y LA EDAD DE UNA PERSONA
    SI LA EDAD ES MENOR QUE 18, SE MOSTRARÁ EL NOMBRE Y QUE ES MENOR DE EDAD
    SI LA EDAD ESTA ENTRE 18 Y 65, SE MOSTRARA EL NOMBRE Y QUE ES MAYOR DE EDAD
    SI LA EDAD ES MAS DE 65, SE MOSTRARA EL NOMBRE Y QUE SE HA JUBILADO
    -->

    <form action="" method="post">
        <input type="text" name="nombre" placeholder="Introduzca el nombre">
        <input type="text" name="edad" placeholder="Introduzca la edad">
        <input type="submit" value="Enviar">
    </form>
    <?php 
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $nombre = $_POST["nombre"];
        $edad = $_POST["edad"];
        if($edad < 18){
            echo "<h2>El nombre es $nombre y la edad es $edad</h2>";
        }elseif ($edad < 66 and $edad > 17) {
            echo "<h2>El nombre es $nombre y la edad es $edad</h2>";
        }else {
            echo "<h2>El nombre es $nombre y la edad es $edad</h2>";
        }     
    }
    ?>
</body>
</html>