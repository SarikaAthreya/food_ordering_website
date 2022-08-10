<?php include('snippets/menu.php');?>
<div class="content">
    <div class="division">
        <h1>Add Category</h1>
        <br><br>
        <?php
        if(isset($_SESSION['add'])){
                   print($_SESSION['add']);
                   unset($_SESSION['add']);
               }     
        ?>
        <br><br>
        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tab2">
                <tr>
                    <td>Title:</td>
                    <td>
                        <input type="text" name="title" placeholder="Category Title">
                    </td>
                </tr>
                <tr>
                    <td>Select image: </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>
                <tr>
                    <td>
                        Featured:
                    </td>
                    <td>
                        <input type="radio" name="featured" value="Yes">Yes
                        <input type="radio" name="featured" value="No">No
                    </td>
                </tr>
                <tr>
                    <td>
                        Active:
                    </td>
                    <td>
                        <input type="radio" name="active" value="Yes">Yes
                        <input type="radio" name="active" value="No">No
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Category" class="button3">
                    </td>
                </tr>
                
            </table>
        </form>
        <?php if(isset($_POST['submit'])){
            $title=$_POST['title'];
            if(isset($_POST['featured'])){
                $featured=$_POST['featured'];
            }
            else{
                $featured="No";
            }
            if(isset($_POST['active'])){
                $active=$_POST['active'];
            }
            else{
                $active="No";
            }
            if(isset($_FILES['image']['name'])){
                $image_name=$_FILES['image']['name'];
                if($image_name!=""){
                $ext=end(explode('.',$image_name));
                $image_name="Dessert_category_".rand(000,999).'.'.$ext;
                $source=$_FILES['image']['tmp_name'];
                $destination="C:/xampp/htdocs/lavender&purplewebsite/dessert_order/images/category/".$image_name;
                $upload= move_uploaded_file($source,$destination);
                if($upload==FALSE){
                    $_SESSION['upload']="<div class='error'>Failed to upload image</div?>";
                    header('location:'.'http://localhost/lavender&purplewebsite/admin/addcategory.php');
                    die();
                }
                }
            }
            else{

                $image_name="";
            }
            $sql="INSERT INTO categories
                  SET title='$title',image_name='$image_name',featured='$featured',active='$active'";
            $result=mysqli_query($conn,$sql);
            if($result==TRUE){
              $SESSION['add']="<br><br><div class='success'>Category has been added successfully</div><br><br>";
              header('location:'.'http://localhost/lavender&purplewebsite/admin/category.php');
            }
            else{
               $SESSION['add']="<br><br><div class='error'>Failed to add category!</div><br><br>";
              header('location:'.'http://localhost/lavender&purplewebsite/admin/addcategory.php'); 
            }
                
        }
        ?>
    </div>
</div>


<?php include('snippets/footer.php');?>