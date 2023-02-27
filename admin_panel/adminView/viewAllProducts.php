
<div >
  <h2>Book Availabe</h2>
  <table class="table ">
    <thead>
      <tr>
        <th class="text-center">S.N.</th>
        <th class="text-center">Book Image</th>
        <th class="text-center">Book Name</th>
        <th class="text-center">Book Author</th>
        <th class="text-center">Book Category</th>
        <th class="text-center">Book Price</th>
        <th class="text-center" colspan="2">Action</th>
      </tr>
    </thead>
    <?php
      $server = "localhost";
      $user = "root";
      $password = "";
      $db = "bookstore";

      $conn = mysqli_connect($server,$user,$password,$db);

      if(!$conn) {
        die("Connection Failed:".mysqli_connect_error());
      }
      $sql="SELECT * from tbl_bookinfo";
      $result=$conn-> query($sql);
      $count=1;
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
    ?>
    <tr>
      <td><?=$count?></td>
      <td><?php echo '<img id="book_img" src="'.$row['book_img'].'" alt="'.$row['book_img'].'">' ?></td>
      <td><?=$row["book_name"]?></td>
      <td><?=$row["book_author"]?></td>      
      
       <!-- <td><?=$row["book_des"]?></td> -->
      <td><?=$row["category_name"]?></td> 
      <td><?=$row["book_price"]?></td>      
      <td><button class="btn btn-primary" style="height:40px" onclick="itemEditForm('<?=$row['book_id']?>')">Edit</button></td>
      <td><button class="btn btn-danger" style="height:40px" onclick="itemDelete('<?=$row['book_id']?>')">Delete</button></td>
      </tr>
      <?php
            $count=$count+1;
          }
        }
      ?>
  </table>

  <Trigger the modal with a button>
  <button type="button" class="btn btn-secondary " style="height:40px" onsubmit="addItems();" data-toggle="modal" data-target="#myModal">
  Add Books
   
  </button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">New Book Item</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form  enctype='multipart/form-data' onsubmit="addItems();"  method="POST">
            <div class="form-group">
              <label for="name">Book Name:</label>
              <input type="text" class="form-control" id="book_name" required>
            </div>
            <div class="form-group">
              <label for="price">Price:</label>
              <input type="number" class="form-control" id="book_price" required>
            </div>
            <div class="form-group">
              <label for="qty">Description:</label>
              <input type="text" class="form-control" id="book_desc" required>
            </div>
            <div class="form-group">
              <label>Category:</label>
              <select id="category" required>
                <option disabled selected>Select category</option>
                <?php

                  $sql="SELECT * from tbl_category";
                  $result = $conn-> query($sql);

                  if ($result-> num_rows > 0){
                    while($row = $result-> fetch_assoc()){
                      echo"<option value='".$row['category_id']."'>".$row['category_name'] ."</option>";
                    }
                  }
                ?>
              </select>
            </div>
            <div class="form-group">
                <label for="file">Choose Image:</label>
                <input type="file" class="form-control-file" name="img_file" id="file" required>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-secondary" onsubmit="return true;" id="upload_my" style="height:40px">Add Item</button>
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
   