<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio17.php</title>
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
        #array bidimensional
        $aTeatro = [20][15];

        $aTeatro[1][1] = ('PEPE');
        $aTeatro[3][12] = ('PACO');
        $aTeatro[5][5] = ('OLGA');
        $aTeatro[14][15] = ('JOSE');
        $aTeatro[20][10] = ('MARIA');

        for ($fila = 1; $fila <= 20; $fila++) {
            for ($columna = 1; $columna <= 15; $columna++) {
                if ($aTeatro[$fila][$columna] != null) {
                    echo 'El asiento <span class="respuesta">' . $fila . 'F ' . $columna . 'C </span>esta ocupado por <span class="respuesta">' . $aTeatro[$fila][$columna] . '</span></br>';
                }
            }
        }

        foreach ($aTeatro as $fila) {
            echo "<br><b>ASIENTO OCUPADO EN</b><br>";
            foreach ($fila as $columna => $value) {
                echo '<span class="respuesta">Columna '.$columna.  ' Por '. $value. '</span><br>';
            }
        }
        ?>
    </body>
</html>