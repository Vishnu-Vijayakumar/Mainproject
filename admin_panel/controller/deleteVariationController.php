<?php

    // include_once "../config/dbconnect.php";

    // include_once "../config/dbconnect.php";
   

$server = "localhost";
$user = "root";
$password = "";
$db = "bookstore";

$conn = mysqli_connect($server,$user,$password,$db);

if(!$conn) {
    die("Connection Failed:".mysqli_connect_error());
}
    
    $id=$_POST['record'];
    $query="DELETE FROM tbl_bookstat where book_id='$bookid'";

    $data=mysqli_query($conn,$query);

    if($data){
        echo"variation Deleted";
    }
    else{
        echo"Not able to delete";
    }
    
?>