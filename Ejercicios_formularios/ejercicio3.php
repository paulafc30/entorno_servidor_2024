<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!--EJERCICIO 3: Realiza un formulario que reciba dos números y devuelva todos los números primos dentro de ese rango 
    (incluidos los extremos).
    -->
    <form action="" method="post">
        <label for="numero1">Introduce un numero</label> 
        <input type="number" id="numero1" name="numero1">
        <br>
        <label for="numero2">Introduce otro numero</label> 
        <input type="number" id="numero2" name="numero2">
        <br><br>
        <input type="submit" value="Calcular primos en ese rango">
        <br><br>
    </form>
    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $numero1 = $_POST["numero1"];
            $numero2 = $_POST["numero2"];

            $primos = array();

            for($i = $numero1; $i < $numero2; $i++){
                $esPrimo = true;
                for ($j = 2; $j < $i; $j++) {
                    if ($i % $j == 0) {
                        $esPrimo = false;
                    }
                }

                if ($esPrimo) {
                    array_push($primos, $i);
                }
            }

            if (count($primos) > 0) {

                echo "<ul>";
                for($i = 0; $i < count($primos); $i++){
                    echo "<li>" . $primos[$i] . "</li>"; 
                }
                echo "</ul>";

            }else{
                echo "<h2>No hay numeros primos</h2>";
            }  
        }
    ?>
</body>
</html>