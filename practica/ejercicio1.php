<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );    
    ?>
</head>
<body>
    <?php
        $animes = [
            ["Nanatsu no Taizai", "Romance"],
            ["Black Clover", "Comedia"],
        ];

        array_push($animes,["Kimetsu no Yaiba","Accion"]);
        array_push($animes,["Naruto","Accion"]);

        //unset($animes[0]);

        for($i = 0; $i < count($animes); $i++){
            $animes[$i][2] = rand(1990,2030);
        }

        for($i = 0; $i < count($animes); $i++){
            $animes[$i][3] = rand(1,99);
        }

        for($i = 0; $i < count($animes); $i++){
            if($animes[$i][2] < 2025){
                $animes[$i][4] = "Ya disponible";
            }else{
                $animes[$i][4] = "Proximamente";
            }
        }

        $_genero = array_column($animes, 1);
        $_anio = array_column($animes, 2);
        $_titulo = array_column($animes, 0);
        array_multisort($_genero, SORT_ASC, 
                    $_anio, SORT_ASC,
                    $_titulo, SORT_ASC,
                    $animes);

    ?>
    <table border="1">
        <thead>
            <th>Titulo</th>
            <th>Género</th>
            <th>Año</th>
            <th>Número de episodios</th>
            <th>Disponibilidad</th>
        </thead>
        <tbody>
            <?php
                foreach($animes as $anime){
                    list($titulo, $genero, $anio, $episodios, $disponibilidad) = $anime;?>
                    <tr>
                        <td><?php echo $titulo ?></td>
                        <td><?php echo $genero ?></td>
                        <td><?php echo $anio ?></td>
                        <td><?php echo $episodios ?></td>
                        <td><?php echo $disponibilidad ?></td>
                    </tr>
            <?php } ?>
        </tbody>
    </table>
    
</body>
</html>