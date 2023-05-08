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
        $bstock = $_POST['stock'];

		$file_name = $_FILES['pimage']['name'];
		$temp_file_path = $_FILES['pimage']['tmp_name'];
		
		$new_file_path = '../uploaded_images/'.$file_name;
		if(move_uploaded_file($temp_file_path, $new_file_path)){
			$q = "INSERT INTO tbl_bookinfo (book_category_id,book_name,book_img,book_stock,book_price,book_language,book_author,seller_id,category_name) VALUES (1,'$bname','$file_name','$bstock','$bprice','$blanguage','$bauthor',2,'$bcategory')";
			$query = mysqli_query($conn,$q);
			if($query){
				echo "<script>alert('New Item Added Successfully...');</script>";
				header('sellerindex.php');
			}
			else{
				echo "<script>alert('Not added !!');</script>";
			}
		}
		else{
			echo "<script>alert('Unable to upload image and save data !! Please try again...');</script>";
		}
    }
?>
<!DOCTYPE html>
<html>
<head>
 <title>Seller</title>
 <link rel="stylesheet" type="text/css" href="style.css">
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
<input type="text" name="pname" id="pName" autofocus="false" autocomplete="off" class="form-control" placeholder="Enter Book Name" required> <br>
<div id="pNameError" class="error-message"></div>

<label> Book Price: </label>
<input type="text" name="pprice" id="pPrice" autofocus="false" autocomplete="off" class="form-control" placeholder="Enter Book Price" required> <br>

<style>
  .error {
    border-color: red;
  }
</style>

<script>
  // Get the input element
  const pPrice = document.getElementById('pPrice');

  // Add event listener to the input to validate it
  pPrice.addEventListener('input', function() {
    const value = pPrice.value.trim();
    if (isNaN(value) || value < 0) {
      pPrice.classList.add('error');
    } else {
      pPrice.classList.remove('error');
    }
  });
</script>

<label> Book Author: </label>
<input type="text" name="pauthor" id="pAuthor" autofocus="false" autocomplete="off" class="form-control" placeholder="Enter Book Author" required> <br>

<style>
  .error {
    border: 2px solid red;
  }
</style>

<script>
  // Get the input element
  const pAuthor = document.getElementById('pAuthor');

  // Add event listener to the input to validate it
  pAuthor.addEventListener('input', function() {
    if (pAuthor.value.trim() === '') {
      pAuthor.classList.add('error');
      pAuthor.setCustomValidity('Please enter a book author.');
    } else if (pAuthor.value.trim().split(' ')[0][0] !== pAuthor.value.trim().split(' ')[0][0].toUpperCase()) {
      pAuthor.classList.add('error');
      pAuthor.setCustomValidity('The first name of the author must be capitalized.');
    } else {
      pAuthor.classList.remove('error');
      pAuthor.setCustomValidity('');
    }
  });
</script>


<label> Book Category: </label>
<input type="text" name="pOffer" id="pOffer" autofocus="false" autocomplete="off" class="form-control"  placeholder="Enter Book Category" required> <br>

<style>
  .error {
    border: 2px solid red;
  }
</style>

<script>
  // Get the input element
  const pOffer = document.getElementById('pOffer');

  // Add event listener to the input to validate it
  pOffer.addEventListener('input', function() {
    const regex = /^[A-Za-z ]+$/;
    if (!regex.test(pOffer.value.trim())) {
      pOffer.classList.add('error');
      pOffer.setCustomValidity('Please enter a valid book category (letters and spaces only).');
    } else {
      pOffer.classList.remove('error');
      pOffer.setCustomValidity('');
    }
  });
</script>

 <label> Book Language: </label>
 <input type="text" name="language" id="pFeature" autofocus="false" autocomplete="off" class="form-control"  placeholder="Enter Book Language" required> <br>

 <label> Book Stock: </label>
<input type="text" name="stock" id="pstock" autofocus="false" autocomplete="off" class="form-control"  placeholder="Enter Book Stock" required> <br>

<style>
  .error {
    border: 2px solid red;
  }
</style>

<script>
  // Get the input element
  const pstock = document.getElementById('pstock');

  // Add event listener to the input to validate it
  pstock.addEventListener('input', function() {
    const regex = /^[0-9]+$/;
    if (!regex.test(pstock.value.trim())) {
      pstock.classList.add('error');
      pstock.setCustomValidity('Please enter only numbers for book stock.');
    } else {
      pstock.classList.remove('error');
      pstock.setCustomValidity('');
    }
  });
</script>


 <label> Upload Image: </label>
 <input type="file" name="pimage" id="pImage" autofocus="false" autocomplete="off" class="form-control" required> <br>

 

 <button class="btn btn-success" name="submit"> Submit </button><br>
 <a class="btn btn-info" type="submit" name="cancel" href="../sellerindex.php"> Cancel </a><br>

 </div>
 
 </form>
 </div>
 <script src="validation.js"></script>
</body>
</html>