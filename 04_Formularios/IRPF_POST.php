<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
        error_reporting( E_ALL );
        ini_set("display_errors", 1 );    

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
    <form action="" method="post">
        <input type="number" name="salario" placeholder="Salario">
        <input type="submit" value="Calcular salario bruto">
    </form>
    
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $tmp_salario = $_POST["salario"];

       
        if($tmp_salario == '') {
            $err_salario = "El salario es obligatorio";
        } else {
            if(filter_var($tmp_precio, FILTER_VALIDATE_FLOAT) === FALSE) {
                $err_salario = "El salario debe ser un número";
            } else {
                if($tmp_salario < 0) {
                    $err_precio = "El precio debe ser mayor o igual que cero";
                } else {
                    $salario = $tmp_salario;
                }
            }
        }

       
    }
    ?>

    <?php
        if(isset($salario)) {
            echo "<h1>El salario es " . CalcularIRPF($salario) . "</h1>";
        }
    ?>
</body>
</html>

