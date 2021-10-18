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
        echo nl2br("\n");
        echo nl2br("\n");
        echo "La variable \$variableString es de tipo " , gettype($variableString)," y su valor es ", $variableString,"\n";
        echo nl2br("\n");
        echo "La variable \$variableInt es de tipo " , gettype($variableInt)," y su valor es ", $variableInt,"\n";
        echo nl2br("\n");
        echo "La variable \$variableFloat es de tipo " , gettype($variableFloat)," y su valor es ", $variableFloat,"\n";
        echo nl2br("\n");
        echo "La variable \$variableBool es de tipo " , gettype($variableBool)," y su valor es ", $variableBool,"\n";
        echo nl2br("\n");
        echo nl2br("\n");
        print 'Estas variables estan siendo mostradas por pantalla mediante "print" ';
        echo nl2br("\n");
        echo nl2br("\n");
        print "<div>La variable .\$variableString es de tipo " .gettype($variableString)." y su valor es  $variableString</div>" ; 
        print "<div>La variable .\$variableInt es de tipo " .gettype($variableInt)." y su valor es  $variableInt</div>"; 
        print "<div>La variable .\$variableFloat es de tipo " .gettype($variableFloat). " y su valor es   $variableFloat</div>";
        print "<div>La variable .\$variableBool es de tipo " .gettype($variableBool)." y su valor es  $variableBool</div>"; 
        echo nl2br("\n");
        echo nl2br("\n");
        print_r ('Estas variables estan siendo mostradas por pantalla mediante "print_r" ');
        echo nl2br("\n");
        echo nl2br("\n");
        print_r('La variable \$variableString es de tipo '.gettype($variableString)." y su valor es  $variableString \n");
        echo nl2br("\n");
        print_r('La variable \$variableInt es de tipo '.gettype($variableInt)." y su valor es  $variableInt \n");
        echo nl2br("\n");
        print_r('La variable \$variableFloat es de tipo '.gettype($variableFloat)." y su valor es  $variableFloat \n");
        echo nl2br("\n");
        print_r('La variable \$variableBool es de tipo '.gettype($variableBool)." y su valor es  $variableBool \n");
        echo nl2br("\n");
        echo nl2br("\n");
        printf ('Estas variables estan siendo mostradas por pantalla mediante "print_f" ');
        echo nl2br("\n");
        echo nl2br("\n");
        printf ("La variable \$variableString es de tipo " .gettype($variableString)." y su valor es  $variableString \n");
        echo nl2br("\n");
        printf ("La variable \$variableInt es de tipo " .gettype($variableInt)." y su valor es  $variableInt \n");
        echo nl2br("\n");
        printf ("La variable \$variableFloat es de tipo " .gettype($variableFloat)." y su valor es $variableFloat \n");
        echo nl2br("\n");
        printf ("La variable \$variableBool es de tipo " .gettype($variableBool)." y su valor es $variableBool \n");
        echo nl2br("\n");
        echo nl2br("\n");
        echo nl2br("Variable String \n");
        var_dump($variableString);
        echo nl2br("\n");
        echo nl2br("Variable Int \n");
        var_dump($variableInt);
        echo nl2br("\n");
        echo nl2br("Variable Float \n");
        var_dump($variableFloat);
        echo nl2br("\n");
        echo nl2br("Variable Bool \n");
        var_dump($variableBool);
        echo nl2br("\n");
        echo nl2br("\n");
        ?>
    </body>
</html>