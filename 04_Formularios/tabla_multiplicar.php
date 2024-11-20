<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de multiplicar</title>
</head>
<body>
    <!--
    CREAR UN FORMULARIO QUE RECIBA UN NUMERO 
    SE MOSTRARA LA TABLA DE MULTIPLICAR DE ESE NUMERO EN UNA TABLA HTML
    HACER CON UN SOLO BUCLE

    2 x 1 = 2
    2 x 2 = 4
    ...
    -->
    <form action="" method="post"><!--Si escribes mal esto hace un GET-->
        <label for="numero">Número</label>
        <input type="text" name="numero"><!--Siempre va a devolver en string-->
        <input type="submit" value="Imprimir"> 
    </form>
    <table border="1">
        <thead>
                <th>Número</th>
                <th>Resultado</th>
        </thead>
        <tbody>  
            <?php 
            if($_SERVER["REQUEST_METHOD"] == "POST"){ //$_SERVER es un array
                $numero = (int)$_POST["numero"]; //NO es necesario porque hace un cast implicito
                $resultado = 0;
            for($i = 1 ; $i <= 10; $i++){
                $resultado = $numero * $i;
                echo"<tr>";
                echo "<td>$numero x $i</td>";
                echo "<td>$resultado</td>";
                echo"</tr>";
            }
         }
    ?>

        </tbody>
    </table>
</body>
</html>