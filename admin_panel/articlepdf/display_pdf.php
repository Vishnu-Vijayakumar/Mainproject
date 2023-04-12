<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Display PDF</title>
    <style media="screen">
      embed{
        border: 2px solid black;
        margin-top: 30px;
      }
      .div1{
        margin-left: 170px;
      }
    </style>
  </head>
  <body>
    <!-- <div class="div1"> -->
      <?php
      include 'connection.php';
      $id=$_REQUEST['id'];
      $sql="SELECT pdf from tbl_articlepdf WHERE id='$id'";
      $query=mysqli_query($con,$sql);
      while ($info=mysqli_fetch_array($query)) {
        ?>
      <embed type="application/pdf" src="pdf/<?php echo $info['pdf'] ; ?>" width="100%" height="700">
    <?php
      }

      ?>

    <!-- </div> -->



    

  </body>
</html>
