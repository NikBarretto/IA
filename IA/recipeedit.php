<?php
error_reporting(0);
include("connect.php");
include("menu.php");
session_start();  
$id=$_GET['id'];
$n=$_SESSION['fn'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe Edit</title>
    </head>
<body>
<center>
<h1>Admin</h1><br>
   
    <?php    
  $n=$_SESSION['fn'];
  echo "Welcome Sharmila!<br><br> ";
  include("MenuAdmin.php");
  ?><br><br>
   <br>
   <form method="post" action="" enctype="multipart/form-data" class="form-horizontal">  
             <input type="hidden" name="id" value="<?php echo $id; ?>" /><br />
             
               <?php
    $query1="select * from recipes where id=$id";
    $query2= mysqli_query($connection, $query1);
    $row = mysqli_fetch_assoc($query2);
    $oldimg=$row['rimg'];
    if ($row['vg'] == "Vegetarian") {
        $vchecked = "checked";
    }
    else if ($row['vg'] == "Non-Vegetarian") {
        $nvchecked = "checked";
    }
    if ($row['vgn'] == "Vegan") {
        $vgchecked = "checked";
    }
    if ($row['gf'] == "Gluten-Free") {
        $gchecked = "checked";
    }
    ?>
    <table>
    <tr>
    <td><input type="text" disabled name="rid" value="<?php echo $row['rid']; ?>" /></td>
    </tr>
    <tr>
    <td><input type="text" name="rn" value="<?php echo $row['rn']; ?>"/></td>
    </tr>
    <tr>
    <td><input type="text" name="csn" value="<?php echo $row['csn']; ?>"/></td>
    </tr>
    <tr>
        <td>
        <input type="Radio" required name="vg" value="Vegetarian" <?php echo $vchecked; ?>>Vegetarian
          <input type="Radio" required name="vg" value="Non-Vegetarian" <?php echo $nvchecked; ?>>Non-Vegetarian
        </td>
    </tr>
    <tr>
    <td><input type="checkbox" name="gf" id="gf" value="1" <?php echo $gchecked; ?>>
        <label for="gf"> Gluten-Free</label></td>
    </tr>
    <tr>
    <td><input type="checkbox" name="vgn" id="vgn" value="1" <?php echo $vgchecked; ?>>
        <label for="vgn"> Vegan</label></td>
    </tr>
    <tr>
    <td> <input type="text" name="mi" value="<?php echo $row['mi']; ?>" /></td>
    </tr>
    <tr>
    <td> <input type="text" name="sio" value="<?php echo $row['sio']; ?>" />
    <input type="text" name="sit" value="<?php echo $row['sit']; ?>" /></td>
    </tr>
    <tr>
    <td> <input type="text" name="pn" value="<?php echo $row['pn']; ?>" /></td>
    </tr>
    <tr>
    <td>
    <img id="blah"  src="<?php echo $row['rimg']; ?>"  alt="Click to edit Image" height="100px" style="width: 100px" />
    </td>
    <tr>
        <td>
       Edit Image: <input type="file" name="rimg" value="<?php echo $row['rn']; ?>" class="form-control input-sm" onChange="readURL(this, '<?php echo $row['id']; ?>')"/>
        </td>
    </tr>
    </tr>
    </table>
    <input type="submit"  value="Update" name="update"/>
    </form>
    </center>
   
</body>
</html>
<script>
function readURL(input, id) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
               
                $('#blah'+id)
                    .attr('src', e.target.result)
                    .width(100)
                    .height(100);
            };
 
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
<?php
if(isset($_POST['update']))
{
    $rid=$_POST['rid'];
        $rn=$_POST['rn'];
        $csn=$_POST['csn'];
        $vg=$_POST['vg'];
        $mi=$_POST['mi'];
        $sio=$_POST['sio'];
        $sit=$_POST['sit'];
        $pn=$_POST['pn'];
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
         
        if($_FILES['rimg']['name']==""){
         $query3="UPDATE recipes SET rn='$rn', vg='$vg', csn='$csn', gf='$gf', vgn='$vgn', mi='$mi', sio='$sio', sit='$sit', pn='$pn'  WHERE id=$id";
       
        }
        else {
             $query4= "select * from recipes where id=$id";
             $res=mysqli_query($connection, $query4);
           
             while($row=mysqli_fetch_array($res))
             {
                 $img=$row['rimg'];
             }
            // unlink($oldimg);
              $x = explode(".",$_FILES['rimg']['name']);
            $ext = $x[count($x) - 1];
            $filepath = trim("Images/".$rid.".".$ext);
            print($filepath);
            print ($rid);
                $query3="UPDATE recipes SET rn='$rn', vg='$vg', csn='$csn', gf='$gf', vgn='$vgn', mi='$mi', sio='$sio', sit='$sit', pn='$pn'  rimg='$filepath' WHERE id=$id ";
               copy($_FILES['rimg']['tmp_name'], $filepath);

               
        }
   
   
    if(!mysqli_query($connection, $query3)) {
        echo "<script type='text/javascript'>alert('Update Failed');</script>";
    }else{
            echo "<script type='text/javascript'>alert('Updated Successfully');</script>";
            header("location:recipelist.php");
        }      
    }
?>
 
