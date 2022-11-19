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
        $book_name = $_POST['p_name'];
        $book_desc= $_POST['p_desc'];
        $book_price = $_POST['p_price'];
        $book_img=$_POST['file'];
        $category_id = $_POST['category'];
       
            
        // $name = $_FILES['file']['name'];
        // $temp = $_FILES['file']['tmp_name'];
    
        // $location="./uploads/";
        // $image=$location.$name;

        // $target_dir="./uploads/";
        // $finalImage=$target_dir.$name;

        // move_uploaded_file($temp,$finalImage);

        // $insert = mysqli_query($conn,"INSERT INTO tbl_bookinfo (null, book_category_id, book_name, book_img, book_des, book_stock, book_price, ) 
        //  VALUES (null, $category_id, '$book_name', 1, '$book_img', '$book_desc', 'Available', $book_price, 'English', 2012, 'Raj', 1, 'Doctor')");
 

         $insert = mysqli_query($conn,"INSERT INTO tbl_bookinfo VALUES (null, $category_id, '$book_name', 1, '$book_img', '$book_desc', 'Available', $book_price, 'English', 2012, 'Raj', 1, 'Doctor')");
 
         if($insert)
         {
             echo "New book added successfully.";
         }
         else
         {
            echo "Unable to add new book due to - ".mysqli_error($conn);  
         }
     
    }
    else{
        echo "Unable to add new book !! Please try again.";
    }
        
?>