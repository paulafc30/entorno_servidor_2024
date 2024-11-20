<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!--EJERCICIO 1: Realiza un formulario que reciba 3 números y devuelva el mayor de ellos-->
    <form action="" method="post">
        <label for="numero1">Introduce el primer numero</label>
        <input type="number" id="numero1" name="numero1">
        <br>
        <label for="numero2">Introduce el segundo numero</label>
        <input type="number" id="numero2" name="numero2">
        <br>
        <label for="numero3">Introduce el tercer numero</label>
        <input type="number" id="numero3" name="numero3">
        <br><br>
        <input type="submit" value="Mostrar el mayor">
        <br><br>
        
    </form>
    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $numero1 = $_POST["numero1"];
            $numero2 = $_POST["numero2"];
            $numero3 = $_POST["numero3"];
            $mayor = $numero1;

            if($mayor > $numero2){
                $mayor = $numero2;
            }
            if($numero3 > $mayor){
                $mayor = $numero3;
            }

            echo "<h2>El mayor es $mayor</h2>";
        }
    ?>
</body>
</html>