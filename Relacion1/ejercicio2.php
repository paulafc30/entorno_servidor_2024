<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2</title>
</head>
<body>
    <?php 
    /**Genera 10 números aleatorios entre el 0 y el 100. 
    Almacénalos en un array y muéstralos ordenados de mayor a 
    menor y de menor a mayor.
    Mostrar en total 3 listas: una con el array inicial y dos 
    con el array ordenado de ambas maneras. */

    for($i = 0; $i <= 10; $i++){
        $aleatorios[] = rand(0,100);
    }
    print_r($aleatorios);

    rsort($aleatorios);
    print_r($aleatorios);
    
    sort($aleatorios);
    print_r($aleatorios);

    ?>
</body>
</html>