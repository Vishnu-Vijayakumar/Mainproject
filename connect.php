<?php
$email=$_POST['email'];
$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$password=$_POST['password'];
$confirmpassword=$_POST['confirm password'];
$dob=$_POST['dob'];
$gender=$_POST['gender'];
$address=$_POST['address'];
$state=$_POST['state'];
$phone=$_POST['phone'];
$pincode=$_POST['pincode'];

$conn = new mysqli('localhost','root','','test');
if($conn->connect_error){
    die('Connection Failed : '$conn->connect_error);
}else{
        $stmt = $conn->prepare("insert into tbl_registration(email,firstname,lastname,password,confirmpassword,dob,gender,state,phone,pincode)
        values(?,?,?,?,?,?,?,?,?,?,?)");
        $stmnt->bind_param("sssssissii",$email,$firstname,$lastname,$password,$confirmpassword,$dob,$gender,$address,$state,$phone,$pincode);
        $stmt->execute();
        echo "registration succesfully...";
        $stmt->close();
        $comm->close();
}
    
        

