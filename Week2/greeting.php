<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
        <?php
        $number=rand(0, 24);

        if($number >=5 && $number <= 11){
            echo "$number Good Morning" ;
        }
        elseif($number >=12 && $number <= 17){
            echo "$number Good afternoon" ;
        }elseif($number >=18 && $number <= 21){
            echo "$number Good everning" ;
        }else{
            echo "$number Good night" ;
        }
        ?>
    </body>
</html>