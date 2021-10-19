<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio05.php</title>
    </head>
    <body>
        <?php
            
            $fechaStamp = new DateTime();
            echo "El valor del timeStamp de la variable fecha que cree es ".$fechaStamp->getTimestamp();
        ?>
    </body>
</html>