<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio06.php</title>
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
            $oFechaHoraActual = new DateTime(null, new DateTimeZone('Europe/Lisbon'));
            echo 'La fecha actual sumando 60 dias es <span class="respuesta">'.$oFechaHoraActual->modify('+ 60 days')->format('d-m-Y H:i:s').'</span>';
        ?>
    </body>
</html>