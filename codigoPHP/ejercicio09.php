<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio09.php</title>
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
        #el nombre y la ruta ATENCION: netbeans marca que no es recomendable usar esto
            $nombreFichero= $_SERVER['PHP_SELF'];
            echo 'La ruta del archivo que se esta ejecutando es <span class="respuesta">'.$nombreFichero.'</span>'; 
        ?>
    </body>
</html>