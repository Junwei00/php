<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
        Welcome:  <?php echo $_GET["name"]; ?><br>
        Your Email: <?php $_email=$_GET["email"];
            if(filter_var($_email, FILTER_VALIDATE_EMAIL)){
                echo ("$_email is a valid email address");
            }
            else{
                echo("$_email is not a valid email address");
            }?><br>
        Age: <?php $Age=$_GET["age"];
                if ($Age >= 18 && $Age <=100) {
                    echo "$Age Yes";
                }
                else
                    echo "$Age is Under 18"
                ?>
    </body>
</html>