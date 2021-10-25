<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio15.php</title>
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
            <h1 style="text-align: center;"> Array asociativo, sueldo de la semana</h1>
        </header>
        <?php
        #array asociativo
        $aSueldo=[
            "lunes" =>55,
            "martes"=>55,
            "miercoles"=>70,
            "jueves"=>55,
            "viernes"=>60,
            "sabado"=>0,
            "domingo"=>0,
        ];
       $acumulador=0;
        foreach ($aSueldo as $dia => $cantidad) {
            echo'El sueldo del dia <span class="respuesta">'.$dia.' </span> es <span class="respuesta">'.$cantidad.'€</span>';
            echo '</br>';
            $acumulador=$acumulador+$cantidad;
        }
        echo '</br>El sueldo total de toda la semana es <span class="respuesta">'.$acumulador.'€</span>';
        ?>
    </body>
</html>