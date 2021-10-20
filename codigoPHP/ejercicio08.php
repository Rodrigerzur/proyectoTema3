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
        <style>
            .respuesta{
                font-weight: bold;
                font-size:22px;
                color:green;
            }
        </style>
    </head>
    <body>
        <?php
        echo 'La direccion IP del host de este equipo es ';
        echo '<span class="respuesta">'.getHostByName(getHostName()).'</span>';
        #He usado esta en vez de $_SERVER['SERVER_ADDR'] porque un pc puede tener varias ip Y esta muestra la del host virtual que se esta utilizando
        #ademas acceder a variables superglobales da advertencia 
        echo '</br></br>';
        echo 'La direccion ip de este equipo es <span class="respuesta">'.$_SERVER['SERVER_ADDR'].'</span>';
        ?>
    </body>
</html>
