<?php
    $_servidor = "127.0.0.1"; // "localhost"
    $_usuario = "estudiante";
    $_contrasena = "estudiante";
    $_base_de_datos = "tienda_bd";

    // My sqli ó PDO
    // Crea una conexion con esos parametros y si no logra establecer la conexion, muere
    /* COMANDOS PARA INSTALAR Mysql
        sudo apt-get install php-mysqlnd
        sudo service apache2 restart
    */

    $_conexion = new Mysqli($_servidor, $_usuario, $_contrasena, $_base_de_datos)
        or die("Error de conexion");
?>