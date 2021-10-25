<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio23.php</title>
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
        
        include '../core/210322ValidacionFormularios.php';
        if (isset($_REQUEST['Enviar'])) {
            /*
             * Comprobacion de errores. 
             */
            $bEntradaOK = true;
            /*
             * Registro de errores.
             */
            $aErrores = [vacio=>'EL CAMPO ESTA VACIO',
                incorrecto=>'el valor es incorrecto'];
            
            //Recogida de los datos introducidos.
            $sName = $_REQUEST['modelo'];

            /*
             * Validación del nombre. 
             */
            if(validacionFormularios::comprobarAlfabetico($_REQUEST["modelo"], 300, 3) != null){
                $bEntradaOK = false;
                $aErrores = array_push(validacionFormularios::comprobarAlfabetico($_REQUEST["modelo"]));
            }
            
        } else {
         
            $bEntradaOK = false;
        }
        if ($bEntradaOK) {#Si todas las variables son correcta
            echo
                '<h2>Respuestas del formulario</h2>
                <p class="respuesta">
                Modelo elegido   ' . $_REQUEST["modelo"] . '
                </p>';
            echo
                '<p class="respuesta">
                $_REQUEST  = <pre class="respuesta">';
                print_r($_REQUEST);
            echo 
                '</pre>
                </p>';
        } else {//Código que se ejecuta antes de rellenar el formulario o cuando el formulario es incorrecto
            echo
            '<h2>Preguntas del formulario</h2>
                <form action="#" method="post">
                    <fieldset>
                        <legend style="border: 1px solid black; background-color: white">Nombre</legend>
                        <label for="LblModelo">Nombre</label>
                        <input type="text" name="modelo" placeholder="Introduce nombre" id="LblModelo">
                    </fieldset> 
                        </br>
                    <input type="submit" value="Enviar" name="Enviar">
                    <input type="reset" value="Borrar" name="Borrar">
                </form>';
        }
        ?>
    </body>
</html>