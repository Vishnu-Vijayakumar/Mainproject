<?php
  include "connection.php";
 

 $bid="";
  $bname ="";
  $bauthor="";
  $bprice ="";
  $bcategory ="";
  $blanguage ="";
  $bimg="";





  $error="";
  $success="";

  if($_SERVER["REQUEST_METHOD"]=='GET'){
    if(!isset($_GET['bid'])){
      header("location:/MiniProject/seller/sellerindex.php");
      exit;
    }
    $bid = $_GET['bid'];
    $sql = "select * from tbl_bookinfo where book_id=$bid";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    while(!$row){
      header("location: /MiniProject/seller/sellerindex.php");
      exit;
    }
    $bname=$row["book_name"];
    $bprice=$row["book_price"];
    $bauthor = $_POST['book_author'];
    $bcategory=$row["category_name"];
    $blanguage=$row["book_language"];
    $bimg=$row["book_img"];
   


  }
  // $name = $_FILES['pimage']['name'];
  // $temp_name = $_FILES['pimage']['temp_name'];

  // if (isset($name)) {

  //     if (!empty($name)) {
  //         $location = '../seller/photos/';
  //     }

  //     if (move_uploaded_file($temp_name, $location.$name)) {
  //         echo 'uploaded';
  //     }

  // } else {
  //     echo 'please uploaded';
  // }
  $targetDir = ".,/seller/photos";
  $finalpath = "seller/photos/";
  if(isset($_POST['submit'])){
      $bname = $_POST['bname'];
      $bprice = $_POST['bprice'];
      $bauthor = $_POST['pauthor'];
      $bcategory = $_POST['poffer'];
      $blanguage = $_POST['pfeature'];
      $bimg=$_FILES["pimage"]["name"];
      $targetImage = $targetDir . $bimg;
      $finaltargetImage = $finalpath . $bimg;
     
      move_uploaded_file($_FILES["pimage"]["tmp_name"],$targetImage);
     
    $sql = "update tbl_bookinfo set book_name='$bname', book_price='$bprice',book_author='$bauthor', book_category_id='$bcategory', book_language='$blanguage',book_img='$bimg' where book_id='$bid'";
    //$result = $conn->query($sql);
    $result= mysqli_query($conn,$sql);
    if($result){
      echo "<script>alert('New Item updated Successfully...');</script>";
      header('sellerindex.php');
  }
  else{
    echo "<script>alert('Not updated !!');</script>";
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
<nav class="navbar navbar-expand-lg navbar-dark bg-dark" class="fw-bold">
      <div class="container-fluid">
        <a class="navbar-brand" href="../sellerindex.php">Seller form</a>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="../sellerindex.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Addbook.php">Add New</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
 <div class="col-lg-6 m-auto">
 
 <form method="post" action="Editbook.php" enctype="multipart/form-data" name="editForm">
 
 <br><br><div class="card">
 
 <div class="card-header bg-warning">
 <h1 class="text-white text-center">  Update Products </h1>
 </div><br>

 <input type="hidden" id="bid" name="bid" value="<?php echo $pid; ?>" class="form-control" required> <br>

 <label> Book Name: </label>
 <input type="text" id="pname" name="bname" value="<?php echo $bname; ?>" class="form-control" required > <br>

 <label> Book Author: </label>
 <input type="text" id="bauthor" name="pauthor" value="<?php echo $bauthor; ?>" class="form-control" required > <br>

 <label> Book Price: </label>
 <input type="text" id="price" name="bprice" value="<?php echo $bprice; ?>" class="form-control" required> <br>

 <label> Book category: </label>
 <input type="text" id="poffer" name="poffer" value="<?php echo $bcategory; ?>" class="form-control" required> <br>

 <label> Book Language: </label>
 <input type="text" id="pfeauture" name="pfeature" value="<?php echo $blanguage; ?>" class="form-control" required> <br>

 <label> Upload Image: </label>
 <input type="file" id="pimge" name="pimage" class="form-control"> <br>

 <input type="submit" class="btn btn-success" value="edit" name="submit"><br>
 <a class="btn btn-info" type="submit" name="cancel" href="sellerindex.php"> Cancel </a><br>

 </div>
 </form>
 </div>
 <script src="edit.js"></script>
</body>
</html>