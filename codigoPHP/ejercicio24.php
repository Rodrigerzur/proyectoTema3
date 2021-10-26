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
        <title>Ejercicio24.php</title>
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
define('OPCIONAL',0);
$aErrores = ["nombre" => null,
    "altura" => null,
        "telefono" => null,
        "cp"=> null];

//Varible de entrada correcta inicializada a true
$entradaOK = true;
//Array de respuestas inicializado a null
$avalidos = ["nombre" => null,
    "altura" => null,
        "telefono" => null,
        "cp"=> null];
//comprobar si ha pulsado el button enviar 
if (isset($_REQUEST['Enviar'])) {

    //Comprobar si el campo nombre esta rellenado  y la altura
    $aErrores["nombre"] = validacionFormularios::comprobarAlfabetico($_REQUEST['nombre'], 200, 1, OBLIGATORIO);
    $aErrores["altura"] = validacionFormularios::comprobarEntero($_REQUEST['altura'], 200, 1, OBLIGATORIO);
    $aErrores["telefono"] = validacionFormularios::validarTelefono($_REQUEST['telefono'], OPCIONAL);
    $aErrores["cp"] = validacionFormularios::validarCp($_REQUEST['cp'], OPCIONAL);

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
        "altura" => $_REQUEST['altura'],
        "telefono" =>$_REQUEST['telefono'],
        "cp" =>$_REQUEST['cp']];
    //Mostrar datos

    echo "Nombre: " . $avalidos['nombre'] . "<br>";
    echo "Su altura es : " . $avalidos['altura'] . "<br>";
    echo "Su telefono es : ".$avalidos['telefono']."<br>";
    echo "Su codigo postal es : ".$avalidos['cp']."<br>";
} else {
    ?>
    <h2>Preguntas del formulario</h2>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
        <fieldset>
            <legend style="border: 1px solid black; background-color: white">Campo Obligatorio</legend>
            <label for="LblNombre">NOMBRE</label>
            <input type="text" name="nombre" placeholder="Introduce nombre" id="LblNombre" value="<?php
            if (isset($_REQUEST['nombre'])) {
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
            <legend style="border: 1px solid black; background-color: white">Campo Obligatorio</legend>
            <label for="LblAltura">ALTURA</label>
            <input type="text" name="altura" placeholder="Introduce nombre" id="LblAltura" value="<?php
                   if (isset($_REQUEST['altura'])) {
                       echo $_REQUEST['altura'];
                   }
                   ?>"><span><?php
                       //mostrar el error del nombre
                       if ($aErrores["altura"] != null) {
                           echo $aErrores['altura'];
                       }
                       ?></span>
        </fieldset> 
        </br>
        <fieldset>
            <legend style="border: 1px solid black; background-color: white">Campo Opcional</legend>
            <label for="LblTelefpmp">TELEFONO</label>
            <input type="text" name="telefono" placeholder="Introduce telefono" id="LblTelefono" value="<?php
                   if (isset($_REQUEST['telefono'])) {
                       echo $_REQUEST['telefono'];
                   }
                   ?>"><span><?php
                       //mostrar el error del nombre
                       if ($aErrores["telefono"] != null) {
                           echo $aErrores['telefono'];
                       }
                       ?></span>
        </fieldset> 
        </br>
        <fieldset>
            <legend style="border: 1px solid black; background-color: white">Campo Opcional</legend>
            <label for="LblCp">CODIGO POSTAL</label>
            <input type="text" name="cp" placeholder="Introduce codigo postal" id="LblCp" value="<?php
                   if (isset($_REQUEST['cp'])) {
                       echo $_REQUEST['cp'];
                   }
                   ?>"><span><?php
                       //mostrar el error del nombre
                       if ($aErrores["cp"] != null) {
                           echo $aErrores['cp'];
                       }
                       ?></span>
        </fieldset> 
        <input type="submit" value="Enviar" name="Enviar">
        
    </form>

    <?php
}
?>
<body>
</body>
</html> 







