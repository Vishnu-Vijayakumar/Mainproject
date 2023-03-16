<?php
    include 'connection.php';
    // include 'checkuser.php';

    $login= $_SESSION['login_id'];
    if(isset($_POST['book_id']) && isset($_POST['wflag'])){
        $bookid= $_POST['book_id'];
        $wflag= $_POST['wflag'];

        if($wflag==0){
            $insert_wish_res= mysqli_query($conn,"INSERT INTO tbl_wishlist VALUES(null,$login,$bookid)");
            if($insert_wish_res){
                echo 1;
            }
            else{
                echo 0;
            }
        }
        else{
            $update_wish= mysqli_query($conn,"DELETE FROM tbl_wishlist WHERE login_id=$login AND book_id=$bookid");
            if($update_wish){
                echo 1;
            }
            else{
                echo 0;
            }
        }
    }
?>  