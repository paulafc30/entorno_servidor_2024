<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    DEFINE("PI",3.14);

    echo "<h1> PI vale ".PI."</h1>";
    $mensaje = "hola mundo";
    echo "<h1> el mensaje es $mensaje"." y aqui hay mas cosas </h1>"; //el . concatena 
    $numero = 3;
    var_dump($numero);

    $numero_decimal = 1.0;
    var_dump($numero_decimal);//var_dump muestra iformacion sobre la variable

    $numero_grande = 3e10;
    var_dump($numero_grande);

    $numero_grande= 1e8;
    var_dump($numero_grande);

    $numero = true;
    var_dump($mensaje);

    $mensaje = "adios mundo";
    var_dump($mensaje);
    ?>
</body>
</html>