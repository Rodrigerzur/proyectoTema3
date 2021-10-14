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
        $fechaHora = new DateTime(null, new DateTimeZone('Europe/Madrid'));
        
        #Le damos el formato local antes de mostrarla
        echo nl2br("La fecha y hora actual en Madrid es \n");
        echo $fechaHora->format('d-m-Y H:i:s');
        
        echo nl2br("\n");
        echo nl2br("\n");
        #si queremos que aparezcan los nombres de los dias, en español, etc
        ##cambiamos la localidad a españa para que cambie el idioma
        setlocale(LC_TIME, 'es_ES', 'Spanish_Spain', 'Spanish'); 
        #creamos otro objeto fecha y lo pasamos a string para formatearlo
        $fecha2 = new DateTime(null, new DateTimeZone('Europe/Madrid'));
        $resultado = $fecha2->format('l-d-m-Y H:i:s');
        #utilizamos strftime al mostrarlo para que aparezca como queremos
        echo nl2br("La fecha formateada a español es \n");
        echo strftime('%A %d de %b de %Y',strtotime($resultado));
        ?>
    </body>
</html>