<?php
if(isset($_POST)){
        welcome: <?php echo $_POST["name"]; ?><br>
        Your Email: <?php echo $_POST["email"]; ?>
    }
?>
<!DOCTYPE HTML>
<html>
    <head>

    </head>
    <body>
        <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
            Name : <input type="text" name="name"><br>
            E-mail: <input type="text" name="email"><br>
            <input type="submit">
        </form>
    </body>
</html>