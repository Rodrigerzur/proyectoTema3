<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio21.php</title>
        <style>
            .respuesta{
                font-weight: bold;
                font-size:22px;
                color:green;
            }
        </style>
    </head>
    <body>

        <p>
            Modelo elegido   <?php echo $_REQUEST["modelo"]; ?>
        </p>
        <p>
            Color elegido   <?php echo $_REQUEST["favcolor"]; ?>
        </p>
         <p>
            $_REQUEST  = <?php print_r ($_REQUEST); ?>
        </p>
    </body>
</html>