<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio04.php</title>
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
        #creando una nuevo objeto datetime y fijamos la zona a Portugal
        $oFechaHoraActual = new DateTime(null, new DateTimeZone('Europe/Lisbon'));
        
        #Le damos el formato local antes de mostrarla
        echo 'La fecha y hora actual en Oporto es <span class="respuesta">'.$oFechaHoraActual->format('d-m-Y H:i:s').'</span>';
        
        echo '</br></br>';
        #si queremos que aparezcan los nombres de los dias ..., en portugues, etc
        ##cambiamos la localidad a portugal para que cambie el idioma
        setlocale(LC_ALL, 'pt_PT', 'pt_PT.utf-8', 'pt_PT.utf-8', 'portuguese'); 
        
        #utilizamos strftime al mostrarlo para que aparezca como queremos
        echo 'La fecha formateada a portuges es <span class="respuesta">'.strftime('%A %d de %B de %Y', strtotime($oFechaHoraActual->format('d-m-Y H:i:s')))."</span></br>";
        echo 'La fecha formateada a portuges (solo el año) es <span class="respuesta">'.strftime('%Y', strtotime($oFechaHoraActual->format('d-m-Y H:i:s')))."</span></br>";
        echo 'La fecha formateada a portuges (solo el dia de la semana) es <span class="respuesta">'.strftime('%A', strtotime($oFechaHoraActual->format('d-m-Y H:i:s')))."</span></br>";
        echo 'La fecha formateada a portuges (solo el tiempo) es <span class="respuesta">'.$oFechaHoraActual->format('H:i:s')."</span></br>";
        echo 'La fecha formateada a portuges (solo el timestamp) es <span class="respuesta">'.$oFechaHoraActual->getTimestamp()."</span></br>";
        echo 'La fecha actual sumando 30 dias es <span class="respuesta">'.$oFechaHoraActual->modify('+ 30 days')->format('d-m-Y H:i:s').'</span></br>';
        echo 'La fecha actual restando 30 dias es <span class="respuesta">'.$oFechaHoraActual->modify('- 60 days')->format('d-m-Y H:i:s').'</span>';
        ?>
    </body>
</html>