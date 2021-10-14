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
    </head>
    <body>
        <?php
           #Solo el nombre del archivo actual
            echo 'El archivo en ejecucion actual es ';
            echo basename(__FILE__);
            
            echo nl2br("\n");
            echo nl2br("\n");
            #el nombre y la ruta ATENCION: netbeans marca que no es recomendable usar esto
            $nombreFichero= $_SERVER['PHP_SELF'];
            echo $nombreFichero; 
        ?>
    </body>
</html>
