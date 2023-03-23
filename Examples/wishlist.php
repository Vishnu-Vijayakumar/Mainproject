<?php
    include('connection.php');
	// include('wishheader.php');
	if($_SERVER["REQUEST_METHOD"]=="POST"){
	session_start();
	$email= isset($_SESSION['login_id']) ? $_SESSION['login_id'] : "No Value";
	}   
	?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ecommerce Cart/Wishlist Page Design</title>

    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="wishlist.css">
</head>
<body>

    <div class="py-3 py-md-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="shopping-cart">

                        <div class="cart-header d-none d-sm-none d-mb-block d-lg-block">
                            <div class="row">
                                <h2>My Wishlist</h2>
                            
                                <div class="col-md-3 my-auto">
                                    <h4>Image</h4>
                                </div>
                                <div class="col-md-3 my-auto">
                                    <h4>Products</h4>
                                </div>
                               
                                <div class="col-md-3 my-auto">
                                    <h4>Price</h4>
                                </div>
                                <div class="col-md-3 my-auto">
                                    <h4>Remove</h4>
                                </div>
                            </div>
                        </div>  

                        <div class="cart-item">
                            <?php
                                include 'connection.php';
                                $login= isset($_SESSION['login_id']) ? $_SESSION['login_id'] : -1;
                                $mycart_record_res= mysqli_query($conn,"SELECT * from tbl_wishlist WHERE login_id=$login");
                                if(mysqli_num_rows($mycart_record_res) > 0)
                                {
                                    foreach($mycart_record_res as $row){
                                        $bookid= $row['book_id'];
                                        $prod_sql= mysqli_query($conn,"SELECT * from tbl_bookinfo WHERE book_id=$bookid");
                                        if(mysqli_num_rows($prod_sql) == 1){
                                            $pred_details_res= mysqli_fetch_array($prod_sql);

                                            $prod_id= $pred_details_res['book_id'];
                                            $prod_name= $pred_details_res['book_name'];
                                            $prod_image= $pred_details_res['book_img'];
                                            $prod_price= $pred_details_res['book_price'];

                                            
                                     
                                            echo '
                                                <div class="row">
                                                    <div class="col-md-3 my-auto"><img src="'.$prod_image.'" style="width: 50px;" alt=""></div>
                                                    <div class="col-md-3 my-auto">'.$prod_name.'</div>
                                                    <div class="col-md-3 my-auto">Rs. '.$prod_price.'</div>
                                                    <div class="col-md-3 my-auto">
                                                        <a href="" class="btn btn-primary btn-sm">
                                                            <i class="fa fa-link"></i> 
                                                        </a> 
                                                        <a href="wishlistmanage.php?remove_wishlist_item=true&pid='.$prod_id.'" class="btn btn-danger btn-sm">
                                                            <i class="fa fa-trash"></i> 
                                                        </a>
                                                    </div>
                                                </div>
                                                <div style="background: lightgrey; margin: 10px 0px; height: 1px;"></div>
                                            ';
                                        }
                                        else{

                                        }
                                    }
                                    
                                }
                            ?>
                        </div>
                      
                            </div>
                        </div>
                                
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>