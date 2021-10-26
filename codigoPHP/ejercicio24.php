<?php
/*
 * Autor: Rodrigo Geras
 * Fecha: 26/10/2021
 * Ejercicio:23. Construir un formulario para recoger un cuestionario realizado a una persona y mostrar en la misma página las preguntas y las respuestas
  recogidas; en el caso de que alguna respuesta esté vacía o errónea volverá a salir el formulario con el mensaje correspondiente
 */
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>OUTMANE BOUHOU:Ejercicio24</title>
        <link rel="stylesheet" type="text/css" href="../webroot/css/form.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="icon" href="../webroot/media/img/fav.png" type="image/ico" sizes="16x16">
        <style>
            span{
                color:red;
                font-weight: bold;
            }
        </style>
    </head>
    <body>

    </body>
</html>
<?php
require_once '../core/210322ValidacionFormularios.php';
define('OBLIGATORIO', 1);
$aErrores = ["nombre" => null,
    "altura" => null];

//Varible de entrada correcta inicializada a true
$entradaOK = true;
//Array de respuestas inicializado a null
$avalidos = ["nombre" => null,
    "altura" => null];
//comprobar si ha pulsado el button enviar 
if (isset($_REQUEST['Enviar'])) {

    //Comprobar si el campo nombre esta rellenado  y la altura
    $aErrores["nombre"] = validacionFormularios::comprobarAlfabetico($_REQUEST['nombre'], 200, 1, OBLIGATORIO);
    $aErrores["altura"] = validacionFormularios::comprobarEntero($_REQUEST['altura'], 200, 1, OBLIGATORIO);


    foreach ($aErrores as $key => $value) {
        //Comprobar si el campo ha sido rellenado
        if ($value != null) {
            $_REQUEST[$key] = "";
            $entradaOK = false;
        }
    }
} else {
    $entradaOK = false;
}
if ($entradaOK) {
    //Si los datos han sido introducidos correctamente
    $avalidos = ["nombre" => $_REQUEST['nombre'],
        "altura" => $_REQUEST['altura']];
    //Mostrar datos

    echo "Nombre: " . $avalidos['nombre'] . "<br>";
    echo "Su altura es : " . $avalidos['altura'] . "<br>";
} else {
    ?>
   
        
        
        
        <h2>Preguntas del formulario</h2>
                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                    <fieldset>
                        <legend style="border: 1px solid black; background-color: white">Nombre</legend>
                        <label for="LblNombre">Campo Obligatorio</label>
                        <input type="text" name="nombre" placeholder="Introduce nombre" id="LblNombre" value="<?php
                   if (isset($_REQUEST['nombre']) ) {
                       echo $_REQUEST['nombre'];
                   }
                   ?>"><span><?php
                   //mostrar el error del nombre
                   if ($aErrores["nombre"] != null) {
                       echo $aErrores['nombre'];
                   }
                   ?></span>
                    </fieldset> 
                        </br>
                        <fieldset>
                        <legend style="border: 1px solid black; background-color: white">Altura</legend>
                        <label for="LblAltura">Campo Obligatorio</label>
                        <input type="text" name="altura" placeholder="Introduce nombre" id="LblAltura" value="<?php
                   if (isset($_REQUEST['altura']) ) {
                       echo $_REQUEST['altura'];
                   }
                   ?>"><span><?php
                   //mostrar el error del nombre
                   if ($aErrores["altura"] != null) {
                       echo $aErrores['altura'];
                   }
                   ?></span>
                    </fieldset> 
                    <input type="submit" value="Enviar" name="Enviar">
                    <input type="reset" value="Borrar" name="Borrar">
                </form>
    
    <?php
}
?>
<body>
</body>
</html> 







