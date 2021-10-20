<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>ejercicio07</title>
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
           #Solo el nombre del archivo actual
            echo 'El archivo en ejecucion actual es ';
            echo '<span class="respuesta">'.basename(__FILE__).'</span>';
            
            echo '</br></br>';
            #el nombre y la ruta ATENCION: netbeans marca que no es recomendable usar esto
            echo  '<span class="respuesta">'.$_SERVER['PHP_SELF'].'</span>';
        ?>
    </body>
</html>
