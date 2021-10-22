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
        <?php
        if (isset($_POST['Enviar'])) {
            echo
                '<h2>Respuestas del formulario</h2>
                <p class="respuesta">
                Modelo elegido   ' . $_REQUEST["modelo"] . '
                </p>';
            echo
                '<p class="respuesta">
                Color elegido ' .$_REQUEST["favcolor"].'
                </p>';
            echo
                '<p class="respuesta">
                $_REQUEST  = <pre class="respuesta">';
                print_r($_REQUEST);
            echo 
                '</pre>
                </p>';
        } else {
            echo
            '<h2>Preguntas del formulario</h2>
                <form action="#" method="post">
                    <fieldset>
                        <legend style="border: 1px solid black; background-color: white">Nombre</legend>
                        <label for="LblModelo">Nombre</label>
                        <input type="text" name="modelo" placeholder="Introduce nombre" id="LblModelo">
                    </fieldset> 
                        </br>
                    <fieldset>
                        <label for="favcolor">Selecciona un color:</label>
                        <input type="color" id="favcolor" name="favcolor">
                    </fieldset>	

                    <input type="submit" value="Enviar" name="Enviar">
                    <input type="reset" value="Borrar" name="Borrar">
                </form>';
        }
        ?>
    </body>
</html>