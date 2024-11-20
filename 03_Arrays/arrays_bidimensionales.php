<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arrays bidimensionales</title>
</head>
<body>
    <?php

    // CREAR UN ARRAY
    $array = [1,2,3,4];
    $videojuegos = [
        //"V01" => ["TITULO" => "Disco Elysium","CATEGORIA" => "RPG",9.99],
        ["Disco Elysium","RPG",9.99],
        ["Dragon Ball Z Kakarot","Acción",59.99],
        ["Persona 3","RPG",24.99],
        ["Commando 2","Estrategia",4.99],
        ["Hollow Knight","Metroidvania",9.99],
        ["Stardew Valley","Gestión de recursos",7.99],
    ];

    // AÑADIR VIDEOJUEGO
    $nuevo_videojuego = ["Octopath Traveler", "RPG", 24.95];
    array_push($videojuegos,$nuevo_videojuego);

    //---------- o ----------

    array_push($videojuegos,["Ender Lilies","Metroidvania",9.95]);

    /*// ELIMINAR VIDEOJUEGO. No se reajusta 
    unset($videojuegos[3]);
    unset($videojuegos[4]);*/

    // AÑADIR VIDEOJUEGO
    array_push($videojuegos,["Dota 2","MOBA",0]);
    array_push($videojuegos,["Fall Guys","Plataforma",0]);
    array_push($videojuegos,["Rocket League","Deporte",0]);
    array_push($videojuegos,["Lego Fortnite","Acción",0]);

    // CAE EN EXAMEN
    for($i = 0; $i < count($videojuegos); $i++){
        if($videojuegos[$i][2] == 0){
            $videojuegos[$i][3] = "Gratis";
        }else{
            $videojuegos[$i][3] = "De pago";
        }
    }

    //print_r($videojuegos);

    // VARIABLE AUXILIAR DE TITULO. Hay que volver a declararlas
    $_titulo = array_column($videojuegos, 0);

    // ORDENAR ARRAYS. SORT_DESC si fuera descendiente
    array_multisort($_titulo, SORT_ASC, $videojuegos);
    
    $_titulo = array_column($videojuegos, 0);
    $_categoria = array_column($videojuegos, 1);
    $_precio = array_column($videojuegos, 2);
    array_multisort($_categoria, SORT_ASC,
                    $_precio, SORT_DESC,
                    $_titulo,SORT_DESC,
                    $videojuegos);
    
    ?>
    <table border="1">
        <thead>
            <tr>
                <th>Videojuego</th>
                <th>Categoria</th>
                <th>Precio</th>
                <th>Tipo</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            foreach($videojuegos as $videojuego){
                //print_r($videojuego);
                //echo $videojuego[0]; también podemos sacar así las columnas
                //echo "<br><br>";

                // DESCOMPONE UN ARRAY EN VARIAS VARIABLES

                /* 
                TITULO = videojuego[0];
                CATEGORIA = videojuego[1];
                PRECIO = videojuego[2];
                */
                
                list($titulo,$categoria,$precio,$tipo) = $videojuego;
                echo "<tr>";
                echo "<td>$titulo</td>";
                echo "<td>$categoria</td>";
                echo "<td>$precio</td>";
                echo "<td>$tipo</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    
</body>
</html>