<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>ejercicio08</title>
    </head>
    <body>
        <?php
        echo 'La direccion IP de este equipo es ';
        echo getHostByName(getHostName());
        #He usado esta en vez de $_SERVER['SERVER_ADDR'] porque un pc puede tener varias ip Y esta muestra la del host virtual que se esta utilizando
        #ademas acceder a variables superglobales da advertencia 
        echo '</br></br>';
        echo $_SERVER['SERVER_ADDR'];
        ?>
    </body>
</html>
