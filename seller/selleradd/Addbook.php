<?php
    include "connection.php";
    // $targetDir = "../seller/photos";
    // $finalpath = "../seller/photos";
    if(isset($_POST['submit'])){
        $bname = $_POST['pname'];
        $bprice = $_POST['pprice'];
        $bauthor=$_POST['pauthor'];
        $bcategory = $_POST['pOffer'];
        $blanguage = $_POST['language'];
        // $bimg=$_FILES["pimage"]["name"];
        $bimg=$_FILES['pimage']['name'];
        $finaltargetImage = $_FILES['pimage']['name'];
        $folder='../seller/photos';
    move_uploaded_file($finaltargetImage,$folder.$bimg);
        // $targetImage = $targetDir . $bimg;
        // $finaltargetImage = $finalpath . $bimg;
       
        // move_uploaded_file($_FILES["pimage"]["tmp_name"],$targetImage);
       
        //move_uploaded_file($_FILES["pimage"]["tmp_name"],"../seller/photos/".$img);
        $q = "INSERT INTO tbl_bookinfo (book_category_id,book_name,book_img,book_price,book_language,book_author,seller_id,category_name) VALUES (1,'$bname','$finaltargetImage','$bprice','$blanguage','$bauthor',2,'$bcategory')";
        $query = mysqli_query($conn,$q);
        if($query){
            echo "<script>alert('New Item Added Successfully...');</script>";
            header('sellerindex.php');
        }
        else{
          echo "<script>alert('Not added !!');</script>";
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
 <title>Seller</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="../sellerindex.php">Seller Forms</a>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="../sellerindex.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Addbook.php"><span style="font-size:larger;">Add New</span></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    
   
 <div class="col-lg-6 m-auto">
 
 <form method="post" action="#" enctype="multipart/form-data" onsubmit="return validate();">
 
 <br><br><div class="card">
 
 <div class="card-header bg-primary">
 <h1 class="text-white text-center">  Add Book </h1>
 </div><br>
 
              

 <label> Book Name: </label>
 <input type="text" name="pname" id="pName" autofocus="false" autocomplete="off" class="form-control"  placeholder="Enter Book Name" required> <br>

 <label> Book Price: </label>
 <input type="text" name="pprice" id="pPrice" autofocus="false" autocomplete="off" class="form-control"  placeholder="Enter Book Price" required> <br>

 <label> Book Author: </label>
 <input type="text" name="pauthor" id="pOffer" autofocus="false" autocomplete="off" class="form-control"  placeholder="Enter Book Author" required> <br>

 <label> Book Category: </label>
 <input type="text" name="pOffer" id="pOffer" autofocus="false" autocomplete="off" class="form-control"  placeholder="Enter Book Category" required> <br>
 
 <label> Book Language: </label>
 <input type="text" name="language" id="pFeature" autofocus="false" autocomplete="off" class="form-control"  placeholder="Enter Book Language" required> <br>

 <label> Upload Image: </label>
 <input type="file" name="pimage" id="pImage" autofocus="false" autocomplete="off" class="form-control" required> <br>

 

 <button class="btn btn-success" name="submit"> Submit </button><br>
 <a class="btn btn-info" type="submit" name="cancel" href="../sellerindex.php"> Cancel </a><br>

 </div>
 
 </form>
 </div>
 <script src="add.js"></script>
</body>
</html>