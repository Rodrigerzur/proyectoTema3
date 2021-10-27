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
            h2{
                font-family: sans-serif;
                font-size:2em;
                font-weight: bold;
                color:Blue;
                border-bottom: 5px solid blue;
                
                
            }
            span{
                color:red;
                font-weight: bold;
            }
            fieldset{
               
                width: 70%;
                background-color: rgba(45, 23, 143, 0.17);
                color:green;
                font-family: sans-serif;
                font-weight: bold;
                font-size:1.2em;
                padding:20px;
                text-align: justify;
                border:5px solid black;
            }
            fieldset legend{
                color:Red;
                font-size: 1.5em;
                padding:5px;
                margin: auto;
            }
            fieldset input{
                background-color: white;
                padding: 0.3rem;
            }
        </style>
    </head>
    <body>

    </body>
</html>
<?php
require_once '../core/210322ValidacionFormularios.php';
define('OBLIGATORIO', 1);
define('OPCIONAL', 0);

$aListaRadio =['Andando','En coche'];
$aListaCheckbox = ['comida','cena'];

$aErrores = ["sNombre" => null,
    "iAltura" => null,
    "iTelefono" => null,
    "cp" => null,
    "direccion" => null,
    "donacion" => null,
    "fecha" => null,
    "hora" => null,
    "email" => null,
    "sUrl" => null,
    "sPasswd" => null,
    "acom" => null,
    "sMessage" => null,
    "desplazamiento"=>null,
    "comidas" => null];

//Varible de entrada correcta inicializada a true
$entradaOK = true;
//Array de respuestas inicializado a null
$aRespuestas = ["sNombre" => null,
    "iAltura" => null,
    "iTelefono" => null,
    "cp" => null,
    "direccion" => null,
    "donacion" => null,
    "fecha" => null,
    "hora" => null,
    "email" => null,
    "sUrl" => null,
    "sPasswd" => null,
    "acom" => null,
    "sMessage" => null,
    "desplazamiento" =>null,
    "comidas"=> null];
