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
            legend{
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

$aListaValoresRadio = ['Opcion 1', 'Opcion 2'];
$aListaValoresLista = ['Opcion 1', 'Opcion 2'];
$aListaValoresCheckbox = ['Opcion 1', 'Opcion 2'];

$aErrores = ["sStringObligatorio" => null,
    "iIntObligatorio" => null,
    "iTelefonoObligatorio" => null,
    "iCodigoPostalObligatorio" => null,
    "alfanumericoDireccionObligatorio" => null,
    "fFloatObligatorio" => null,
    "dFechaObligatorio" => null,
    "alfanumericoUrlObligatorio" => null,
    "alfanumericoPasswordObligatorio" => null,
    "listaObligatorio" => null,
    "alfanumericoTextoLargoObligatorio" => null,
    "radioObligatorio" => null,
    "checkboxesObligatorias" =>null,
    "sStringOpcional" => null,
    "iIntOpcional" => null,
    "iTelefonoOpcional" => null,
    "iCodigoPostalOpcional" => null,
    "alfanumericoDireccionOpcional" => null,
    "fFloatOpcional" => null,
    "dFechaOpcional" => null,
    "alfanumericoUrlOpcional" => null,
    "alfanumericoPasswordOpcional" => null,
    "alfanumericoTextoLargoOpcional" => null];

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
    "alfanumericoUrlObligatorio" => null,
    "alfanumericoPasswordObligatorio" => null,
    "listaObligatorio" => null,
    "alfanumericoTextoLargoObligatorio" => null,
    "radioObligatorio" => null,
    "checkboxesObligatorias" => null,
    "sStringOpcional" => null,
    "iIntOpcional" => null,
    "iTelefonoOpcional" => null,
    "iCodigoPostalOpcional" => null,
    "alfanumericoDireccionOpcional" => null,
    "fFloatOpcional" => null,
    "dFechaOpcional" => null,
    "alfanumericoUrlOpcional" => null,
    "alfanumericoPasswordOpcional" => null,
    "alfanumericoTextoLargoOpcional" => null];

