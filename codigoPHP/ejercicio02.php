<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>ejercicio02.php</title>
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
        #se pueden usar comillas dobles desde PHP 5.3.0
        $sql = <<<"HEREDOC"
                USE AdventureWorks2012;
                GO
                SELECT *
                FROM Production.Product
                ORDER BY Name ASC;
                HEREDOC;
        
        echo '<span class="respuesta">'.$sql.'</span>';
        #si hacemos echo nl2br se pueden meter saltos de linea con \n Y haciendolo naturalmente como en un documento de texto
        ?>
    </body>
</html>