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
        #array bidimensional de 20 filas y 15 columnas
         for ($fila = 1; $fila <= 20; $fila++) {
            for ($columna = 1; $columna <= 15; $columna++) {
                    echo $aTeatro[$fila][$columna]=null;
            }
        }
        
        //introduzco algunos valores en el array para su posterior comprobacion
        $aTeatro[1][1] = ('PEPE');
        $aTeatro[3][12] = ('PACO');
        $aTeatro[5][5] = ('OLGA');
        $aTeatro[14][15] = ('JOSE');
        $aTeatro[20][10] = ('MARIA');

        
        //recorriendo el array con for. 
        for ($fila = 1; $fila <= 20; $fila++) {
            for ($columna = 1; $columna <= 15; $columna++) {
                if (isset($aTeatro[$fila][$columna])) {
                    echo 'El asiento <span class="respuesta">' . $fila . 'F ' . $columna . 'C </span>esta ocupado por <span class="respuesta">' . $aTeatro[$fila][$columna] . '</span></br>';
                }
            }
        }
        
        //inicializar el contador que usare luego
        $contador = 0;
        //recorriendo el array con foreach 
        foreach ($aTeatro as $fila) {
           $contador++;  //contador suma 1 por cada fila que recorremos, util para luego mostrar la fila en la que se encuentra cada persona
            foreach ($fila as $columna => $persona) {
                if(isset($persona)){ 
                    echo '<br><b>ASIENTO OCUPADO EN FILA '.$contador.'</b><br>';
                echo '<span class="respuesta">Columna '.$columna.  ' Por '. $persona. '</span><br>';
                }
            }
        }
        
        
        //representacion grafica de la posicion de cada persona en el teatro mediante la construccion de una tabla con for.
        //Se puede realizar con los demas metodos como foreach pero solo lo realizo una vez
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