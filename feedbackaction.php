<?php 
include ('connection.php');
session_start();



if(isset($_POST["btnsubmit"]))
{
  $loginid=$_POST['user_useremailid'];
  $user=$_POST['user'];
  $star=$_POST['star'];
  $feedback=$_POST['feedback'];
  $bookid= $_POST['book_id'];
  $sql1=mysqli_query($conn,"INSERT INTO tbl_feedback(username,busername,star,feedback,status)VALUES('$loginid','$user','$star','$feedback','0')");
  // header("location:feedback.php");
  echo "<script>alert('Review added Successfully !!!');
  window.location.href='ratingindexpage.php';</script>";
}

    
    
   
    
    
  	
?>