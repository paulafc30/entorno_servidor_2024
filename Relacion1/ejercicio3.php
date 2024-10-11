<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3</title>
</head>
<body>
    <?php
    /**Dada la lista de países y sus capitales mostrada en la 
    siguiente página, muéstralos en una tabla ordenados por los 
    nombres de sus países 
    */
    $paises = array( "Italy"=>"Rome", "Luxembourg"=>"Luxembourg", "Belgium"=>
    "Brussels", "Denmark"=>"Copenhagen", "Finland"=>"Helsinki", "France" =>
    "Paris", "Slovakia"=>"Bratislava", "Slovenia"=>"Ljubljana", "Germany" =>
    "Berlin", "Greece" => "Athens", "Ireland"=>"Dublin",
    "Netherlands"=>"Amsterdam", "Portugal"=>"Lisbon", "Spain"=>"Madrid",
    "Sweden"=>"Stockholm", "United Kingdom" =>"London", "Cyprus"=>"Nicosia",
    "Lithuania"=>"Vilnius", "Czech Republic" =>"Prague", "Estonia"=>"Tallin",
    "Hungary"=>"Budapest", "Latvia"=>"Riga", "Malta"=>"Valetta", "Austria" =>
    "Vienna", "Poland"=>"Warsaw") ;
    ?>

    <table border = "1">
        <thead>
            <th>
                País
            </th>
            <th>
                Capital
            </th>
        </thead>
        <tbody>
            <?php
                asort($paises);
                foreach($paises as $capital => $pais){
                    echo "<tr>";
                    echo "<td>$pais</td>";
                    echo "<td>$capital</td>";
                    echo "</tr>";
                }
            ?>

        </tbody>
    </table>
</body>
</html>