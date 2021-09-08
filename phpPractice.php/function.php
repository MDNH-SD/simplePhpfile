<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>Function</title>
</head>
<body>
<?php

$x =5;
$y =6;
    function sum()
        {
            global $x,$y;
            $GLOBALS['z'] =$x + $y;
           
        }
        sum();
        echo $z;

?>
</body>
</html>