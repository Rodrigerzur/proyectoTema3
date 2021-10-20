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
    </head>
    <body>
        <?php
        #creando una nuevo objeto datetime y fijamos la zona a Portugal
        $oFechaHoraActual = new DateTime(null, new DateTimeZone('Europe/Lisbon'));
        
        #Le damos el formato local antes de mostrarla
        echo "La fecha y hora actual en Oporto es </br>";
        echo $oFechaHoraActual->format('d-m-Y H:i:s');
        
        echo '</br></br>';
        #si queremos que aparezcan los nombres de los dias ..., en portugues, etc
        ##cambiamos la localidad a portugal para que cambie el idioma
        setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese'); 
        
        #utilizamos strftime al mostrarlo para que aparezca como queremos
        echo "La fecha formateada a español es ".strftime('%A %d de %B de %Y', strtotime($oFechaHoraActual->format('d-m-Y H:i:s')))."</br></br>";
        echo "La fecha formateada a español (solo el año) es ".strftime('%Y', strtotime($oFechaHoraActual->format('d-m-Y H:i:s')))."</br></br>";
        echo "La fecha formateada a español (solo el dia de la semana) es ".strftime('%A', strtotime($oFechaHoraActual->format('d-m-Y H:i:s')))."</br></br>";
        echo "La fecha formateada a español (solo el tiempo) es ".$oFechaHoraActual->format('H:i:s')."</br></br>";
        echo "La fecha formateada a español (solo el timestamp) es ".$oFechaHoraActual->getTimestamp()."</br></br>";
        echo "<p>La fecha actual sumando 30 dias es ".$oFechaHoraActual->modify('+ 30 days')->format('d-m-Y H:i:s');
        echo "<p>La fecha actual restando 30 dias es ".$oFechaHoraActual->modify('- 60 days')->format('d-m-Y H:i:s');
        ?>
    </body>
</html>