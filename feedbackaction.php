<?php 
include('connection.php');
session_start();

if(isset($_POST["submit_review"]))
{
  $bookid = $_POST['id'];
  $rate_message = $_POST['rate_message'];
  $rate_star_val = $_POST['rate_star_val'];
  $user = $_POST['username']; //assuming username is stored in session
  $star = $_POST['star'];
  $feedback = $_POST['feedback'];
  
  $sql1 = mysqli_query($conn,"INSERT INTO tbl_feedback(book_id,username,star,feedback) VALUES('$bookid','$user','$star','$feedback')");
  if($sql1){
    header("Location: feedbackaction.php");
    exit();
  }
  else {
    echo "<script>alert('Failed to add review!');
    window.location.href='ratingindexpage.php';</script>";
  }
}
?>
