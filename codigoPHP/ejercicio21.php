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
        <header>
            <h1 style="text-align: center;"> Plantilla de formulario</h1>
        </header>

        <form action="tratamiento21.php" method="post">
            <fieldset>
                <legend style="border: 1px solid black; background-color: white">Nombre</legend>
                <label for="LblModelo">Nombre</label>
                <input type="text" name="modelo" placeholder="Introduce nombre" id="LblModelo">
            </fieldset> </br>
            <fieldset>
                <label for="favcolor">Selecciona un color:</label>
                <input type="color" id="favcolor" name="favcolor">
                
                
                
                <br>
                <label for="Comidas">A que comidas vas a asistir</label>
            <label for="comida"><input type="checkbox" name="comidas[]" id="comida" value="comida" <?php
            if (isset($_REQUEST['comidas']) && in_array('comida', $_REQUEST['comidas'])) {
                echo "checked";
            }
            ?>>Comida</label>
            <label for="Cena"><input type="checkbox" name="comidas[]" id="Cena" value="Cena" <?php
            if (isset($_REQUEST['comidas']) && in_array('cena', $_REQUEST['comidas'])) {
                echo "checked";
            }
            ?> > Cena</label>
            </fieldset>	

            <input type="submit" value="Enviar">
            <input type="reset" value="Borrar">
        </form>
    </body>
</html>