<?php
session_start();
include('connection.php');
if(!isset($_SESSION['user_emailid'])){
    
header('location:index.php');
}else{
 $bookid = $_GET['bookid']; 
 $loginid = $_GET['loginid'];
 

    $delWishlist = "DELETE FROM tbl_wishlist WHERE login_id='$loginid' AND book_id='$bookid'";   
	if(mysqli_query($conn, $delWishlist)){
        header('location:wishlistdemo.php');

    }
 









}

?>