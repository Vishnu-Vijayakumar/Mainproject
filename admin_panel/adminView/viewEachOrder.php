<div class="container">
<table class="table table-striped">
    <thead>
        <tr>
            <th>S.N.</th>
            <th>Customer Name</th>
            <th>Book Price</th>
            <th>Payment id</th>
            <th>Payment Status</th>
            <!-- <th>Unit Price</th> -->
        </tr>
    </thead>
    <?php
       include_once "connection.php";
       $sql="SELECT * from tbl_payment";
       $result=$con-> query($sql);
       
       if ($result-> num_rows > 0){
         while ($row=$result-> fetch_assoc()) {
     ?>
        <tr>
           <td><?=$row["ad_id"]?></td>
           <td><?=$row["name"]?></td>
           <td><?=$row["amount"]?></td>
           <td><?=$row["payment_id"]?></td>
           <td><?=$row["pay_id"]?></td>
            <?php 
                 if($row["pay_id"]==0){
                 }
                }
            }
    ?>
                