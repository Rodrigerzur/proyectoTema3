<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio03.php</title>
        <style>
            .respuesta{
                font-weight: bold;
                font-size:22px;
                color:green;
            }
            .atencion{
                font-weight:bold;
                font-size:30px;
                color: red;
            }
        </style>
    </head>
    <body>
        <?php
        #creando una nuevo objeto datetime y fijamos la zona a madrid
        $oFechaHoraActual = new DateTime(null, new DateTimeZone('Europe/Madrid'));
        
        #Le damos el formato local antes de mostrarla
        echo 'La fecha y hora actual en Madrid es <span class="respuesta">'.$oFechaHoraActual->format('d-m-Y H:i:s').'</span>';
        
        echo '</br></br>';
        #si queremos que aparezcan los nombres de los dias, en español, etc
        ##cambiamos la localidad a españa para que cambie el idioma
        setlocale(LC_ALL, 'es_ES.utf-8 ', 'Spanish_Spain.utf-8', 'Spanish');
        
        #utilizamos strftime al mostrarlo para que aparezca como queremos
        echo 'La fecha formateada a español es <span class="respuesta">'.strftime('%A %d de %B de %Y', strtotime($oFechaHoraActual->format('d-m-Y H:i:s')))."</span></br>";
        echo 'La fecha formateada a español (solo el año) es <span class="respuesta">'.strftime('%Y', strtotime($oFechaHoraActual->format('d-m-Y H:i:s')))."</span></br>";
        echo 'La fecha formateada a español (solo el dia de la semana) es <span class="respuesta">'.strftime('%A', strtotime($oFechaHoraActual->format('d-m-Y H:i:s')))."</span></br>";
        echo 'La fecha formateada a español (solo el tiempo) es <span class="respuesta">'.$oFechaHoraActual->format('H:i:s')."</span></br>";
        echo 'La fecha formateada a español (solo el timestamp) es <span class="respuesta">'.$oFechaHoraActual->getTimestamp()."</span></br>";
        echo 'La fecha actual sumando 30 dias es <span class="respuesta">'.$oFechaHoraActual->modify('+ 30 days')->format('d-m-Y H:i:s').'</span></br>';
        echo 'La fecha actual restando 30 dias es <span class="respuesta">'.$oFechaHoraActual->modify('- 60 days')->format('d-m-Y H:i:s').'</span>';
        
        echo '</br></br>';
        #en marruecos
        $oFechaHoraActualMarruecos = new DateTime(null, new DateTimeZone('Africa/Casablanca'));
        echo 'La fecha y hora actual en Casablanca es <span class="respuesta">'.$oFechaHoraActualMarruecos->format('d-m-Y H:i:s').'</span>';
        
        echo '</br>';
        #en arabe seria 
        #si quisieramos el idioma en arabe setlocale(LC_ALL, 'ar_MA', 'ar_MA.utf-8', 'ar_MA.utf8', 'ar');
        echo 'La fecha formateada a arabe es <span class="respuesta">'.strftime('%A %d de %B de %Y', strtotime($oFechaHoraActualMarruecos->format('d-m-Y H:i:s')))."</span></br>";
        echo '<span class="atencion"> CUIDADO: SOLO SE PUEDE HACER "SET LOCALE" UNA VEZ POR PAGINA WEB </span>'; 
        
        echo '</br></br>';
        #con una fecha predefinida
        $oFechaHoraCumple = new DateTime("01-05-1998");
        echo 'La fecha de mi nacimiento fue <span class="respuesta">'.strftime('%A %d de %B de %Y', strtotime($oFechaHoraCumple->format('d-m-Y H:i:s')))."</span></br></br>";
        echo 'La fecha de mi cumpleaños cuando tenga 30 años sera <span class="respuesta">'.strftime('%A %d de %B de %Y', strtotime($oFechaHoraCumple->modify('+ 30 years')->format('d-m-Y H:i:s'))).'</span>';
        ?>
    </body>
</html>