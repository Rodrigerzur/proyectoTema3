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
        $fechaHora = new DateTime(null, new DateTimeZone('Europe/Lisbon'));
        
        #Le damos el formato local antes de mostrarla
        echo nl2br("La fecha y hora actual en Oporto es \n");
        echo $fechaHora->format('d-m-Y H:i:s');
        
        echo nl2br("\n \n");
        #si queremos que aparezcan los nombres de los dias ..., en portugues, etc
        ##cambiamos la localidad a portugal para que cambie el idioma
        setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese'); 
        #creamos otro objeto fecha y lo pasamos a string para formatearlo
        $fecha2 = new DateTime(null, new DateTimeZone('Europe/Lisbon'));
        $resultado = $fecha2->format('d-m-Y H:i:s');
        #utilizamos strftime al mostrarlo para que aparezca como queremos
        echo nl2br("La fecha formateada a portugues es \n");
        echo strftime('%A %d de %B de %Y',strtotime($resultado));
        setlocale(LC_ALL, 'es_ES', 'Spanish_Spain', 'Spanish'); 
        ?>
    </body>
</html>