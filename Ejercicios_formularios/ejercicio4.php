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
        
        <select name="unidad_ini">
            <option value="CELSIUS">CELSIUS</option>
            <option value="FAHRENHEIT">FAHRENHEIT</option>
            <option value="KELVIN">KELVIN</option> 
        </select>
        <br>
        <label>Convertir a:</label>
        <select name="unidad_fin">
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
        $unidad_ini = $_POST["unidad_ini"];
        $unidad_fin = $_POST["unidad_fin"];

        if ($unidad_ini == "CELSIUS") {

            if ($unidad_fin == "FAHRENHEIT") {
                $resultado = ($temperatura * 9 / 5) + 32; 
            } elseif ($unidad_fin == "KELVIN") {
                $resultado = $temperatura + 273.15; 
            } else {
                $resultado = $temperatura; 
            }

        } elseif ($unidad_ini == "FAHRENHEIT") {

            if ($unidad_fin == "CELSIUS") {
                $resultado = ($temperatura - 32) * 5 / 9; 
            } elseif ($unidad_fin == "KELVIN") {
                $resultado = ($temperatura - 32) * 5 / 9 + 273.15; 
            } else {
                $resultado = $temperatura; 
            }

        } elseif ($unidad_ini == "KELVIN") {
            if ($unidad_fin == "CELSIUS") {
                $resultado = $temperatura - 273.15; 
            } elseif ($unidad_fin == "FAHRENHEIT") {
                $resultado = ($temperatura - 273.15) * 9 / 5 + 32; 
            } else {
                $resultado = $temperatura; 
            }
        }

        echo "<h2>$resultado $unidad_fin</h2>"; 
    }
    ?>
</body>
</html>
