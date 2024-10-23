<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3</title>
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );    
    ?>
</head>
<body>

    <form action="" method="post">
            <label for="numero">Introduce un numero: </label>
            <input type="number" name="numero" id="numero">
            <br><br>
            <select name="operaciones">
                <option value="factorial">Factorial</option>
                <option value="sumatorio">Sumatorio</option>
            </select>
            <input type="submit" value="Calcular">
        </form>

        <?php 
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $numero = $_POST["numero"];
            $operaciones = $_POST["operaciones"];

            if($operaciones == "factorial"){   
                $factorial = 1;
                for($i = 1; $i <= $numero; $i++){
                    $factorial = $factorial * $i;
                }
                echo "<h2>El factorial de $numero es $factorial</h2>";
            }elseif($operaciones == "sumatorio"){
                $sumatorio = 0;
                for($i = 0; $i <= $numero; $i++){
                    $sumatorio = $sumatorio + $i;
                }
                echo "<h2>El sumatorio de $numero es $sumatorio</h2>";
            }
        }
        ?>
    
</body>
</html>