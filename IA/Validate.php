<?php
session_start();
include("connect.php");
if(($_POST['un']!="") and ($_POST['psd']!="")) {      
        $uname = $_POST['un'];    
        $pwd = $_POST['psd']; 
    } else {
        $_SESSION['empty'] = "Username and Password shouldn't be empty";
        header("location:login.php");  
    }  
    if ($uname == "admin" and $pwd == "admin123")
    {
        $_SESSION['fn']=$row['fn'];
            header("location:LogAdmin.php");
    }
    else {
        $_SESSION['invalid'] = "Invalid User";
        header("location:login.php");
    }
    ?>
 
<!DOCTYPE html>
<html lang="en">
    <head>.
        <meta charset="utf-8" />
        <title>Validate</title>
    </head>
    <body>       
    </body>
</html>
