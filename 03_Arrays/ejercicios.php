<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="estilos.css">
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );    
    ?>
</head>
<body>
<!--  EJERCICIO 1
                
    Desarrollo web en entorno servidor => Alejandra
    Desarrollo web en entorno cliente => José Miguel
    Diseño de interfaces web => José Miguel
    Despliegue de aplicaciones => Jaime
    Empresa e iniciativa emprendedora => Andrea
    Inglés => Virginia

    MOSTRARLO TODO EN UNA TABLA
-->
<?php $asignaturas = [
    "Desarrollo web en entorno servidor" => "Alejandra",
    "Desarrollo web en entorno cliente" => "José Miguel",
    "Diseño de interfaces web" => "José Miguel",
    "Despliegue de aplicaciones "=> "Jaime",
    "Empresa e iniciativa emprendedora" => "Andrea",
    "Inglés" => "Virginia",
];

?>

<table border="1">
    <caption>Asignaturas</caption>
    <thead>
        <th> Asignaturas </th>
        <th> Profesores </th>
    </thead>
    <tbody>
        <?php 
        /*
        sort($asignaturas);// Ordenar ascendente sin clave
        asort();// Ordena un array y mantiene la asociación de índices
        arsort();// Ordena un array en orden inverso y mantiene la asociación de índices
        ksort($asignaturas);// Ordena un array por clave 
        */
        foreach($asignaturas as $asignatura => $profesor){
            echo "<tr>";
            echo "<td>$asignatura</td>";
            echo "<td>$profesor</td>";
            echo "</tr>";
        } ?>
    </tbody>
</table>

<!--EJERCICIO 2
            
    Francisco => 3
    Daniel => 5
    Aurora => 10
    Luis => 7
    Samuel => 9

    MOSTRAR EN UNA TABLA CON 3 COLUMNAS
    - COLUMNA 1: ALUMNO
    - COLUMNA 2: NOTA
    - COLUMNA 3: SI NOTA < 5, SUSPENSO, ELSE, APROBADO

    EXTRA: SI UN ALUMNO ESTÁ SUSPENSO SE PONE EN ROJO LA FILA 
    Y SI ESTA APROBADO EN VERDE
-->
<?php
    $alumnos = [
        "Francisco" => 3,
        "Daniel" => 5,
        "Aurora" => 10,
        "Ismael" => 0,
        "Luis" => 7,
        "Samuel" => 9,
        "Juanjo" => 2,
        "Vicente" => 1,
    ]
?>
<br>
<table border="1">
    <caption>Calificaciones</caption>
    <thead>
        <th>Alumno </th>
        <th>Nota </th>
        <th>Estado </th>
    </thead>
    <tbody>
    <?php
            foreach($alumnos as $alumno=> $nota){ 
                echo "<tr>";
                echo "<td>$alumno</td>";
                echo "<td>$nota</td>";
                if($nota >= 5 && $nota < 10){ ?>
                    <td class="aprobado"><?php echo"Aprobado"; ?> </td>
                <?php }else if($nota == 10){ ?>
                    <td class="matricula"><?php echo"Matricula"; ?></td>
                <?php }
                else{ ?>
                    <td class="suspenso"><?php echo"Suspenso"; ?></td>
                <?php }
                echo "</tr>"  ?>
           <?php } ?>
    </tbody>
</table>

<!--EJERCICIO: Insertar dos nuevos estudiantes, con notas entre 0 y 10
    
    Borrar un estudiante (el que peor os caiga)  por la clave
    
    Mostrar en una nueva tabla todo ordenado por los nombres en orden alfabeticamente inverso
    
    Mostrar en una nueva tabla todo ordenado por la nota de 10 a 0 (orden inverso)
-->
<br>
<?php 
    // Insertar dos nuevos estudiantes, con notas entre 0 y 10
    $alumnos["Carlos"] = rand(0,10);
    $alumnos["Paula"] = rand(0,10);

    //  Borrar un estudiante (el que peor os caiga)  por la clave
    unset($alumnos["Ismael"]);
    print_r($alumnos);

    // Mostrar en una nueva tabla todo ordenado por los nombres en orden alfabeticamente inverso
    ?>  
    <br><br>
    <table border="1">
        <caption>Calificaciones con nombres en orden alfabetico inverso</caption>
        <thead>
            <th>Alumno </th>
            <th>Nota </th>
            <th>Estado </th>
        </thead>
        <tbody>
        <?php 
            // nombres en orden alfabeticamente inverso
            krsort($alumnos);
            foreach($alumnos as $alumno=> $nota){ 
                    echo "<tr>";
                    echo "<td>$alumno</td>";
                    echo "<td>$nota</td>";
                    if($nota >= 5 && $nota < 10){ ?>
                        <td class="aprobado"><?php echo"Aprobado"; ?> </td>
                    <?php }else if($nota == 10){ ?>
                        <td class="matricula"><?php echo"Matricula"; ?></td>
                    <?php }
                    else{ ?>
                        <td class="suspenso"><?php echo"Suspenso"; ?></td>
                    <?php }
                    echo "</tr>"  ?>
            <?php }  
                //print_r($alumnos);
            ?>
        </tbody>
    </table>
<?php 
    // Mostrar en una nueva tabla todo ordenado por la nota de 10 a 0 (orden inverso)
?>
    <br>
    <table border="1">
        <caption>Calificaciones ordenadas por nota de 10 a 0</caption>
        <thead>
            <th>Alumno </th>
            <th>Nota </th>
            <th>Estado </th>
        </thead>
        <tbody>
        <?php 
            // todo ordenado por la nota de 10 a 0 (orden inverso)
            arsort($alumnos);
            foreach($alumnos as $alumno=> $nota){ 
                    echo "<tr>";
                    echo "<td>$alumno</td>";
                    echo "<td>$nota</td>";
                    if($nota >= 5 && $nota < 10){ ?>
                        <td class="aprobado"><?php echo"Aprobado"; ?> </td>
                    <?php }else if($nota == 10){ ?>
                        <td class="matricula"><?php echo"Matricula"; ?></td>
                    <?php }
                    else{ ?>
                        <td class="suspenso"><?php echo"Suspenso"; ?></td>
                    <?php }
                    echo "</tr>"  ?>
            <?php }  
   
            ?>
        </tbody>
    </table>
</body>
</html>
