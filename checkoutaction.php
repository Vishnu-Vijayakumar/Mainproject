<?php
session_start();
if(isset($_SESSION['alogin'])){
	$mail=$_SESSION['alogin'];
?>



<?php
$con=mysqli_connect("localhost","root","","organic_shop_db")or die ("Couldnt connect");

$disp="SELECT  *from tbl_delivary  ORDER BY name ASC";

$disp_result=mysqli_query($con,$disp);
$prodname="";

?>



<?php

if(isset($_POST["submit2"]))
{
// $cat=$_POST["cat"];	
// $name=$_POST["name"];
// $email=$_POST["email"];
// $address=$_POST["address"];
// $city=$_POST["city"];
// $state=$_POST["state"];

// $zip=$_POST["zip"];
//$image=$_POST["image"];
$name = $_POST['name'];
$phone = $_POST['phone'];
$country = $_POST['country'];
$address= $_POST['address'];
$state = $_POST['state'];
$pincode =$_POST['pincode'];
$email=$_POST['email'];



$Status=0;
$flag=0;
$prodc="";

// $user="Select rid from tbl_registration WHERE email='$mail'";
$login_id= $_SESSION['login_id'];
$mycart_record_res= mysqli_query($conn,"SELECT * from tbl_cart WHERE login_id=$login_id");

$userid=mysqli_query($con,$login_id);
$rid_row=mysqli_fetch_array($userid);
$checknamep="Select * from tbl_delivary  WHERE name='$name'";
$disp_presult=mysqli_query($con,$checknamep);
while($row=mysqli_fetch_array($disp_presult))
{
$prodc=$row['name'];


if((strcmp($prodc,$name) == 0))
  	{	
		$flag=$flag+1;
		echo "<script type='text/javascript'>alert('The category is already Existing'); 
		
		window.location='product.php';</script>";
		
		break;
	}
}



	
if($flag==0)

{	


						
						
						
						
						
	$rid=$rid_row['rid'];

	
	
	

	$q_ins1="INSERT INTO tbl_delivary ( rid, pid, name, email, address, city, state, zip) VALUES ( '$rid', '$cat', '$name', $email, '$address', '$city', '$state', '$zip')";
	
	$ins=mysqli_query($con,$q_ins1);
		
if($ins==TRUE)
{
	
		echo "<script type='text/javascript'>
				
				alert('New product added successfully'); 
				window.location='product.php';
				</script>";
}
else
{
	
	echo "<script type='text/javascript'>
				
				alert('Not added'); 
				window.location='product.php';				
				</script>";
}

}
else
{
	echo "<script type='text/javascript'>
				
				alert('The product is already added '); 
				window.location='product.php';				
				</script>";
}

}

?>
<?php
}
else
{
	header('Location:login.php');
}
?>