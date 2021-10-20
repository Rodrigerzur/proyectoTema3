<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>ejercicio01.php</title>
    </head>
    <body>
        <?php
        $variableString = "Hola";
        $variableInt = 100;
        $variableFloat = 5.5;
        $variableBool = true;

        echo 'Estas variables estan siendo mostradas por pantalla mediante "echo" ';
        echo '</br></br>';
        echo "La variable \$variableString es de tipo ", gettype($variableString), " y su valor es ", $variableString, "\n";
        echo '</br></br>';
        echo "La variable \$variableInt es de tipo ", gettype($variableInt), " y su valor es ", $variableInt, "\n";
        echo '</br></br>';
        echo "La variable \$variableFloat es de tipo ", gettype($variableFloat), " y su valor es ", $variableFloat, "\n";
        echo '</br></br>';
        echo "La variable \$variableBool es de tipo ", gettype($variableBool), " y su valor es ", $variableBool, "\n";
        echo '</br></br>';
        print 'Estas variables estan siendo mostradas por pantalla mediante "print" ';
        echo '</br></br>';
        print "<div>La variable .\$variableString es de tipo " . gettype($variableString) . " y su valor es  $variableString</div>";
        print "<div>La variable .\$variableInt es de tipo " . gettype($variableInt) . " y su valor es  $variableInt</div>";
        print "<div>La variable .\$variableFloat es de tipo " . gettype($variableFloat) . " y su valor es   $variableFloat</div>";
        print "<div>La variable .\$variableBool es de tipo " . gettype($variableBool) . " y su valor es  $variableBool</div>";
        echo '</br></br>';
        print_r('Estas variables estan siendo mostradas por pantalla mediante "print_r" ');
        echo '</br></br>';
        print_r('La variable \$variableString es de tipo ' . gettype($variableString) . " y su valor es  $variableString \n");
        echo '</br></br>';
        print_r('La variable \$variableInt es de tipo ' . gettype($variableInt) . " y su valor es  $variableInt \n");
        echo '</br></br>';
        print_r('La variable \$variableFloat es de tipo ' . gettype($variableFloat) . " y su valor es  $variableFloat \n");
        echo '</br></br>';
        print_r('La variable \$variableBool es de tipo ' . gettype($variableBool) . " y su valor es  $variableBool \n");
        echo '</br></br>';
        printf('Estas variables estan siendo mostradas por pantalla mediante "print_f" ');
        echo '</br></br>';
        printf("La variable \$variableString es de tipo " . gettype($variableString) . " y su valor es  $variableString \n");
        echo '</br></br>';
        printf("La variable \$variableInt es de tipo " . gettype($variableInt) . " y su valor es  $variableInt \n");
        echo '</br></br>';
        printf("La variable \$variableFloat es de tipo " . gettype($variableFloat) . " y su valor es $variableFloat \n");
        echo '</br></br>';
        printf("La variable \$variableBool es de tipo " . gettype($variableBool) . " y su valor es $variableBool \n");
        echo '</br></br>';
        echo nl2br("Variable String \n");
        var_dump($variableString);
        echo '</br></br>';
        echo nl2br("Variable Int \n");
        var_dump($variableInt);
        echo '</br></br>';
        echo nl2br("Variable Float \n");
        var_dump($variableFloat);
        echo '</br></br>';
        echo nl2br("Variable Bool \n");
        var_dump($variableBool);
        echo '</br></br>';
        ?>
    </body>
</html>