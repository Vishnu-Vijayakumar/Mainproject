<?php

    include 'connection.php';
    if(isset($_POST['item_cart_btn'])){
        $prod_id= $_POST['item_prod_id'];
        $user_id= $_POST['item_user_id'];
        $quantity= $_POST['item_quantity'];

        $sql= "INSERT INTO tbl_cart VALUES(null, $user_id, $prod_id, $quantity)";
        $cart_res= mysqli_query($conn, $sql);
        
        if($cart_res){
            echo "<script>
                alert('Book added to cart successfully.');
                
                window.location.href='shoping-cart.php?id=$prod_id';
            </script>";
        }
        else{
            echo "<script>
                alert('Unable to add to cart !! Please try again');
                window.location.href='shop-details.php?id=$prod_id';
            </script>";         
        }
    }
?>