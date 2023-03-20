<?php
        include 'connection.php';
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
<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="utf-8">
      <!-- <!-- <link rel="stylesheet" href="stylescadd.css"> -->
      <link rel="stylesheet" href="style.css"> 
      <!-- <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'> -->
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
  </head>
<style>
  .card
  {
    border:5px solid black;
    border-radius:20px;
    width:40%;
    margin-left:30%;
    margin-top:20%;
  }
  </style>

<body>
    <form class="" action="insert.php" method="post" enctype="multipart/form-data">
        <div class="wrapper">
            <div class="title">
                Upload PDF
            </div>
            <div class="form">
                <div class="inputfield">
                    <label for="">Choose Your File</label><br>
                    <input id="pdf" type="file" name="pdf" value="" required><br><br>
                </div>
                <input id="upload" type="submit" name="submit" value="Upload">
              <script>alert('Uploaded Successfully !!!');</script>
                   
                    
            </div>
      </div>
    </form>
    
    <!-- <div class="card">
      <div class="card-header">
        Featured
      </div>
      <div class="card-body">
        <! <h5 class="card-title">Special title treatment</h5>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <a href="#" class="btn btn-primary">Go somewhere</a> -->
        <!-- <input id="pdf" type="file" name="pdf" class="btn btn-warning" value="" required><br><br>
        <input id="upload" type="submit" name="submit" value="Upload"> --> 
      </div>
    </div>
</body>



</html>

