<?php include('C:\xampp\htdocs\connections\conn.php');?>
<script type="text/javascript">
            alert("Order placed successfully");
    var logout=confirm("Do you want to log out?");
    if(logout==true){
        window.location.href = 'http://localhost/lavender&purplewebsite/admin/login.php';
        }
        else{
          window.location.href = 'http://localhost/lavender&purplewebsite/admin/index.php';   
        }
</script>
