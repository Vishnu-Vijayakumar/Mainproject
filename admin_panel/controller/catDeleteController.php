<?php

    $server = "localhost";
    $user = "root";
    $password = "";
    $db = "bookstore";

    $conn = mysqli_connect($server,$user,$password,$db);

    if(!$conn) {
        die("Connection Failed:".mysqli_connect_error());
    }

    $cat_id = $_POST['c_id'];
    $query= "UPDATE tbl_category SET category_enable=0 WHERE category_id=$cat_id";
    $data=mysqli_query($conn,$query);

    if($data){
        echo"Category Item Deleted";
    }
    else{
        echo"Not able to delete";
    }
    
?>