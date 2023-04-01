<?php
include("../connection.php");
session_start();
$login_id= $_SESSION['user_loginid'];
if(isset($_POST['payment_id'])){
    $payment_id=$_POST['payment_id'];
    $amt=$_POST['amt'];
    $name=$_POST['name'];
    $phone=$_POST['phone'];
    $country=$_POST['country'];
    $address=$_POST['address'];
    $city=$_POST['city'];
    $state=$_POST['state'];
    $pincode=$_POST['pincode'];
    $email=$_POST['email'];
    $message=$_POST['message'];
    $cartid_arr= json_decode($_POST['cart_item_arr']);

    date_default_timezone_set('Asia/Kolkata');
    $order_date= date('Y-m-d H:i:s');

    $payment_status=1;
    $AD_id = 1;

    $payment_insert= mysqli_query($conn,"INSERT INTO `tbl_payment` VALUES(null, '$name',$amt,'$payment_status','$payment_id',$AD_id)");
    if($payment_insert){
        $order_insert= mysqli_query($conn, "INSERT INTO `tbl_order` VALUES (null, $conn->insert_id, '$name','$phone','$country',
        '$address','$city','$state',$pincode,'$email','$message','$order_date')");
        if($order_insert){
            $i=0;
            while($i < count($cartid_arr)){
                $cart_update= mysqli_query($conn, "UPDATE tbl_cart SET cart_buy_status=1 WHERE cart_id=".$cartid_arr[$i]);
                $i++;
            }
            echo "true";
        }
        else{
            echo "Order Insertion Failed !!";
        }
    }
    else{
        echo "Payment Insertion Failed !!";
    }
}
else{
    echo "Not Entering";
}
?>