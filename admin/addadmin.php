<?php include('snippets/menu.php');
?>
<div class="content">
    <div class="division">
        <h1>Add Admin</h1>
        <br/><br/>
        <?php
        if(isset($_SESSION['add']))
        {
            print $_SESSION['add'];
            unset($_SESSION['add']);
        }
        ?>
        <form action="" method="POST">
            <table class="tab2">
                <tr>
                    <td>Name: </td>
                    <td><input type="text" name="fullname" placeholder="Enter name"></td>
                </tr>
                <tr>
                    <td>User Name: </td>
                    <td><input type="text" name="username" placeholder="Enter username"></td>
                </tr>
                <tr>
                    <td>Password: </td>
                    <td><input type="password" name="password" placeholder="Enter password"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="button3">   
                    </td>
                </tr>
            </table>
        </form>
    </div>
         
</div>
<?php include('snippets/footer.php');
?>
<?php
if(isset($_POST['submit']))
{
  $name=$_POST['fullname']; 
  $username=$_POST['username'];
  $password=md5($_POST['password']);  
  //sql query starts here
  $sql="INSERT INTO admin SET 
        name='$name',
        username='$username',
        password='$password'
         ";
  $result=mysqli_query($conn,$sql) or die(mysqli_error());
if($result==TRUE)
{
   $_SESSION['add']="<br><br><div class='success'>Admin added successfully :)<br><br></div>";
   header("location:".'http://localhost/lavender&purplewebsite/admin/manage.php');
}
else
{
   $_SESSION['add']="<br><br><div class='error'>Request failed :(<br><br></div>";
   header("location:".'http://localhost/lavender&purplewebsite/admin/manage.php');
} 
}
?>
