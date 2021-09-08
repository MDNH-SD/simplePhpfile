<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>Request and Post Methods</title>
</head>
<body>
    <form action="./RequestAndPostMethod.php" method="POST">

    <input type="text" placeholder="Inter your name" name="name"><br>
    <input type="submit" name="submit" value="submit" style="color: blue;">


</form>
</body>
</html>

<?php
if(isset($_POST['submit'])){
 $name =$_POST['name'];

        if(empty($name))
            {
               echo "<h2 id='h2''>Enter a name</h2>";
               return false;
            }
            else
                {
                    echo "<h2 id='h22' style='color:green;'> You submited ".$name."</h2>";
                }
            }

?>