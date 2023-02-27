<?php
    include "connection";
    if(isset($_GET['bookid'])){
        $bookid = $_GET['bookid'];
        // $sql = "DELETE from `tbl_products` where product_id=$pid";
        $sql= "UPDATE tbl_bookinfo SET prod_status=0 WHERE product_id=$bookid";
        $conn->query($sql);
    }
    header('location:sellerindex.php');
    exit;
?>