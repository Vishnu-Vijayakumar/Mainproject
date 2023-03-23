<?php
session_start();
include('connection.php');
if(!isset($_SESSION['user_emailid'])){
    
header('location:index.php');
}else{
 $loginid = $_SESSION['user_emailid']; 
 $bookid = $_GET['id'];

 $sql_Check = "SELECT * FROM tbl_wishlist where login_id = '$loginid' AND book_id = $bookid ";

 $result_check = mysqli_query($conn, $sql_Check);

 if (mysqli_num_rows($result_check) == 1) { 
    echo 'product already exist in wishlist';
    header('location:show-wishlist.php');
    
 }else{

    $insertWishlist = "INSERT INTO tbl_wishlist (login_id, book_id) VALUES ('$loginid', '$bookid')";   
	if(mysqli_query($conn, $insertWishlist)){
        header('location:show-wishlist.php');

    }

 }
 

//  $total = $total +  ($row_cart['price'] * $value['quantity']);









}

?>