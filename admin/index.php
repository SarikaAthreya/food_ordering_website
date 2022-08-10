<?php include('snippets/menu.php');?>
<body>
        <div class="content">
          <div class="division"> 
               <h1 style="text-align: center">Current Status</h1>
               <br><br>
               <?php
            if(isset($_SESSION['login']))
               {
                   print ($_SESSION['login']); 
                   unset ($_SESSION['login']);
               }
            ?>
               <br><br>
                  <?php
                $sqll="CREATE VIEW CURRENT AS
                   SELECT order_id,food,price,quantity,total,date
                   FROM dessert_order.order
                   WHERE EXISTS(
                   SELECT order_id
                   FROM dessert_order.order
                   WHERE status='Ordered')
                   ORDER BY date";
                $resultt=mysqli_query($conn,$sqll);
                $sql="SELECT * FROM CURRENT";
                $result=mysqli_query($conn,$sql);
                $count=mysqli_num_rows($result);
                 if($count>0){
                     ?>
               <br>
               <br>
               <br>
               <fieldset>
                     <table class="tab table">
                       <tr>
                       <th>Order Id</th>
                       <th>Dessert</th>
                       <th>price</th>
                       <th>quantity</th>
                       <th>Total</th>
                       <th>Date</th>
                       </tr>
                       <?php
                while($row= mysqli_fetch_array($result))
                {
                   $orderid=$row[0];
                   $dessert=$row[1];
                   $price=$row[2];
                   $quantity=$row[3];
                   $total=$row[4];
                   $date=$row[5];
                   ?>
                       <tr>
                           <td><?php print $orderid;?></td>
                           <td><?php print $dessert;?></td>
                           <td><?php print $price;?></td>
                           <td><?php print $quantity;?></td>
                           <td><?php print $total;?></td>
                           <td><?php print $date;?></td>
                       </tr>
               <?php
                 }
                 ?> 
                      </table>
                   </fieldset>
               <?php
                 }
                    ?>
               
            <div class="clearfix"></div>
         </div>
        </div>
<?php include('snippets/footer.php');
?>
</body>
