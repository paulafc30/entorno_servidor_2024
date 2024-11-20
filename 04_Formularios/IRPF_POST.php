<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
        error_reporting(E_ALL);
        ini_set("display_errors", 1);    

        require('../05_funciones/IRPF.php');
    ?>
    <style>
        .error {
            color: red;
            font-style: italic;
        }
    </style>
</head>
<body> 
    <?php 
        $salario = null; // Inicializamos la variable salario para usarla después

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["salario"])) {
                $tmp_salario = $_POST["salario"];
            } else {
                $tmp_salario = '';
            }

            if ($tmp_salario != '') {
                if (filter_var($tmp_salario, FILTER_VALIDATE_FLOAT) !== false) {
                    if ($tmp_salario >= 0) {
                        $salario = $tmp_salario;
                    } else {
                        $err_salario = "El salario debe ser mayor o igual que cero";
                    }
                } else {
                    $err_salario = "El salario debe ser un número";
                }
            } else {
                $err_salario = "El salario es obligatorio";
            }
        }
    ?>

    <form action="" method="post">
        <input type="number" name="salario" placeholder="Salario">
        <?php
            if (isset($err_salario)) echo "<span class='error'>$err_salario</span>";
        ?>
        <input type="submit" value="Calcular salario bruto">
    </form>

    <?php
        if (isset($salario) && $salario !== null) {
            $resultado = CalcularIRPF($salario);
            echo "<h1>El salario final después del IRPF es $resultado</h1>";
        }
    ?>
</body>
</html>
