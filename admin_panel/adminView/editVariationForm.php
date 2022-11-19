<div class="container p-5">

<h4>Edit Detail</h4>
<?php
    // include_once "../config/dbconnect.php";
    //  include_once "../config/dbconnect.php";
  
        $server = "localhost";
      $user = "root";
      $password = "";
      $db = "bookstore";

      $conn = mysqli_connect($server,$user,$password,$db);

      if(!$conn) {
        die("Connection Failed:".mysqli_connect_error());
      }
    
	$bookid=$_POST['record'];
	$qry=mysqli_query($conn, "SELECT * from tbl_bookinfo Where book_id='$bookid'");
	$numberOfRow=mysqli_num_rows($qry);
    $row1= mysqli_fetch_array($qry);
	if($numberOfRow > 0){
        $bookid=$row1["book_id"];
        $language=$row1["book_language"];
?>

<form id="update-Items" onsubmit="updateVariations()" enctype='multipart/form-data'>
	<div class="form-group">
      <input type="text" class="form-control" id="book_id" value="<?php echo $bookid; ?>" hidden>
    </div>
    <div class="form-group">
        <label>Product:</label>
        <select id="tbl_bookinfo" >
            <?php
                $result = $conn-> query("SELECT * from tbl_bookinfo where book_id=$bookid");
                if ($result-> num_rows > 0){
                    while($row = $result-> fetch_assoc()){
                        echo"<option selected value='".$row['book_id']."'>".$row['book_name'] ."</option>";
                    }
                }
            ?>
            <?php
                $result = $conn-> query("SELECT * from tbl_bookinfo where book_id!=$bookid");
                if ($result-> num_rows > 0){
                    while($row = $result-> fetch_assoc()){
                        echo"<option value='".$row['book_id']."'>".$row['book_name'] ."</option>";
                    }
                }
            ?>
        </select>
    </div>

    <div class="form-group">
        <label>Language: <?php  echo $language; ?></label>
        <select id="size" >
        <?php
            $result = $conn-> query("SELECT * from tbl_language where language_name=$language");
            if ($result-> num_rows > 0){
                while($row = $result-> fetch_assoc()){
                    echo"<option selected value='".$row['lanuage_id']."'>".$row['language_name'] ."</option>";
                }
            }
        ?>

        <?php
            $result = $conn-> query("SELECT * from tbl_language where language_id!=$language");
            if ($result-> num_rows > 0){
                while($row = $result-> fetch_assoc()){
                    echo"<option value='".$row['size_id']."'>".$row['size_name'] ."</option>";
                }
            }
        ?>
        </select>
    </div>

    <!-- <div class="form-group">
        <label for="qty">Stock Quantity:</label>
        <input type="number" class="form-control" id="qty" value="$row1['quantity_in_stock']"  required>
    </div> -->

    <div class="form-group">
      <button type="submit" style="height:40px" class="btn btn-primary">Update Variation</button>
    </div>

    <?php } ?>

  </form>

  
</div>