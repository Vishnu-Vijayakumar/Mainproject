<?php
    session_start(); 
    
    include 'connection.php';

    if($_SERVER["REQUEST_METHOD"]=="POST"){
        if(isset($_POST['add_to_wishlist'])){
            $bookid= $_POST['book_id'];
            $login= $_SESSION['login_id'];
            // $quantity= $_POST['prod_quantity'];
            // echo $pid.",".$login_id.",".$quantity;
            // die();
            // $pimg=$_POST['']
            // echo "pid=".$pid." & login_id=".$login_id;
            $sql_already_exist = mysqli_query($conn,"SELECT * FROM tbl_wishlist WHERE book_id = $bookid AND login_id= $login");
            if($sql_already_exist && mysqli_num_rows($sql_already_exist) > 0){
                $row = mysqli_fetch_array($sql_already_exist);
                // $quantity = $quantity + $row["quantity"];
                
                $update_wish_item = mysqli_query($conn, "UPDATE `tbl_wishlist` WHERE book_id='$bookid' AND `login_id` = $login");
                if($update_cart_item){
                    echo "<script>
                    
                    window.location.href='wishlist.php';
                    </script>";      
                }
            }
            else{
                $addtocart_res= mysqli_query($conn,"INSERT INTO tbl_wishlist VALUES(null, $bookid, $login,0)");
                if(mysqli_insert_id($conn) >= 0){
                    echo "<script>
                        alert('Product added to wishlist successfully.');
                        window.location.href='shop-grid.php?book_id=$bookid';
                    </script>";
                }
            }
        }
         if(isset($_POST['Update_Item']))
         {
            $bookid= $_POST['book_name'];
            // $quantity= $_POST['pquantity'];
            $login= $_SESSION['login_id'];
            $update_cart_item_res= mysqli_query($conn, "UPDATE `tbl_wishlist  WHERE book_id='$bookid '");
            if($update_cart_item_res){
                echo "<script>
                    alert('Item updated successfully.');
                    window.location.href='wishlist.php';
                </script>";
            }
            else{
                echo "<script>
                    alert('Unable to update item !! Please try again');
                    // window.location.href='wishlist.php';
                </script>";
            }
       }
    }
	else{
		if(isset($_GET['remove_wishlist_item']))
        {
            $bookid= $_GET['book_id'];
            $login= $_SESSION['login_id'];
            $del_cart_item_res= mysqli_query($conn,"DELETE FROM tbl_wishlist WHERE book_id=$bookid AND login_id=$login");
            if($del_cart_item_res){
                echo "<script>
                    alert('Item deleted from wishlist successfully.');
                    window.location.href='wishlist.php';
                </script>";
            }
            else{
                echo "<script>
                    alert('Unable to delete item !! Please try again');
                    window.location.href='wishlist.php';
                </script>";
            }
        }
	}
     
    ?>
