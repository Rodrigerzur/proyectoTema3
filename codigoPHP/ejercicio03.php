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
    </head>
    <body>
        <?php
        #creando una nuevo objeto datetime y fijamos la zona a madrid
        $oFechaHoraActual = new DateTime(null, new DateTimeZone('Europe/Madrid'));
        
        #Le damos el formato local antes de mostrarla
        echo "La fecha y hora actual en Madrid es </br>";
        echo $oFechaHoraActual->format('d-m-Y H:i:s');
        
        echo '</br></br>';
        #si queremos que aparezcan los nombres de los dias, en español, etc
        ##cambiamos la localidad a españa para que cambie el idioma
        setlocale(LC_ALL, 'es_ES.utf-8 ', 'Spanish_Spain.utf-8', 'Spanish');
        
        #utilizamos strftime al mostrarlo para que aparezca como queremos
        echo "La fecha formateada a español es ".strftime('%A %d de %B de %Y', strtotime($oFechaHoraActual->format('d-m-Y H:i:s')))."</br></br>";
        echo "La fecha formateada a español (solo el año) es ".strftime('%Y', strtotime($oFechaHoraActual->format('d-m-Y H:i:s')))."</br></br>";
        echo "La fecha formateada a español (solo el dia de la semana) es ".strftime('%A', strtotime($oFechaHoraActual->format('d-m-Y H:i:s')))."</br></br>";
        echo "La fecha formateada a español (solo el tiempo) es ".$oFechaHoraActual->format('H:i:s')."</br></br>";
        echo "La fecha formateada a español (solo el timestamp) es ".$oFechaHoraActual->getTimestamp()."</br></br>";
        echo "<p>La fecha actual sumando 30 dias es ".$oFechaHoraActual->modify('+ 30 days')->format('d-m-Y H:i:s');
        echo "<p>La fecha actual restando 30 dias es ".$oFechaHoraActual->modify('- 60 days')->format('d-m-Y H:i:s');
        
        echo '</br></br>';
        #en marruecos
        $oFechaHoraActualMarruecos = new DateTime(null, new DateTimeZone('Africa/Casablanca'));
        echo "La fecha y hora actual en Casablanca es </br>";
        echo $oFechaHoraActualMarruecos->format('d-m-Y H:i:s');
        
        echo '</br></br>';
        #en arabe seria 
        #si quisieramos el idioma en arabe setlocale(LC_ALL, 'ar_MA', 'ar_MA.utf-8', 'ar_MA.utf8', 'ar');
        echo "La fecha formateada a arabe es ".strftime('%A %d de %B de %Y', strtotime($oFechaHoraActualMarruecos->format('d-m-Y H:i:s')))."</br></br>";
        
        ?>
    </body>
</html>