<?php
/*
 * Autor: Rodrigo Geras
 * dFechaObligatorio: 26/10/2021
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
        <title>Ejercicio25.php</title>
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

$aListaValoresRadio =['Opcion 1','Opcion 2'];
$aListaValoresLista =['solo','listaObligatoriopañado'];

$aErroresObligatorios = ["sStringObligatorio" => null,
    "iIntObligatorio" => null,
    "iTelefonoObligatorio" => null,
    "iCodigoPostalObligatorio" => null,
    "alfanumericoDireccionObligatorio" => null,
    "fFloatObligatorio" => null,
    "dFechaObligatorio" => null,
    "alfanumericoEmailObligatorio" => null,
    "alfanumericoEmailObligatorio" => null,
    "alfanumericoPasswordObligatorio" => null,
    "listaObligatorio" => null,
    "alfanumericoTextoLargoObligatorio" => null,
    "radioObligatorio"=>null];

//Varible de entrada correcta inicializada a true
$entradaOK = true;
//Array de respuestas inicializado a null
$aRespuestas = ["sStringObligatorio" => null,
    "iIntObligatorio" => null,
    "iTelefonoObligatorio" => null,
    "iCodigoPostalObligatorio" => null,
    "alfanumericoDireccionObligatorio" => null,
    "fFloatObligatorio" => null,
    "dFechaObligatorio" => null,
    "alfanumericoEmailObligatorio" => null,
    "alfanumericoEmailObligatorio" => null,
    "alfanumericoPasswordObligatorio" => null,
    "listaObligatorio" => null,
    "alfanumericoTextoLargoObligatorio" => null,
    "radioObligatorio" =>null];
//comprobar si ha pulsado el button enviar 
if (isset($_REQUEST['Enviar'])) {
    
    if(empty($_REQUEST['comidas'])){
        $_REQUEST['comidas']=null;
    }
    if(empty($_REQUEST['radioObligatorio'])){
        $_REQUEST['radioObligatorio']=null;
    }

    //Comprobar si el campo sStringObligatorio esta rellenado  y la iIntObligatorio
    $aErroresObligatorios["sStringObligatorio"] = validacionFormularios::comprobarAlfabetico($_REQUEST['sStringObligatorio'], 200, 1, OBLIGATORIO);
    $aErroresObligatorios["iIntObligatorio"] = validacionFormularios::comprobarEntero($_REQUEST['iIntObligatorio'], 200, 1, OBLIGATORIO);
    $aErroresObligatorios["iTelefonoObligatorio"] = validacionFormularios::validarTelefono($_REQUEST['iTelefonoObligatorio'], OBLIGATORIO);
    $aErroresObligatorios["iCodigoPostalObligatorio"] = validacionFormularios::validarCp($_REQUEST['iCodigoPostalObligatorio'], OBLIGATORIO);
    $aErroresObligatorios["alfanumericoDireccionObligatorio"] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['alfanumericoDireccionObligatorio'], $maxTamanio = 1000, $minTamanio = 1, OBLIGATORIO);
    $aErroresObligatorios["fFloatObligatorio"] = validacionFormularios::comprobarFloat($_REQUEST['fFloatObligatorio'], $max = PHP_FLOAT_MAX, $min = -PHP_FLOAT_MAX, OBLIGATORIO);
    $aErroresObligatorios["dFechaObligatorio"] = validacionFormularios::validarFecha($_REQUEST['dFechaObligatorio'], $dFechaObligatorioMaxima = '01/01/2200', $dFechaObligatorioMinima = "01/01/1900", OBLIGATORIO);
    $aErroresObligatorios["alfanumericoEmailObligatorio"] = validacionFormularios::validarEmail($_REQUEST['alfanumericoEmailObligatorio'], OBLIGATORIO);
    $aErroresObligatorios["alfanumericoEmailObligatorio"] = validacionFormularios::validarURL($_REQUEST['alfanumericoEmailObligatorio'], OBLIGATORIO);
    $aErroresObligatorios["alfanumericoPasswordObligatorio"] = validacionFormularios::validarPassword($_REQUEST['alfanumericoPasswordObligatorio'], $maximo = 16, $minimo = 2, $tipo = 3, OBLIGATORIO);
    $aErroresObligatorios["listaObligatorio"] = validacionFormularios::validarElementoEnLista($_REQUEST['listaObligatorio'], $aListaValoresLista);
    $aErroresObligatorios["alfanumericoTextoLargoObligatorio"] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['alfanumericoTextoLargoObligatorio'], $maxTamanio = 1000, $minTamanio = 1, OBLIGATORIO);
    $aErroresObligatorios["radioObligatorio"]=validacionFormularios::validarElementoEnLista($_REQUEST['radioObligatorio'], $aListaValoresRadio);

    #$aErroresObligatorios['hora'] = validacionFormularios::;

    foreach ($aErroresObligatorios as $campos => $value) {
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
    $aRespuestas = ["sStringObligatorio" => $_REQUEST['sStringObligatorio'],
        "iIntObligatorio" => $_REQUEST['iIntObligatorio'],
        "iTelefonoObligatorio" => $_REQUEST['iTelefonoObligatorio'],
        "iCodigoPostalObligatorio" => $_REQUEST['iCodigoPostalObligatorio'],
        "alfanumericoDireccionObligatorio" => $_REQUEST['alfanumericoDireccionObligatorio'],
        "fFloatObligatorio" => $_REQUEST['fFloatObligatorio'],
        "dFechaObligatorio" => $_REQUEST['dFechaObligatorio'],
        "alfanumericoEmailObligatorio" => $_REQUEST['alfanumericoEmailObligatorio'],
        "alfanumericoEmailObligatorio" => $_REQUEST['alfanumericoEmailObligatorio'],
        "alfanumericoPasswordObligatorio" => $_REQUEST['alfanumericoPasswordObligatorio'],
        "listaObligatorio" => $_REQUEST['listaObligatorio'],
        "alfanumericoTextoLargoObligatorio" => $_REQUEST['alfanumericoTextoLargoObligatorio'],
        "radioObligatorio" => $_REQUEST['radioObligatorio']];
    //Mostrar datos

    echo "Nombre: " . $aRespuestas['sStringObligatorio'] . "<br>";
    echo "Su Altura es : " . $aRespuestas['iIntObligatorio'] . "<br>";
    echo "Su Telefono es : " . $aRespuestas['iTelefonoObligatorio'] . "<br>";
    echo "Su codigo postal es : " . $aRespuestas['iCodigoPostalObligatorio'] . "<br>";
    echo "Su alfanumericoDireccionObligatorio  es : " . $aRespuestas['alfanumericoDireccionObligatorio'] . "<br>";
    echo "Su cantidada aportada es : " . $aRespuestas['fFloatObligatorio'] . "€<br>";
    echo "Su dFechaObligatorio de asistencia es " . $aRespuestas['dFechaObligatorio'] . "<br>";
    echo "Su alfanumericoEmailObligatorio es " . $aRespuestas['alfanumericoEmailObligatorio'] . "<br>";
    echo "Su pagina web es " . $aRespuestas['alfanumericoEmailObligatorio'] . "<br>";
    echo "Su contraseña es " . $aRespuestas['alfanumericoPasswordObligatorio'] . "<br>";
    echo "Vendra al evento " . $aRespuestas['listaObligatorio'] . "<br>";
    echo "Observaciones: " . $aRespuestas['alfanumericoTextoLargoObligatorio'] . "<br>";
    echo "Usted vendra ".$aRespuestas['radioObligatorio']."<br>"; 
} else {
    ?>
    <h2>FORMULARIO CAMPOS OBLIGATORIOS</h2>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
        <fieldset>
            <legend style="border: 1px solid black; background-color: white">Campos Obligatorios</legend>
            <label for="LblsStringObligatorio">STRING</label>
            <input type="text" name="sStringObligatorio" placeholder="String" id="LblsStringObligatorio" value="<?php
            if (isset($_REQUEST['sStringObligatorio'])) {
                echo $_REQUEST['sStringObligatorio'];
            }
            ?>"><span><?php
                       //mostrar el error del sStringObligatorio
                       if ($aErroresObligatorios["sStringObligatorio"] != null) {
                           echo $aErroresObligatorios['sStringObligatorio'];
                       }
                       ?></span>
            
            </br></br>
            
            <label for="LbliIntObligatorio">INT</label>
            <input type="text" name="iIntObligatorio" placeholder="184" id="LbliIntObligatorio" value="<?php
            if (isset($_REQUEST['iIntObligatorio'])) {
                echo $_REQUEST['iIntObligatorio'];
            }
            ?>"><span><?php
                       //mostrar el error del sStringObligatorio
                       if ($aErroresObligatorios["iIntObligatorio"] != null) {
                           echo $aErroresObligatorios['iIntObligatorio'];
                       }
                       ?></span>
            </br></br>
            <label for="LbliTelefonoObligatorio">TELEFONO</label>
            <input type="text" name="iTelefonoObligatorio" placeholder="687742475" id="LbliTelefonoObligatorio" value="<?php
            if (isset($_REQUEST['iTelefonoObligatorio'])) {
                echo $_REQUEST['iTelefonoObligatorio'];
            }
            ?>"><span><?php
                       //mostrar el error del sStringObligatorio
                       if ($aErroresObligatorios["iTelefonoObligatorio"] != null) {
                           echo $aErroresObligatorios['iTelefonoObligatorio'];
                       }
                       ?></span>
            
            </br></br>
            
            <label for="LbliCodigoPostalObligatorio">CODIGO POSTAL</label>
            <input type="text" name="iCodigoPostalObligatorio" placeholder="49600" id="LbliCodigoPostalObligatorio" value="<?php
            if (isset($_REQUEST['iCodigoPostalObligatorio'])) {
                echo $_REQUEST['iCodigoPostalObligatorio'];
            }
            ?>"><span><?php
                       //mostrar el error del sStringObligatorio
                       if ($aErroresObligatorios["iCodigoPostalObligatorio"] != null) {
                           echo $aErroresObligatorios['iCodigoPostalObligatorio'];
                       }
                       ?></span>
            
            </br></br>
            
            <label for="LblalfanumericoDireccionObligatorio">ALFANUMERICO DIRECCION</label>
            <input type="text" name="alfanumericoDireccionObligatorio" placeholder="Av. Federico Silva, 48" id="LblalfanumericoDireccionObligatorio" value="<?php
            if (isset($_REQUEST['alfanumericoDireccionObligatorio'])) {
                echo $_REQUEST['alfanumericoDireccionObligatorio'];
            }
            ?>"><span><?php
                       //mostrar el error del sStringObligatorio
                       if ($aErroresObligatorios["alfanumericoDireccionObligatorio"] != null) {
                           echo $aErroresObligatorios['alfanumericoDireccionObligatorio'];
                       }
                       ?></span>
            
            </br></br>
            
            <label for="LblfFloatObligatorio">FLOAT </label>
            <input type="text" name="fFloatObligatorio" placeholder="47.5" id="LblfFloatObligatorio" value="<?php
            if (isset($_REQUEST['fFloatObligatorio'])) {
                echo $_REQUEST['fFloatObligatorio'];
            }
            ?>"><span><?php
                       //mostrar el error del sStringObligatorio
                       if ($aErroresObligatorios["fFloatObligatorio"] != null) {
                           echo $aErroresObligatorios['fFloatObligatorio'];
                       }
                       ?></span>
            </br></br>
            <label for="LbldFechaObligatorio">FECHA</label>
            <input type="date" name="dFechaObligatorio" id="LbldFechaObligatorio" value="<?php
            if (isset($_REQUEST['dFechaObligatorio'])) {
                echo $_REQUEST['dFechaObligatorio'];
            }
            ?>"><span><?php
                       //mostrar el error del sStringObligatorio
                       if ($aErroresObligatorios["dFechaObligatorio"] != null) {
                           echo $aErroresObligatorios['dFechaObligatorio'];
                       }
                       ?></span>
            
            </br></br>
            
            
            <label for="LblalfanumericoPasswordObligatorio">CONTRASEÑA</label>
            <input type="password" name="alfanumericoPasswordObligatorio" id="LblalfanumericoPasswordObligatorio" placeholder="*******" value="<?php
            if (isset($_REQUEST['alfanumericoPasswordObligatorio'])) {
                echo $_REQUEST['alfanumericoPasswordObligatorio'];
            }
            ?>"><span><?php
                       //mostrar el error del sStringObligatorio
                       if ($aErroresObligatorios["alfanumericoPasswordObligatorio"] != null) {
                           echo $aErroresObligatorios['alfanumericoPasswordObligatorio'];
                       }
                       ?></span>
            
            </br></br>
            
            <label for="LblalfanumericoEmailObligatorio">URL</label>
            <input type="text" name="alfanumericoEmailObligatorio" id="LblalfanumericoEmailObligatorio" placeholder="Https://www.FakeWebsite.com" value="<?php
            if (isset($_REQUEST['alfanumericoEmailObligatorio'])) {
                echo $_REQUEST['alfanumericoEmailObligatorio'];
            }
            ?>"><span><?php
                       //mostrar el error del sStringObligatorio
                       if ($aErroresObligatorios["alfanumericoEmailObligatorio"] != null) {
                           echo $aErroresObligatorios['alfanumericoEmailObligatorio'];
                       }
                       ?></span>
            
            </br></br>
            
            <label for="listaObligatorio">LISTA DESPLEGABLE</label>
            <select name="listaObligatorio" id="listaObligatorio" value="<?php
            if (isset($_REQUEST['listaObligatorio'])) {
                echo $_REQUEST['listaObligatorio'];
            }
            ?>">
                <option value="Opcion 1">Opcion 1</option>
                <option value="Opcion 2">Opcion 2</option>
            </select>
            
            </br></br>
            
            <label for="listaObligatorio">TEXTO LARGO ALFANUMERICO</label>
            <br>
            <textarea name="alfanumericoTextoLargoObligatorio" rows="5" cols="30" placeholder="Observaciones"><?php
            if (isset($_REQUEST['alfanumericoTextoLargoObligatorio'])) {
                echo $_REQUEST['alfanumericoTextoLargoObligatorio'];
            }
            ?></textarea>
            <span><?php
                //mostrar el error del sStringObligatorio
                if ($aErroresObligatorios["alfanumericoTextoLargoObligatorio"] != null) {
                    echo $aErroresObligatorios['alfanumericoTextoLargoObligatorio'];
                }
                ?></span>
            
            </br></br>
            
            <label for="ModoLlegada">RADIO BUTTONS</label>
            <label for="Opcion 1"><input type="radio" name="radioObligatorio" id="Opcion 1" value="Opcion 1" <?php
            if (isset($_REQUEST['radioObligatorio']) && $_REQUEST['radioObligatorio'] == 'Opcion 1') {
                echo 'checked';
            }
            ?>>Opcion 1</label>
            <label for="Opcion 2"><input type="radio" name="radioObligatorio" id="Opcion 2" value="Opcion 2" <?php
            if (isset($_REQUEST['radioObligatorio'])   && $_REQUEST['radioObligatorio'] == 'Opcion 2') {
                echo "checked";
            }
            ?> > Opcion 2</label>
            <span><?php
                //mostrar el error del sStringObligatorio
                if ($aErroresObligatorios["radioObligatorio"] != null) {
                    echo $aErroresObligatorios['radioObligatorio'];
                }
                ?></span>
            
            </br></br>
           
        </fieldset> 
        </br>











        <h2>FORMULARIO CAMPOS OPCIONALES</h2>
        <fieldset>
            <legend style="border: 1px solid black; background-color: white">Campos Opcionales</legend>
            <label for="LblsStringObligatorio">STRING</label>
            <input type="text" name="sStringObligatorio" placeholder="String" id="LblsStringObligatorio" value="<?php
            if (isset($_REQUEST['sStringObligatorio'])) {
                echo $_REQUEST['sStringObligatorio'];
            }
            ?>"><span><?php
                       //mostrar el error del sStringObligatorio
                       if ($aErroresObligatorios["sStringObligatorio"] != null) {
                           echo $aErroresObligatorios['sStringObligatorio'];
                       }
                       ?></span>
            
            </br></br>
            
            <label for="LbliIntObligatorio">INT</label>
            <input type="text" name="iIntObligatorio" placeholder="184" id="LbliIntObligatorio" value="<?php
            if (isset($_REQUEST['iIntObligatorio'])) {
                echo $_REQUEST['iIntObligatorio'];
            }
            ?>"><span><?php
                       //mostrar el error del sStringObligatorio
                       if ($aErroresObligatorios["iIntObligatorio"] != null) {
                           echo $aErroresObligatorios['iIntObligatorio'];
                       }
                       ?></span>
            </br></br>
            <label for="LbliTelefonoObligatorio">TELEFONO</label>
            <input type="text" name="iTelefonoObligatorio" placeholder="687742475" id="LbliTelefonoObligatorio" value="<?php
            if (isset($_REQUEST['iTelefonoObligatorio'])) {
                echo $_REQUEST['iTelefonoObligatorio'];
            }
            ?>"><span><?php
                       //mostrar el error del sStringObligatorio
                       if ($aErroresObligatorios["iTelefonoObligatorio"] != null) {
                           echo $aErroresObligatorios['iTelefonoObligatorio'];
                       }
                       ?></span>
            
            </br></br>
            
            <label for="LbliCodigoPostalObligatorio">CODIGO POSTAL</label>
            <input type="text" name="iCodigoPostalObligatorio" placeholder="49600" id="LbliCodigoPostalObligatorio" value="<?php
            if (isset($_REQUEST['iCodigoPostalObligatorio'])) {
                echo $_REQUEST['iCodigoPostalObligatorio'];
            }
            ?>"><span><?php
                       //mostrar el error del sStringObligatorio
                       if ($aErroresObligatorios["iCodigoPostalObligatorio"] != null) {
                           echo $aErroresObligatorios['iCodigoPostalObligatorio'];
                       }
                       ?></span>
            
            </br></br>
            
            <label for="LblalfanumericoDireccionObligatorio">ALFANUMERICO DIRECCION</label>
            <input type="text" name="alfanumericoDireccionObligatorio" placeholder="Av. Federico Silva, 48" id="LblalfanumericoDireccionObligatorio" value="<?php
            if (isset($_REQUEST['alfanumericoDireccionObligatorio'])) {
                echo $_REQUEST['alfanumericoDireccionObligatorio'];
            }
            ?>"><span><?php
                       //mostrar el error del sStringObligatorio
                       if ($aErroresObligatorios["alfanumericoDireccionObligatorio"] != null) {
                           echo $aErroresObligatorios['alfanumericoDireccionObligatorio'];
                       }
                       ?></span>
            
            </br></br>
            
            <label for="LblfFloatObligatorio">FLOAT </label>
            <input type="text" name="fFloatObligatorio" placeholder="47.5" id="LblfFloatObligatorio" value="<?php
            if (isset($_REQUEST['fFloatObligatorio'])) {
                echo $_REQUEST['fFloatObligatorio'];
            }
            ?>"><span><?php
                       //mostrar el error del sStringObligatorio
                       if ($aErroresObligatorios["fFloatObligatorio"] != null) {
                           echo $aErroresObligatorios['fFloatObligatorio'];
                       }
                       ?></span>
            </br></br>
            <label for="LbldFechaObligatorio">FECHA</label>
            <input type="date" name="dFechaObligatorio" id="LbldFechaObligatorio" value="<?php
            if (isset($_REQUEST['dFechaObligatorio'])) {
                echo $_REQUEST['dFechaObligatorio'];
            }
            ?>"><span><?php
                       //mostrar el error del sStringObligatorio
                       if ($aErroresObligatorios["dFechaObligatorio"] != null) {
                           echo $aErroresObligatorios['dFechaObligatorio'];
                       }
                       ?></span>
            
            </br></br>
            
            
            <label for="LblalfanumericoPasswordObligatorio">CONTRASEÑA</label>
            <input type="password" name="alfanumericoPasswordObligatorio" id="LblalfanumericoPasswordObligatorio" placeholder="*******" value="<?php
            if (isset($_REQUEST['alfanumericoPasswordObligatorio'])) {
                echo $_REQUEST['alfanumericoPasswordObligatorio'];
            }
            ?>"><span><?php
                       //mostrar el error del sStringObligatorio
                       if ($aErroresObligatorios["alfanumericoPasswordObligatorio"] != null) {
                           echo $aErroresObligatorios['alfanumericoPasswordObligatorio'];
                       }
                       ?></span>
            
            </br></br>
            
            <label for="LblalfanumericoEmailObligatorio">URL</label>
            <input type="text" name="alfanumericoEmailObligatorio" id="LblalfanumericoEmailObligatorio" placeholder="Https://www.FakeWebsite.com" value="<?php
            if (isset($_REQUEST['alfanumericoEmailObligatorio'])) {
                echo $_REQUEST['alfanumericoEmailObligatorio'];
            }
            ?>"><span><?php
                       //mostrar el error del sStringObligatorio
                       if ($aErroresObligatorios["alfanumericoEmailObligatorio"] != null) {
                           echo $aErroresObligatorios['alfanumericoEmailObligatorio'];
                       }
                       ?></span>
            
            </br></br>
            
            <label for="listaObligatorio">LISTA DESPLEGABLE</label>
            <select name="listaObligatorio" id="listaObligatorio" value="<?php
            if (isset($_REQUEST['listaObligatorio'])) {
                echo $_REQUEST['listaObligatorio'];
            }
            ?>">
                <option value="Opcion 1">Opcion 1</option>
                <option value="Opcion 2">Opcion 2</option>
            </select>
            
            </br></br>
            
            <label for="listaObligatorio">TEXTO LARGO ALFANUMERICO</label>
            <br>
            <textarea name="alfanumericoTextoLargoObligatorio" rows="5" cols="30" placeholder="Observaciones"><?php
            if (isset($_REQUEST['alfanumericoTextoLargoObligatorio'])) {
                echo $_REQUEST['alfanumericoTextoLargoObligatorio'];
            }
            ?></textarea>
            <span><?php
                //mostrar el error del sStringObligatorio
                if ($aErroresObligatorios["alfanumericoTextoLargoObligatorio"] != null) {
                    echo $aErroresObligatorios['alfanumericoTextoLargoObligatorio'];
                }
                ?></span>
            
            </br></br>
            
            <label for="ModoLlegada">RADIO BUTTONS</label>
            <label for="Opcion 1"><input type="radio" name="radioObligatorio" id="Opcion 1" value="Opcion 1" <?php
            if (isset($_REQUEST['radioObligatorio']) && $_REQUEST['radioObligatorio'] == 'Opcion 1') {
                echo 'checked';
            }
            ?>>Opcion 1</label>
            <label for="Opcion 2"><input type="radio" name="radioObligatorio" id="Opcion 2" value="Opcion 2" <?php
            if (isset($_REQUEST['radioObligatorio'])   && $_REQUEST['radioObligatorio'] == 'Opcion 2') {
                echo "checked";
            }
            ?> > Opcion 2</label>
            <span><?php
                //mostrar el error del sStringObligatorio
                if ($aErroresObligatorios["radioObligatorio"] != null) {
                    echo $aErroresObligatorios['radioObligatorio'];
                }
                ?></span>
            
            </br></br>
           
        </fieldset> 
        </br>
        <input type="submit" value="Enviar" name="Enviar">
        
    </form>

    <?php
}
?>
<body>
</body>
</html> 







