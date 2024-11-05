<!--VIDEOJUEGOS
-----------------------------------------------------------------
titulo = 1-80 caracteres, cualquier caracter.
consola = Nintendo Switch, PS5, PS4, Xbox Series X/S (radio button) only 1 select
fecha de lanzamiento = el video juego más antiguo admisible será del 1 de enero de 1947, 
			y el más en el futuro no podrá dentro de más de 5 años 
			(5años a partir de hoy).
- pegi = (3,7,12,16,18) (select).
- descripción = 0-255 caracteres,  cualquier caracter (campo opcional) - (text area)

- LIMPIAR LOS DATOS DEL FORMULARIO Y VALIDARLOS
- MOSTRAR TODO POR PANTALLA SI HA PASADO LA VALIDACION
*/-->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Videojuegos</title>
</head>
<body>
    <h2>Formulario de Videojuego</h2>
  
    <form  action="" method="post">
        <label for="titulo">Título: </label>
        <input type="text" id="titulo" name="titulo"><br><br>

        <label>Consola:</label>
        <input type="radio" name="consola" value="Nintendo Switch"> Nintendo Switch
        <input type="radio" name="consola" value="PS5"> PS5
        <input type="radio" name="consola" value="PS4"> PS4
        <input type="radio" name="consola" value="Xbox Series X/S"> Xbox Series X/S<br><br>

        <label for="fecha">Fecha de lanzamiento:</label>
        <input type="date" id="fecha" name="fecha" ><br><br>

        <label for="pegi">PEGI:</label>
        <select id="pegi" name="pegi">
        <option value="3">3</option>
        <option value="7">7</option>
        <option value="12">12</option>
        <option value="16">16</option>
        <option value="18">18</option>
        </select><br><br>

        <label for="descripcion">Descripción:</label><br>
        <textarea id="descripcion" name="descripcion"></textarea><br><br>

        <button type="submit" name="submit">Enviar</button>
    </form>
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        
    }
    
    ?>
</body>
</html>

