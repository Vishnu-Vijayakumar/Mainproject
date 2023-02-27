<?php
    include "connection.php";
    if(isset($_GET['bid'])){
        $pid = $_GET['bid'];
        // $sql = "DELETE from `tbl_products` where product_id=$pid";
        $sql= "DELETE from tbl_bookinfo WHERE book_id=$pid";
        $conn->query($sql);
    }
    header('location:../sellerindex.php');
    exit;
?>