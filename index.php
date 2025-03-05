<?php
    if(isset ($_POST ["submit"])){
        $driving =$_POST ["driving"];
        if($driving<=18){
            echo "You can not drive";
        }
        elseif($driving>=18 && $driving<=25){
            echo "You can drive two wheeler";
        }
        elseif($driving>=25 && $driving<=40){
            echo "You can drive CAR";
        }
        elseif($driving>=40 && $driving<=60){
            echo "You can drive Any Vehicle";
        }
        elseif($driving>=60 && $driving<=100){
            echo "LICENCE EXPIRED";
        }
        elseif($driving>=100 && $driving<=0){
            echo "Please Enter Valid Number";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        <label for="">Enter Your Age:</label>
        <input type="text" name="driving">
        <br>
        <br>
        <input type="submit" name="submit">
    </form>
</body>
</html>