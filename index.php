<?php
    session_start();
    if(isset($_SESSION['user_emailid'])){
        $islogged=true;
    }
    else{
        $islogged=false;
    }
?>

    <?php
    require_once 'connection.php';
    $sql = "SELECT * from tbl_bookinfo";
    $result=$conn-> query($sql);

    ?>







<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BOOKSPARKLED | Template</title>

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
<!-- 
<?php
// include_once 'connection.php';
?> -->

    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="#"><img src="img/logo.jpg" alt=""></a>
        </div>
        <div class="humberger__menu__cart">
            <ul>
                <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
            </ul>
            <div class="header__cart__price">item: <span>Rs.150.00</span></div>
        </div>
        <div class="humberger__menu__widget">
            <div class="header__top__right__language">
                <img src="img/language.png" alt="">
                <div>English</div>
                <span class="arrow_carrot-down"></span>
                <ul>
                    <!-- <li><a href="#">Spanis</a></li> -->
                    <li><a href="#">English</a></li>
                </ul>
            </div>
            <div class="header__top__right__auth">
                <?php
                    if ($islogged == false) {
                        echo '<a href="login-user.php"><i class="fa fa-user"></i>Login</a>';
                    }
                    else{
                        echo $_SESSION["login_user"];
                    }
                ?>
            </div>
        </div>
        
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
          
                <li class="active"><a href="index.php">Home</a></li>
                <li><a href="shop-grid.php">Shop</a></li>
                <li><a href="#">Pages</a>
                    <ul class="header__menu__dropdown">
                        <li><a href=".bookstore/shop-details.html">Shop Details</a></li>
                        <li><a href=".bookstore/shoping-cart.html">Shoping Cart</a></li>
                        <li><a href=".bookstore/checkout.html">Check Out</a></li>
                        <li><a href="seller/sellerlogin/Sellerlogin.php">Start selling</a></li>
                    </ul>
                </li>
                <li><a href="../seller/sellerindex.php">Seller</a></li>
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
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <!-- <li><i class="fa fa-envelope"></i> hello@colorlib.com</li> -->
                                <!-- <li>Free Shipping for all Order of $99</li> -->
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
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
                    <div class="header__logo" style="display:flex;justify-content:center;align-items:center;">
                        <!-- <a href="index.php"><img src="img/logo.png" alt=""></a> -->
                        <h3 style="margin-top:10px;">BOOKSPARKLED<h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li class="active"><a href="index.php">Home</a></li>
                            <li><a href="shop-grid.php">Shop</a></li>
                            <li><a href="#">Pages</a>
                                <ul class="header__menu__dropdown">
                                    <li><a href="./shop-details.html">Shop Details</a></li>
                                    <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                                    <li><a href="./checkout.html">Check Out</a></li>
                                    <li><a href="seller/sellerlogin/Sellerlogin.php">Start selling</a></li>
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
    <section class="hero">
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
                                <!-- <h5>+65 11.188.888</h5> -->
                                <span>support 24/7 time</span>
                            </div>
                        </div>
                    </div>
                    <div class="hero__item set-bg" data-setbg="bookstore/img/hero/banner8.jpg">
                        <div class="hero__text">
                            <span style=color:rgb(61,34,91)>BOOKSPARKLED</span>                            
                            <h2 style=color:rgb(61,34,91)>Hey You <br />Just Read it now!</h2>
                            <p style=color:rgb(61,34,91)>Wear the old coat and buy the new book.</p>
                            <a href="#" class="primary-btn">SHOP NOW</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Categories Section Begin -->


    <section class="categories">
                        <div class="container">
                        <div class="row">
                         <div class="categories__slider owl-carousel">

   

                    <!-- <main>
                    <?php
                        //   while ($row=$result-> fetch_assoc()){

                            ?>
                            <div class="col-lg-3">
                            <div class="categories__item set-bg" data-setbg=<?php echo '<img id="book_img" src="'.$row['book_img'].'" alt="'.$row['book_img'].'">' ?>>
                        
                                <h5><a href="#">Fiction</a></h5>
                                
                            </div>
                        </div>

                        <p class ="book_name"><?php echo $row["book_name"]; ?></p>
                        
                         <?php

                        //   }

                          ?> -->
                         
              

                   
                            
                        




                         <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="bookstore/img/categories/bg2.jpg">
                            <h5><a href="#">Finction</a></h5>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="bookstore/img/categories/bg3.jpg">
                            <h5><a href="#">Stories</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="bookstore/img/categories/bg4.jpg">
                            <h5><a href="#">Philosophy</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="bookstore/img/categories/bg5.jpg">
                            <h5><a href="#">Self Devolepment</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="bookstore/img/categories/bg6.jpg">
                            <h5><a href="#">Autobiography</a></h5>

                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->

    <!-- Featured Section Begin -->
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>LANGUAGES</h2>
                    </div>
                    <div class="featured__controls">
                        <ul>
                            <li class="active" data-filter="*">All</li>
                            <li data-filter=".oranges">ENGLISH</li>
                            <li data-filter=".fresh-meat"> MALAYALAM</li>
                            <li data-filter=".vegetables">HINDI</li>
                            <li data-filter=".fastfood">TAMIL</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row featured__filter">
                <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="bookstore/img/featured/bg1.jpg">
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="#">Ikigai</a></h6>
                            <h5>Rs.250</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mix vegetables fastfood">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="bookstore/img/featured/bg2.jpg">
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="#">Atomic Habits</a></h6>
                            <h5>Rs.299</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mix vegetables fresh-meat">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="bookstore/img/featured/bg3.jpg">
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="#">One Arranged Murder by Chetan Bhagat</a></h6>
                            <h5>Rs. 199</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mix fastfood oranges">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="bookstore/img/featured/bg4.jpg">
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="#">Rich Dad Poor Dad</a></h6>
                            <h5>Rs.199</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mix fresh-meat vegetables">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="bookstore/img/featured/bg5.jpg">
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="#">MEIN KAMPF ADOLF HITLER</a></h6>
                            <h5>Rs.560</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fastfood">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="bookstore/img/featured/bg6.jpg">
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="#">Maun Muskaan Ki Maar</a></h6>
                            <h5>Rs.282</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mix fresh-meat vegetables">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="bookstore/img/featured/bg7.jpg">
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="#">Verity by Colleen Hoover</a></h6>
                            <h5>Rs.250</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mix fastfood vegetables">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="bookstore/img/featured/bg10.jpg">
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="#">Rich Dad Poor Dad(Hindi)</a></h6>
                            <h5>Rs.200</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Featured Section End -->

    <!-- Banner Begin -->
    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="img/banner/bg1.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="img/banner/bg2.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner End -->

    <!-- Latest Product Section Begin -->
    <section class="latest-product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Latest Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="bookstore/img/latest-product/bg1.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Cracking the Coding Interview</h6>
                                        <span>Rs499</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="bookstore/img/latest-product/bg2.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>The Intelligent Investor</h6>
                                        <span>Rs299</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="bookstore/img/latest-product/bg3.jpg" alt="">
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
                                        <img src="bookstore/img/latest-product/bg1.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Cracking the Coding Interview</h6>
                                        <span>Rs499</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="bookstore/img/latest-product/bg2.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>The Intelligent Investor</h6>
                                        <span>Rs299</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="bookstore/img/latest-product/bg3.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>So Good They Can'T Ignore You</h6>
                                        <span>Rs399</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Top Rated Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="bookstore/img/latest-product/bg4.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Influence</h6>
                                        <span>Rs395</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="bookstore/img/latest-product/bg5.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Meditations</h6>
                                        <span>Rs250</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="bookstore/img/latest-product/bg6.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Rich Kids</h6>
                                        <span>rs250</span>
                                    </div>
                                </a>
                            </div>
                            <div class="latest-prdouct__slider__item">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="bookstore/img/latest-product/bg4.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Influence</h6>
                                        <span>Rs395</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="bookstore/img/latest-product/bg5.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Meditations</h6>
                                        <span>Rs250</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="bookstore/img/latest-product/bg6.jpg" alt="">
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
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Review Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="bookstore/img/latest-product/bg7.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Lean Startup</h6>
                                        <span>Rs199</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="bookstore/img/latest-product/bg8.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>The Personal MBA</h6>
                                        <span>Rs179</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="bookstore/img/latest-product/bg9.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>The Intelligent Investor</h6>
                                        <span>Rs299</span>
                                    </div>
                                </a>
                            </div>
                            <div class="latest-prdouct__slider__item">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="bookstore/img/latest-product/bg7.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Lean Startup</h6>
                                        <span>Rs199</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="bookstore/img/latest-product/bg8.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>The Personal MBA</h6>
                                        <span>Rs179</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="bookstore/img/latest-product/bg9.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>The Intelligent Investor</h6>
                                        <span>Rs299</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Latest Product Section End -->

    <!-- Blog Section Begin -->
    <section class="from-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title from-blog__title">
                        <h2>From The Blog</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="bookstore/img/blog/b1.jpg" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                <li><i class="fa fa-comment-o"></i> 5</li>
                            </ul>
                            <h5><a href="#">How books impact our lives</a></h5>
                            <p>The reader's capacity for imagination is enhanced. When reading, people try to imagine how the characters look at the world. As a result, people develop a better understanding of others and adhere less to prejudices. </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="bookstore/img/blog/b2.jpg" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> Dec 21,2021</li>
                                <li><i class="fa fa-comment-o"></i> 5</li>
                            </ul>
                            <h5><a href="#">Top Books of 2021</a></h5>
                            <p>These are the bestselling books of 2021.
                                Dav Pilkey, Mothering Heights (Dog Man #10) (1,295,470 copies sold)
                                Jeff Kinney, Big Shot (Diary of a Wimpy Kid #16) (985,308 copies sold)
                                Charlie Macksey, The Boy, The Mole, The Fox and the Horse (954,434 copies sold) </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="bookstore/img/blog/b3.jpg" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> April 24,2021</li>
                                <li><i class="fa fa-comment-o"></i> 5</li>
                            </ul>
                            <h5><a href="#">20 Best short books</a></h5>
                            <p>The one-sitting novel isn’t just something you can read in one afternoon—it’s something you should read in one afternoon. </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Section End -->

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