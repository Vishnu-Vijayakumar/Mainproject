<?php

include 'connection.php';
$book_id = $_POST['order_id'];
$sql = "SELECT * FROM tbl_order WHERE order_id = '$book_id'";
$result = mysqli_query($conn, $sql);
$order = mysqli_fetch_assoc($result);
// rest of the code here

// calculate the total amount
$total_amount = 0; // assuming all items are free
// add the shipping charge to the total amount
$total_amount += $order['shipping_charge'];

// generate the bill
$bill = "<h1>Order Details</h1>";
$bill .= "<p>Order ID: ".$order['order_id']."</p>";
$bill .= "<p>Name: ".$order['name']."</p>";
$bill .= "<p>Phone: ".$order['phone']."</p>";
$bill .= "<p>Country: ".$order['country']."</p>";
$bill .= "<p>Address: ".$order['address']."</p>";
$bill .= "<p>City: ".$order['city']."</p>";
$bill .= "<p>State: ".$order['state']."</p>";
$bill .= "<p>Pincode: ".$order['pincode']."</p>";
$bill .= "<p>Email: ".$order['email']."</p>";
$bill .= "<p>Message: ".$order['message']."</p>";
$bill .= "<p>Order Date: ".$order['order_date']."</p>";
$bill .= "<p>Shipping Charge: ".$order['shipping_charge']."</p>";
$bill .= "<p>Total Amount: ".$total_amount."</p>";

// save the bill in a file or email it to the customer
$filename = "bill_".$order_id.".html";
$file = fopen($filename, "w");
fwrite($file, $bill);
fclose($file);

// display the bill to the customer
echo $bill;
?>
