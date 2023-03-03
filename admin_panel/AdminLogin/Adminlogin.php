<?php
require("connection.php");
session_start();
?>

<?php

if(isset($_POST['Login']))
{
   $admin_name=$_POST["AdminName"];
   $admin_password=$_POST["AdminPassword"];
   $query="SELECT * FROM tbl_adminlogin where admin_name='$admin_name' and admin_password='$admin_password'";
   $result=mysqli_query($con,$query);
   if($result && mysqli_num_rows($result)==1)
   {
      
      $_SESSION['AdminLoginId']= $admin_name;
      echo "<script>
         alert('Login Successfully...');
         window.location.href='../index.php';
      </script>";
   }
   else 
   {
      echo"<script>alert('Incorrect Password');</script>";

   }
}
?>


<!DOCTYPE html>

<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Login Form Design |</title>
      <link rel="stylesheet" href="style.css">
   </head>
   <body>
      <div class="wrapper">
         <div class="title">
            Admin Login
         </div>
         <form method="POST" action="Adminlogin.php">
            <div class="field">
               <input type="text" placeholder="Admin Name" name="AdminName">
               <!-- <label>Email Address</label> <name="AdminName"> -->
            </div>
            <div class="field">
               <input type="password" placeholder="Password" name="AdminPassword">
               <!-- <label>Password</label> -->
            </div>
            <div class="content">
               <div class="checkbox">
                  <input type="checkbox" id="remember-me">
                  <label for="remember-me">Remember me</label>
               </div>
               <div class="pass-link">
                  <a href="#">Forgot password?</a>
               </div>
            </div>
            <div class="field">
               <input type="submit" name="Login" value="Login">
            </div>
            <div class="signup-link">
               Not a member? <a href="#">Signup now</a>
            </div>
         </form>
      </div>
   </body>
</html>