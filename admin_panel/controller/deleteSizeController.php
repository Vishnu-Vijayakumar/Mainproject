<?php

    $server = "localhost";
    $user = "root";
    $password = "";
    $db = "bookstore";

    $conn = mysqli_connect($server,$user,$password,$db);

    if(!$conn) {
    die("Connection Failed:".mysqli_connect_error());
    }
    
    $id=$_POST['record'];
    $query="DELETE FROM tbl_language where language_id='$id'";

    $data=mysqli_query($conn,$query);

    if($data){
        // echo"Size Deleted";
        echo "Language Deleted";
    }
    else{
        echo "Not able to delete";
    }
    
?>