<?php
    include 'connection.php';
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
   
    $login_id= isset($_SESSION['login_id']) ? $_SESSION['login_id'] : 1;
    $qry= mysqli_query($conn,"SELECT count(cart_id) from tbl_cart WHERE login_id= $login_id");
    if(mysqli_num_rows($qry) > 0){
        $rowdata= mysqli_fetch_array($qry);
        $cart_itemcount= $rowdata[0];
    }
    else{
        $cart_itemcount= 0;
    }
?>