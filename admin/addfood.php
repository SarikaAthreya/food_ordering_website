    <?php include('snippets/menu.php');?>
    <div class="content">
        <div class="division">
            <h1>Add Dessert</h1>
            <br><br>
            <?php
            if(isset($_SESSION['upload'])){
                       print($_SESSION['upload']);
                       unset($_SESSION['upload']);
                   } 
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
                            <input type="text" name="title" placeholder="Dessert Title">
                        </td>
                    </tr>
                    <tr>
                        <tr>
                        <td>Description:</td>
                        <td>
                            <textarea name="description" cols="30" rows="5" placeholder="Food Description.."></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>Price:</td>
                        <td>
                            <input type="number" name="price">
                        </td>
                    </tr>
                    <tr>
                        <td>Select image: </td>
                        <td>
                            <input type="file" name="image">
                        </td>
                    </tr>
                    <tr>
                        <td>Category: </td>
                        <td>
                            <select name="category">
                                <?php
                                $sql1="SELECT * FROM categories
                                      WHERE active='Yes'";
                                $result1=mysqli_query($conn,$sql1);
                                $count= mysqli_num_rows($result1);
                                if($count>0){
                                    while($row=mysqli_fetch_assoc($result1)){
                                        $catg_id=$row['category_id'];
                                        $title=$row['title'];
                                        ?>
                                <option value="<?php print $catg_id;?>"><?php print $title;?></option>
                                <?php
                                    }
                                }
                                else{
                                   ?>
                                <option value="0">No category Found</option>
                                <?php
                                }
                                ?>
                            </select>
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
                        <td>
                            <input type="submit" name="submit" value="Add Food" class="button3">
                        </td>
                    </tr> 
                </table>
            </form>
            <?php 
                if(isset($_POST['submit'])){
                $title=$_POST['title'];
                $description=$_POST['description'];
                $price=$_POST['price'];
                $catg_id=$_POST['category'];
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
                    $destination="C:/xampp/htdocs/lavender&purplewebsite/dessert_order/images/food/".$image_name;
                    $upload= move_uploaded_file($source,$destination);
                    if($upload==FALSE){
                        $_SESSION['upload']="<div class='error'>Failed to upload image</div?>";
                        header('location:'.'http://localhost/lavender&purplewebsite/admin/addfood.php');
                        die();
                    }
                    }
                }
                else{
                    $image_name="";
                }
                $sql2="INSERT INTO food
                       SET title='$title',
                        description='$description',
                        price=$price,
                        image_name='$image_name',
                        categ_id=$catg_id,
                        featured='$featured',
                        active='$active'";
                $result2=mysqli_query($conn,$sql2);
                if($result2==TRUE){
                  $SESSION['add']="<br><br><div class='success'>Dessert has been added successfully</div><br><br>";
                  header('location:'.'http://localhost/lavender&purplewebsite/admin/food.php');
                }
                else{
                   $SESSION['add']="<br><br><div class='error'>Failed to add dessert!</div><br><br>";
                  header('location:'.'http://localhost/lavender&purplewebsite/admin/addfood.php'); 
                }     
            }
            ?>
        </div>
    </div>
    <?php include('snippets/footer.php');?>