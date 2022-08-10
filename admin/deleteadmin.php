<?php
include('C:\xampp\htdocs\lavender&purplewebsite\connections\conn.php');
$admin_id=$_GET['admin_id'];
$sql="DELETE FROM admin
      WHERE admin_id=$admin_id";
$result=mysqli_query($conn,$sql);
if($result==TRUE)
{
    $_SESSION['delete']="<div class='success'><br><br>Admin has been deleted<br><br></div>";
    header('location:'.HOME.'admin/manage.php');
}
else{
    $_SESSION['delete']="<div class='error'><br><br>Oops!Admin not deleted<br><br></div>";
    header('location:'.HOME.'admin/manage.php');
}
?> 