<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
    </head>
    <body>
        <?php

        $inputUsername = "junwei" ;
        $inputPassword =  "000000";

        $name = 'junwei';
        $password = '000000';
        
        if($inputUsername == $name && $inputPassword == $password)
        {
            echo "Login successful !";
        }elseif($inputUsername != $name)
        {
            echo "Invalid username" ;
        }
        else{
            echo "Invalid password" ;
        }
        ?>
    </body>
</html>