<?php
    include "connection.php";
    $targetDir = "../seller/photos/";
    $finalpath = "seller/photos/";
    if(isset($_POST['submit'])){
        // $pname = $_POST['pname'];
        // $pprice = $_POST['pprice'];
        // $poffer = $_POST['poffer'];
        // $pfeat = $_POST['pfeature'];
        // $pimg=$_FILES["pimage"]["name"];
        // $targetImage = $targetDir . $pimg;
        // $finaltargetImage = $finalpath . $pimg;

        $book_name = $_POST['p_name'];
        $book_desc= $_POST['p_desc'];
        $book_price = $_POST['p_price'];
        $book_img=$_POST['file'];
        $category_id = $_POST['category'];



	      //echo $img;
        //$pimg = $_POST['pimage'];
        //print_r($_FILES);
        // $img=$_FILES["pimage"]["name"];
        // $img2=$_FILES["pimage"]["full_path"];
        // $img3=$_FILES["pimage"]["type"];
        
        //$pimg=$_FILES["pimage"]["type"];
        //$img2=$_FILES["pimage"]["full_path"];
        //$img3=$_FILES["pimage"]["size"];
       
        move_uploaded_file($_FILES["book_image"]["tmp_name"],$targetImage);
        //move_uploaded_file($_FILES["pimage"]["tmp_name"],"../seller/photos/".$img);
        // $q = "INSERT INTO tbl_products (product_id,seller_Id,prod_name,prod_price, prod_offers,prod_feature,prod_img) VALUES (null,1,'$pname', '$pprice', '$poffer','$pfeat','$finaltargetImage')";
        $insert = mysqli_query($conn,"INSERT INTO tbl_bookinfo VALUES (null, $category_id, '$book_name', 1, '$book_img', '$book_desc', 'Available', $book_price, 'English', 2012, 'Raj', 1, 'Doctor')");
        $query = mysqli_query($conn,$insert);
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
        <a class="navbar-brand" href="sellerindex.php">Seller Forms</a>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="sellerindex.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Add.php"><span style="font-size:larger;">Add New</span></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    
   
 <div class="col-lg-6 m-auto">
 
 <form method="post" action="#" enctype="multipart/form-data" onsubmit="return validate();">
 
 <br><br><div class="card">
 
 <div class="card-header bg-primary">
 <h1 class="text-white text-center">  Add product </h1>
 </div><br>
 
              

 <label> Book Name: </label>
 <input type="text" name="pname" id="pName" autofocus="false" autocomplete="off" class="form-control"  placeholder="Enter Book Name" required> <br>

 <label> Book Price: </label>
 <input type="text" name="pprice" id="pPrice" autofocus="false" autocomplete="off" class="form-control"  placeholder="Enter Price" required> <br>

 <label> Category: </label>
 <input type="text" name="poffer" id="pOffer" autofocus="false" autocomplete="off" class="form-control"  placeholder="Enter Category" required> <br>
 
 <label> Language: </label>
 <input type="text" name="pfeature" id="pFeature" autofocus="false" autocomplete="off" class="form-control"  placeholder="Enter Language" required> <br>

 <label> Upload Image: </label>
 <input type="file" name="pimage" id="pImage" autofocus="false" autocomplete="off" class="form-control" required> <br>

 

 <button class="btn btn-success" type="submit" name="submit"> Submit </button><br>
 <a class="btn btn-info" type="submit" name="cancel" href="sellerindex.php"> Cancel </a><br>

 </div>
 
 </form>
 </div>
 <script src="add.js"></script>
</body>
</html>