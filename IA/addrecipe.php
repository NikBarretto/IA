<?php
error_reporting(0);
include("connect.php");
include("menu.php");
session_start();
$nqry = "select * from recipes";  
$nres = mysqli_query($connection,$nqry);
$id = mysqli_num_rows($nres) + 1;  
$rid = ($id < 10)?"R0".$id:"R".$id;
 
 
$n=$_SESSION['fn'];
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Recipe</title>
</head>
<body>
<form method="post" action="SaveRecipe.php"  enctype="multipart/form-data">
<center>
<h1>Admin</h1><br>
<?php    
  echo "Welcome Sharmila!<br><br> ";
  include("MenuAdmin.php");  
  ?><br><br>
   <br>
<h1>Recipe Details</h1>
    <table cellpadding="10" cellspacing="15">
 
    <tr>
        <td>
    <input  name="" required type="text" value="<?php echo $rid; ?>" disabled="disabled"></td>
    <td><input type="hidden" name="id" value="<?php echo $id;?> " /></td>
    <td>  <input type="hidden" name="rid" value="<?php echo $rid ; ?> " />
   
    </td></tr>
    <tr>
        <td>
        Choose Image: <input name="rimg" id="usrimg" class="txt" type="file" onChange="readURL(this, '<?php echo $rid; ?>')"/>
        </td>
    </tr>
    <tr>
    <td><input type="text" name="rn" Placeholder="Recipe Name"></td></tr>
    <tr>
    <td><input type="text" name="csn" Placeholder="Cuisine"></td></tr>
    <tr>
        <td>
        <input type="Radio" required name="vg" value="Vegetarian">Vegetarian
          <input type="Radio" required name="vg" value="Non-Vegetarian">Non-Vegetarian
        </td>
    </tr>
    <tr>
    <td><input type="checkbox" name="gf" id="gf" value="1">
        <label for="gf"> Gluten-Free</label></td>
    </tr>
    <tr>
    <td><input type="checkbox" name="vgn" id="vgn" value="1">
        <label for="vgn"> Vegan</label></td>
    </tr>
    <tr>
        <td>
            <input type="text" name="mi" placeholder="Main Ingredient">
        </td>
    </tr>
    <tr>
        <td>
            <input type="text" name="sio" placeholder="Secondary Ingredient 1">
            <input type="text" name="sit" placeholder="Secondary Ingredient 2">
        </td>
    </tr>
    <tr>
        <td>
            <input type="text" name="pn" placeholder="Page No.">
        </td>
    </tr>
        

  
    
    </table>
    <input type="Submit" name="sub" Value="Submit">
    </center>
    </form>
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