//comprobar si ha pulsado el button enviar 
if (isset($_REQUEST['Enviar'])) {

    //Comprobar si el campo sStringObligatorio esta rellenado  y la iIntObligatorio
    $aErrores["sStringObligatorio"] = validacionFormularios::comprobarAlfabetico($_REQUEST['sStringObligatorio'], 200, 1, OBLIGATORIO);
    $aErrores["iIntObligatorio"] = validacionFormularios::comprobarEntero($_REQUEST['iIntObligatorio'], 200, 1, OBLIGATORIO);
    $aErrores["iTelefonoObligatorio"] = validacionFormularios::validarTelefono($_REQUEST['iTelefonoObligatorio'], OBLIGATORIO);
    $aErrores["iCodigoPostalObligatorio"] = validacionFormularios::validarCp($_REQUEST['iCodigoPostalObligatorio'], OBLIGATORIO);
    $aErrores["alfanumericoDireccionObligatorio"] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['alfanumericoDireccionObligatorio'], $maxTamanio = 1000, $minTamanio = 1, OBLIGATORIO);
    $aErrores["fFloatObligatorio"] = validacionFormularios::comprobarFloat($_REQUEST['fFloatObligatorio'], $max = PHP_FLOAT_MAX, $min = -PHP_FLOAT_MAX, OBLIGATORIO);
    $aErrores["dFechaObligatorio"] = validacionFormularios::validarFecha($_REQUEST['dFechaObligatorio'], $dFechaObligatorioMaxima = '01/01/2200', $dFechaObligatorioMinima = "01/01/1900", OBLIGATORIO);
    $aErrores["alfanumericoUrlObligatorio"] = validacionFormularios::validarURL($_REQUEST['alfanumericoUrlObligatorio'], OBLIGATORIO);
    $aErrores["alfanumericoPasswordObligatorio"] = validacionFormularios::validarPassword($_REQUEST['alfanumericoPasswordObligatorio'], $maximo = 16, $minimo = 2, $tipo = 3, OBLIGATORIO);
    $aErrores["listaObligatorio"] = validacionFormularios::validarElementoEnLista($_REQUEST['listaObligatorio'], $aListaValoresLista);
    $aErrores["alfanumericoTextoLargoObligatorio"] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['alfanumericoTextoLargoObligatorio'], $maxTamanio = 1000, $minTamanio = 1, OBLIGATORIO);
    if (isset($_REQUEST['radioObligatorio'])) {
        $aErrores["radioObligatorio"] = validacionFormularios::validarElementoEnLista($_REQUEST['radioObligatorio'], $aListaValoresRadio);
    } else {
        $aErrores['radioObligatorio'] = validacionFormularios::validarElementoEnLista(null, $aListaValoresRadio);
    }
    if(isset($_REQUEST['checkboxesObligatorias'])){
        $aErrores["checkboxesObligatorias"] = validacionFormularios::validarArrayPorArray($_REQUEST['checkboxesObligatorias'], $aListaValoresCheckbox);
    }else{
        $aErrores["checkboxesObligatorias"] = "No se ha seleccionado ninguna opcion.";
    }
    $aErrores["sStringOpcional"] = validacionFormularios::comprobarAlfabetico($_REQUEST['sStringOpcional'], 200, 1, OPCIONAL);
    $aErrores["iIntOpcional"] = validacionFormularios::comprobarEntero($_REQUEST['iIntOpcional'], 200, 1, OPCIONAL);
    $aErrores["iTelefonoOpcional"] = validacionFormularios::validarTelefono($_REQUEST['iTelefonoOpcional'], OPCIONAL);
    $aErrores["iCodigoPostalOpcional"] = validacionFormularios::validarCp($_REQUEST['iCodigoPostalOpcional'], OPCIONAL);
    $aErrores["alfanumericoDireccionOpcional"] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['alfanumericoDireccionOpcional'], $maxTamanio = 1000, $minTamanio = 1, OPCIONAL);
    $aErrores["fFloatOpcional"] = validacionFormularios::comprobarFloat($_REQUEST['fFloatOpcional'], $max = PHP_FLOAT_MAX, $min = -PHP_FLOAT_MAX, OPCIONAL);
    $aErrores["dFechaOpcional"] = validacionFormularios::validarFecha($_REQUEST['dFechaOpcional'], $dFechaObligatorioMaxima = '01/01/2200', $dFechaObligatorioMinima = "01/01/1900", OPCIONAL);
    $aErrores["alfanumericoUrlOpcional"] = validacionFormularios::validarURL($_REQUEST['alfanumericoUrlOpcional'], OPCIONAL);
    $aErrores["alfanumericoPasswordOpcional"] = validacionFormularios::validarPassword($_REQUEST['alfanumericoPasswordOpcional'], $maximo = 16, $minimo = 2, $tipo = 3, OPCIONAL);
    $aErrores["alfanumericoTextoLargoOpcional"] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['alfanumericoTextoLargoOpcional'], $maxTamanio = 1000, $minTamanio = 1, OPCIONAL);
    
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
    $aRespuestas = ["sStringObligatorio" => $_REQUEST['sStringObligatorio'],
        "iIntObligatorio" => $_REQUEST['iIntObligatorio'],
        "iTelefonoObligatorio" => $_REQUEST['iTelefonoObligatorio'],
        "iCodigoPostalObligatorio" => $_REQUEST['iCodigoPostalObligatorio'],
        "alfanumericoDireccionObligatorio" => $_REQUEST['alfanumericoDireccionObligatorio'],
        "fFloatObligatorio" => $_REQUEST['fFloatObligatorio'],
        "dFechaObligatorio" => $_REQUEST['dFechaObligatorio'],
        "alfanumericoUrlObligatorio" => $_REQUEST['alfanumericoUrlObligatorio'],
        "alfanumericoPasswordObligatorio" => $_REQUEST['alfanumericoPasswordObligatorio'],
        "listaObligatorio" => $_REQUEST['listaObligatorio'],
        "alfanumericoTextoLargoObligatorio" => $_REQUEST['alfanumericoTextoLargoObligatorio'],
        "radioObligatorio" => $_REQUEST['radioObligatorio'],
        "checkboxesObligatorias" =>$_REQUEST['checkboxesObligatorias'],
        "sStringOpcional" => $_REQUEST['sStringOpcional'],
        "iIntOpcional" => $_REQUEST['iIntOpcional'],
        "iTelefonoOpcional" => $_REQUEST['iTelefonoOpcional'],
        "iCodigoPostalOpcional" => $_REQUEST['iCodigoPostalOpcional'],
        "alfanumericoDireccionOpcional" => $_REQUEST['alfanumericoDireccionOpcional'],
        "fFloatOpcional" => $_REQUEST['fFloatOpcional'],
        "dFechaOpcional" => $_REQUEST['dFechaOpcional'],
        "alfanumericoUrlOpcional" => $_REQUEST['alfanumericoUrlOpcional'],
        "alfanumericoPasswordOpcional" => $_REQUEST['alfanumericoPasswordOpcional'],
        "alfanumericoTextoLargoOpcional" => $_REQUEST['alfanumericoTextoLargoOpcional']];
    //Mostrar datos

    echo "sStringObligatorio: " . $aRespuestas['sStringObligatorio'] . "<br>";
    echo "iIntObligatorio: " . $aRespuestas['iIntObligatorio'] . "<br>";
    echo "iTelefonoObligatorio  " . $aRespuestas['iTelefonoObligatorio'] . "<br>";
    echo "iCodigoPostalObligatorio " . $aRespuestas['iCodigoPostalObligatorio'] . "<br>";
    echo "alfanumericoDireccionObligatorio  " . $aRespuestas['alfanumericoDireccionObligatorio'] . "<br>";
    echo "fFloatObligatorio: " . $aRespuestas['fFloatObligatorio'] . "€<br>";
    echo "dFechaObligatorio " . $aRespuestas['dFechaObligatorio'] . "<br>";
    echo "alfanumericoUrlObligatorio" . $aRespuestas['alfanumericoUrlObligatorio'] . "<br>";
    echo "alfanumericoPasswordObligatorio" . $aRespuestas['alfanumericoPasswordObligatorio'] . "<br>";
    echo "listaObligatorio " . $aRespuestas['listaObligatorio'] . "<br>";
    echo "alfanumericoTextoLargoObligatorio " . $aRespuestas['alfanumericoTextoLargoObligatorio'] . "<br>";
    echo "radioObligatorio " . $aRespuestas['radioObligatorio'] . "<br>";
    echo 'checkboxesObligatorias ';
    foreach ($aRespuestas['checkboxesObligatorias']as $value) {
        echo $value.' ' ;
    } "<br>";
    echo '<br><br>';
    echo "sStringOpcional: " . $aRespuestas['sStringOpcional'] . "<br>";
    echo "iIntOpcional: " . $aRespuestas['iIntOpcional'] . "<br>";
    echo "iTelefonoOpcional  " . $aRespuestas['iTelefonoOpcional'] . "<br>";
    echo "iCodigoPostalOpcional " . $aRespuestas['iCodigoPostalOpcional'] . "<br>";
    echo "alfanumericoDireccionOpcional  " . $aRespuestas['alfanumericoDireccionOpcional'] . "<br>";
    echo "fFloatOpcional: " . $aRespuestas['fFloatOpcional'] . "€<br>";
    echo "dFechaOpcional " . $aRespuestas['dFechaOpcional'] . "<br>";
    echo "alfanumericoUrlOpcional" . $aRespuestas['alfanumericoUrlOpcional'] . "<br>";
    echo "alfanumericoPasswordOpcional" . $aRespuestas['alfanumericoPasswordOpcional'] . "<br>";
    echo "alfanumericoTextoLargoOpcional " . $aRespuestas['alfanumericoTextoLargoOpcional'] . "<br>";
    
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
                       //mostrar el error 
                       if ($aErrores["sStringObligatorio"] != null) {
                           echo $aErrores['sStringObligatorio'];
                       }
                       ?></span>

            </br></br>

            <label for="LbliIntObligatorio">INT</label>
            <input type="text" name="iIntObligatorio" placeholder="184" id="LbliIntObligatorio" value="<?php
            if (isset($_REQUEST['iIntObligatorio'])) {
                echo $_REQUEST['iIntObligatorio'];
            }
            ?>"><span><?php
                       //mostrar el error 
                       if ($aErrores["iIntObligatorio"] != null) {
                           echo $aErrores['iIntObligatorio'];
                       }
                       ?></span>
            </br></br>
            <label for="LbliTelefonoObligatorio">TELEFONO</label>
            <input type="text" name="iTelefonoObligatorio" placeholder="687742475" id="LbliTelefonoObligatorio" value="<?php
            if (isset($_REQUEST['iTelefonoObligatorio'])) {
                echo $_REQUEST['iTelefonoObligatorio'];
            }
            ?>"><span><?php
                       //mostrar el error 
                       if ($aErrores["iTelefonoObligatorio"] != null) {
                           echo $aErrores['iTelefonoObligatorio'];
                       }
                       ?></span>

            </br></br>

            <label for="LbliCodigoPostalObligatorio">CODIGO POSTAL</label>
            <input type="text" name="iCodigoPostalObligatorio" placeholder="49600" id="LbliCodigoPostalObligatorio" value="<?php
            if (isset($_REQUEST['iCodigoPostalObligatorio'])) {
                echo $_REQUEST['iCodigoPostalObligatorio'];
            }
            ?>"><span><?php
                       //mostrar el error 
                       if ($aErrores["iCodigoPostalObligatorio"] != null) {
                           echo $aErrores['iCodigoPostalObligatorio'];
                       }
                       ?></span>

            </br></br>

            <label for="LblalfanumericoDireccionObligatorio">ALFANUMERICO DIRECCION</label>
            <input type="text" name="alfanumericoDireccionObligatorio" placeholder="Av. Federico Silva, 48" id="LblalfanumericoDireccionObligatorio" value="<?php
            if (isset($_REQUEST['alfanumericoDireccionObligatorio'])) {
                echo $_REQUEST['alfanumericoDireccionObligatorio'];
            }
            ?>"><span><?php
                       //mostrar el error 
                       if ($aErrores["alfanumericoDireccionObligatorio"] != null) {
                           echo $aErrores['alfanumericoDireccionObligatorio'];
                       }
                       ?></span>

            </br></br>

            <label for="LblfFloatObligatorio">FLOAT </label>
            <input type="text" name="fFloatObligatorio" placeholder="47.5" id="LblfFloatObligatorio" value="<?php
            if (isset($_REQUEST['fFloatObligatorio'])) {
                echo $_REQUEST['fFloatObligatorio'];
            }
            ?>"><span><?php
                       //mostrar el error 
                       if ($aErrores["fFloatObligatorio"] != null) {
                           echo $aErrores['fFloatObligatorio'];
                       }
                       ?></span>
            </br></br>
            <label for="LbldFechaObligatorio">FECHA</label>
            <input type="date" name="dFechaObligatorio" id="LbldFechaObligatorio" value="<?php
            if (isset($_REQUEST['dFechaObligatorio'])) {
                echo $_REQUEST['dFechaObligatorio'];
            }
            ?>"><span><?php
                       //mostrar el error 
                       if ($aErrores["dFechaObligatorio"] != null) {
                           echo $aErrores['dFechaObligatorio'];
                       }
                       ?></span>

            </br></br>


            <label for="LblalfanumericoPasswordObligatorio">CONTRASEÑA</label>
            <input type="password" name="alfanumericoPasswordObligatorio" id="LblalfanumericoPasswordObligatorio" placeholder="*******" value="<?php
            if (isset($_REQUEST['alfanumericoPasswordObligatorio'])) {
                echo $_REQUEST['alfanumericoPasswordObligatorio'];
            }
            ?>"><span><?php
                       //mostrar el error 
                       if ($aErrores["alfanumericoPasswordObligatorio"] != null) {
                           echo $aErrores['alfanumericoPasswordObligatorio'];
                       }
                       ?></span>

            </br></br>

            <label for="LblalfanumericoUrlObligatorio">URL</label>
            <input type="text" name="alfanumericoUrlObligatorio" id="LblalfanumericoUrlObligatorio" placeholder="Https://www.FakeWebsite.com" value="<?php
            if (isset($_REQUEST['alfanumericoUrlObligatorio'])) {
                echo $_REQUEST['alfanumericoUrlObligatorio'];
            }
            ?>"><span><?php
                       //mostrar el error 
                       if ($aErrores["alfanumericoUrlObligatorio"] != null) {
                           echo $aErrores['alfanumericoUrlObligatorio'];
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

            <label for="TEXTO LARGO ALFANUMERICO">TEXTO LARGO ALFANUMERICO</label>
            <br>
            <textarea name="alfanumericoTextoLargoObligatorio" rows="5" cols="30" placeholder="Observaciones"><?php
                if (isset($_REQUEST['alfanumericoTextoLargoObligatorio'])) {
                    echo $_REQUEST['alfanumericoTextoLargoObligatorio'];
                }
                ?></textarea>
            <span><?php
                //mostrar el error 
                if ($aErrores["alfanumericoTextoLargoObligatorio"] != null) {
                    echo $aErrores['alfanumericoTextoLargoObligatorio'];
                }
                ?></span>

            </br></br>

            <label for="RADIO BUTTONS">RADIO BUTTONS</label>
            <label for="Opcion 1"><input type="radio" name="radioObligatorio" id="Opcion 1" value="Opcion 1" <?php
                  if (isset($_REQUEST['radioObligatorio'])) {
                    if ($_REQUEST['radioObligatorio'] == 'Opcion 1') {

                        echo "checked";
                    }
                }
                ?>>Opcion 1</label>
            <label for="Opcion 2"><input type="radio" name="radioObligatorio" id="Opcion 2" value="Opcion 2" <?php
                if (isset($_REQUEST['radioObligatorio'])) {
                    if ($_REQUEST['radioObligatorio'] == 'Opcion 2') {

                        echo "checked";
                    }
                }
                ?> > Opcion 2</label>
            <span><?php
                //mostrar el error 
                if ($aErrores["radioObligatorio"] != null) {
                    echo $aErrores['radioObligatorio'];
                }
                ?></span>

           </br></br>

            <label for="CHECKBOX">CHECKBOXES</label>
            <label for="Opcion 1">
                <input type="checkbox" name="checkboxesObligatorias[]" id="checkboxesObligatorias" value="Opcion 1" <?php
                if (!empty($_REQUEST['checkboxesObligatorias'])) {
                    if (in_array('opcion 1', $_REQUEST['checkboxesObligatorias'])) {
                        echo "checked";
                    }
                }
                ?>>Opcion 1</label>
            <label for="Opcion 2">
                <input type="checkbox" name="checkboxesObligatorias[]" id="checkboxesObligatorias" value="Opcion 2" <?php
                if (!empty($_REQUEST['checkboxesObligatorias'])) {
                    if (in_array('opcion 2', $_REQUEST['checkboxesObligatorias'])) {
                        echo "checked";
                    }
                }
                ?>>Opcion 2</label>
            <span><?php
                   //mostrar el error 
                   if ($aErrores["checkboxesObligatorias"] != null) {
                       echo $aErrores['checkboxesObligatorias'];
                   }
                       ?></span>
            </br></br>

        </fieldset> 
        </br>




        <h2>FORMULARIO CAMPOS OPCIONALES</h2>
        <fieldset>
            <legend>Campos Opcionales</legend>
        <label for="LblsStringOpcional">STRING</label>
            <input type="text" name="sStringOpcional" placeholder="String" id="LblsStringOpcional" value="<?php
            if (isset($_REQUEST['sStringOpcional'])) {
                echo $_REQUEST['sStringOpcional'];
            }
            ?>"><span><?php
                       //mostrar el error 
                       if ($aErrores["sStringOpcional"] != null) {
                           echo $aErrores['sStringOpcional'];
                       }
                       ?></span>

            </br></br>

            <label for="LbliIntOpcional">INT</label>
            <input type="text" name="iIntOpcional" placeholder="184" id="LbliIntOpcional" value="<?php
            if (isset($_REQUEST['iIntOpcional'])) {
                echo $_REQUEST['iIntOpcional'];
            }
            ?>"><span><?php
                       //mostrar el error 
                       if ($aErrores["iIntOpcional"] != null) {
                           echo $aErrores['iIntOpcional'];
                       }
                       ?></span>
            </br></br>
            <label for="LbliTelefonoOpcional">TELEFONO</label>
            <input type="text" name="iTelefonoOpcional" placeholder="687742475" id="LbliTelefonoOpcional" value="<?php
            if (isset($_REQUEST['iTelefonoOpcional'])) {
                echo $_REQUEST['iTelefonoOpcional'];
            }
            ?>"><span><?php
                       //mostrar el error 
                       if ($aErrores["iTelefonoOpcional"] != null) {
                           echo $aErrores['iTelefonoOpcional'];
                       }
                       ?></span>

            </br></br>

            <label for="LbliCodigoPostalOpcional">CODIGO POSTAL</label>
            <input type="text" name="iCodigoPostalOpcional" placeholder="49600" id="LbliCodigoPostalOpcional" value="<?php
            if (isset($_REQUEST['iCodigoPostalOpcional'])) {
                echo $_REQUEST['iCodigoPostalOpcional'];
            }
            ?>"><span><?php
                       //mostrar el error 
                       if ($aErrores["iCodigoPostalOpcional"] != null) {
                           echo $aErrores['iCodigoPostalOpcional'];
                       }
                       ?></span>

            </br></br>

            <label for="LblalfanumericoDireccionOpcional">ALFANUMERICO DIRECCION</label>
            <input type="text" name="alfanumericoDireccionOpcional" placeholder="Av. Federico Silva, 48" id="LblalfanumericoDireccionOpcional" value="<?php
            if (isset($_REQUEST['alfanumericoDireccionOpcional'])) {
                echo $_REQUEST['alfanumericoDireccionOpcional'];
            }
            ?>"><span><?php
                       //mostrar el error 
                       if ($aErrores["alfanumericoDireccionOpcional"] != null) {
                           echo $aErrores['alfanumericoDireccionOpcional'];
                       }
                       ?></span>

            </br></br>

            <label for="LblfFloatOpcional">FLOAT </label>
            <input type="text" name="fFloatOpcional" placeholder="47.5" id="LblfFloatOpcional" value="<?php
            if (isset($_REQUEST['fFloatOpcional'])) {
                echo $_REQUEST['fFloatOpcional'];
            }
            ?>"><span><?php
                       //mostrar el error 
                       if ($aErrores["fFloatOpcional"] != null) {
                           echo $aErrores['fFloatOpcional'];
                       }
                       ?></span>
            </br></br>
            <label for="LbldFechaOpcional">FECHA</label>
            <input type="date" name="dFechaOpcional" id="LbldFechaOpcional" value="<?php
            if (isset($_REQUEST['dFechaOpcional'])) {
                echo $_REQUEST['dFechaOpcional'];
            }
            ?>"><span><?php
                       //mostrar el error 
                       if ($aErrores["dFechaOpcional"] != null) {
                           echo $aErrores['dFechaOpcional'];
                       }
                       ?></span>

            </br></br>


            <label for="LblalfanumericoPasswordOpcional">CONTRASEÑA</label>
            <input type="password" name="alfanumericoPasswordOpcional" id="LblalfanumericoPasswordOpcional" placeholder="*******" value="<?php
            if (isset($_REQUEST['alfanumericoPasswordOpcional'])) {
                echo $_REQUEST['alfanumericoPasswordOpcional'];
            }
            ?>"><span><?php
                       //mostrar el error 
                       if ($aErrores["alfanumericoPasswordOpcional"] != null) {
                           echo $aErrores['alfanumericoPasswordOpcional'];
                       }
                       ?></span>

            </br></br>

            <label for="LblalfanumericoUrlOpcional">URL</label>
            <input type="text" name="alfanumericoUrlOpcional" id="LblalfanumericoUrlOpcional" placeholder="Https://www.FakeWebsite.com" value="<?php
            if (isset($_REQUEST['alfanumericoUrlOpcional'])) {
                echo $_REQUEST['alfanumericoUrlOpcional'];
            }
            ?>"><span><?php
                       //mostrar el error 
                       if ($aErrores["alfanumericoUrlOpcional"] != null) {
                           echo $aErrores['alfanumericoUrlOpcional'];
                       }
                       ?></span>

            </br></br>


            <label for="TEXTO LARGO ALFANUMERICO">TEXTO LARGO ALFANUMERICO</label>
            <br>
            <textarea name="alfanumericoTextoLargoOpcional" rows="5" cols="30" placeholder="Observaciones"><?php
                if (isset($_REQUEST['alfanumericoTextoLargoOpcional'])) {
                    echo $_REQUEST['alfanumericoTextoLargoOpcional'];
                }
                ?></textarea>
            <span><?php
                //mostrar el error 
                if ($aErrores["alfanumericoTextoLargoOpcional"] != null) {
                    echo $aErrores['alfanumericoTextoLargoOpcional'];
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







