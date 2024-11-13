<!DOCTYPE html>
<html>
<head>
    <style>
        body {background-color: grey ;}
        .redtext {color: orange;}
        .date {color: orangered;}
        .datec {color: white;}
    </style>
</head>
<body>
    <?php
    echo "<p class = redtext>My frist PHP script!</p>";
    echo "<p class=date>".date("d M y")."</p>";
    date_default_timezone_set('Asia/Kuala_Lumpur');
    echo "<p class=datec>".date ("H:i A")."</p>";
    ?>
</body>
</html>