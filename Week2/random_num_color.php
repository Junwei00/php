<!DOCTYPE html>
<html>
    <head>
        <style>
            .M{font-weight: bold; font-size: larger;}
        </style>
    </head>
    <body>
        <?php
        $t = (rand(1, 100));
        $t1 = (rand(1, 100));

        if ($t > $t1){
            echo "<p class=M>".($t)."<p>";
            echo "<p>".($t1)."<p>";

        }else {
            echo "<p class=M>".($t1)."<p>";
            echo "<p>".($t)."<p>";
        }
        ?>
    </body>
</html>