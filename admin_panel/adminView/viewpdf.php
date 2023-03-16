
 <div >
  <h3> PDF SECTIONS </h3>
  <table class="table ">
    <thead>
      <tr>
        <th class="text-center">S.N.</th>
        <th class="text-center">Language</th>
        <th class="text-center" colspan="2">Action</th>
      </tr>
    </thead> 
    <?php
      // include_once "../config/dbconnect.php";
      // $server = "localhost";
      // $user = "root";
      // $password = "";
      // $db = "bookstore";

      // $conn = mysqli_connect($server,$user,$password,$db);

      // if(!$conn) {
      //   die("Connection Failed:".mysqli_connect_error());
      // }
      // $sql="SELECT * from tbl_language";
      // $result=$conn-> query($sql);
      // $count=1;
      // if ($result-> num_rows > 0){
      //   while ($row= mysqli_fetch_array($result)) {
    ?>
    <tr>
      <!-- <td><?=$count?></td>
      <td><?php echo $row["language_name"]; ?></td>   
      <!- <td><button class="btn btn-primary" >Edit</button></td> -->
      <!-- <td><button class="btn btn-danger" style="height:40px" onclick="languageDelete('<?=$row['language_id']?>')">Delete</button></td> -->
      </tr>
      <?php
            // $count=$count+1;
          // }
        // }
      ?>
  </table>

  <!-- Trigger the modal with a button -->
  <!-- <button type="button" class="btn btn-secondary" style="height:40px" data-toggle="modal" data-target="#myModal"> -->
    <!-- Add Language -->
  </button>

  <!-- Modal -->
  <!-- <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      Modal content
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">New Language</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form  enctype='multipart/form-data' action="./controller/addSizeController.php" method="POST">
            <div class="form-group">
              <label for="book_lang">Book Language:</label>
              <input type="text" class="form-control" name="book_lang" required>
            </div> -->
            <!-- <div class="form-group">
              <button type="submit" class="btn btn-secondary" name="book_lang_upload" style="height:40px">Add Language</button>
            </div>
          </form>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" style="height:40px">Close</button>
        </div>
      </div>
      
    </div> -->
  </div>

  
</div>
   

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="stylescadd.css">
    <link rel="stylesheet" href="style.css">
    
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body>
  <section class="">
    <nav>
  <div class="profile-details">
        <img src="images/profile.jpg" alt="">
        <i class='bx bx-chevron-down' ></i>
      </div>
      <form class="" action="insert.php" method="post" enctype="multipart/form-data">
      <div class="wrapper">
    <div class="title">
      Add PDF
    </div>  
    <div class="form">

 
            <div class="inputfield">
        <label for="">Choose Your File</label><br>
        <input id="pdf" type="file" name="pdf" value="" required><br><br>
        </div> 
        <input id="upload" type="submit" name="submit" value="Upload">
        <?php
        include './connection.php';

        if (isset($_POST['submit'])) {
         
          $pdf=$_FILES['pdf']['name'];
          $pdf_type=$_FILES['pdf']['type'];
          $pdf_size=$_FILES['pdf']['size'];
          $pdf_tem_loc=$_FILES['pdf']['tmp_name'];
          $pdf_store="pdf/".$pdf;
          move_uploaded_file($pdf_tem_loc,$pdf_store);

          $sql="INSERT INTO pdf_file(`pdf`) values('$pdf')";
      
          $query=mysqli_query($con,$sql);



        }



         ?>

      </form>

    </div>

  </body>
</html>
