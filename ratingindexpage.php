<?php
    session_start();
    if(isset($_SESSION['user_emailid'])){
        $islogged=true;
    }
    else{
        $islogged=false;
    }

  
include ('connection.php');
$bookid=$_GET['id'];
$sql="select * from tbl_registration where username='".$_SESSION['user_username']."'";
$rs= mysqli_query($conn,$sql);
$r= $_SESSION['user_username'];
// $id = $_POST['bookid'];

?>

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
    <link rel="stylesheet" href="bookstore/css/rate_css.css" type="text/css">

     <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
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
            <a href="#"><img src="img/logo.png" alt=""></a>
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
                <!-- <a href="#"><i class="fa fa-user"></i> Login</a> -->
            </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class="active"><a href="./index.html">Home</a></li>
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
                            <li><a href="./index.html">Home</a></li>
                            <li class="active"><a href="./shop-grid.html">Shop</a></li>
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
                        
                            </div>
                           
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
                        <h2>Rating And Review</h2>
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
    <body>

   
</body>

<div class="container">
    	<div class="card">
    		<div class="card-header">Add Your Review</div>
    		    <div class="card-body">
                    <form action="feedbackaction.php" method="post">
                        <center>
                        <div class="ratings">
                            Star Ratings &nbsp;&nbsp;&nbsp;
                            <i class="fa fa-star fa-2x rate-star-off" id="rate-star-1" onclick="updateStarRate(this, 1);"></i>
                            <i class="fa fa-star fa-2x rate-star-off" id="rate-star-2" onclick="updateStarRate(this, 2);"></i>
                            <i class="fa fa-star fa-2x rate-star-off" id="rate-star-3" onclick="updateStarRate(this, 3);"></i>
                            <i class="fa fa-star fa-2x rate-star-off" id="rate-star-4" onclick="updateStarRate(this, 4);"></i>
                            <i class="fa fa-star fa-2x rate-star-off" id="rate-star-5" onclick="updateStarRate(this, 5);"></i>
                        </div>
                        <br>
                        <textarea name="rate_message" id="rate_message" rows="5" cols="125" required placeholder="Enter your comments here....."></textarea>
                        <br><br>
                        <input type="text" name="rate_star_val" id="rate_star_val" hidden>
                        <input type="submit" name="submit_review" id="submit_review" class="site-btn" value="Review">
                        </center>
                    </form>
    		    </div>
            </div>
        </div>
    	<div class="mt-5" id="review_content"></div>
    </div>

    <div class="container">
    	<div class="card">
    		<div class="card-header"><h5 class="tittle-w3l">Feedback</h5></div>
    		<div class="card-body">
    			
                    <?php 
                    $select_query="select * from tbl_feedback where book_id='$bookid'";
                    $result=mysqli_query($conn,$select_query);
                    while($row=mysqli_fetch_assoc($result)){
                        $name=$row['username'];
                        $feedback=$row['feedback'];
                        $star=$row['star'];                 
                     ?>
                	    <div class="row">	           
                        <table>
                            <tr>
                                <td>
                                    <h6>
                                        <?php echo $name?>
                                    </h6>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h6><?php echo$feedback?></h6>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h6 style='aligin:center;' ><i class='fa fa-star' aria-hidden='true' style='color:yellow';></i><?php echo$star?></h5></ul></li></div>
                                </td>
                            </tr>
                        </table>
                        </div>

                        <?php
                            }
                        ?>
    				
    		</div>
    	</div>
    	<div class="mt-5" id="review_content"></div>
        
    </div>


    <script>

        let rate_value = 0;
        function updateStarRate(element, rate_val){
            
            var rate1= document.getElementById("rate-star-1");
            var rate2= document.getElementById("rate-star-2");
            var rate3= document.getElementById("rate-star-3");
            var rate4= document.getElementById("rate-star-4");
            var rate5= document.getElementById("rate-star-5");
            var rate_star_val= document.getElementById('rate_star_val');
            if(rate_val==1){
                rate1.classList.add("rate-star-on");
                rate1.classList.remove("rate-star-off");

                rate2.classList.remove("rate-star-on");
                rate2.classList.add("rate-star-off");

                rate3.classList.remove("rate-star-on");
                rate3.classList.add("rate-star-off");

                rate4.classList.remove("rate-star-on");
                rate4.classList.add("rate-star-off");

                rate5.classList.remove("rate-star-on");
                rate5.classList.add("rate-star-off");
                rate_value= 1;
                rate_star_val.value=1;
            }

            if(rate_val==2){
                
                rate1.classList.add("rate-star-on");
                rate1.classList.remove("rate-star-off");

                rate2.classList.add("rate-star-on");
                rate2.classList.remove("rate-star-off");

                rate3.classList.remove("rate-star-on");
                rate3.classList.add("rate-star-off");

                rate4.classList.remove("rate-star-on");
                rate4.classList.add("rate-star-off");

                rate5.classList.remove("rate-star-on");
                rate5.classList.add("rate-star-off");
                rate_value= 2;
                rate_star_val.value=2;
            }

            if(rate_val==3){
                rate1.classList.add("rate-star-on");
                rate1.classList.remove("rate-star-off");

                rate2.classList.add("rate-star-on");
                rate2.classList.remove("rate-star-off");

                rate3.classList.add("rate-star-on");
                rate3.classList.remove("rate-star-off");

                rate4.classList.remove("rate-star-on");
                rate4.classList.add("rate-star-off");

                rate5.classList.remove("rate-star-on");
                rate5.classList.add("rate-star-off");
                rate_value= 3;
                rate_star_val.value=3;
            }

            if(rate_val==4){
                rate1.classList.add("rate-star-on");
                rate1.classList.remove("rate-star-off");

                rate2.classList.add("rate-star-on");
                rate2.classList.remove("rate-star-off");

                rate3.classList.add("rate-star-on");
                rate3.classList.remove("rate-star-off");

                rate4.classList.add("rate-star-on");
                rate4.classList.remove("rate-star-off");

                rate5.classList.remove("rate-star-on");
                rate5.classList.add("rate-star-off");
                rate_value= 4;
                rate_star_val.value=4;
            }

            if(rate_val==5){
                rate1.classList.remove("rate-star-off");

                rate2.classList.add("rate-star-on");
                rate2.classList.remove("rate-star-off");

                rate3.classList.add("rate-star-on");
                rate3.classList.remove("rate-star-off");

                rate4.classList.add("rate-star-on");
                rate4.classList.remove("rate-star-off");

                rate5.classList.add("rate-star-on");
                rate5.classList.remove("rate-star-off");
                rate_value= 5;
                rate_star_val.value=5;
            }
        
        
        }
    </script>

<style>
.progress-label-left
{
    float: left;
    margin-right: 0.5em;
    line-height: 1em;
}
.progress-label-right
{
    float: right;
    margin-left: 0.3em;
    line-height: 1em;
}
.star-light
{
	color:#e9ecef;
}
</style>

</html>

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