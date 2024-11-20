<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Números</title>
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );    
    ?>
</head>
<body>
    <?php
    $numero = 0;

    # Forma 1
    if($numero > 0){
        echo "<p>1 El numero $numero es mayor que cero </p>";
    } elseif ($numero == 0) {
        echo "<p>1 El numero $numero es igual que cero </p>";
    }else{
        echo "<p>1 El numero $numero es menor que cero </p>";
    }

    # Forma 2
    if($numero > 0) echo "<p>2 El numero $numero es mayor que cero </p>";
    elseif ($numero == 0) echo "<p>2 El numero $numero es igual que cero </p>";
    else echo "<p>2 El numero $numero es menor que cero </p>";

    # Forma 3
    if($numero > 0):
        echo "<p>3 El numero $numero es mayor que cero </p>";
    elseif ($numero == 0):
        echo "<p>3 El numero $numero es igual que cero </p>";
    else: 
        echo "<p>3 El numero $numero es menor que cero </p>";
    endif;

    # Rangos [-10,0),[0,10],(10,20]]

    $num = -7;

    # and o && para la conjuncion

    if($num >= -10 and $num < 0){
        echo "<p>El número $num está en el rango [-10,0)</p>";
    }elseif($num >= 0 && $num <= 10){
        echo "<p>El número $num está en el rango [0,10]</p>";
    }elseif($num > 10 && $num <= 20){
        echo "<p>El número $num está en el rango (10,20]</p>";
    }else{
        echo "<p>EL numero $num está fuera del rango";
    }

    
    if($num >= -10 and $num < 0):
        echo "<p>EL numero $num está en el rango [-10,0)</p>";
    elseif($num >= 0 && $num <= 10):
        echo "<p>El numero $num está en el rango [0,10]</p>";
    elseif($num > 10 && $num <= 20):
        echo "<p>El numero $num está en el rango (10,20]</p>";
    else:
        echo "<p>EL numero $num está fuera del rango</p>";
    endif;

    /* Numeros aleatorios enteros incluyendo el 1 y el 200 */
    $numero_aleatorio = rand(1,200);

     /* Numeros aleatorios deciamles */
    //$numero_aleatorio_decimales = rand(10,100)/10;

    /* COMPROBAR DE TRES FORMAS DIFERENTES, CON LA ESTRUCTURA IF, SI EL NÚMERO ALEATORIO TIENE 1, 2 o 3 DIGITOS */
    $digitos = null; 
  
    # Forma 1
    if($numero_aleatorio < 10 and $numero_aleatorio >= 1):
       $digitos = 1;
    elseif($numero_aleatorio < 100 and $numero_aleatorio >= 10):
        $digitos = 2;
    elseif ($numero_aleatorio >= 100):
        $digitos = 3;
    else:
        $digitos = "ERROR";
    endif;

    $digitos_texto = "digitos";
    if($digitos == 1) $digitos_texto = "digito";

    echo "<p>El número $numero_aleatorio tiene $digitos $digitos_texto</p>";

    # Forma 2
    if($numero_aleatorio < 10 and $numero_aleatorio >= 1){
        echo "<p>EL numero $numero_aleatorio tiene 1 digito </p>";
    }elseif($numero_aleatorio < 100 and $numero_aleatorio >= 10){
        echo "<p>El numero $numero_aleatorio tiene 2 digitos </p>";
    }elseif($numero_aleatorio >= 100){
        echo "<p>l numero $numero_aleatorio tiene 3 digitos </p>";
    }

    // MISMO EJERCICIO QUE EL ANTERIOR PERO CON MATCH
    $digitos = match(true){
        $numero_aleatorio >= 1 && $numero_aleatorio <= 9 => 1,
        $numero_aleatorio >= 10 && $numero_aleatorio <= 99 => 2,
        $numero_aleatorio >= 100 && $numero_aleatorio <= 999 => 3,
        default => "ERROR"
    };

    echo "<h1>El numero tiene $digitos digitos </h1>";

    //
    $n = rand(1,3);

    switch($n){
        case 1:
            echo "<p>El numero es 1</p>";
            break;
        case 2: 
            echo "<p>El numero es 2<p>";
            break;
        default:
            echo "<p>El numero es 3<p>";
    }

    // Igual que el ejercicio anterior pero con match
    $resultado = match($n){
        1 => "El numero es 1",
        2 => "El numero es 2",
        3 => "El numero es 3"
    };
    echo "<h3>$resultado</h3>";
    ?>
</body>
</html>