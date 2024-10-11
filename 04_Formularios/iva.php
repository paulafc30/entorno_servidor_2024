<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!--
    GENERAL = 21%
    REDUCIDO = 10%
    SUPERREDUCIDO = 4%

    10€ IVA = GENERAL, PVP = 12,1€ PVP = p
    10€ IVA = REDUCIDO, PVP = 11€
    -->
    <form action="" method="post">
        <label for="precio">Precio</label>
        <input type="text" name="precio" id="precio">
        <br><br>
        <select name="iva">
            <option value="general">General</option>
            <option value="reducido">Reducido</option>
            <option value="superreducido">Superreducido</option>
        </select>
        <br><br>
        <input type="submit" value="Calcular">
    </form>
    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $resultado = $resultado
            match ($resultado) {
                 => ,
                 => ,
            }
        }
    ?>
</body>
</html>