<?php include('snippets/menu.php');?>
<div class="content">
    <div class="division">
        <h1>Update</h1>
        <br><br><br><br>
        <?php
        $admin_id=$_GET['admin_id'];
        $sql="SELECT * FROM admin
              WHERE admin_id=$admin_id";
        $result=mysqli_query($conn,$sql);
        if($result==TRUE){
            $count=mysqli_num_rows($result);
            if($count==1)
            {
                $row=mysqli_fetch_assoc($result);
                $name=$row['name'];
                $username=$row['username'];
            }
        else{
            header("location:".'http://localhost/lavender&purplewebsite/admin/manage.php');
        }
        }
        ?>
        <form action="" method="POST">
            <table class="tab2">
                <tr>
                    <td>Name: </td>
                    <td><input type="text" name="name" value="<?php print $name?>"></td>
                </tr>
                <tr>
                    <td>User Name: </td>
                    <td><input type="text" name="username" value="<?php print $username?>"></td>
                </tr>
                    <td colspan="2">
                        <input type="hidden" name="admin_id" value="<?php print $admin_id;?>">
                        <input type="submit" name="submit" value="Update Admin" class="button3"/>   
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
<?php
if(isset($_POST['submit'])){
   $admin_id=$_POST['admin_id'];
   $name=$_POST['name'];
   $username=$_POST['username'];
   $sql="UPDATE admin
         SET name='$name',username='$username'
         WHERE admin_id='$admin_id'";
   $result=mysqli_query($conn,$sql);
   if($result==TRUE){
       $_SESSION['update']="<div class='success'>Admin updated!</div>";
       header("location:".'http://localhost/lavender&purplewebsite/admin/manage.php');
   }
   else{
       $_SESSION['update']="<div class='error'Oops!Failed to update!</div>";
       header("location:".'http://localhost/lavender&purplewebsite/admin/manage.php');
   }      
}
?>
<?php include('snippets/footer.php');?>