//comprobar si ha pulsado el button enviar 
if (isset($_REQUEST['Enviar'])) {

    //Comprobar si el campo sNombre esta rellenado  y la iAltura
    $aErrores["sNombre"] = validacionFormularios::comprobarAlfabetico($_REQUEST['sNombre'], 200, 1, OBLIGATORIO);
    $aErrores["iAltura"] = validacionFormularios::comprobarEntero($_REQUEST['iAltura'], 200, 1, OBLIGATORIO);
    $aErrores["iTelefono"] = validacionFormularios::validarTelefono($_REQUEST['iTelefono'], OBLIGATORIO);
    $aErrores["cp"] = validacionFormularios::validarCp($_REQUEST['cp'], OBLIGATORIO);
    $aErrores["direccion"] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['direccion'], $maxTamanio = 1000, $minTamanio = 1, OBLIGATORIO);
    $aErrores["donacion"] = validacionFormularios::comprobarFloat($_REQUEST['donacion'], $max = PHP_FLOAT_MAX, $min = -PHP_FLOAT_MAX, OBLIGATORIO);
    $aErrores["fecha"] = validacionFormularios::validarFecha($_REQUEST['fecha'], $fechaMaxima = '01/01/2200', $fechaMinima = "01/01/1900", OBLIGATORIO);
    $aErrores["email"] = validacionFormularios::validarEmail($_REQUEST['email'], OBLIGATORIO);
    $aErrores["sUrl"] = validacionFormularios::validarURL($_REQUEST['sUrl'], OBLIGATORIO);
    $aErrores["sPasswd"] = validacionFormularios::validarPassword($_REQUEST['sPasswd'], $maximo = 16, $minimo = 2, $tipo = 3, OBLIGATORIO);
    $aErrores["acom"] = validacionFormularios::comprobarNoVacio($_REQUEST)['acom'];
    $aErrores["sMessage"] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['sMessage'], $maxTamanio = 1000, $minTamanio = 1, OBLIGATORIO);
    $aErrores["desplazamiento"]=validacionFormularios::validarElementoEnLista($_REQUEST['desplazamiento'], $aListaRadio);
    $aErrores["comidas"] = validacionFormularios::validarElementoEnLista($_REQUEST['comidas'], $aListaCheckbox);

    #$aErrores['hora'] = validacionFormularios::;

    foreach ($aErrores as $campos => $value) {
        //Comprobar si el campo ha sido rellenado
        if ($value != null) {
            $_REQUEST[$campos] = "";
            $entradaOK = false;
        }
    }
} else {
    $entradaOK = false;
}
if ($entradaOK) {
    //Si los datos han sido introducidos correctamente
    $aRespuestas = ["sNombre" => $_REQUEST['sNombre'],
        "iAltura" => $_REQUEST['iAltura'],
        "iTelefono" => $_REQUEST['iTelefono'],
        "cp" => $_REQUEST['cp'],
        "direccion" => $_REQUEST['direccion'],
        "donacion" => $_REQUEST['donacion'],
        "fecha" => $_REQUEST['fecha'],
        "hora" => $_REQUEST['hora'],
        "email" => $_REQUEST['email'],
        "sUrl" => $_REQUEST['sUrl'],
        "sPasswd" => $_REQUEST['sPasswd'],
        "acom" => $_REQUEST['acom'],
        "sMessage" => $_REQUEST['sMessage'],
        "desplazamiento" => $_REQUEST['desplazamiento'],
        "comidas" => $_REQUEST['comidas']];
    //Mostrar datos

    echo "Nombre: " . $aRespuestas['sNombre'] . "<br>";
    echo "Su Altura es : " . $aRespuestas['iAltura'] . "<br>";
    echo "Su Telefono es : " . $aRespuestas['iTelefono'] . "<br>";
    echo "Su codigo postal es : " . $aRespuestas['cp'] . "<br>";
    echo "Su direccion  es : " . $aRespuestas['direccion'] . "<br>";
    echo "Su cantidada aportada es : " . $aRespuestas['donacion'] . "€<br>";
    echo "Su fecha de asistencia es " . $aRespuestas['fecha'] . "<br>";
    echo "Su hora de asistencia es " . $aRespuestas['hora'] . "<br>";
    echo "Su email es " . $aRespuestas['email'] . "<br>";
    echo "Su pagina web es " . $aRespuestas['sUrl'] . "<br>";
    echo "Su contraseña es " . $aRespuestas['sPasswd'] . "<br>";
    echo "Vendra al evento " . $aRespuestas['acom'] . "<br>";
    echo "Observaciones: " . $aRespuestas['sMessage'] . "<br>";
    echo "Usted vendra ".$aRespuestas['desplazamiento']."<br>";
    echo "Usted asistira a las siguientes comidas ".$aRespuestas['comidas']."<br>";
} else {
    ?>
    <h2>Datos Del Primer Asistente</h2>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
        <fieldset>
            <legend style="border: 1px solid black; background-color: white">Campos Obligatorios</legend>
            <label for="LblsNombre">Nombre</label>
            <input type="text" name="sNombre" placeholder="Jose" id="LblsNombre" value="<?php
            if (isset($_REQUEST['sNombre'])) {
                echo $_REQUEST['sNombre'];
            }
            ?>"><span><?php
                       //mostrar el error del sNombre
                       if ($aErrores["sNombre"] != null) {
                           echo $aErrores['sNombre'];
                       }
                       ?></span>
            
            </br></br>
            
            <label for="LbliAltura">Altura</label>
            <input type="text" name="iAltura" placeholder="184" id="LbliAltura" value="<?php
            if (isset($_REQUEST['iAltura'])) {
                echo $_REQUEST['iAltura'];
            }
            ?>"><span><?php
                       //mostrar el error del sNombre
                       if ($aErrores["iAltura"] != null) {
                           echo $aErrores['iAltura'];
                       }
                       ?></span>
            </br></br>
            <label for="LbliTelefono">Telefono</label>
            <input type="text" name="iTelefono" placeholder="687742475" id="LbliTelefono" value="<?php
            if (isset($_REQUEST['iTelefono'])) {
                echo $_REQUEST['iTelefono'];
            }
            ?>"><span><?php
                       //mostrar el error del sNombre
                       if ($aErrores["iTelefono"] != null) {
                           echo $aErrores['iTelefono'];
                       }
                       ?></span>
            
            </br></br>
            
            <label for="LblCp">CODIGO POSTAL</label>
            <input type="text" name="cp" placeholder="49600" id="LblCp" value="<?php
            if (isset($_REQUEST['cp'])) {
                echo $_REQUEST['cp'];
            }
            ?>"><span><?php
                       //mostrar el error del sNombre
                       if ($aErrores["cp"] != null) {
                           echo $aErrores['cp'];
                       }
                       ?></span>
            
            </br></br>
            
            <label for="LblDireccion">DIRECCION</label>
            <input type="text" name="direccion" placeholder="Av. Federico Silva, 48" id="LblDireccion" value="<?php
            if (isset($_REQUEST['direccion'])) {
                echo $_REQUEST['direccion'];
            }
            ?>"><span><?php
                       //mostrar el error del sNombre
                       if ($aErrores["direccion"] != null) {
                           echo $aErrores['direccion'];
                       }
                       ?></span>
            
            </br></br>
            
            <label for="LblDonacion">DONACION</label>
            <input type="text" name="donacion" placeholder="47.5" id="LblDonacion" value="<?php
            if (isset($_REQUEST['donacion'])) {
                echo $_REQUEST['donacion'];
            }
            ?>"><span><?php
                       //mostrar el error del sNombre
                       if ($aErrores["donacion"] != null) {
                           echo $aErrores['donacion'];
                       }
                       ?></span>
            </br></br>
            <label for="LblFecha">Fecha de asistencia</label>
            <input type="date" name="fecha" id="LblFecha" value="<?php
            if (isset($_REQUEST['fecha'])) {
                echo $_REQUEST['fecha'];
            }
            ?>"><span><?php
                       //mostrar el error del sNombre
                       if ($aErrores["fecha"] != null) {
                           echo $aErrores['fecha'];
                       }
                       ?></span>
            
            </br></br>
            
            <label for="LblHora">Hora estimada de asistencia</label>
            <input type="time" name="HORA" id="LblHora" value="<?php
            if (isset($_REQUEST['hora'])) {
                echo $_REQUEST['hora'];
            }
            ?>"><span><?php
                       //mostrar el error del sNombre
                       if ($aErrores["hora"] != null) {
                           echo $aErrores['hora'];
                       }
                       ?></span>
            </br></br>
            <label for="LblEmail">Email del asistente</label>
            <input type="text" name="email" id="LblEmail" placeholder="FakeEmail@prueba.com" value="<?php
            if (isset($_REQUEST['email'])) {
                echo $_REQUEST['email'];
            }
            ?>"><span><?php
                       //mostrar el error del sNombre
                       if ($aErrores["email"] != null) {
                           echo $aErrores['email'];
                       }
                       ?></span>
            
            </br></br>
            
            <label for="LblsPasswd">Contraseña para registrarte</label>
            <input type="password" name="sPasswd" id="LblsPasswd" placeholder="*******" value="<?php
            if (isset($_REQUEST['sPasswd'])) {
                echo $_REQUEST['sPasswd'];
            }
            ?>"><span><?php
                       //mostrar el error del sNombre
                       if ($aErrores["sPasswd"] != null) {
                           echo $aErrores['sPasswd'];
                       }
                       ?></span>
            
            </br></br>
            
            <label for="LblsUrl">Pagina web</label>
            <input type="text" name="sUrl" id="LblsUrl" placeholder="Https://www.FakeWebsite.com" value="<?php
            if (isset($_REQUEST['sUrl'])) {
                echo $_REQUEST['sUrl'];
            }
            ?>"><span><?php
                       //mostrar el error del sNombre
                       if ($aErrores["sUrl"] != null) {
                           echo $aErrores['sUrl'];
                       }
                       ?></span>
            
            </br></br>
            
            <label for="acom">Como acudirá</label>
            <select name="acom" id="acom" value="<?php
            if (isset($_REQUEST['acom'])) {
                echo $_REQUEST['acom'];
            }
            ?>"><option value=null></option>
                <option value="solo">SOLO</option>
                <option value="acompañado">ACOMPAÑADO</option>
            </select>
            
            </br></br>

            <textarea name="sMessage" rows="5" cols="30" placeholder="Observaciones"><?php
            if (isset($_REQUEST['sMessage'])) {
                echo $_REQUEST['sMessage'];
            }
            ?></textarea>
            <span><?php
                //mostrar el error del sNombre
                if ($aErrores["sMessage"] != null) {
                    echo $aErrores['sMessage'];
                }
                ?></span>
            
            </br></br>
            
            <label for="ModoLlegada">Modo Llegada</label>
            <label for="Andando"><input type="radio" name="desplazamiento" id="Andando" value="Andando" <?php
            if (isset($_REQUEST['desplazamiento']) === 'Andando') {
                echo "checked";
            }
            ?>>Andando</label>
            <label for="Coche"><input type="radio" name="desplazamiento" id="Coche" value="En coche" <?php
            if (isset($_REQUEST['desplazamiento']) === 'En coche') {
                echo "checked";
            }
            ?> > En coche</label>
            <span><?php
                //mostrar el error del sNombre
                if ($aErrores["desplazamiento"] != null) {
                    echo $aErrores['desplazamiento'];
                }
                ?></span>
            
            </br></br>
            
            <label for="Comidas">A que comidas vas a asistir</label>
            <label for="comida"><input type="checkbox" name="comidas" id="comida" value="comida" <?php
            if (isset($_REQUEST['comidas']) && in_array('comida', $_REQUEST['comidas'])) {
                echo "checked";
            }
            ?>>Comida</label>
            <label for="Cena"><input type="checkbox" name="comidas" id="Cena" value="Cena" <?php
            if (isset($_REQUEST['comidas']) && in_array('cena', $_REQUEST['comidas'])) {
                echo "checked";
            }
            ?> > Cena</label>
            <span><?php
                //mostrar el error del sNombre
                if ($aErrores["comidas"] != null) {
                    echo $aErrores['comidas'];
                }
                ?></span>
            </br></br>
            
        </fieldset> 
        </br>











        <h2>Datos Acompañante</h2>

        <input type="submit" value="Enviar" name="Enviar">

    </form>

    <?php
}
?>
<body>
</body>
</html> 







