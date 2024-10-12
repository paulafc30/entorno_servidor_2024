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
        <label for="numero1">Introduce un numero</label>
        <input type="text" id="numero1" name="numero1">
        <label for="numero2">Introduce un numero</label>
        <input type="text" id="numero2" name="numero2">
        <label for="numero3">Introduce un numero</label>
        <input type="text" id="numero3" name="numero3">
        <input type="submit" value="Mostrar el mayor">

    </form>
    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $numero1 = $_POST["numero1"];
            $numero2 = $_POST["numero2"];
            $numero3 = $_POST["numero3"];
            $mayor = 0;

            if($numero1 > $numero2){
                if($numero1 > $numero3){
                    $mayor = $numero1;
                }
            }elseif($numero2 > $numero1){
                if($numero2 > $numero3){
                    $mayor = $numero2;
                }
            }elseif($numero3 > $numero1){
                if($numero3 > $numero2){
                    $mayor = $numero3;
                }
            }

            echo "El mayor es $mayor";
        }
    ?>
</body>
</html>