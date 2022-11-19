<?php
    // include_once "../config/dbconnect.php";
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
       
        echo "<script>alert('PHP Code working...');</script>";
        $book_name = $_POST['p_name'];
        $book_desc= $_POST['p_desc'];
        $book_price = $_POST['p_price'];
        $book_img=$_POST['file'];
        $category_id = $_POST['category'];
       
            
        // $name = $_FILES['file']['name'];
        // $temp = $_FILES['file']['tmp_name'];

        // $name="b1.jpg";
        // $temp= "b1.jpg";
    
        // $location="./uploads/";
        // $image=$location.$name;

        // $target_dir="./uploads/";
        // $finalImage=$target_dir.$name;

        // move_uploaded_file($temp,$finalImage);

        // $insert = mysqli_query($conn,"INSERT INTO tbl_bookinfo (null, book_category_id, book_name, book_img, book_des, book_stock, book_price, ) 
        //  VALUES (null, $category_id, '$book_name', 1, '$book_img', '$book_desc', 'Available', $book_price, 'English', 2012, 'Raj', 1, 'Doctor')");
 

            $insert = mysqli_query($conn,"INSERT INTO tbl_bookinfo VALUES (null, 1, 'book_name', 1, 'book_img', 'book_desc', 'Available', 43, 'English', 2012, 'Raj', 1, 'Doctor')");
 
         if($insert)
         {
             echo "test 1";
             echo "Records added successfully.";
         }
         else
         {
            echo mysqli_error($conn);  
         }
     
    }
    else{
        echo "No condition  ";
    }
        
?>