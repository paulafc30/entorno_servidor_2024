<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Varios formularios</title>
    <?php
        error_reporting(E_ALL);
        ini_set("display_errors", 1);  
        
        require('../05_funciones/temperaturas.php');
        require('../05_funciones/edades.php');
        require('../05_funciones/potencias.php');
        require('../05_funciones/salario.php');
        require('../05_funciones/iva.php');

    ?>
</head>
<body>
    <h1>Formulario temperaturas</h1>
    <form action="" method="post">
        <label>Temperatura original</label>
        <input type="text" name="temperatura"><br><br>
        <label>Unidad original</label>
        <select name="inicial">
            <option value="C">Celsius</option>
            <option value="K">Kelvin</option>
            <option value="F">Fahrenheit</option>
        </select><br><br>
        <label>Unidad final</label>
        <select name="final">
            <option value="C">Celsius</option>
            <option value="K">Kelvin</option>
            <option value="F">Fahrenheit</option>
        </select>
        <br><br>
        <input type="hidden" name="accion" value="formulario_temperaturas">
        <input type="submit" value="Convertir">
    </form>

    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["accion"])) {
            //  Formulario de temperaturas
            if($_POST["accion"] == "formulario_temperaturas") {
                $temperatura = $_POST["temperatura"];
                $inicial = $_POST["inicial"];
                $final = $_POST["final"];

                if($temperatura != '') {
                    if(is_numeric($temperatura)) {
                        if($inicial == "C" && $temperatura >= -273.15) {
                            echo convertirTemperatura($temperatura, $inicial, $final);
                        } elseif($inicial == "C" && $temperatura < -273.15) {
                            echo "<p>La temperatura no puede ser inferior a -273.15 C</p>";
                        }
                        if($inicial == "K" && $temperatura >= 0) {
                            echo convertirTemperatura($temperatura, $inicial, $final);
                        } elseif($inicial == "K" && $temperatura < 0) {
                            echo "<p>La temperatura no puede ser inferior a 0 K</p>";
                        }
                        if($inicial == "F" && $temperatura >= -459.67) {
                            echo convertirTemperatura($temperatura, $inicial, $final);
                        } elseif($inicial == "F" && $temperatura < -459.67) {
                            echo "<p>La temperatura no puede ser inferior a -459.67 F</p>";
                        }
                    } else {
                        echo "<p>La temperatura debe ser un número</p>";
                    }
                } else {
                    echo "<p>Falta la temperatura</p>";
                }
            }
        }
    ?>

    <h1>Formulario edades</h1>
    <form action="" method="post">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre"><br><br>
        <label for="edad">Edad</label>
        <input type="text" name="edad" id="edad"><br><br>
        <input type="hidden" name="accion" value="formulario_edades">
        <input type="submit" value="Enviar">
    </form>

    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["accion"])) {
            //  Formulario de edades
            if($_POST["accion"] == "formulario_edades") {
                $nombre = $_POST["nombre"] ;
                $edad = $_POST["edad"] ;

                comprobarEdad($nombre, $edad);
            }
        }
    ?>

    <h1>Formulario potencias</h1>
    <form action="" method="post">
        <label for="base">BASE</label>
        <input type="text" name="base" id="base" placeholder="Introduzca la base"><br><br>
        <label for="exponente">EXPONENTE</label>
        <input type="text" name="exponente" id="exponente" placeholder="Introduzca el exponente"><br><br>
        <input type="submit" value="Calcular">
    </form>

    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $tmp_base = $_POST["base"] ;
            $tmp_exponente = $_POST["exponente"] ;

            if($tmp_base == '') {
                echo "<p>La base es obligatoria</p>"; 
            } else {
                if(filter_var($tmp_base, FILTER_VALIDATE_INT) === FALSE) {
                    echo "<p>La base debe ser un número</p>";
                } else {
                    $base = $tmp_base;
                }
            }

            if($tmp_exponente == '') {
                echo "<p>El exponente es obligatorio</p>";
            } else {
                if(filter_var($tmp_exponente, FILTER_VALIDATE_INT) === FALSE) {
                    echo "<p>El exponente debe ser un número</p>";
                } else {
                    if($tmp_exponente < 0) {
                        echo "<p>El exponente debe ser mayor o igual que cero</p>";
                    } else {
                        $exponente = $tmp_exponente;
                    }
                }
            }

            if(isset($base) && isset($exponente)) {
                $resultado = CalcularPotencia($base, $exponente);
                echo "<h1>El resultado es $resultado</h1>";
            }
        }
    ?>

    <h1>Formulario salario</h1>
    <form action="" method="post">
        <label for="bruto">Introduce el salario bruto: </label>
        <input type="text" name="bruto" id="bruto">
        <input type="submit" value="Calcular salario neto">
    </form>

    <?php 
        if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["bruto"])) {
            $tmp_bruto = $_POST["bruto"];

            if($tmp_bruto == '') {
                echo "<p>El salario es obligatorio</p>";
            } else {
                if(filter_var($tmp_bruto, FILTER_VALIDATE_FLOAT) === FALSE) {
                    echo "<p>El salario debe ser un número</p>";
                } else {
                    if($tmp_bruto < 0) {
                        echo "<p>El salario debe ser mayor o igual que cero</p>";
                    } else {
                        $bruto = $tmp_bruto;
                    }
                }
            }

            if(isset($bruto)) {
                $resultado = CalcularSalarioNeto($bruto);
                echo "<h1>El resultado es $resultado</h1>";
            }
        }
    ?>

        <h1>Formulario IVA</h1>
        <form action="" method="post">
            <label for="precio">Precio</label>
            <input type="text" name="precio" id="precio">
            <br><br>
            <select name="iva">
                <option value="GENERAL">GENERAL</option>
                <option value="REDUCIDO">REDUCIDO</option>
                <option value="SUPERREDUCIDO">SUPERREDUCIDO</option>
            </select>
            <input type="submit" value="Calcular">
        </form>

        <?php 
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $precio = $_POST["precio"];
            $iva = $_POST["iva"];

            if($tmp_precio == '') {
                echo "<p>El precio es obligatorio</p>";
            } else {
                if(filter_var($tmp_precio, FILTER_VALIDATE_FLOAT) === FALSE) {
                    echo "<p>El precio debe ser un número</p>";
                } else {
                    if($tmp_precio < 0) {
                        echo "<p>El salario debe ser mayor o igual que cero</p>";
                    } else {
                        $precio = $tmp_precio;
                    }
                }
            }

            if($tmp_iva == '') {
                echo "<p>El iva es obligatorio</p>";
            } else {
                $valores_validos_iva = ["GENERAL","REDUCIDO","SUPERRREDUCIDO"];
                if (in_array($tmp_iva, $valores_validos_iva)) {
                   echo "<p>El IVA solo puede ser: GENERAL, REDUCIDO, SUPERREDUCIDO</p>";
                }else{
                    $iva = $tmp_iva;
                }
            }

            if(isset($iva) && isset($precio)) {
                $resultado = CalcularIva($precio, $iva);
                echo "<h1>El resultado es $resultado</h1>";
            }
            
        }
        ?>
</body>
</html>
