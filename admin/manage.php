<?php include('snippets/menu.php');
?>
          <div class="content">
          <div class="division"> 
               <h1>Manage Admin</h1> 
               <br><br><br><br>
               <?php
               if(isset($_SESSION['add']))
               {
                   print ($_SESSION['add']); 
                   unset($_SESSION['add']);
               }
               if(isset($_SESSION['delete'])){
                   print($_SESSION['delete']);
                   unset($_SESSION['delete']);
               }
               if(isset($_SESSION['update'])){
                   print($_SESSION['update']);
                   unset($_SESSION['update']);
               }
               if(isset($_SESSION['notfound'])){
                   print($_SESSION['notfound']);
                   unset($_SESSION['notfound']);
               }
               if(isset($_SESSION['notmatch'])){
                   print($_SESSION['notmatch']);
                   unset($_SESSION['notmatch']);
               }
               if(isset($_SESSION['change'])){
                   print($_SESSION['change']);
                   unset($_SESSION['change']);
               }
               ?>
               <br><br><br><br>
               <a href="addadmin.php" class="button3">Add Admin</a>
               <br/><br/><br/>
               <table class="tab">
                   <tr>
                       <th>Serial No.</th>
                       <th>Full Name</th>
                       <th>User Name</th>
                       <th>Actions</th>
                   </tr>
                   <?php
                   $sql="SELECT * FROM ADMIN";
                   $result=mysqli_query($conn,$sql);
                   if($result==TRUE)
                   {
                       $rows= mysqli_num_rows($result);
                       $sn=1;
                       if($rows>0)
                       {
                          while($rows= mysqli_fetch_assoc($result)){
                              $admin_id=$rows['admin_id'];
                              $name=$rows['name'];
                              $username=$rows['username'];
                              $password=$rows['password'];
                              ?>
                    <tr>
                       <td><?php print $sn++;?></td>
                       <td><?php print $name?></td>
                       <td><?php print $username?></td>
                       <td>
                           <a href="http://localhost/lavender&purplewebsite/admin/changepassword.php?admin_id=<?php print $admin_id;?>" class="button4">Change password</a>
                           <a href="http://localhost/lavender&purplewebsite/admin/update.php?admin_id=<?php print $admin_id;?>" class="button4">Update Admin</a>
                           <a href="http://localhost/lavender&purplewebsite/admin/deleteadmin.php?admin_id=<?php print $admin_id;?>" class="button5">Delete Admin</a><!-- passing variable through url-GET method -->
                       </td>
                   </tr>
                   <tr>
                  
                   <?php
                          } 
                       }
                       else{
                           
                       }
                   }
                   ?>
               </table>
          </div>
        </div>

<?php include('snippets/footer.php');
?>