<?php 
include ('connection.php');
session_start();


$lid=$_SESSION['user_username'];
$user=$_SESSION['user'];

// $idc= $_POST['idb']

if(isset($_POST["btnsubmit"]))
{
 
  $star=$_POST['star'];
  $feedback=$_POST['feedback'];
  $sql1=mysqli_query($conn,"INSERT INTO feedback(username,busername,star,feedback,status)VALUES('$lid','$user','$star','$feedback','0')");
  header("location:feedback.php");
    
    }
   
    
    
  	
?>