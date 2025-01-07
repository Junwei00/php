<?php
    if(isset($_GET)){
        echo $_GET["name"];
        echo "</br>";  
        echo $_GET["email"];
        echo "</br>";  
        echo $_GET["age"];
    }
?>
<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
        <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="get">
            Name : <input type="text" name="name"><br>
            E-mail: <input type="text" name="email"><br>
            Age: <input type="text" name="age"><br>
            <input type="submit">
        </form>
    </body>
</html>