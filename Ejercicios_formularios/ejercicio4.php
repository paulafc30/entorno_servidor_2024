<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!--EJERCICIO 4: Realiza un formulario que funcione a modo de conversor de temperaturas. Se introducirá en un campo de 
    texto la temperatura, y luego tendremos un select para elegir las unidades de dicha temperatura, y otro select para 
    elegir las unidades a las que queremos convertir la temperatura.
    Por ejemplo, podemos introducir "10", y seleccionar "CELSIUS", y luego "FAHRENHEIT". Se convertirán los 10 CELSIUS a 
    su equivalente en FAHRENHEIT. En los select se podrá elegir entre: CELSIUS, KELVIN y FAHRENHEIT
    -->

    <form action="" method="post">
        <label for="temperatura">Introduce la temperatura</label>
        <input type="text" name="temperatura" id="temperatura">
        
        <select name="unidadInicial">
            <option value="CELSIUS">CELSIUS</option>
            <option value="FAHRENHEIT">FAHRENHEIT</option>
            <option value="KELVIN">KELVIN</option> 
        </select>
        <br>
        <label>Convertir a:</label>
        <select name="unidadFinal">
            <option value="CELSIUS">CELSIUS</option>
            <option value="FAHRENHEIT">FAHRENHEIT</option>
            <option value="KELVIN">KELVIN</option> 
        </select>
        <br><br>
        <input type="submit" value="Calcular">
    </form>

    <?php 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $temperatura = $_POST["temperatura"];
        $unidadInicial = $_POST["unidadInicial"];
        $unidadFinal = $_POST["unidadFinal"];

        if ($unidadInicial == "CELSIUS") {

            if ($unidadFinal == "FAHRENHEIT") {
                $resultado = ($temperatura * 9 / 5) + 32; 
            } elseif ($unidadFinal == "KELVIN") {
                $resultado = $temperatura + 273.15; 
            } else {
                $resultado = $temperatura; 
            }

        } elseif ($unidadInicial == "FAHRENHEIT") {

            if ($unidadFinal == "CELSIUS") {
                $resultado = ($temperatura - 32) * 5 / 9; 
            } elseif ($unidadFinal == "KELVIN") {
                $resultado = ($temperatura - 32) * 5 / 9 + 273.15; 
            } else {
                $resultado = $temperatura; 
            }

        } elseif ($unidadInicial == "KELVIN") {
            if ($unidadFinal == "CELSIUS") {
                $resultado = $temperatura - 273.15; 
            } elseif ($unidadFinal == "FAHRENHEIT") {
                $resultado = ($temperatura - 273.15) * 9 / 5 + 32; 
            } else {
                $resultado = $temperatura; 
            }
        }

        echo "<h2>$resultado $unidadFinal</h2>"; 
    }
    ?>
</body>
</html>
