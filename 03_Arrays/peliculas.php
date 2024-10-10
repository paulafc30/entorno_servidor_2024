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

     for($i = 0; $i < count($peliculas); $i++){
        $peliculas[$i][3] = rand(30,240);
    }
    for($i = 0; $i < count($peliculas); $i++){
       
        if($peliculas[$i][3] < 60){
            $peliculas[$i][4]="CORTOMETRAJE";
        }else{
            $peliculas[$i][4]="LARGOMETRAJE";
        }
    } 
    

    $_tipo = array_column($peliculas, 1);
    $_anio = array_column($peliculas, 2);
    $_titulo = array_column($peliculas, 0);
    array_multisort($_tipo, SORT_ASC, 
                    $_anio, SORT_DESC,
                    $_titulo, SORT_ASC,
                    $peliculas);
    ?>
    <table>
    <thead>
        <tr>
            <td>Titulo</td>
            <td>Tipo</td>
            <td>Año</td>
            <td>Duración</td>
            <td>Que es</td>
        </tr>
    </thead>
    <tbody>
        <?php 
        foreach($peliculas as $pelicula){
            list($nombre, $tipo, $anio, $duracion, $quees) = $pelicula;
            echo "<tr>";
            echo "<td>$nombre</td>";
            echo "<td>$tipo</td>";
            echo "<td>$anio</td>";
            echo "<td>$duracion</td>";
            echo "<td>$quees</td>";
            echo "</tr>";
        }
        ?>
    </tbody>
    </table>
    <br><br><br>
    <table>
    <thead>
        <tr>
            <td>Titulo</td>
            <td>Tipo</td>
            <td>Año</td>
        </tr>
    </thead>
    <tbody>
        <?php 
        foreach($peliculas as $pelicula){
            list($nombre, $tipo, $anio) = $pelicula;?>
            <tr>
            <td><?php echo $nombre ?></td>
            <td><?php echo $tipo ?></td>
            <td><?php echo $anio ?></td>
            </tr>
       <?php } 
        ?>
    </tbody>
    </table>
</body>
</html>