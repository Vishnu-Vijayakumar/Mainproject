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
       
        $bookid = $_POST['bookid'];
        $booklanguage= $_POST['booklanguage'];
        $bookstock = $_POST['qty'];

         $insert = mysqli_query($conn,"INSERT INTO tbl_bookstatus
         (bookstat_id,language_name,book_stock) VALUES ('$bookid','$booklanguage','$bookstock')");
 
         if(!$insert)
         {
             echo mysqli_error($conn);
             header("Location: ../dashboard.php?variation=error");
         }
         else
         {
             echo "Records added successfully.";
             header("Location: ../dashboard.php?variation=success");
         }
     
    }
        
?>