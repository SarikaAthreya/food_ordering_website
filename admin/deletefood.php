<?php
include('C:\xampp\htdocs\lavender&purplewebsite\connections\conn.php');
if(isset($_GET['id']) AND isset($_GET['image_name'])){
    $id=$_GET['id'];
    $image_name=$_GET['image_name'];
    if($image_name!=""){
        $path="C:/xampp/htdocs/lavender&purplewebsite/dessert_order/images/food/".$image_name;
        $remove=unlink($path);
        if($remove==FALSE){
            $_SESSION['remove']="<br><br><div class='success'>Request failed.Image NOT removed<br><br></div>";
            header("location:".'http://localhost/lavender&purplewebsite/admin/food.php');
            die();
        }
    }
    $sql="DELETE FROM food WHERE food_id=$id";
    $result=mysqli_query($conn,$sql);
if($result==TRUE)
{
   $_SESSION['delete']="<br><br><div class='success'>Dessert deleted successfully :)<br><br></div>";
   header("location:".'http://localhost/lavender&purplewebsite/admin/food.php');
}
else
{
   $_SESSION['delete']="<br><br><div class='error'>Failed to delete dessert<br><br></div>";
   header("location:".'http://localhost/lavender&purplewebsite/admin/food.php');
} 
}
else{
    header('location:'.HOME.'admin/food.php');
}
?>