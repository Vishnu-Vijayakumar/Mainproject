
<?php 
include ('connection.php');
session_start();


$lid=$_SESSION['user_username'];
$bookid=$_GET['id']; 
$qry=mysqli_query($conn, "SELECT * FROM tbl_bookinfo WHERE book_id='$bookid'");
// $user=$_SESSION['user'];
// $name = $_POST['name'];

// $idc= $_POST['idb']

if(isset($_POST["btnsubmit"]))
{
 
  $star=$_POST['star'];
  $feedback=$_POST['feedback'];
  $sql1=mysqli_query($conn,"INSERT INTO tbl_feedback(username,busername,star,feedback,status)VALUES('$lid','$user','$star','$feedback','0')");
  // header("location:feedbackaction.php");
  echo "<script>alert('Review added Successfully !!!');
  window.location.href='ratingindex.php';</script>";
}

    
    
   
  
    
  	
?>
