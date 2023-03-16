<?php
    session_start();
    if(isset($_SESSION['user_emailid'])){
        $islogged=true;
    }
    else{
        $islogged=false;
    }
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BookSparkled | Template</title>

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
    <!-- <div id="preloder">
        <div class="loader"></div>
    </div> -->

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="#"><img src="img/logo.png" alt=""></a>
        </div>
        <div class="humberger__menu__cart">
            <ul>
                <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
            </ul>
            <!-- <div class="header__cart__price">item: <span>$150.00</span></div> -->
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
                <li class="active"><a href="index.php">Home</a></li>
                <li><a href="./shop-grid.html">Shop</a></li>
                <li><a href="#">Pages</a>
                    <ul class="header__menu__dropdown">
                        <li><a href="./shop-details.html">Shop Details</a></li>
                        <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                        <li><a href="./checkout.html">Check Out</a></li>
                        <li><a href="./sellerindex.php">Seller</a></li>
                    </ul>
                </li>
                <li><a href="./Seller/sellerindex.php">Seller</a></li>
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
                <!-- <li><i class="fa fa-envelope"></i> hello@colorlib.com</li> -->
                <!-- <li>Free Shipping for all Order of $99</li> -->
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
                                <!-- <li><i class="fa fa-envelope"></i> hello@colorlib.com</li> -->
                                <!-- <li>Free Shipping for all Order of $99</li> -->
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
                        <a href="index.php"><img src="img/logo.png" alt=""></a>
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
                                    <li><a href="seller/sellerlogin/Sellerlogin.php">Start Selling</a></li>
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
                        <!-- <div class="header__cart__price">item: <span>$150.00</span></div> -->
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
                            <li><a href="#">Fiction</a></li>
                            <li><a href="#">Self Devolepment</a></li>
                            <li><a href="#">Non-Fiction</a></li>
                            <li><a href="#">Academics</a></li>
                            <li><a href="#">Competetive Exams</a></li>
                            <li><a href="#">School</a></li>
                            <li><a href="#">Philosophy</a></li>
                            <li><a href="#">Religion</a></li>
                            <li><a href="#">Poems</a></li>
                            <li><a href="#">Stories</a></li>
                            <li><a href="#">Children</a></li>
                        </ul>
                    </div>
                </div>
                <!-- <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form>
                                <div class="hero__search__categories">
                                    All Categories
                                    <span class="arrow_carrot-down"></span>
                                </div>
                                <input type="text" name="search_bar_input" onkeyup="searchFunc();" id="search_bar_input" placeholder="What do yo u need?">
                                <button type="submit" name="search" class="site-btn">SEARCH</button>
                                <div class="display-box" id="db_result_box">
                                    <div class="serch_result_row">
                                        <a href="./shop-details.php?id=3" target="_blank">
                                            <div class="db_img"><img src="" alt="$book_name"></div>
                                            <div class="db_pname">Author-James Clear</div>
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div> -->
                        <div class="col-lg-9">
                    <!-- <div class="hero__search"> -->
                        <!-- <div class="hero__search__form"> -->
                            <!-- <form action="#"> -->
                                <!-- <div class="hero__search__categories">
                                    All Categories
                                    <span class="arrow_carrot-down"></span>
                                </div>
                                <input type="text" placeholder="What do yo u need?">
                                <button type="submit" class="site-btn">SEARCH</button> -->

                                <div id="search_container">
                                    <input type="text" name="search_bar_input" onkeyup="searchFunc();" id="search_bar_input" placeholder="What do you need?">
                                    <span id="search_bar_searchbtn"><i class="fa fa-search"></i></span>
                                    <div class="display-box hide" id="db_result_box">
                                    </div>
                            <!-- </form> -->
                        </div>

                        <!-- <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>9594595792</h5>
                                <span>support 24/7 time</span>
                            </div>
                        </div>
                    </div> -->
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
                        <h2>BOOKSPARKLED</h2>
                        <div class="breadcrumb__option">
                            <a href="index.php">Home</a>
                            <span>Shop</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-5">
                    <div class="sidebar">
                        <div class="sidebar__item">
                            <h4>Department</h4>
                            <ul>
                                 <li><a href="#">Fiction</a></li>
                            <li><a href="#">Self Devolepment</a></li>
                            <li><a href="#">Non-Fiction</a></li>
                            <li><a href="#">Academics</a></li>
                            <li><a href="#">Competetive Exams</a></li>
                            <li><a href="#">School</a></li>
                            <li><a href="#">Philosophy</a></li>
                            <li><a href="#">Religion</a></li>
                            <li><a href="#">Poems</a></li>
                            <li><a href="#">Stories</a></li>
                            <li><a href="#">Children</a></li>
                            </ul>
                        </div>
                        <div class="sidebar__item">
                            <h4>Price</h4>
                            <div class="price-range-wrap">
                                <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                    data-min="10" data-max="540">
                                    <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                </div>
                                <div class="range-slider">
                                    <div class="price-input">
                                        <input type="text" id="minamount">
                                        <input type="text" id="maxamount">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="sidebar__item sidebar__item__color--option">
                            <h4>Colors</h4>
                            <div class="sidebar__item__color sidebar__item__color--white">
                                <label for="white">
                                    White
                                    <input type="radio" id="white">
                                </label>
                            </div>
                            <div class="sidebar__item__color sidebar__item__color--gray">
                                <label for="gray">
                                    Gray
                                    <input type="radio" id="gray">
                                </label>
                            </div>
                            <div class="sidebar__item__color sidebar__item__color--red">
                                <label for="red">
                                    Red
                                    <input type="radio" id="red">
                                </label>
                            </div>
                            <div class="sidebar__item__color sidebar__item__color--black">
                                <label for="black">
                                    Black
                                    <input type="radio" id="black">
                                </label>
                            </div>
                            <div class="sidebar__item__color sidebar__item__color--blue">
                                <label for="blue">
                                    Blue
                                    <input type="radio" id="blue">
                                </label>
                            </div>
                            <div class="sidebar__item__color sidebar__item__color--green">
                                <label for="green">
                                    Green
                                    <input type="radio" id="green">
                                </label>
                            </div>
                        </div> -->
                        <div class="sidebar__item">
                            <h4>Avilable Language</h4>
                            <div class="sidebar__item__size">
                                <label for="large">
                                    English
                                    <input type="radio" id="large">
                                </label>
                            </div>
                            <div class="sidebar__item__size">
                                <label for="medium">
                                    Malayalam
                                    <input type="radio" id="medium">
                                </label>
                            </div>
                            <div class="sidebar__item__size">
                                <label for="small">
                                    Hindi
                                    <input type="radio" id="small">
                                </label>
                            </div>
                            <!-- <div class="sidebar__item__size">
                                <label for="tiny">
                                    Tiny
                                    <input type="radio" id="tiny">
                                </label>
                            </div> -->
                        </div>
                        <div class="sidebar__item">
                            <div class="latest-product__text">
                                <h4>Latest Products</h4>
                                <div class="latest-product__slider owl-carousel">
                                    <div class="latest-prdouct__slider__item">
                                        <a href="#" class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <img src="img/latest-product/bg1.jpg" alt="">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6>Cracking the Coding Interview</h6>
                                                <span>Rs499</span>
                                            </div>
                                        </a>
                                        <a href="#" class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <img src="img/latest-product/bg2.jpg"alt="">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6>The Intelligent Investor</h6>
                                                <span>Rs299</span>
                                            </div>
                                        </a>
                                        <a href="#" class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <img src="img/latest-product/bg3.jpg" alt="">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6>So Good They Can'T Ignore You</h6>
                                                <span>Rs399</span>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="latest-prdouct__slider__item">
                                        <a href="#" class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <img src="img/latest-product/bg4.jpg" alt="">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6>Influence</h6>
                                                <span>Rs395</span>
                                            </div>
                                        </a>
                                        <a href="#" class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <img src="img/latest-product/bg5.jpg" alt="">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6>Meditations</h6>
                                                <span>Rs250</span>
                                            </div>
                                        </a>
                                        <a href="#" class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <img src="img/latest-product/bg6.jpg"alt="">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6>Rich Kids</h6>
                                                <span>Rs250</span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-7">
                    <div class="product__discount">
                        <div class="section-title product__discount__title">
                            <h2>Sale Off</h2>
                        </div>
                        <div class="row">
                            <div class="product__discount__slider owl-carousel">
                                
                                
                                <?php

                                    $server = "localhost";
                                    $user = "root";
                                    $password = "";
                                    $db = "bookstore";

                                    $conn = mysqli_connect($server,$user,$password,$db);

                                    $sql="SELECT * from tbl_bookinfo";
                                    $result=$conn-> query($sql);
                                    if ($result-> num_rows > 0){
                                       while ($row=$result-> fetch_assoc()) {

                                    ?>
                                
                                
                                    <div class="col-lg-4">
                                        <div class="product__discount__item">
                                        
                                            <div class="product__discount__item__pic set-bg"
                                                data-setbg="<?php echo $row['book_img']; ?>">
                                                <div class="product__discount__percent">-21%</div>
                                                <ul class="product__item__pic__hover">
                                                    <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                                    <li><a href="shop-details.php?id=<?php echo $row['book_id'];?>"> <i class="fa fa-shopping-cart"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="product__discount__item__text">
                                                <span><?php echo $row["book_name"]; ?></span>
                                                <h5><a href="#"><?php echo $row["book_des"]; ?></a></h5>
                                                <div class="<?php echo $row['book_price']; ?>"> <span> Rs. <?php echo $row['book_price']; ?></span></div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                     <?php
                                         }
                                       }
                                     ?>
                            </div>
                        </div>
                    </div>
                    



                    <?php

                $server = "localhost";
                $user = "root"; 
                $password = "";
                $db = "bookstore";

                $conn = mysqli_connect($server,$user,$password,$db);

                    $sql="SELECT * from tbl_bookinfo";
                    $result=$conn-> query($sql);
                    if ($result-> num_rows > 0){
                    while ($row=$result-> fetch_assoc()) {

                        ?>
                                        <div class="row">  
                                        <div class="col-lg-4 col-md-6 col-sm-6">
                                        <div class="product__discount__item">
                                        <!-- <a href="shop-details.php?shop-grid=<?echo $row['book_id'];?>"> -->
                                            <div class="coloum">
                                            <div class="product__discount__item__pic set-bg"
                                                data-setbg="<?php echo $row['book_img']; ?>">
                                                <ul class="product__item__pic__hover">
                                                    <li><a href="wishlist.php"><i id="wishlist_id"  class="' prod_like fa '.$wishlist_class.' fa fa-heart" onclick="addToWishlist('.$book_id.','.$count.');"></i></a></li>
                                                    <!-- <i id="wishlist_id" class="prod_like fa '.$wishlist_class.'" onclick="addToWishlist('.$prod_id.','.$count.');"></i>
                                        <div id="product_img_div"> 
                                                     -->
                                                    <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                                    <li><a href="shop-details.php?id=<?php echo $row['book_id'];?>"> <i class="fa fa-shopping-cart"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="product__discount__item__text">
                                                <span><?php  echo  $row["book_name"]; ?></span>
                                                <!-- <h5><a href="#"><?php echo $row["book_des"]; ?></a></h5> -->
                                                <div class="<?php echo $row['book_price']; ?>"> <span> Rs. <?php echo $row['book_price']; ?></span></div>
                                            </div>
                                        </div>
                                    </div>
                                    </div
                                     <?php
                                         }
                                       }
                                       
                                     ?>
                                     
                            
                       
                    
                            
                       
                    
                               











             










    <!-- Product Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a href="index.php"><img src="img/logo.png" alt=""></a>
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
                            <!-- <li><a href="#">Contact</a></li>
                            <li><a href="#">Innovation</a></li>
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

    <script>
    function searchFunc(){
        var search = document.getElementById("search_bar_input").value;
        var element = document.getElementById("db_result_box");
        element.classList.remove("hide");
        element.classList.add("show");
        $.ajax({
            url:"search.php",
            method:"POST",
            data:{text:search},
            success:function(data){
                $('.display-box').html(data);
            }
        });
    }
</script>



<script>
        function addToWishlist(book_id, count){

            const elm= document.getElementsByClassName('prod_like');
            var wcheck=0;
            if(elm[count].classList.contains("fa-heart")){
                wcheck=1;
            }

            $.ajax({
                url:"wishlist_ajax.php",
                method:"POST",
                data:{book_id:book_id, wflag:wcheck},
                success:function(data){
                    // alert(data+" and "+wcheck);
                    if(data==1 && wcheck==0){
                        // alert("true and 0");
                        elm[count].classList.add("prod_red");
                        elm[count].classList.add("fa fa-heart");
                        elm[count].classList.remove("fa-heart-o");
                        alert("Added to wishlist");
                    }
                    else if(data==1 && wcheck==1){
                        // alert("true and 1");
                        elm[count].classList.add("fa-heart-o");
                        elm[count].classList.remove("fa fa-heart");
                        elm[count].classList.remove("prod_red");
                        alert("Removed to wishlist");
                    }
                },
                error: function(e){
                    alert(e);
                }
            });
        }
    </script>
</body>
</html>


</body>

</html>