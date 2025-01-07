<?php
if(isset($_GET)){
    echo $_GET["name"];
    $_email=$_GET["email"];
        if(filter_var($_email, FILTER_VALIDATE_EMAIL)){
            echo ("$_email is a valid email address");
        }
        else{
            echo("$_email is not a valid email address");
        }
            $Age=$_GET["age"];
            if ($Age >= 18 && $Age <=100) {
                echo "$Age Yes";
            }
            else
                echo "$Age is Under 18"          
}
?>
?>
<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
        <form action="form_validate.php" method="get">
            Name : <input type="text" name="name"><br>
            E-mail: <input type="text" name="email"><br>
            Age: <input type="text" name="age">
            <input type="submit">
        </form>
    </body>
</html>