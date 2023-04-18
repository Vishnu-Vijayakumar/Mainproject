<?php
session_start();
    $server = "localhost";
      $user = "root";
      $password = "";
      $db = "bookstore";

      $conn = mysqli_connect($server,$user,$password,$db);

      if(!$conn) {
        die("Connection Failed:".mysqli_connect_error());
      }
    $errors = array();

    if (isset($_POST['update_profile'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        // $dob = $_POST['dob'];
        $address= $_POST['address'];
        $phone = $_POST['phone'];
        // $state=  isset($_POST['state']) ? $_POST['state'] : null;
        $pincode = $_POST['pincode'];
        // $gender = $_POST['gender'];

        // $sql2= "UPDATE tbl_registration SET username='$name' WHERE email='".$email."'";
        $sql2= "UPDATE tbl_registration SET username='$name',address='".$address."',phone='$phone',pincode=$pincode WHERE email='".$email."'";

        $update_query_2= mysqli_query($conn, $sql2);
        if($update_query_2){
            echo "<script>
                alert('Updation successful....');
                window.location.href='editprofile.php';
            </script>";
        }
        else
        { echo
        "<script>
                alert('Updation successful....');</script>";
        }

        // if ($name!=null   && $dob!= null &&  $gender!=null &&$address!=null && $phone!=null && $pincode!= null && $email!= null ) {
            // $sql1 = "UPDATE `tbl_login` SET `email`='$email',`district`='$district' WHERE `login_id` = $user ";
            // $update_result=mysqli_query($conn, $sql1);
            // $sql1="UPDATE tbl_login SET email='$email' where login_id=".$user;
            // $update_query_1= mysqli_query($conn,$sql1);
            // if($update_query_1){
            //     $sql2= "UPDATE tbl_registration SET username='$name',dob='$dob',gender='$gender','address'='$address',phone='$phone',pincode='$pincode' WHERE email='".$email."'";
            //     $update_query_2= mysqli_query($conn, $sql2);
            //     if($update_query_2){
            //         echo "<script>
            //             alert('Updation successful....');
            //             window.location.href='editprofile.php';
            //         </script>";
            //     }
            //     else
            //     { echo
            //     "<script>
            //             alert('Updation successful....');</script>";
            //     }

            // }
        // }
    }
?>

    <?php
include ('connection.php');  
$loginid = $_SESSION['user_loginid'];  
$email= $_SESSION['user_emailid'];
$conn = mysqli_connect("localhost","root", "", "bookstore");  
$sql="SELECT * FROM tbl_login WHERE login_id= ".$loginid; 
$result=mysqli_query($conn,$sql);
if($result && mysqli_num_rows($result) > 0){
    $row= mysqli_fetch_array($result);
}
else{
    $row= null;
}

// $reg_sql="SELECT * FROM tbl_registration WHERE email= ".$email; 
// $reg_result=mysqli_query($conn,$reg_sql);
// if($reg_result && mysqli_num_rows($reg_result) > 0){
//     $reg_row= mysqli_fetch_array($reg_result);
// }
// else{
//     $reg_row= null;
// }

//

$reg_sql="SELECT * FROM tbl_registration WHERE email= '".$email."'";
$reg_result=mysqli_query($conn,$reg_sql);
if($reg_result){
    if(mysqli_num_rows($reg_result) > 0){
        $reg_row= mysqli_fetch_array($reg_result);
    } else{
        $reg_row= null;
    }
} else{
    echo "Error: " . mysqli_error($conn);
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
                            <?php 
                                // if ($islogged == false) {
                                    // echo '<a href="login-user.php"><i class="fa fa-user"></i>Login</a>';
                                // }
                                // else{
                                    // echo '
                                        // <div>'.$_SESSION["user_username"].'</div>
                                        // <div><a href="logout-user.php">Logout</a></div>
                                    // ';
                                // } -->
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
                        <h2>Edit Profile</h2>
                        <div class="breadcrumb__option">
                            <a href="index.php">Home</a>
                            <span>Edit Profile</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
    <head>


<title>Edit Profile</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"> 
<!-- <link rel="stylesheet" href="style.css"> -->
</head>
<body>
<div class="container">
<div class="row">
    <div class="col-sm-3">
    </div>
    <div class="col-sm-6">
       
 <form action="" method="POST" enctype='multipart/form-data'>
<div class="login_form">


 <form method="post" enctype='multipart/form-data' action="#">
      <div class="row">
        <div class="col"></div>
       <div class="col-6"> 
        <center>
       
          

</center>
<br><br>
       </div>
       <br><br>
        <!-- <div class="col"><p><a href="logout.php"><span style="color:red;">Logout</span> </a></p> -->
        <h2></h2>
        <br><br>
     </div>
      </div>

      <div class="form-group">
      <div class="row"> 
        <div class="col-3">
            <label>Name</label>
        </div>
         <div class="col">
            <input type="text" name="name" value="<?= $reg_row!=null ? $reg_row['username'] : "Not Available"; ?>" class="form-control" >
        </div>
      </div>
  </div>
  <div class="form-group">

  <div class="form-group">
<div class="row"> 
        <div class="col-3">
            <label>Email</label>
        </div>
         <div class="col">
            <input type="text" disabled name="email1" value="<?= $row!=null ? $row['email'] : "Not Avilable"; ?>" class="form-control">
            <input type="text" hidden name="email" value="<?= $row!=null ? $row['email'] : "Not Avilable"; ?>" class="form-control">
        </div>
      </div>
  </div>
  <div class="form-group">
      <div class="row"> 
        <div class="col-3">
            <label>Phone Number</label>
        </div>
         <div class="col">
            <input type="text" name="phone" value="<?=$reg_row!=null ? $reg_row['phone'] : "Not Available"; ?>" class="form-control">
        </div>
      </div>
  </div>
  
  </div>
  <!-- <div class="form-group">
      <div class="row"> 
        <div class="col-3">
            <label>Gender</label>
        </div>
         <div class="col">
            <input type="text" name="gender" value="<?= $reg_row!=null ? $reg_row['gender'] : "Not Available"; ?>" class="form-control">
        </div>
      </div>
  </div> -->


  <div class="row">
<div class="col-3" style="display: inline-flex; align-items: center;">
<label style="margin-right: 10px;">Address</label>
</div>
<div class="col" style="display: inline-flex;">
<input type="text" name="address" value="<?= $reg_row!=null ? $reg_row['address'] : "Not Available"; ?>" class="form-control" style="flex-grow: 1;">
</div>
</div>

<div class="row">
<div class="col-3" style="display: inline-flex; align-items: center;">
<label style="margin-right: 10px;">Pincode</label>
</div>
<div class="col" style="display: inline-flex;">
<input type="text" name="pincode" value="<?= $reg_row!=null ? $reg_row['pincode'] : "Not Available"; ?>" class="form-control" style="flex-grow: 1;">
</div>
</div>


       <div class="row">
        <div class="col-sm-6">
        </div>
        <div class="col-sm-6">
        <input type="submit" class="btn btn-success" name="update_profile" value="Save Profile">
        </div>

       </div>

   </form>

    </div>
    <div class="col-sm-3">
    </div>
</div>  
</div> 



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
                    window.location.href="index.php";
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

