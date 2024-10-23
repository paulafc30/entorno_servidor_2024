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
    <!-- Convertir monedas--> 
    <form action="" method="post">
            <label for="monedaA">Moneda inicial</label>
            <input type="number" name="monedaA" id="monedaA">
            <br><br>
            <select name="moneda_ini">
                <option value="dolares">Dolares</option>
                <option value="yenes">Yenes</option>
                <option value="euros">Euros</option>
            </select>
            <br><br>
            <label for="monedaA">Moneda final</label>
            <select name="moneda_fin">
                <option value="dolares">Dolares</option>
                <option value="yenes">Yenes</option>
                <option value="euros">Euros</option>
            </select>
            <br><br>
            <input type="submit" value="Convertir">
        </form>

        <?php 
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $monedaA = $_POST["monedaA"];
            $moneda_ini = $_POST["moneda_ini"];
            $moneda_fin = $_POST["moneda_fin"];

            $tasas_conversion = [
                "dolares" => ["dolares" => 1, "yenes" => 149.7, "euros" => 0.95],
                "yenes" => ["dolares" => 0.0067, "yenes" => 1, "euros" => 0.0064],
                "euros" => ["dolares" => 1.05, "yenes" => 156.7, "euros" => 1],
            ];
    
            if ($moneda_ini == "dolares" && $moneda_fin == "euros") {
                $tasa = 0.95;
            } elseif ($moneda_ini == "dolares" && $moneda_fin == "yenes") {
                $tasa = 149.7;
            } elseif ($moneda_ini == "euros" && $moneda_fin == "dolares") {
                $tasa = 1.05;
            } elseif ($moneda_ini == "euros" && $moneda_fin == "yenes") {
                $tasa = 156.7;
            } elseif ($moneda_ini == "yenes" && $moneda_fin == "dolares") {
                $tasa = 0.0067;
            } elseif ($moneda_ini == "yenes" && $moneda_fin == "euros") {
                $tasa = 0.0064;
            } else {
                $tasa = 1; // Si las monedas son iguales
            }
            
            $resultado = $monedaA * $tasa;
    
            echo "<h1>$monedaA $moneda_ini son equivalentes a $resultado $moneda_fin.</h1>";
        }
        ?>
</body>
</html>