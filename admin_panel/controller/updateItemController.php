<?php

$server = "localhost";
$user = "root";
$password = "";
$db = "bookstore";

$con = mysqli_connect($server,$user,$password,$db);

if(!$con) {
    die("Connection Failed:".mysqli_connect_error());
}


    // include_once "../config/dbconnect.php";

    $product_id=$_POST['book_id'];
    $p_name= $_POST['book_name'];
    $p_desc= $_POST['book_desc'];
    $p_price= $_POST['book_price'];
    $category= $_POST['book_category'];

    if( isset($_FILES['newImage']) ){
        
        $location="./uploads/";
        $img = $_FILES['newImage']['name'];
        $tmp = $_FILES['newImage']['tmp_name'];
        $dir = '../uploads/';
        $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
        $valid_extensions = array('jpeg', 'jpg', 'png', 'gif','webp');
        $image =rand(1000,1000000).".".$ext;
        $final_image=$location. $image;
        if (in_array($ext, $valid_extensions)) {
            $path =   $image;
            move_uploaded_file($tmp, $dir.$image);
        }
    }else{
        $final_image=$_POST['existingImage'];
    }
    $updateItem = mysqli_query($conn,"UPDATE product SET 
        book_name='$p_name', 
        book_desc='$p_desc', 
        book-price=$p_price,
        category_id=$category,
        product_image='$final_image' 
        WHERE book_id=$book_id");


    if($updateItem)
    {
        echo "true";
    }
    // else
    // {
    //     echo mysqli_error($conn);
    // }
?>