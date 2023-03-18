<?php
    session_start(); 
    
    include 'connection.php';

    if($_SERVER["REQUEST_METHOD"]=="POST"){
        if(isset($_POST['add_to_cart'])){
            $pid= $_POST['productid'];
            $login_id= $_SESSION['login_id'];
            $quantity= $_POST['prod_quantity'];
            // $pimg=$_POST['']
            $addtocart_res= mysqli_query($conn,"INSERT INTO tbl_cart VALUES(null, $pid, $login_id, $quantity)");
            if(mysqli_insert_id($conn) >= 0){
                echo "<script>
                    alert('Product added to cart successfully.');
                    window.location.href='../book-details.php?pid=$pid';
                </script>";
            }
        }
        if(isset($_POST['Remove_Item']))
        {
            $prod_id= $_POST['prod_id'];
            $login_id= $_SESSION['login_id'];
    
            $del_cart_item_res= mysqli_query($conn,"DELETE FROM tbl_cart WHERE product_id=$prod_id AND login_id=$login_id");
            if($del_cart_item_res){
                echo "<script>
                    alert('Item deleted from cart successfully.');
                    window.location.href='../cart/mycart.php';
                </script>";
            }
            else{
                echo "<script>
                    alert('Unable to delete item !! Please try again');
                    window.location.href='../cart/mycart.php';
                </script>";
            }
        }
    }
?>
