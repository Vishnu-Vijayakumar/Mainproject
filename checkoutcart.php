<?php

session_start();
    include 'connection.php';

    if(isset($_POST['place_order'])){

        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $country = $_POST['country'];
        $address= $_POST['address'];
        $state = $_POST['state'];
        $pincode =$_POST['pincode'];
        $email=$_POST['email'];

        //    $email = $_POST['email'];
        //    $method = $_POST['method'];
        //    $flat = $_POST['flat'];
        //    $street = $_POST['street'];
        //    $city = $_POST['city'];
        //    $state = $_POST['state'];
        //    $pin_code = $_POST['pin_code'];

    
        $login_id= $_SESSION['login_id'];
        $mycart_record_res= mysqli_query($conn,"SELECT * from tbl_cart WHERE login_id=$login_id");
        if($mycart_record_res && mysqli_num_rows($mycart_record_res) > 0){
            foreach($mycart_record_res as $row){
                $sr++;
                $pid= $row['product_id'];
            }
            //$detail_query = mysqli_query($conn, "INSERT INTO tbl_order(order_id, login_id, name, phone, country, address, city, state, pincode,email) VALUES(null,,'$name','$phone','$country','$address','$state','$pincode','$email')");
        }
    }

    
    $email_id= $_SESSION['user_emailid'];
    $user_details_res= mysqli_query($conn,"SELECT * from tbl_registration WHERE email='$email_id'");
    if($user_details_res && mysqli_num_rows($user_details_res) > 0){
        $udetails_row= mysqli_fetch_array($user_details_res);
    }
    else{
        $udetails_row= null;
    }

    $user_login_res= mysqli_query($conn,"SELECT login_id FROM tbl_login WHERE email='$email_id'");
    $login_id = ($user_login_res && mysqli_num_rows($user_login_res) == 1) ? mysqli_fetch_array($user_login_res)['login_id'] : null;
    $cart_items_res= mysqli_query($conn,"SELECT * from tbl_cart WHERE login_id=$login_id  AND cart_buy_status=0");
    if(mysqli_num_rows($cart_items_res) <= 0){
        echo "<script>alert('No Items added to cart !! Please add to cart and proceed to pay');window.location.href='index.php  '</script>";
    }
?>

<!-- <div class='order-message-container'>
<div class='message-container'>
    <h3>thank you for shopping!</h3>
    <div class='order-detail'>
        <span>"<?php echo $row['']; ?>"</span>
        <span class='total'> total : $".$price_total."/-  </span>
    </div>
    <div class='customer-details'>
        <p> your name : <span>".$name."</span> </p>
        <p> your phone : <span>".$phone."</span> </p>
        <p> your email : <span>".$email."</span> </p>
        <p> your address : <span>".$address.", ".$state.", ".$pincode.", ".$email."</span> </p>
        <p> your payment mode : <span>".$method."</span> </p>
        <p>(*pay when product arrives*)</p>
    </div>
        <a href='products5.php' class='btn'>continue shopping</a>
    </div>
</div> -->



<!-- <?php
    // if(isset($_SESSION['user_emailid'])){
        // $islogged=true;
    // }
    // else{
        // $islogged=false;
    // }
// ?> -->


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
<script src="https://code.jquery.com/jquery-3.6.1.js"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>

