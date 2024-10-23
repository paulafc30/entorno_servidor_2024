<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bucles</title>
</head>
<body>
    <?php
    $i = 1;

    echo "<ul>";
    while($i <= 10){
        echo "<li>$i</i>";
        $i++;
    }
    echo "</ul>";
    ?>
    <h1>Lista con WHILE alternativa</h1>
     <?php
        $i = 1;

        echo "<ul>";
        while($i <= 10):
            echo "<li>$i</i>";
            $i++;
        endwhile;
        echo "</ul>";
    ?>
    <h1>Lista con FOR</h1>
     <?php
        echo "<ul>";
        for($i = 1; $i <= 10; $i++){
            echo "<li/>";
        }
        echo "</ul>";
     ?>
     <h1>Lista con FOR con BREAK cursed</h1>
     <?php
        echo "<ul>";
        for($i = 1; ; $i++){
            if($i >= 10){
                break;
            }
            echo "<li>$i</li>";
        }
        echo "</ul>";

        // CÓDIGO OFUSCADO
        /*for(;;){
            if($i > 10){
                break;
            }
            echo " ";
        }*/
     ?>
     <h3>EJERCICIO 5: MUESTRA POR PANTALLA LOS 50 PRIMEROS NUMEROS PRIMOS</h3>
    <?php
        /**
         * NUMEROS PRIMOS
         * 4 % 2 = 2    4 SI ES PRIMO
         * 4 % 3 = 1
         * 
         * 5 % 2 = 1    5 SI ES PRIMO
         * 5 % 3 = 2
         * 5 % 4 = 1
         * 
         * BUCLE DE 2 A N-1
         * 
         * $n = 7
         * DESDE 2 HASTA $n-1
         *      COMPROBAR SI 7 TIENE DIVISORES QUE DEN DE RESTO 0 
         *          SI EXISTE ENTONCES DEVOLVER FALSO
         *          ELSE DEVOLVER TRUE
         * FIN
         */
        
        $n = 8;
        $validacion = true;

        for($i = 2; $i < $n; $i++){
            if($n % $i == 0){
                $validacion = false;
            }
        }

        $res = "";
        if($validacion){
            $res = " es primo";
        }else{
            $res = " no es primo";
        }
        echo "<h2> el numero $n $res </h2>";

        // CORRECCION DE ALEJANDRA
        $numero = 2;
        $numerosPrimos = 0;

        echo "<ol>";
        while($numerosPrimos < 50){
            $esPrimo = true;
            for($i = 2; $i < $numero; $i++){
                if($numero % $i == 0){
                    // NO ES PRIMO
                    $esPrimo = false;
                    break;
                }
            }
            if($esPrimo){
                $numerosPrimos++;
                echo "<li>$numero</li>";
            }
            $numero++; 
        } 
        echo "</ol>";
         
        //var_dump($esPrimo);
    ?>

</body>
</html>