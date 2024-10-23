<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!--EJERCICIO 2: Realiza un formulario que reciba 3 números: a, b y c. Se mostrarán en una lista los múltiplos de c 
    que se encuentren entre a y b.

    Por ejemplo, si a = 3, b = 10, c = 2

    Los múltiplos de 2 entre 3 y 10 son: 4, 6, 8 y 10
    -->

    <form action="" method="post">
        <label for="numero">Introduce un numero</label> 
        <input type="number" id="numero" name="numero">
        <br>
        <label for="minimo">Introduce el numero minimo del intervalo</label> 
        <input type="number" id="minimo" name="minimo">
        <br>
        <label for="maximo">Introduce el numero maximo del intervalo</label> 
        <input type="number" id="maximo" name="maximo">
        <br><br>
        <input type="submit" value="Calcular múltiplos">
        <br><br>
    </form>
    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $numero = $_POST["numero"];
            $minimo = $_POST["minimo"];
            $maximo = $_POST["maximo"];

            $multiplos = array();

            for($i = $minimo; $i < $maximo; $i++){
                if($i % $numero == 0){
                    array_push($multiplos,$i);
                }
            }
           
            if (count($multiplos) > 0) {

                echo "<h2>Los múltiplos de $numero en el intervalo [$minimo,$maximo] son:</h2>";
                echo "<ul>";
                for($i = 0; $i < count($multiplos); $i++){
                    echo "<li>" . $multiplos[$i] . "</li>"; 
                }
                echo "</ul>";

            }else{
                echo "<h2>No hay multiplos en ese intervalo</h2>";
            }
        }
    ?>

</body>
</html>