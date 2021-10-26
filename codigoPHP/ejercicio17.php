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
            table {
                border: 2px solid black;
                margin-left: 25%;
            }
            table caption{
                font-weight: bold;
                font-size:25px;
                font-family: sans-serif;
            }
            table tr td{
                border:1px solid black;
                padding:4px;
                text-align: center;
            }
        </style>
    </head>
    <body>
        <header>
            <h1 style="text-align: center;"> Array asociativo, sueldo de la semana</h1>
        </header>
        <?php
        #array bidimensional
         for ($fila = 1; $fila <= 20; $fila++) {
            for ($columna = 1; $columna <= 15; $columna++) {
                    echo $aTeatro[$fila][$columna]=null;
            }
        }
        $aTeatro[1][1] = ('PEPE');
        $aTeatro[3][12] = ('PACO');
        $aTeatro[5][5] = ('OLGA');
        $aTeatro[14][15] = ('JOSE');
        $aTeatro[20][10] = ('MARIA');

        for ($fila = 1; $fila <= 20; $fila++) {
            for ($columna = 1; $columna <= 15; $columna++) {
                if (isset($aTeatro[$fila][$columna])) {
                    echo 'El asiento <span class="respuesta">' . $fila . 'F ' . $columna . 'C </span>esta ocupado por <span class="respuesta">' . $aTeatro[$fila][$columna] . '</span></br>';
                }
            }
        }
        $contador = 0;
        foreach ($aTeatro as $fila) {
           $contador++;
            foreach ($fila as $columna => $value) {
                if(isset($value)){ 
                    echo '<br><b>ASIENTO OCUPADO EN FILA '.$contador.'</b><br>';
                echo '<span class="respuesta">Columna '.$columna.  ' Por '. $value. '</span><br>';
                }
            }
        }
        
        echo '<table><caption>POSICION EN EL TEATRO</caption>';
       for ($fila = 1; $fila <= 20; $fila++) {
           echo '<tr>';
            for ($columna = 1; $columna <= 15; $columna++) {
                if (isset($aTeatro[$fila][$columna])) {
                    echo '<td style="color:green; font-weight:bold;">'.$aTeatro[$fila][$columna].'</td>';
                }
                else{
                    echo '<td style="color:red;">VACIO</td>';
                }
            }echo'</tr>';
        }
        echo '</table>';
        ?>
    </body>
</html>