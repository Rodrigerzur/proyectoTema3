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
        $oFechaHora = new DateTime(null, new DateTimeZone('Europe/Madrid'));
        
        #Le damos el formato local antes de mostrarla
        echo "La fecha y hora actual en Madrid es </br>";
        echo $oFechaHora->format('d-m-Y H:i:s');
        
        echo '</br></br>';
        #si queremos que aparezcan los nombres de los dias, en español, etc
        ##cambiamos la localidad a españa para que cambie el idioma
        setlocale(LC_ALL, 'es_ES', 'Spanish_Spain', 'Spanish'); 
        #creamos otro objeto fecha y lo pasamos a string para formatearlo
        $oResultado = $oFechaHora->format('d-m-Y H:i:s');
        
        #utilizamos strftime al mostrarlo para que aparezca como queremos
        echo "La fecha formateada a español es ".strftime('%A %d de %B de %Y', strtotime($oResultado))."</br></br>";
        echo "La fecha formateada a español (solo el año) es ".strftime('%Y', strtotime($oResultado))."</br></br>";
        echo "La fecha formateada a español (solo el dia de la semana) es ".strftime('%A', strtotime($oResultado))."</br></br>";
        echo "La fecha formateada a español (solo el tiempo) es ".$oFechaHora->format('H:i:s')."</br></br>";
        echo "La fecha formateada a español (solo el timestamp) es ".$oFechaHora->getTimestamp()."</br></br>";
        echo "<p>La fecha actual sumando 30 dias es ".$oResultado->add(date_interval_create_from_date_string('30 days'));
        ?>
    </body>
</html>