<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="estilos.css">
    <title>Ejemplos</title>
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );    
    ?>
</head>
<body>
    <?php
       /**
        * TODOS LOS ARRAYS EN PHP SON ASOCIATIVOS, COMO LOS MAP DE JAVA
        * 
        * TIENEN PARES CLAVE-VALOR
        * SON DINAMICOS
        */
        $numeros = [5,10,9,6,7,4]; // FORMA 1
        $numeros = array(6,10,9,4,3);// FORMA 2
        print_r($numeros); # PRINT RELATIONAL

        echo "<br></br>";

        //$animales = ["perro","gato","ornitorrinco","suricato","capibara"];
        $animales = [
            "A01" => "Perro",
            "A02" => "Gato",
            "A03" => "Ornitorrinco",
            "A04" => "Suricato",
            "A05" => "Capibara",            
        ];

        //Otra forma de declarar un array
        $animales = array(
            1 => "Perro",
            2 => "Gato",
            3 => "Ornitorrinco",
            4 => "Suricato",
            5 => "Capibara",            
        );
        //print_r($animales);

        echo "<p>". $animales[3] ."</p>";

        $animales[2] = "Koala";
        $animales[6] = "Iguana";
        $animales["A01"] = "Elefante";

        array_push($animales,"Morsa","Foca");//Añadir valores sin clave
        $animales[] = "Ganso";
        print_r($animales);
        unset($animales[1]); // Borrar

        echo "<br><br>";
        print_r($animales);

        echo "<br><br>";
        $animales = array_values($animales);//Cambia las claves ondenandolas numericamente
        print_r($animales);

        echo "<h3> Lista de animales con FOR </h3>";
        echo "<ol>";
        for($i = 0; $i < count($animales); $i++){
            echo "<li>".$animales[$i]."</li>";
        }
        echo "</ol>";

        echo "<h3> Lista de animales con WHILE </h3>";
        $i = 0;
        echo "<ol>";
        while($i < count($animales)){
            echo "<li>".$animales[$i]."</li>";
            $i++;
        }
        echo "</ol>";

        $cantidad_animales = count($animales);//Contar el numero de elementos que hay en el array

        echo "<h3> Hay $cantidad_animales animales</h3>";

        /**
         * EJERCICIO:
         * 
         * "4312 TDZ" => "Audi TT"
         * "1122 FFF => "Merecedes CLR"
         * 
         * CREAR EL ARRAY CON 3 COCHES
         * 
         * AÑADIR 2 COCHES CON SUS MATRICULAS
         * 
         * AÑADIR 1 COCHE SIN MATRICULA
         * 
         * BORRAR EL COCHE SIN MATRICULA
         * 
         * RESETEAR LAS CLAVES Y ALMACENAR EL RESULTADO EN OTRO ARRAY
         */

        $coches = [
            "4312 TDZ" => "Audi TT",
            "1122 FFF" => "Merecedes CLR",
            "3454 YHR" => "Opel Astra",
        ];

        $coches["1267 KLD"] = "Ferrari 355";
        $coches["3245 FGB"] = "FIAT 500";

        // Insertar elemento a un array sin clave
        array_push($coches,"BMW");

        // Borrar un elemento del array
        unset($coches[0]);
        print_r($coches);

        echo "<br><br>";

        // Copiar los valores de un array a otro
        $coches2 = array_values($coches);
        print_r($coches);

        echo "<h3>Lista de coches con FOREACH</h3>";
        echo "<ol>";
        foreach($coches as $coche){
            echo "<li> $coche </li>";
        }
        echo "</ol>";

        echo "<h3>Lista de coches con FOREACH con CLAVE</h3>";
        echo "<ol>";
        foreach($coches as $matricula => $coche){
            echo "<li> $matricula, $coche </li>";
        }
        echo "</ol>";
    ?>

    <table border="1">
        <caption>Coches</caption>
        <thead> 
            <tr>
                <th>Matrícula</th>
                <th>Coche</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($coches as $matricula => $coche){
                    echo "<tr>";
                    echo "<td> $matricula</td>";
                    echo "<td> $coche</td>";
                    echo "</tr>";
                } 
            ?>
        </tbody>
    </table>
    <br>
    <table border="1">
        <caption>Animales</caption>
        <thead> 
            <tr>
                <th>Código</th>
                <th>Animal</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($animales as $codigo => $animal){
                    echo "<tr>";
                    echo "<td> $codigo</td>";
                    echo "<td> $animal</td>";
                    echo "</tr>";
                } 
            ?>
        </tbody>
    </table>

    <h3>FOREACH RECOMENDABLE PARA BASE DE DATOS</h3>
    <table border="1">
        <caption>Animales</caption>
        <thead> 
            <tr>
                <th>Código</th>
                <th>Animal</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($animales as $codigo => $animal){ ?>
                <tr>
                    <td><?php echo $codigo ?></td>
                    <td><?php echo $animal ?></td>
                </tr>
            <?php }  ?>
        </tbody>
    </table>
</head>
</body>
</html>
