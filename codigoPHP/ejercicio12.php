<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio11.php</title>
        <style>
            .respuesta{
                font-weight: bold;
                font-size:17px;
                color:green;
            }
            .enunciado{
                font-weight: bold;
                font-size:20px;
            }
        </style>
    </head>
    <body>
        <?php
        echo '<span class="enunciado">Mostrando con  "print_r()"</span><span class="respuesta"></br>';
        print_r($GLOBALS);
        echo '</span></br>';

        echo '</br><span class="enunciado">Mostrando con  "foreach()"</span><span class="respuesta"></br>';
    


        echo '<h2>Mediante print_r (+ texto preformateado)</h2>';
        echo '<pre>';
        print_r($GLOBALS);
        echo '</pre>';
        echo'</span>';
        ?>
    </body>
</html>