<?php
//error_reporting(0);
 
include("menu.php");
session_start();
 $n=$_SESSION['name'];
?>
 
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Delete File</title>
          <link rel="stylesheet" type="text/css" href="CSS/SK.css">
    </head>
    <body>
    <center>
<br>
    <h3>Admin</h3>
 
    <?php    
     $n=$_SESSION['fn'];
    echo "Welcome Sharmila!<br><br>";
    include("MenuAdmin.php");  
    ?><br><br>
 
</center>
                <?php
 
include('connect.php');
 
if(isset($_GET['id']))
{
    $id=$_GET['id'];
 $res=mysqli_query($connection,"SELECT * FROM recipes WHERE id= $id");
 while($row=mysqli_fetch_array($res))
 {
     $img=$row['rimg'];
 }
 unlink($img);
 
$query1="DELETE from recipes WHERE id=$id";
 
if(mysqli_query($connection, $query1))
{
   
header('location:LogAdmin.php');
}
else{
    echo "error while deleting";
}
}
?>
    </body>
</html>
