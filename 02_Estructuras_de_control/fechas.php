<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fechas</title>
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );    
    ?>
</head>
<body>
    <?php
    $numero = "2";
    $numero = (int) $numero;

    if($numero === 2){
        echo "EXITO";
    }else{
        echo "NO EXITO";
    }
    /*
        "2" == 2    "2" es igual a 2
        "2" !== 2   "2" no es identico a 2
        2 === 2     2 si es identico a 2
        2 !== 2.0   2 no es identico a 2.0
    */

    $hora = (int) date("G");
    //var_dump($hora);

    /*
        SI $hora ENTRE 6 y 11, es MAÑANA
        SI $hora ENTRE 12 y 14, es MEDIODIA
        SI $hora ENTRE 15 y 20, es TARDE
        SI $hora ENTRE 20 y 00, es NOCHE
        SI $hora ENTRE 1 y 5, es MADRUGADA
    */

    $hora_exacta = date("H:i:s");
    echo "<p> $hora_exacta </p>";

    /*
        H horas
        i minutos
        s segundos
     */
   
    $dia = date("l");
    echo "<h2>Today is $dia</h2>";

    /*
        TENEMOS CLASE EL LUNES, MIERCOLES Y VIERNES
        NO TENEMOS CLASE EL RESTO

        HACER UN SWITCH QUE DIGA SI HOY TENEMOS CLASE
    */

    switch($dia){
        case "Monday":
        case "Wednesday": 
        case "Friday":
            echo "<p>Hay clase</p>";
            break;
        default:
            echo "<p>NO hay clase<p>";
    }

    /*CON UNA ESTRUCTURA SWITCH CAMBIAR LA VARIABLE DEL DIA A ESPAÑOL
    REESCRIBIR EL SWITCH DE LOS DOAS DE CLASE CON LA VARIABLE EN ESPAÑOL
     */

    $dia = date("l");
    $dia_espanol = null;

    $dia_espanol = match($dia){ //comprueba si $dia es = Monday, $dia_español = lunes
        "Monday" => "Lunes",
        "Tuesday" => "Martes",
        "Wednesday" => "Miercoles",
        "Thrusday" => "Jueves",
        "Friday" => "Viernes",
        "Saturday" => "Sábado",
        "Sunday" => "Domingo"
    };

    echo "<h3>Hoy es $dia_espanol</h3>";

    ?>
</body>
</html>