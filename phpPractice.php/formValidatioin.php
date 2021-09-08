
<?php 
$errname=$erremail=$errwebsite=$errcommend=$errgender="";
$name=$email=$Website=$commend=$gender="";

if($_SERVER['REQUEST_METHOD']=="POST")
    {
// Name validation
        if(empty($_POST['name']))
            {
               $errname = "<span id='star'>Name is required</span>";

            }
             else{
                $name    = validation($_POST['name']) ;
            }
   // Email validation 
            if(empty($_POST['email']))
            {
               $erremail = "<span id='star'>Email is required</span>";

            }
            
            elseif(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
                {
                    $erremail = "<span id='star'>Enter a valid Email</span>";

                }
            else{
                $email   = validation($_POST['email']) ;
            }

// website validation 
if(empty($_POST['Webside']))
{
   $errWebside = "<span id='star'>Webside is required</span>";

}

elseif(!filter_var($_POST['Webside'],FILTER_VALIDATE_URL))
    {
        $errwebsite = "<span id='star'>Enter a valid Website</span>";

    }
else{
    $Webside   = validation($_POST['Webside']) ;
}

// Gender validation 
            if(empty($_POST['Gender']))
            {
               $errgender = "<span id='star'>Gender is required</span>";

            }else{
                $gender  = $_POST['Gender'];   
             }
        
        // $Website = validation($_POST['Webside']) ;
        $commend = validation($_POST['Comment']) ;

    //     echo "<br/><br/><span id='h2'>You submited these values :-</span> <br/>";

        
    //    echo "<br/>Your Name : ".$name;
    //    echo "<br/>Your Email : ".$email;
    //    echo "<br/> Your Website : ".$Website;
    //    echo "<br/> Your Commend : ".$commend;
    //    echo "<br/>Your Gender : ".$gender;
    }

    function validation($value)
        {
            $value = trim($value);
            $value = htmlspecialchars($value);
            $value = stripslashes($value);
            return $value;
        }
        

       

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>Form Validation</title>
</head>
<body>
    <h1>Validated Form</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

        <table>
                <tr>
                    <td>
                        <label for="name">Name:</label>
                    </td>
                    <td colspan="2">
                        <input type="text" id="name" name="name"><span id="star">*</span><?php echo $errname; ?>
                </td>
                </tr>
                <tr>
                    <td>
                        <label for="email">email:</label>
                    </td>
                    <td colspan="2">
                        <input type="text" id="email" name="email"><span id="star">*</span><?php echo $erremail; ?>
                    </td>
                </tr>
                <tr>
                    <td><label for="Webside">Webside:</label></td>
                    <td colspan="2"><input type="text" id="Webside" name="Webside"><span id="star">*</span><?php echo $errwebsite; ?>
                </td>
                </tr>
                <tr>
                    <td><label for="Comment">Comment:</label>
                </td>
                    <td colspan="3">
                        <textarea name="Comment" id="Comment" cols="40" rows="5"></textarea>
                </td>
                </tr>
                <tr>
                 <td>
                     <label for="Gender">Gender:</label>
                    </td>
                <td>
                    <input type="radio" id="Gender" name="Gender" value="Male"> Male
                </td>
                <td>
                    <input type="radio" id="Gender" name="Gender" value="Female">Female <span id="star">*</span> <?php echo $errgender; ?>
                </td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="2"><input type="submit" name="submit" value="submit"><br></td>
                </tr>

        </table>

    </form>
</body>
</html>





