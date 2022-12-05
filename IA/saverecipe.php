<?php
error_reporting(0);
include("connect.php");
include("menu.php");
session_start();
$rid = trim($_POST['rid']);
$id= trim($_POST['id']);
$rn = $_POST['rn'];
$csn = $_POST['csn'];
$vg = $_POST['vg'];
$vgn = $_POST['vgn'];
$mi = $_POST['mi'];
$sio = $_POST['sio'];
$sit = $_POST['sit'];
$pn = $_POST['pn'];
if(isset($_POST['gf'])) {
    $gf = "Gluten-Free";
}
else {
    $gf = 0;
}
if(isset($_POST['vgn'])) {
    $vgn = "Vegan";
}
else {
    $vgn = 0;
}
if(isset($_FILES["rimg"]["size"])) {    
    $x = explode(".", $_FILES['rimg']['name']);
    $ext = $x[count($x) - 1];
    $filepath = trim("Images/".$rid.".".$ext);
    rename($_POST['rimg'], $filepath);
}
else {
    echo "Image Failed";
}
 
$qry = "insert into recipes values($id, '$rid', '$rn', '$vg', '$csn', '$gf', '$vgn', '$mi', '$sio', '$sit', '$pn', '$filepath')";
//fclose($fp);
 
echo $qry;
if(move_uploaded_file($_FILES['rimg']['tmp_name'], $filepath))
{
    }else {
        echo "Failed to Upload";
    }
if(!mysqli_query($connection, $qry))
 
{
    $msg="Failed";
    echo "<script type='text/javascript'>alert('$msg');</script>";
}
else
 
{
    header("location:logadmin.php");
       
    }
 
