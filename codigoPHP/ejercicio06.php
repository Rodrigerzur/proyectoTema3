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
            
            echo "<p>La fecha actual sumando 70 horas es ".date("d-m-Y", strtotime("+70 hours"))."</p>";
        ?>
    </body>
</html>