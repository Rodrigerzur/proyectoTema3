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
    </head>
    <body>
        <?php
            $oFechaHoraActual = new DateTime(null, new DateTimeZone('Europe/Lisbon'));
            echo "<p>La fecha actual sumando 60 dias es ".$oFechaHoraActual->modify('+ 60 days')->format('d-m-Y H:i:s');
        ?>
    </body>
</html>