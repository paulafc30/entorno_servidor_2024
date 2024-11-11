<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2</title>
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );    
    ?>
</head>
<body>
    <?php
        $array1 = [];
        $array2 = [];
        $array3 = [];

        for($i = 0; $i < 5; $i++){
            array_push($array1,rand(1,10));
        }

        for($i = 0; $i < 5; $i++){
            array_push($array2,rand(10,100));
        }
        
        array_push($array3, $array1);
        array_push($array3, $array2);

        echo "<h3>Array1:</h3>";
        for($i = 0; $i < count($array1); $i++){
            if($i == count($array1)-1){
                print($array1[$i]. ". ");
            }else{
                print($array1[$i]. ", ");
            }
        }
    ?>
    <br><br>
    <?php
        echo "<h3>Array2:</h3>";
        for($i = 0; $i < count($array2); $i++){
            if($i == count($array2)-1){
                print($array2[$i]. ". ");
            }else{
                print($array2[$i]. ", ");
            }
        }

        echo "<h3>Array1:</h3>";
        $media1 = 0;
        $mayor1 = 1;
        $menor1 = 1000;
        for($i = 0; $i < count($array1); $i++){
            $media1 = $array1[$i] + $i;
            if($mayor1 < $array1[$i]){
                $mayor1 = $array1[$i];
            }
            if($menor1 > $array1[$i]){
                $menor1 = $array1[$i];
            }
        }
        echo "<p>La media es ". ($media1/count($array1))."</p>";
        echo "<p>El mayor es $mayor1</p>";
        echo "<p>El menor es $menor1</p>";
        

        echo "<h3>Array2:</h3>";
        $media2 = 0;
        $mayor2 = 1;
        $menor2 = 1000; // mejor poner array[0]
        for($i = 0; $i < count($array2); $i++){
            $media2 = $array2[$i] + $i;
            if($mayor2 < $array2[$i]){
                $mayor2 = $array2[$i];
            }
            if($menor2 > $array2[$i]){
                $menor2 = $array2[$i];
            }
        }
        echo "<p>La media es ". ($media2/count($array2))."</p>";
        echo "<p>El mayor es $mayor2</p>";
        echo "<p>El menor es $menor2</p>";

    ?>


    
    
</body>
</html>