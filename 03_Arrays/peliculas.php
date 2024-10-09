<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Películas</title>
</head>
<body>
    <?php
    $peliculas = [
        ["Kárate a muerte en Torremolinos","Acción",1975],
        ["Sharknado 1-5", "Acción",2015],
        ["Princesa por sorpresa 2","Comedia",2008],
        ["Temblores 4","Terror",2018],
        ["Cariño, he encogido a los niños","Aventuras",2001],
        ["Stuart Little","Infantil",2000],
    ];

    /**
     * 1. AÑADIR CON UN RAND, LA DURACION DE CADA PELICULA COMO UNA NUEVA COLUMNA. 
     *    LA DURACION SERÁ UN NUMERO ALEATORIO ENTRE 30 Y 240.
     * 
     * 2. AÑADIR COMO UNA NUEVA COLUMNA, EL TIPO DE PELICULA. EL TIPO SERÁ: 
     *      - CORTOMETRAJE, SI LA DURACIÓN ES MENOR QUE 60
     *      - LARGOMETRAJE, SI LA DURACION ES MAYOR O IGUAL QUE 60
     * 
     * 3. MOSTRAR EN OTRA TABLA, TODAS LAS COLUMNAS, Y ORDENAR ADEMÁS EN ESTE ORDEN: 
     *      1. GÉNERO
     *      2. AÑO
     *      3. TITULO (TODO ALFABETICAMENTE, Y EL AÑO DE MÁS RECIENTE A MÁS ANTIGUO)
     * */ 

    
    
    ?>

    <table border="1">
        <thead>
            <tr>
                <th>Película</th>
                <th>Categoria</th>
                <th>Año</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($peliculas as $pelicula){
                list($titulo,$genero,$anio,$duracion) = $pelicula;
                echo "<tr>";
                echo "<td>$titulo</td>";
                echo "<td>$genero</td>";
                echo "<td>$anio</td>";
                echo "<td>";
                $duracion = rand(30,240);
                echo "</td>";
                echo "</tr>";
            }

            ?>
            <tr>
                <td></td>
            </tr>
        </tbody>
    </table>
</body>
</html>