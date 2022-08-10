<?php include('C:\xampp\htdocs\connections\conn.php');?>
<html>
    <head>
        <title>Login</title>
        <meta charset="utf-8">
    <br><br>
        <link rel="stylesheet" href="admin.css"/>
         <script src='http://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.js'></script>
        <script type="text/javascript">
        $(document).ready(function(){
        $('.logintag').css("background-color","white");
        $('.logintag').css("color","black");
        });
        </script>
        </head>
    <body>
        <div class="login">
            <div class="text_center logintag">Enter login details:</div>
            <?php
            if(isset($_SESSION['login']))
               {
                   print $_SESSION['login']; 
                   unset($_SESSION['login']);
               }
            if(isset($_SESSION['notloggedin']))
               {
                   print $_SESSION['notloggedin']; 
                   unset($_SESSION['notloggedin']);
               }   
            ?>
            <br><br>
            <form action="" method="POST" class="text_center">
                Username:<br>
                <input type="text" name="username" placeholder="Enter your username"><br><br>
                Password:<br>
                <input type="password" name="password" placeholder="Enter your password"><br><br>
                <input type="submit" name="submit" value="Login" class="button3"><br><br>
            </form> 
        </div>
    </body>
</html>
<?php
if(isset($_POST['submit'])){
    $username=$_POST['username'];
    $password=md5($_POST['password']);
    $sql="SELECT * FROM admin
          WHERE username='$username' AND password='$password'";
    $result=mysqli_query($conn,$sql);
    $count=mysqli_num_rows($result);
    if($count==1)
    {
        $_SESSION['login']="<div class='success'>Logged in successfully!<div>";
        $_SESSION['user']=$username;
        header('location:'.'http://localhost/lavender&purplewebsite/admin/index.php');
    }
else{
    $_SESSION['login']="<div class='error text_center'>Incorrect username and password<div>";
    header('location:'.'http://localhost/lavender&purplewebsite/admin/login.php');
}
}

?>