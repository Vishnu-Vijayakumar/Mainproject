<?php
    //  include_once "../config/dbconnect.php";
  
        $server = "localhost";
      $user = "root";
      $password = "";
      $db = "bookstore";

      $conn = mysqli_connect($server,$user,$password,$db);

      if(!$conn) {
        die("Connection Failed:".mysqli_connect_error());
      }


      if(isset($_POST['upload']))
      {
        $catname = $_POST['c_name'];
        $catstatus = $_POST['c_status'];
         
         $sql="select * from tbl_category where category_name='$catname'";
     
         $res=mysqli_query($conn,$sql);
     
         if (mysqli_num_rows($res) <= 0) {
            $insert = mysqli_query($conn,"INSERT INTO `tbl_category` VALUES ('0','$catname','$catstatus',1)");
  
            if(!$insert){
                echo mysqli_error($conn);
                header("Location: ../dashboard.php?category=error");
            }
            else{
                echo "Records added successfully.";
                header("Location: ../index.php?category=success");
            }
        }
        else{
          echo "<script>alert('Such name already added !! Please add another name');window.location.href = '../index.php';</script>";
        }
      }
        
?>