<body>
    <!-- Page Preloder -->
    <!-- <div id="preloder">
        <div class="loader"></div>
    </div> -->

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
            <!-- <?php
                                // if ($islogged == false) {
                                //     echo '<a href="login-user.php"><i class="fa fa-user"></i>Login</a>';
                                // }
                                // else{
                                //     echo '
                                //         <div>'.$_SESSION["user_username"].'</div>
                                        // <div><a href="logout-user.php">Logout</a></div>
                                    // ';
                                // }
                            // ?>



            
                <!-- <a href="#"><i class="fa fa-user"></i> Login</a> -->
            </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class="active"><a href="index.php">Home</a></li>
                <li><a href="./shop-grid.html">Shop</a></li>
                <li><a href="#">Pages</a>
                    <ul class="header__menu__dropdown">
                        <li><a href="./shop-details.html">Shop Details</a></li>
                        <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                        <li><a href="./checkout.html">Check Out</a></li>
                        <li><a href="./blog-details.html">Blog Details</a></li>
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
                            <!-- <?php 
                                // if ($islogged == false) {
                                    // echo '<a href="login-user.php"><i class="fa fa-user"></i>Login</a>';
                                // }
                                // else{
                                    // echo '
                                        // <div>'.$_SESSION["user_username"].'</div>
                                        // <div><a href="logout-user.php">Logout</a></div>
                                    // ';
                                // }
                            // ?>



                            
                                <!-- <a href="#"><i class="fa fa-user"></i> Login</a> -->
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
                                    <li><a href="./seller/sellerlogin/Sellerlogin.php">Become a seller</a></li>
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
                        <h2>Checkout</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Checkout</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h6><span class="icon_tag_alt"></span> Have a coupon? <a href="#">Click here</a> to enter your code
                    </h6>
                </div>
            </div>
            <div class="checkout__form">
                <h4>Billing Details</h4>
                <form id="order_form" method="POST">
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Name<span>*</span></p>
                                        <input type="text" id="name" name="name" value="<?php echo $udetails_row!=null ? ($udetails_row['firstname']." ".$udetails_row['lastname']) : "Not Available"; ?>" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Phone<span>*</span></p>
                                        <input type="text" id="phone" name="phone" value="<?php echo $udetails_row!=null ? $udetails_row['phone'] : "Not Available" ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p>Country<span>*</span></p>
                                <input type="text" name="country" id="country" required>
                            </div>
                            <div class="checkout__input">
                                <p>Address<span>*</span></p>
                                <input type="text" name="address1" id="address1" placeholder="Street Address" class="checkout__input__add">
                                <input type="text" name="address2" id="address2" value="<?php echo $udetails_row!=null ? $udetails_row['address'] : "Not Available" ?>" placeholder="Apartment, suite, unite ect (optinal)" required>
                            </div>
                            <div class="checkout__input">
                                <p>Town/City<span>*</span></p>
                                <input type="text" id="city" name="city" required>
                            </div>
                            <div class="checkout__input">
                                <p>Country/State<span>*</span></p>
                                <input type="text" id="state" name="state" value="<?php echo $udetails_row!=null ? $udetails_row['state'] : "Not Available" ?>" required>
                            </div>
                            <div class="checkout__input">
                                <p>Pincode / ZIP<span>*</span></p>
                                <input type="text" id="pincode" name="pincode" value="<?php echo $udetails_row!=null ? $udetails_row['pincode'] : "Not Available" ?>" required>
                            </div>
                            <!-- <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Phone<span>*</span></p>
                                        <input type="text">
                                    </div> -->
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Email<span>*</span></p>
                                        <input type="text" id="email" name="email" value="<?php echo $udetails_row!=null ? $udetails_row['email'] : "Not Available" ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input__checkbox">
                                <label for="acc">
                                    <!-- Create an account?
                                    <input type="checkbox" id="acc">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <p>Create an account by entering the information below. If you are a returning customer
                                please login at the top of the page</p>
                            <div class="checkout__input">
                                <p>Account Password<span>*</span></p>
                                <input type="text">
                            </div>
                            <div class="checkout__input__checkbox">
                                <label for="diff-acc"> -->
                                    <!-- Ship to a different address?
                                    <input type="checkbox" id="diff-acc">
                                    <span class="checkmark"></span>
                                </label> -->
                            </div>
                            <div class="checkout__input">
                                <p>Order notes<span>*</span></p>
                                <input type="text" id="message" name="message" placeholder="Notes about your order, e.g. special notes for delivery." required>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4>Your Order</h4>
                                <div class="checkout__order__products">Products <span>Total</span></div>
                                <ul>
                                    <?php
                                        $cart_id_arr= [];
                                        if($cart_items_res && mysqli_num_rows($cart_items_res) > 0){
                                            $book_total_price=0;
                                            while($cart_row= mysqli_fetch_array($cart_items_res)){
                                                $cart_id_arr[]= $cart_row['cart_id'];
                                                $book_res= mysqli_query($conn,"SELECT * from tbl_bookinfo WHERE book_id=".$cart_row['book_id']);
                                                if($book_res && mysqli_num_rows($book_res) > 0){
                                                    $book_row= mysqli_fetch_array($book_res);
                                                    echo "<li>".$book_row['book_name']."<span>₹".$book_row['book_price']."</span></li>";
                                                    $book_total_price= $book_total_price + ($book_row['book_price']*$cart_row['quantity']);
                                                }
                                            }
                                        }
                                        $cartid_json_arr= json_encode($cart_id_arr);
                                    ?>
                                    <!-- <li>Vegetable’s Package <span>₹75.99</span></li>
                                    <li>Fresh Vegetable <span>₹151.99</span></li>
                                    <li>Organic Bananas <span>₹53.99</span></li> -->
                                </ul>
                                <div class="checkout__order__subtotal">Subtotal <span>₹<?php echo $book_total_price; ?></span></div>
                                <div class="checkout__order__total">Total <span>₹<?php echo $book_total_price; ?></span></div>
                                <div class="checkout__input__checkbox">
                                    <label for="acc-or">Online payment only
                                        <!-- Create an account?
                                        <input type="checkbox" id="acc-or">
                                        <span class="checkmark"></span> -->
                                    </label>
                                </div>
                                <!-- <p>Lorem ipsum dolor sit amet, consectetur adip elit, sed do eiusmod tempor incididunt
                                    ut labore et dolore magna aliqua.</p> -->
                                <!-- <div class="checkout__input__checkbox">
                                    <label for="payment">
                                        Check Payment
                                        <input type="checkbox" id="payment">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="checkout__input__checkbox">
                                    <label for="paypal">
                                        Paypal
                                        <input type="checkbox" id="paypal">
                                        <span class="checkmark"></span>
                                    </label>
                                </div> -->
                                <!-- <button type="submit" name="place_order" class="site-btn">PLACE ORDER</button><br><br> -->
                                <button type="submit" name="submit2" class="site-btn">PAY AND ORDER</button><br><br>
                                
                                <input type="button" class="site-btn" name="pay" id ="rzp-button1" value="pay now" onclick="pay_now()">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->

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
  <!-- Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a> -->
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p></div>
                        <div class="footer__copyright__payment"><img src="img/payment-item.png" alt=""></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->

    <script>
        $(window).on('load', function() {
            pay_now();
        });

        $('#order_form').submit(function(e){
            e.preventDefault();
            $('#rzp-button1').click();
        });
    </script>

    <script>

    function pay_now(){

    var name=jQuery('#name').val();
    var phone=jQuery('#phone').val();
    var country=jQuery('#country').val();
    var address1=jQuery('#address1').val();
    var address2=jQuery('#address2').val();
    var city=jQuery('#city').val();
    var state=jQuery('#state').val();
    var pincode=jQuery('#pincode').val();
    var email=jQuery('#email').val();
    var message=jQuery('#message').val();

    var cart_id_arr= JSON.parse('<?php echo $cartid_json_arr; ?>');
    var amt=<?php echo $book_total_price; ?>;
    
    var options = {
    "key": "rzp_test_PlbZAtajYXmhOa",
    "amount": amt*100, 
    "currency": "INR",
    "name": "Books",
    "description": "Test Transaction",
    "image": "https://drive.google.com/file/d/1FJCNPPMhML96z3s4IrR8-yGU4A6HLm2X/view?usp=share_link",
    "handler":function(response){
        console.log(response);
        jQuery.ajax({
            type:'POST',
            url:'./payments/payment.php',
            data:{
                    "payment_id":response.razorpay_payment_id,
                    "amt":amt,
                    "name":name,
                    'phone':phone,
                    'country':country,
                    'address':address1+", "+address2,
                    'city':city,
                    'state':state,
                    'pincode':pincode,
                    'email':email,
                    'message':message,
                    'cart_item_arr': (cart_id_arr.length > 0) ?  JSON.stringify(cart_id_arr) : JSON.stringify([0])
                },
            success:function(result){
                if(result=="true"){
                    alert('Payment Done Successfully...');
                    window.location.href="bill.php";
                }
                else{
                    alert('Payment Failed !! Please try again !! Error : '+result);
                }
                //window.location.href="./payments/thankyou.php";
            }
        })
        // if(response){
        //     window.location.href="/adsol/index.php";
        // }
       

    }
};

var rzp1 = new Razorpay(options);
document.getElementById('rzp-button1').onclick = function(e){
    rzp1.open();
    e.preventDefault();
}

}
</script>
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