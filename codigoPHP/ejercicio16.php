<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio16.php</title>
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
            <h1 style="text-align: center;"> Array asociativo, sueldo de la semana</br>Recorrerlo con funciones</h1>
        </header>
        <?php
        #array asociativo
        $aSueldo=[
            "lunes" =>55,
            "martes"=>55,
            "miercoles"=>70,
            "jueves"=>55,
            "viernes"=>60,
            "sabado"=>0,
            "domingo"=>0,
        ];
        reset($aSueldo);#colocamos el puntero al comienzo del array
        do{ 
            echo 'El dia de la semana es <span class="respuesta">'.key($aSueldo).'</span></br>';
            #KEY devuelve el valor clave de donde se encuentre el puntero en ese momento
            echo 'El sueldo de ese dia es <span class="respuesta">'.current($aSueldo).'€</span></br>';
            #Current devuelve el valor de donde se encuentre el puntero 
            next($aSueldo);
            #Next avanza el puntero una posicion dentro del array
        }while(key($aSueldo)!=null);
        #EACH esta declarado obsoleto a partir de php 7.2.0 SE RECOMIENDA NO USARLO
        
        reset($aSueldo);
        #en caso de que el array no tenga ningun elemento
        while(key($aSueldo)!=null){
            echo 'El dia de la semana es <span class="respuesta">'.key($aSueldo).'</span></br>';
            #KEY devuelve el valor clave de donde se encuentre el puntero en ese momento
            echo 'El sueldo de ese dia es <span class="respuesta">'.current($aSueldo).'€</span></br>';
            #Current devuelve el valor de donde se encuentre el puntero 
            next($aSueldo);
        }
        ?>
    </body>
</html>