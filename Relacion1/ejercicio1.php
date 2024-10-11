<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
</head>
<body>
    <?php
    /**Crea un array que contenga los números pares del 1 al 50 y  muéstralos.
    Investiga si hay algún método en PHP para “barajar” los 
    elementos de un array. 
    Una vez barajado, muestra los números en orden descendente. */

    $pares = [];

    for($i = 0; $i <= 50; $i++){
        if($i % 2 == 0){
            $pares[] = $i;
            //array_push($pares,$i);
        }
    }
    print_r($pares);

    rsort($pares);//aqui algo no va bien
    shuffle($pares);// Para barajar los elementos de un array
    print_r($pares);
    ?>
</body>
</html>