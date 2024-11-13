<!DOCTYPE html>
<html>
<head>
    <style>
            body{background-color: 001524;}
            .rand{color: green; font-style: italic;}
            p2{color: blue; font-style: italic;}
            .sum{font-weight: bold; color: black; font-style: italic; }
    </style>
</head>
<body>
    <?php
        $value=(rand(100, 200));
        $value2=(rand(100, 200));
        echo "<p class=rand>".($value)."</p>";  
        echo "<p2>".($value)."</p2>"."<br>"; 
        echo ($value+$value2)."<br>";
        echo "<p class=sum>".($value*$value2)."</p>"; 
    ?>
</body>
</html>