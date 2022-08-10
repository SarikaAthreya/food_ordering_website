<?php
include('C:\xampp\htdocs\lavender&purplewebsite\connections\conn.php');
if(isset($_GET['catg_id']) AND isset($_GET['image_name'])){
    $catg_id=$_GET['catg_id'];
    $image_name=$_GET['image_name'];
    if($image_name!=""){
        $path="C:/xampp/htdocs/lavender&purplewebsite/dessert_order/images/category/".$image_name;
        $remove=unlink($path);
        if($remove==FALSE){
            $_SESSION['remove']="<br><br><div class='success'>Request failed.Image NOT removed<br><br></div>";
            header("location:".'http://localhost/lavender&purplewebsite/admin/category.php');
            die();
        }
    }
    $sql="DELETE FROM categories WHERE category_id=$catg_id";
    $result=mysqli_query($conn,$sql);
if($result==TRUE)
{
   $_SESSION['delete']="<br><br><div class='success'>Category deleted successfully :)<br><br></div>";
   header("location:".'http://localhost/lavender&purplewebsite/admin/category.php');
}
else
{
   $_SESSION['delete']="<br><br><div class='error'>Failed to delete category<br><br></div>";
   header("location:".'http://localhost/lavender&purplewebsite/admin/category.php');
} 
}
else{
    header('location:'.HOME.'admin/category.php');
}
?>