<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Seller</title>

    <style>
      #book_img{
        height: 150px;
      }

      #s_feature,#s_name{
        overflow: hidden;
        width: 100%;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
      }
    </style>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="sellerindex.php">Book Details</a>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="sellerindex.php">Home</a>
            </li>
            <li class="nav-item">
              <a type="button" class="btn btn-primary nav-link active" href="Add.php">Add New</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="container my-4">
    <table class="table">
    <thead>
      <tr>
        <!-- <th>Product Id</th> -->
        <th>Book Name</th>
        <th>Book Price</th>
        <th>Category</th>
        <th>Language</th>
        <th>Upload image</th>

        <th>ACTIONS</th>
      </tr>
    </thead>
    <tbody>
   
      <?php
        include "connection.php";
        $sql = "select * from tbl_bookinfo";
        $result = $conn->query($sql);
        if(!$result){
          die("Invalid query!");
        }
        while($row=$result->fetch_assoc()){

          $url = $row['book_img'];
          $formatted_url = filter_var($url, FILTER_SANITIZE_URL);
          if (filter_var($formatted_url, FILTER_VALIDATE_URL) !== false) {
            $image= $url;
          } else {
            $pimage= "../".$url;
          }

          echo "
      <tr>
       
        <td><p id='s_name'>$row[book_name]</p></td>
        <td>$row[book_price]</td>
        <td>$row[book_category]</td>
        <td><p id='s_feature'>$row[book_language]</p></td>
        <td><img id='book_img' src='$book_image' alt='$row[book_img]'></td>
        <td>
                  <a class='btn btn-success' href='edit.php?pid=$row[book_id]'>Edit</a>
                  <a class='btn btn-danger' href='delete.php?pid=$row[book_id]'>Delete</a>
                </td>
      </tr>
      ";
        }
      ?>
    </tbody>
  </table>
      </div>
    
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>