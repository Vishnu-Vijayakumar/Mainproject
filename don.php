<?php 
include "connection.php";
// require('vendor/autoload.php');
session_start();

if (!isset($_SESSION['user_emailid'])) {
    header("Location: index.php");
}
use Twilio\Rest\Client;


// Set your Twilio account SID, auth token, and phone number
$accountSid = 'ACefd39e9e7c58b8b1514a9ec709c049da';
$authToken = '64a7bceae5551bb17ecb3e60b98e6173';
$twilioNumber = '+15746867128';

$username=$_SESSION['user_emailid'];
$queryy = "SELECT * FROM users Where `username`= '$username'";
$resultz= mysqli_query($conn, $queryy);
while ($rowa = $resultz->fetch_assoc()) {
 $uid = $rowa['id'];
 $mob = $rowa['phone'];
 $name = $rowa['name'];
}
$amount = $_POST['amount'];
$sql = "INSERT INTO donation (names, emails, phones, date, time, amount) VALUES ('$uid', '$uid', '$uid', CURDATE(), NOW(), '$amount')";
$result = mysqli_query($conn, $sql);
if ($result) {
    // If the booking data was successfully inserted into the database, send an SMS message using Twilio
$client = new Client($accountSid, $authToken);

$message = $client->messages->create(
  // The recipient's phone number
  $mob,
  array(
    // The phone number sending the SMS
    'from' => $twilioNumber,
    // The SMS body
    'body' => 'Dear '.$name.', Thank you for your great generosity! We, BA Foundation, greatly appreciate your donation, and your sacrifice. Your support helps to further our mission. Donated Amount : Rs.'.$amount.'.'
  )
);

echo '<script>alert("Amount Donated Successfully")
    window.location.replace("receipt.php");</script>';

// Close the MySQL database connection

    
   
}
?>