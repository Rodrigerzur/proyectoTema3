<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio12.php</title>
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
        //globals contiene todas las variables superglobales
        print_r($GLOBALS);
        echo '</span></br>';

        //con foreach recorriendo cada  valor de Request
        echo '</br><span class="enunciado">Mostrando con  "foreach()"</span><span class="respuesta"></br>';
        echo '<table><tr><th>Clave</th><th>Valor</th></th>';
        foreach ($_REQUEST as $key => $value) {
            echo '<tr>';
            echo "<td>$key</td>";
            echo "<td>$value</td>";
            echo '</tr>';
        }
        echo '</table>';

        //formateado el print_r con la etiqueta html <pre> para que los arrays vacios no muestren error
        echo '<h2>Mediante print_r (+ texto preformateado)</h2>';
        echo '<pre>';
        print_r($GLOBALS);
        echo '</pre>';
        echo'</span>';
        ?>
    </body>
</html>