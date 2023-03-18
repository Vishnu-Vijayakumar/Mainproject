<?php 
    include 'connection.php';
    if(session_status() === PHP_SESSION_NONE){
        session_start();
    }

    if(isset($_GET['delete_id'])){
        $user_id= $_SESSION['user_loginid'];
        $delete_id= $_GET['delete_id'];
        $cart_id= $_GET['cart_id'];

        $prod_details_sql= mysqli_query($conn,"SELECT * FROM tbl_bookinfo WHERE book_id=".$delete_id);
        if($prod_details_sql && mysqli_num_rows($prod_details_sql) > 0){
            $prod_details= mysqli_fetch_array($prod_details_sql);
            
            $cart_prod_sql= mysqli_query($conn,"SELECT * FROM tbl_cart WHERE cart_id=".$cart_id);
            if($cart_prod_sql && mysqli_num_rows($cart_prod_sql) > 0){
                $cart_details= mysqli_fetch_array($cart_prod_sql);

                $curr_stock_val= $prod_details[6]+$cart_details[3];

                $update_prod_sql= "UPDATE tbl_bookinfo SET book_stock=$curr_stock_val WHERE book_id=".$delete_id;
                $update_stock_res= mysqli_query($conn, $update_prod_sql);
                if($update_stock_res){
                    $delete_item_res= mysqli_query($conn, "DELETE from tbl_cart WHERE cart_id=$cart_id AND login_id=$user_id");
                    if($delete_item_res && mysqli_affected_rows($conn)==1){
                        echo "<script>
                            alert('Item deleted successfully.');
                            window.location.href='shoping-cart.php';
                        </script>";
                    }
                    else{
                        echo "<script>
                                alert('Unable to delete the item 4 !! Please try later');
                                window.location.href='shoping-cart.php';
                            </script>";
                    }
                }
                else{
                    echo "<script>
                        alert('Unable to delete the item 1 !! Please try later');
                        window.location.href='shoping-cart.php';
                    </script>";
                }
            }
            else{
                echo "<script>
                    alert('Unable to delete the item 2 !! Please try later');
                    window.location.href='shoping-cart.php';
                </script>";
            }
        }
        else{
            echo "<script>
                    alert('Unable to delete the item 3 !! Please try later');
                    window.location.href='shoping-cart.php';
                </script>";
        }
    }

    if(isset($_POST['update_prod_btn'])){
        $book_id= $_POST['book_id'];
        $quantity= $_POST['quantity'];
        $login_id= $_SESSION['user_loginid'];
        $cart_id= $_POST['cart_id'];
        $delete_item_res= mysqli_query($conn, "UPDATE tbl_cart SET book_id=$book_id, quantity=$quantity WHERE login_id=$login_id AND cart_id=$cart_id");
        if($delete_item_res && mysqli_affected_rows($conn)==1){
            echo "<script>
                    alert('Quantity of the item updated successfully.');
                    window.location.href='shoping-cart.php';
                </script>";
        }
        else{
            echo "<script>
                    alert('Unable to update the quantity of the item !! Please try later');
                    window.location.href='shoping-cart.php';
                </script>";
        }
    }
?>

<?php
    if(isset($_GET['prod_id'])){
        $prod_id=$_GET['prod_id']; 
        $qry=mysqli_query($conn, "SELECT * FROM tbl_bookinfo WHERE book_id='$prod_id'");
        // if( $qry && mysqli_num_rows( $qry)==1){ 
        //     $presult= mysqli_fetch_row($qry);
        $pname= $presult[2];
            //$pquantity=$presult[];
        $pprice=$presult[7];
            //$ptotal=$presult[];
    }  

    else{
        // $pdes= "Sample Description";
        // $pimg= "bookstore/img/featured/bg1.jpg";
        $pname= "Sample Name";
        $pprice="sample price";
        $pauthor="Authors Name";
        // $planguage="Product Language";
        // $pcategory="Product Category";
}

?>    
<!-- <?php
    session_start();
    if(isset($_SESSION['user_emailid'])){
        $islogged=true;
    }
    else{
        $islogged=false;
    }
?> -->


