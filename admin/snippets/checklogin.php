<?php
if(!isset($_SESSION['user'])){
    $_SESSION['notloggedin']="<div class='error text_center'>Admin panel access denied. Please login to access.</div>";
    header('location:'.'http://localhost/lavender&purplewebsite/admin/login.php');
}
?>