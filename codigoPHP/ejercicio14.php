<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio14.php</title>
        <style>
            .respuesta{
                font-weight: bold;
                font-size:17px;
                color:green;
                text-align: justify-all;
                background-color: rgba(208, 201, 205, 0.86);
            }
            div{
                
            }
            .enunciado{
                font-weight: bold;
                font-size:20px;
            }
            span{
                
            }
        </style>
    </head>
    <body>
        <?php
        
            echo '<span class="enunciado">Variables definidas</span><div class="respuesta">';
            var_dump( $vars = get_defined_vars());
            echo '</div></br>';
            echo '<span class="enunciado">Constantes definidas</span><div class="respuesta">';
            var_dump( $cons = get_defined_constants());
            echo '</div></br>';
            echo '<span class="enunciado">Funciones definidas</span><div class="respuesta">';
            var_dump( $fun = get_defined_functions());
            echo '</div></br>';
            
            
            echo '<span class="enunciado">Mi propia libreria de funciones</span><div class="respuesta">';
            function doblar($numero){
                $doble = $numero*2;
                return $doble;
            }
            function restar($numero, $numero2){
                $resultado = $numero - $numero2;
                return $resultado;
            }
            function sumar($numero, $numero2){
                $resultado = $numero + $numero2;
                return $resultado;
            }
            function multiplicar($numero, $numero2){
                $resultado = $numero * $numero2;
                return $resultado;
            }
            function dividir($iNumero, $iNumero2){
                $resultado = $iNumero / $iNumero2;
                return $resultado;
            }
            echo '</div></br>';
        ?>
    </body>
</html>