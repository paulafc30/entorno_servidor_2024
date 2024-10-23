<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   
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
        $neto = 0;

        $tramo1 = $bruto * 0.19;
        $tramo2 = $bruto * 0.24;
        $tramo3 = $bruto * 0.30;
        $tramo4 = $bruto * 0.37;
        $tramo5 = $bruto * 0.45;
        $tramo6 = $bruto * 0.47;


        if($bruto <= 12450){
            $neto = $bruto - $tramo1;
        }elseif($bruto > 12450 && $bruto <= 20199){
            $neto = $bruto - $tramo1 - $tramo2;
        }elseif($bruto > 20199 && $bruto <= 35199 ){
            $neto = $bruto - $tramo1 - $tramo2 - $tramo3;
        }elseif($bruto > 35199 && $bruto <= 59999){
            $neto = $bruto - $tramo1 - $tramo2 - $tramo3 - $tramo4;
        }elseif($bruto > 59999 && $bruto <= 299999){
            $neto = $bruto - ($tramo1 + $tramo2 + $tramo3 + $tramo4 + $tramo5);
        }elseif($bruto > 299999 && $bruto <= 300000){
            $neto = $bruto - $tramo1 - $tramo2 - $tramo3 - $tramo4 - $tramo5 - $tramo6;
        }

        echo "<h2> El sueldo neto es: $neto</h2>";
    }
    ?>
    
</body>
</html>