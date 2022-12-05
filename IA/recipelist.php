<?php
error_reporting(0);
include("connect.php");
include("menu.php");
session_start();  
 
?>
 
 
 
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe List</title>
</head>
<body>
<br>
   <center>
   <h3>Admin</h3>
 
  <?php    
   $n=$_SESSION['fn'];
  echo "Welcome Sharmila!<br><br> ";
  include("MenuAdmin.php");  
  ?><br><br>
   <table class="table table-hover" >  
       
        <th>Recipe ID</th>      
        <th>Recipe Name</th>
        <th>Vegetarian</th>
        <th>Image</th>
        <th>Cuisine</th>
        <th>Ingredients</th> 
        <th>Page No.</th>
        <center><th>Click to</th>
        <th>Click to</th></center>
      </tr>
      <?php 
$qry = "select * from recipes";
$res = mysqli_query($connection,$qry);
while($row = mysqli_fetch_assoc($res)) { ?>
                <?php
                if ($row['vg'] == "Vegetarian") {
                    $colour = "color:green;";
                }
                else {
                    $colour = "color:red;";
                }
                if ($row['vgn'] == "Vegan") {
                    $vh = "15";
                }
                else {
                    $vh = "0";
                }
                if ($row['gf'] == "Gluten-Free") {
                    $gfh = "15";
                }
                else {
                    $gfh = "0";
                }
                ?>
                <tr>            
                    <td><?php echo $row['rid']; ?></td>                      
                    <td><?php echo $row['rn']; ?> <img id="abc" src="Images/v.png" height="<?php echo $vh; ?>px" style="width: <?php echo $vh; ?>px" alt="v"> <img id="xyz" src="Images/gf.png" height="<?php echo $gfh; ?>px" style="width: <?php echo $gfh; ?>px" alt="gf"></td>
                    <td style="<?php echo $colour; ?>"><?php echo $row['vg']; ?></td>
                    <td><img id="blah" src="<?php echo $row['rimg']; ?>"  height="100px" style="width: 100px" alt="hi"/></td>    
                    <td><?php echo $row['csn']; ?></td>
                    <td><?php echo $row['mi']; ?>, <?php echo $row['sio']; ?>, <?php echo $row['sit']; ?> </td>
                    <td><?php echo $row['pn']; ?></td>
                    <td><?php echo "<a href='recipeEdit.php?id=".$row['id']."'>Edit</a>"; ?></td>
                    <td><?php echo "<a href='recipeDel.php?id=".$row['id']."'>Delete</a>"; ?></td>
                </tr>
        <?php } ?>      
               
         
             </table>
 
             <a href="addrecipe.php"><input type="button" value="Add Recipe" name="Add Recipe"></a>
   </center>
</body>
</html>