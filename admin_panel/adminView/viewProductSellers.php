<div >
  <h2>All Sellers</h2>
  <table class="table ">
    <thead>
      <tr>
        <th class="text-center">S.N.</th>
        <th class="text-center">Username </th>
        <th class="text-center">Email</th>
        <th class="text-center">Contact Number</th>
        <th class="text-center">Dob</th>
        <th class="text-center">State</th>
      </tr>
    </thead>
    <?php
      // include_once "../connection.php";
      $server = "localhost";
      $user = "root";
      $password = "";
      $db = "bookstore";

      $conn = mysqli_connect($server,$user,$password,$db);

      if(!$conn) {
        die("Connection Failed:".mysqli_connect_error());
      }
      $sql="SELECT * from tbl_sellerregistration";
      $result=$conn-> query($sql);
      $count=1;
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
           
    ?>
    <tr>
      <td><?=$count?></td>
      <td><?=$row["firstname"]?> <?=$row["lastname"]?></td>
      <td><?=$row["email"]?></td>
      <td><?=$row["phone"]?></td>
      <td><?=$row["dob"]?></td>
      <td><?=$row["state"]?></td> 
    </tr>
    <?php
            $count=$count+1;
           
        }
    }
    ?>
  </table>





















































































































































































































<!-- 
<div >
  <h2>Books Status</h2>
  <table class="table ">
    <thead>
      <tr>
        <th class="text-center">S.N.</th>
        <th class="text-center">Book Name</th>
        <th class="text-center">Language</th>
        <th class="text-center">Stock Available</th>
        <th class="text-center" colspan="2">Action</th>
      </tr>
    </thead>
    
      // include_once "../config/dbconnect.php";
      

// $server = "localhost";
// $user = "root";
// $password = "";
// $db = "bookstore";

// $conn = mysqli_connect($server,$user,$password,$db);

// if(!$conn) {
//     die("Connection Failed:".mysqli_connect_error());
}

      
  //     $sql="SELECT * from tbl_language, tbl_bookinfo ";
  //     $result=$conn-> query($sql);
  //     $count=1;
  //     if ($result-> num_rows > 0){
  //       while ($row=$result-> fetch_assoc()) {
  //   ?>
  //   <tr>
  //     <td><?=$count?></td>
  //     <td><?=$row["book_name"]?></td>
  //     <td><?=$row["language_name"]?></td>      
  //     <td><?=$row["book_stock"]?></td>     
  //     <td><button class="btn btn-primary" style="height:40px" onclick="languageEditForm('<?php echo $row['book_id']; ?>')">Edit</button></td>
  //     <td><button class="btn btn-danger" style="height:40px"  onclick="languageDelete('<?php echo $row['book_id']; ?>')">Delete</button></td>
  //     </tr>
  //     <?php
  //           $count=$count+1;
  //         }
  //       }
  //     ?>
  // </table>

  //  Trigger the modal with a button -->
  <!-- <button type="button" class="btn btn-secondary" style="height:40px" data-toggle="modal" data-target="#myModal">
    Add Details
  </button>

  Modal
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
       Modal content-->
      <!-- <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">New Book Details</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form  enctype='multipart/form-data' action="./controller/addVariationController.php" method="POST">
             -->
            <!-- <div class="form-group">
              <label>Book:</label>
              <select name="bookid" >
                <option disabled selected>Select Book</option>
               

                  $sql="SELECT * from tbl_bookinfo";
                  $result = $conn-> query($sql);

                  if ($result-> num_rows > 0){
                    while($row = $result-> fetch_assoc()){
                      echo"<option value='".$row['book_id']."'>".$row['book_name'] ."</option>";
                    }
                  
                ?>
              </select>
            </div>
            <div class="form-group">
              <label>Language:</label>
              <select name="booklanguage" >
                <option disabled selected>Select language</option>
                <?php

                  // $sql="SELECT * from tbl_language";
                  // $result = $conn-> query($sql); -->

                  // if ($result-> num_rows > 0){
                  //   while($row = $result-> fetch_assoc()){
                  //     echo"<option value='".$row['language_id']."'>".$row['language_name'] ."</option>";
                  //   }
                  // }
                ?>
              </select>
            </div>
            <div class="form-group">
              <label for="qty">Stock Quantity:</label>
              <input type="number" class="form-control" name="bookstock" required>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-secondary" name="upload" style="height:40px">Add Variation</button>
            </div>
          </form>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" style="height:40px">Close</button>
        </div>
      </div>
      
    </div>
  </div>

  
</div>
   