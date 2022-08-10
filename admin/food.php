<?php include('snippets/menu.php');
?>
<div class="content">
    <div class="division">
         <h1>Manage Desserts</h1> 
         <br/><br/><br/></br></br>
         <?php
        if(isset($_SESSION['add'])){
                   print($_SESSION['add']);
                   unset($_SESSION['add']);
               }
        if(isset($_SESSION['remove'])){
                   print($_SESSION['remove']);
                   unset($_SESSION['remove']);
               } 
        if(isset($_SESSION['delete'])){
                   print($_SESSION['delete']);
                   unset($_SESSION['delete']);
               }        
        ?>
         <br><br>
               <a href="<?php print 'http://localhost/lavender&purplewebsite/';?>admin/addfood.php" class="button3">Add Dessert</a>
               <br/><br/><br/>
               <table class="tab">
                   <tr>
                       <th>Serial No</th>
                       <th>Title</th>
                       <th>Price</th>
                       <th>Image</th>
                       <th>Featured</th>
                       <th>Active</th>
                       <th>Actions</th>
                   </tr>
                   <?php
                   $sql="SELECT * FROM food";
                   $result=mysqli_query($conn,$sql);
                   $count= mysqli_num_rows($result);
                   $i=1;
                   if($count>0)
                   {
                      while($row= mysqli_fetch_assoc($result))
                      {
                          $id=$row['food_id'];
                          $title=$row['title'];
                          $price=$row['price'];
                          $image_name=$row['image_name'];
                          $featured=$row['featured'];
                          $active=$row['active'];
                           ?>
                   <tr>
                       <td><?php print $i++;?></td>
                       <td><?php print $title;?></td>
                       <td><?php print $price;?></td>
                       <td><?php 
                        if($image_name!=""){
                            ?>
                           <img src="<?php print "http://localhost/lavender&purplewebsite/";?>dessert_order/images/food/<?php print $image_name;?>" width="100">
                           <?php
                           
                        }else{
                            print "<div class='error'>Image not found</div>";
                        }
                       ?>
                           
                       </td>
                       <td><?php print $featured;?></td>
                       <td><?php print $active;?></td>
                       <td>
                       <a href="http://localhost/lavender&purplewebsite/admin/deletefood.php?id=<?php print $id;?>&image_name=<?php print $image_name;?>" class="button5">Delete Food</a>
                       </td>
                   </tr>
                   
                   <?php
                      }
                   }
                   else
                   {
                       ?>
                   <tr>
                       <td colspan="6">
                           <div class='error'>No dessert added</div>
                       </td>
                   </tr>
                   <?php
                   }
                   ?>
                   
               </table>
    </div>
</div>
<?php include('snippets/footer.php');
?>