<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ogani | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="bookstore/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="bookstore/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="bookstore/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="bookstore/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="bookstore/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="bookstore/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="bookstore/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="bookstore/css/style.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="#"><img src="/bookstore/posters.jpg" alt=""></a>
        </div>
        <div class="humberger__menu__cart">
            <ul>
                <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
            </ul>
            <div class="header__cart__price">item: <span>$150.00</span></div>
        </div>
        <div class="humberger__menu__widget">
            <div class="header__top__right__language">
                <img src="img/language.png" alt="">
                <div>English</div>
                <span class="arrow_carrot-down"></span>
                <ul>
                    <li><a href="#">Spanis</a></li>
                    <li><a href="#">English</a></li>
                </ul>
            </div>
            <div class="header__top__right__auth">
            <?php
                                if ($islogged == false) {
                                    echo '<a href="login-user.php"><i class="fa fa-user"></i>Login</a>';
                                }
                                else{
                                    echo '
                                        <div>'.$_SESSION["user_username"].'</div>
                                        <div><a href="logout-user.php">Logout</a></div>
                                    ';
                                }
                            ?>
            </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class="active"><a href="./index.php">Home</a></li>
                <li><a href="./shop-grid.html">Shop</a></li>
                <li><a href="#">Pages</a>
                    <ul class="header__menu__dropdown">
                        <li><a href="shop-details.php">Shop Details</a></li>
                        <li><a href="shoping-cart.php">Shoping Cart</a></li>
                        <li><a href=".checkout.html">Check Out</a></li>
                        <li><a href="./blog-details.html">Seller</a></li>
                    </ul>
                </li>
                <li><a href="./blog.html">Blog</a></li>
                <li><a href="./contact.html">Contact</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-pinterest-p"></i></a>
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i> hello@colorlib.com</li>
                <li>Free Shipping for all Order of $99</li>
            </ul>
        </div>
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> hello@colorlib.com</li>
                                <li>Free Shipping for all Order of $99</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-pinterest-p"></i></a>
                            </div>
                            <div class="header__top__right__language">
                                <img src="img/language.png" alt="">
                                <div>English</div>
                                <span class="arrow_carrot-down"></span>
                                <ul>
                                    <li><a href="#">Spanis</a></li>
                                    <li><a href="#">English</a></li>
                                </ul>
                            </div>
                            <div class="header__top__right__auth">
                            <?php
                                if ($islogged == false) {
                                    echo '<a href="login-user.php"><i class="fa fa-user"></i>Login</a>';
                                }
                                else{
                                    echo '
                                        <div>'.$_SESSION["user_username"].'</div>
                                        <div><a href="logout-user.php">Logout</a></div>
                                    ';
                                }
                            ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="./index.html"><img src="img/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li><a href="index.php">Home</a></li>
                            <li class="active"><a href="./shop-grid.html">Shop</a></li>
                            <li><a href="#">Pages</a>
                                <ul class="header__menu__dropdown">
                                    <li><a href="./shop-details.html">Shop Details</a></li>
                                    <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                                    <li><a href="./checkout.html">Check Out</a></li>
                                    <li><a href="./seller/sellerlogin/Sellerlogin.php">Become a Seller</a></li>
                                </ul>
                            </li>
                            <li><a href="./blog.html">Blog</a></li>
                            <li><a href="./contact.html">Contact</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                            <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
                        </ul>
                        <div class="header__cart__price">item: <span>$150.00</span></div>
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->

    <!-- Hero Section Begin -->
    <section class="hero hero-normal">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>All departments</span>
                        </div>
                        <ul>
                            <li><a href="#">Fresh Meat</a></li>
                            <li><a href="#">Vegetables</a></li>
                            <li><a href="#">Fruit & Nut Gifts</a></li>
                            <li><a href="#">Fresh Berries</a></li>
                            <li><a href="#">Ocean Foods</a></li>
                            <li><a href="#">Butter & Eggs</a></li>
                            <li><a href="#">Fastfood</a></li>
                            <li><a href="#">Fresh Onion</a></li>
                            <li><a href="#">Papayaya & Crisps</a></li>
                            <li><a href="#">Oatmeal</a></li>
                            <li><a href="#">Fresh Bananas</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="#">
                                <div class="hero__search__categories">
                                    All Categories
                                    <span class="arrow_carrot-down"></span>
                                </div>
                                <input type="text" placeholder="What do yo u need?">
                                <button type="submit" class="site-btn">SEARCH</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>9594595792</h5>
                                <span>support 24/7 time</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="banner5.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Shopping Cart</h2>
                        <div class="breadcrumb__option">
                            <a href="index.php">Home</a>
                            <span>Shopping Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shoping Cart Section Begin -->
    
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Products</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $user_id= $_SESSION['user_loginid'];
                                    $all_total=0;
                                    $cart_items_res= mysqli_query($conn, "SELECT * from tbl_Cart WHERE login_id=$user_id");
                                    if($cart_items_res && mysqli_num_rows($cart_items_res) > 0){
                                        while($cart_row= mysqli_fetch_array($cart_items_res)){
                                            $each_total=0;
                                            $book_id= $cart_row['book_id'];
                                            $book_res= mysqli_query($conn, "SELECT * from tbl_bookinfo WHERE book_id=$book_id");
                                            if($book_res && mysqli_num_rows($book_res)==1){
                                                $book_details= mysqli_fetch_array($book_res);

                                                $each_total= $book_details['book_price'] * $cart_row['quantity'];
                                                $all_total= $all_total+$each_total;
                                                echo '
                                                    <tr>
                                                        <td class="shoping__cart__item">
                                                            <img id="shopping_cart_img" src="./seller/uploaded_images/'.$book_details['book_img'].'" alt="">
                                                            <h5>'.$book_details['book_name'].'</h5>
                                                        </td>
                                                        <td class="shoping__cart__price">
                                                            Rs '.$book_details['book_price'].'
                                                        </td>
                                                        <td class="shoping__cart__quantity">
                                                            <form action="shoping-cart.php" method="POST">
                                                                <div class="quantity">
                                                                    <div class="pro-qty">
                                                                        <input type="text" name="quantity" value="'.$cart_row['quantity'].'">
                                                                    </div>
                                                                </div>
                                                                <input type="text" name="book_id" value="'.$book_id.'" hidden>
                                                                <input type="text" name="cart_id" value="'.$cart_row['cart_id'].'" hidden>
                                                                <input type="submit" name="update_prod_btn" class="btn btn-outline-success" value="Update" style="margin-top: 10px; padding: 5px 20px">
                                                            </form>
                                                        </td>
                                                        <td class="shoping__cart__total">
                                                            Rs '.$each_total.'
                                                        </td>
                                                        <td class="shoping__cart__item__close">
                                                            <a href="shoping-cart.php?delete_id='.$book_id.'&cart_id='.$cart_row['cart_id'].'"><span class="icon_close"></span></a>
                                                        </td>
                                                    </tr>
                                                ';

                                            }
                                        }
                                    }
                                    else{
                                
                                    }
                                ?>
                                <!-- <tr>
                                    <td class="shoping__cart__item">
                                        <img src="img/cart/cart-2.jpg" alt="">
                                        <h5>Fresh Garden Vegetable</h5>
                                    </td>
                                    <td class="shoping__cart__price">
                                        $39.00
                                    </td>
                                    <td class="shoping__cart__quantity">
                                        <div class="quantity">
                                            <div class="pro-qty">
                                                <input type="text" value="1">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="shoping__cart__total">
                                        $39.99
                                    </td>
                                    <td class="shoping__cart__item__close">
                                        <span class="icon_close"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="shoping__cart__item">
                                        <img src="img/cart/cart-3.jpg" alt="">
                                        <h5>Organic Bananas</h5>
                                    </td>
                                    <td class="shoping__cart__price">
                                        $69.00
                                    </td>
                                    <td class="shoping__cart__quantity">
                                        <div class="quantity">
                                            <div class="pro-qty">
                                                <input type="text" value="1">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="shoping__cart__total">
                                        $69.99
                                    </td>
                                    <td class="shoping__cart__item__close">
                                        <span class="icon_close"></span>
                                    </td>
                                </tr> -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="index.php" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                        <a href="#" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
                            Upadate Cart</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__continue">
                        <div class="shoping__discount">
                            <h5>Discount Codes</h5>
                            <form action="#">
                                <input type="text" placeholder="Enter your coupon code">
                                <button type="submit" class="site-btn">APPLY COUPON</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Cart Total</h5>
                        <ul>
                            <li>Subtotal <span>Rs <?php echo $all_total; ?></span></li>
                            <li>Total <span>Rs <?php echo $all_total; ?></span></li>
                        </ul>
                        <a href="checkoutcart.php" class="primary-btn">PROCEED TO CHECKOUT</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Shoping Cart Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a href="./index.html"><img src="img/logo.png" alt=""></a>
                        </div>
                        <ul>
                        <li>Address: Kanjirappally Near private bus stand</li>
                            <li>Phone: 9594595792</li>
                            <li>Email: booksparkled@gmail.com</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                    <div class="footer__widget">
                        <h6>Useful Links</h6>
                        <ul>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">About Our Shop</a></li>
                            <li><a href="#">Secure Shopping</a></li>
                            <li><a href="#">Delivery infomation</a></li>
                            <!-- <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Our Sitemap</a></li> -->
                        </ul>
                        <ul>
                            <li><a href="#">Who We Are</a></li>
                            <li><a href="#">Our Services</a></li>
                            <li><a href="#">Projects</a></li>
                            <li><a href="#">Contact</a></li>
                            <!-- <li><a href="#">Innovation</a></li>
                            <li><a href="#">Testimonials</a></li> -->
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="footer__widget">
                        <h6>Join Our Newsletter Now</h6>
                        <p>Get E-mail updates about our latest shop and special offers.</p>
                        <form action="#">
                            <input type="text" placeholder="Enter your mail">
                            <button type="submit" class="site-btn">Subscribe</button>
                        </form>
                        <div class="footer__widget__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer__copyright">
                        <div class="footer__copyright__text"><p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p></div>
                        <div class="footer__copyright__payment"><img src="img/payment-item.png" alt=""></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="bookstore/js/jquery-3.3.1.min.js"></script>
    <script src="bookstore/js/bootstrap.min.js"></script>
    <script src="bookstore/js/jquery.nice-select.min.js"></script>
    <script src="bookstore/js/jquery-ui.min.js"></script>
    <script src="bookstore/js/jquery.slicknav.js"></script>
    <script src="bookstore/js/mixitup.min.js"></script>
    <script src="bookstore/js/owl.carousel.min.js"></script>
    <script src="bookstore/js/main.js"></script>


</body>

</html>