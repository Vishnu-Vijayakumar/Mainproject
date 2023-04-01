<?php 
include ('connection.php');
session_start();

if(isset($_POST["submit_review"]))
{
  $bookid= $_POST['id'];


  $rate_message=$_POST['rate_message'];
  $rate_star_val=$_POST['rate_star_val'];
  
  $user=$_POST['user'];
  $star=$_POST['star'];
 $sql1=mysqli_query($conn,"INSERT INTO tbl_feedback(book_id,username,busername,star,feedback,status)VALUES('$bookid','$loginid','$user','$star','$feedback','0')");
  header("location:feedback.php");
  echo "<script>alert('Review added Successfully !!!');
  window.location.href='ratingindexpage.php';</script>";
} 	
?>