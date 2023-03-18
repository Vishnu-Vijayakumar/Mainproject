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
              <a type="button" class="btn btn-primary nav-link active" href="./selleradd/Addbook.php">Add New Book</a>
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
        <th>Book No</th>
        <th>Book Image</th>
        <th>Book Name</th>
        <th>Book Author</th>
        <th>Book Category</th>
        <th>Book Price</th>

        <th>ACTIONS</th>
      </tr>
    </thead>
    <tbody>
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
      <td><?php echo '<img id="book_img" src="../seller/uploaded_images/'.$row['book_img'].'" alt="'.$row['book_name'].'">' ?></td>
      <td><?=$row["book_name"]?></td>
      <td><?=$row["book_author"]?></td>      
      
      <!-- <td><?=$row["book_des"]?></td>  -->
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

      
    </tbody>
  </table>
      </div>
    
    <script>
        function itemEditForm(bookid){
			window.location.href='../seller/selleradd/Editbook.php?bid='+bookid;
        }
    </script>

<script>
        function itemDelete(bookid){
			window.location.href='../seller/selleradd/delete.php?bid='+bookid;
        }
    </script>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  
  </body>
</html>