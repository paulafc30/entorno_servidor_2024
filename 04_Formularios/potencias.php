<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Potencias</title>
</head>
<body>
    <?php
    /**
     * CREAR UN FORMULARIO QUE RECIBA DOS PARAMETROS: BASE Y EXPONENTE
     * CUANDO SE ENVIE EL FORMULARIO, SE CALCULARA EL REUSLTADO DE ELEVAR 
     * LA BASE AL EXPONENTE
     * 
     * EJEMPLOS:
     * 
     * 2 ELEVADO A 3 = 8 => 2x2x2 = 8
     * 3 ELEVADO A 2 = 9 => 3x3 = 9
     * 2 ELEVADO A 1 = 2 => 2x1 = 2
     * 3 ELEVADO A 0 = 1 => 1
     */
    ?>
    <form action="" method="post">
        <label for="base">BASE</label>
        <input type="text" name="base" id="base" placeholder="Introduzca la base"><br><br>
        <label for="exponente">EXPONENTE</label>
        <input type="text" name="exponente" id="exponente" placeholder="Introduzca el exponente"><br><br>
        <input type="submit" value="Calcular">
    </form>
    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $base = $_POST["base"];
            $exponente = $_POST["exponente"];
            $resultado = 1;
            for($i = 0; $i < $exponente; $i++){
                $resultado *= $base;
            }
            
            echo "<h2>El resultado es $resultado</h2>";
        }
    ?>
</body>
</html>