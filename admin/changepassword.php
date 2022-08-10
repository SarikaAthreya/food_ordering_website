<?php include('snippets/menu.php');
?>
<div class="content">
    <div class="division">
        <h1>Update Password</h1>
        <br><br>
        <?php
        if(isset($_GET['admin_id'])){
            $admin_id=$_GET['admin_id'];
        }
        ?>    
        <form action="" method="POST">
            <table class="tab2">
                <tr>
                    <td>Current Password: </td>
                    <td>
                <input type="password" name="oldpassword" placeholder="Enter current password">
                    </td>
                </tr>
                <tr>
                    <td>
                       New Password: 
                    </td>
                    <td>
                <input type="password" name="newpassword" placeholder="Enter new password">
                    </td>
                </tr>
                <tr>
                    <td>
                       Confirm Password: 
                    </td>
                    <td>
                <input type="password" name="confirmpassword" placeholder="Enter password again">
                    </td>
                </tr>
                <tr>
                <td colspan="2">
                    <input type="hidden" name="admin_id" value="<?php print $admin_id;?>">
                <input type="submit" name="submit" value="Change Password" class="button4"></td>
                </tr>
            </table>
        </form>
    </div>
</div>
<?php
if(isset($_POST['submit']))
{
    $admin_id=$_POST['admin_id'];
    $current=md5($_POST['oldpassword']);
    $new=md5($_POST['newpassword']);
    $confirm=md5($_POST['confirmpassword']);
    $sql1="SELECT * FROM admin
          WHERE admin_id=$admin_id 
          AND password='$current'";
    $result=mysqli_query($conn,$sql1);
    if($result==TRUE){
            $count=mysqli_num_rows($result);
            if($count==1)
            {
             if($new=$confirm)
             {
                $sql2="UPDATE admin
                       SET password='$new'
                       WHERE admin_id=$admin_id";
                $result=mysqli_query($conn,$sql2);
                if($result==TRUE){
                    $_SESSION['change']="<div class='success'>Your password was updated</div>";
                    header("location:".'http://localhost/lavender&purplewebsite/admin/manage.php');
                }
                else{
                    $_SESSION['change']="<div class='error'>Oops! Failed to update your password</div>";
                    header("location:".'http://localhost/lavender&purplewebsite/admin/manage.php');
                }
             }
             else{
                 $_SESSION['notmatch']="<div class='error'>Oops! Your passwords don't match.Please try again.</div>";
            header("location:".'http://localhost/lavender&purplewebsite/admin/manage.php');
             }
            }
        else{
            $_SESSION['notfound']="<div class='error'>Oops user not found</div>";
            header("location:".'http://localhost/lavender&purplewebsite/admin/manage.php');
        }
        }
}
?>
<?php include('snippets/footer.php');
?>