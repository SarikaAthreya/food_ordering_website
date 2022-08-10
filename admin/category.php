<?php include('snippets/menu.php');
?>
<div class="content">
    <div class="division">
         <h1>Manage Category</h1> 
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
               <a href="<?php print 'http://localhost/lavender&purplewebsite/';?>admin/addcategory.php" class="button3">Add Category</a>
               <br/><br/><br/>
               <table class="tab">
                   <tr>
                       <th>Serial No</th>
                       <th>Title</th>
                       <th>Image</th>
                       <th>Featured</th>
                       <th>Active</th>
                       <th>Actions</th>
                   </tr>
                   <?php
                   $sql="SELECT * FROM categories";
                   $result=mysqli_query($conn,$sql);
                   $count= mysqli_num_rows($result);
                   $i=1;
                   if($count>0)
                   {
                      while($row= mysqli_fetch_assoc($result))
                      {
                          $catg_id=$row['category_id'];
                          $title=$row['title'];
                          $image_name=$row['image_name'];
                          $featured=$row['featured'];
                          $active=$row['active'];
                           ?>
                   <tr>
                       <td><?php print $i++;?></td>
                       <td><?php print $title;?></td>
                       <td><?php 
                        if($image_name!=""){
                            ?>
                           <img src="<?php print "http://localhost/lavender&purplewebsite/";?>dessert_order/images/category/<?php print $image_name;?>" width="100">
                           <?php
                           
                        }else{
                            print "<div class='error'>Image not found</div>";
                        }
                       ?>
                           
                       </td>
                       <td><?php print $featured;?></td>
                       <td><?php print $active;?></td>
                       <td>
                           <a href="http://localhost/lavender&purplewebsite/admin/deletecategory.php?catg_id=<?php print $catg_id;?>&image_name=<?php print $image_name;?>" class="button5">Delete Category</a>
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
                           <div class='error'>No category added</div>
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
