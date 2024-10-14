<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );    
    ?>
</head>
<body>
    <!--Metes el salario bruto y te da el neto-->
    <form action="" method="post">
        <label for="bruto">Introduce el salario bruto: </label>
        <input type="text" name="bruto" id="bruto">
        <input type="submit" value="Calcular salario neto">
    </form>

    <?php 
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $bruto = $_POST["bruto"];
        $neto = $_POST["neto"];

        if($bruto < 12450){
            $neto -= ($bruto * 0.19);
        }elseif($bruto > 12450 && $bruto < 20199){
            $neto -= ($bruto * 0.24);
        }elseif($bruto > 20199 && $bruto < 35199 ){
            $neto -= ($bruto * 0.30);
        }elseif($bruto > 35199 && $bruto < 59999){
            $neto -= ($bruto * 0.37);
        }elseif($bruto > 59999 && $bruto < 299999){
            $neto -= ($bruto * 0.45);
        }elseif($bruto > 299999 && $bruto < 300000){
            $neto -= ($bruto * 0.47);
        }
        
        echo "<p> El sueldo neto es: $neto</p>";
    }
    ?>
    
</body>
</html>