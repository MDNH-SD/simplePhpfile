<?php

$multiArray =array(
    array('nobir','student','Bangladeshi',23),
    array('gobir','student','austrilia',25),
    array('tobir','student','seria',36),
    array('jony','jobseeker','maxico',32)
);
$length = count($multiArray);
echo $multiArray[2][2];

echo '<ul>';

for($row=0; $row<$length;$row++)
    {
        echo '<br/><br/>';
        echo "This is the $row index of multiArray <br/>";
        
        for($col=0;$col<4;$col++)
            {
                echo "<li>",$multiArray[$row][$col],"</li>";
            }
    }
   echo '</ul>';
?>

