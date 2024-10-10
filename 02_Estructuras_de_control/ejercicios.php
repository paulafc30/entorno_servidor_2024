<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicios</title>
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );    
    ?>
</head>
<body>
    <h3>EJERCICIO 0: MOSTRAR LA FECHA ACTUAL CON EL SIGUIENTE FORMATO:
        Viernes 27 de Septiembre de 2024
        UTILIZAR LAS ESTRUCTURAS DE CONTROL NECESARIAS</h3>
    <?php
        $dia = date("l");
        $numero_dia = date("j");
        $mes = date("F");
        $anio = date("Y");

        $dia = match($dia){ //comprueba si $dia es = Monday, $dia_español = lunes
            "Monday" => "Lunes",
            "Tuesday" => "Martes",
            "Wednesday" => "Miercoles",
            "Thrusday" => "Jueves",
            "Friday" => "Viernes",
            "Saturday" => "Sábado",
            "Sunday" => "Domingo"
        };

        $mes = match($mes){
            "January" => "Enero",
            "February" => "Febrero",
            "March" => "Marzo",
            "April" => "Abril",
            "May" => "Mayo",
            "June" => "Junio",
            "July" => "Julio",
            "August" => "Agosto",
            "September" => "Septiembre",
            "October" => "Octubre",
            "November" => "Noviembre",
            "December" => "Diciembre"
        };


        echo "<h4>$dia $numero_dia de $mes de $anio </h4>";
    ?>
    <h3>EJERCICIO 1: CALCULAR LA SUMA DE TODOS LOS NUMEROS PARES DEL 1 AL 20</h3>
    <?php
        $i = 1;
        $suma = null;
        
        while($i <= 20){
            if($i % 2 == 0){
                $suma += $i;
            }
            $i++;
        }
        echo "<p> La suma de los numeros pares es $suma</p>";
    ?>
    <h3>EJERCICIO 2: MOSTRAR EN UNA LISTA LOS NUMEROS MULTIPLOS DE 3 USANDO WHILE E IF ENTRE 1 Y 100</h3>
    <?php
        $i = 1;
        
        echo "<h2> Múltiplos de 3 </h2>";
        echo "<ul>";
        while($i <= 100){
            if($i % 3 == 0){
                echo "<li> $i </li>";
            }
            $i++;
        }
        echo "</ul>";
    ?>
    <h3>EJERCICIO 3: CALCULAR EL FACTORIAL DE 6 CON WHILE</h3>
    <?php
        $i = 1;
        $factorial = 6;
        $resultado = 1;

        while($i <= $factorial){
            $resultado *= $i;
            $i++;
        }

        echo "<p>El factorial de 6 es $resultado </p>";   
   ?>

</body>
</html>