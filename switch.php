<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    if(isset ($_POST ["submit"])){
        $weekdays =$_POST["weekdays"];
   
        switch ($weekdays) {
            case 1: 
                echo "It's sunday today";
                break;
                case 2: 
                    echo "It's Monnday today";
                    break;
                    case 3: 
                        echo "It's Tuesday today";
                        break;
                        case 4: 
                            echo "It's wednesday today";
                            break;
                            case 5: 
                                echo "It's THURSday today";
                                break;
                                case 6: 
                                    echo "It's friday today";
                                    break;
                                    case 7: 
                                        echo "It's suturday today";
                                        break;
                                        default:
                                        echo "please Enter valid number";
            }
            }
    ?>
    <form action="" method="POST">
        <label for="">Enter Day</label>
        <input type="text" name="weekdays">
        <br>
        <br>
        <input type="submit" name="submit">
    </form>
</body>
</html>