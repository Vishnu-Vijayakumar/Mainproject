<?php require_once "sellerbook_functions.php";


 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style1.css">
</head>
<body>
    <div class="container bg-img" id="login-user-maincontainer">
        <div class="row">
            <div class="col-md-4 offset-md-4 form login-form">
                <form action="sellerbook_functions.php" method="POST" autocomplete="">
                    <h2 class="text-center">Are you a Seller?</h2>
                    <p class="text-center">Login with your email and password.</p>
                    <?php
                    if(count($errors) > 0){
                        ?>
                        <div class="alert alert-danger text-center">
                            <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>
                    

                                     
                    <div class="custom_select" id="role-div" style="margin-left: 0px;">
                        <i class="fa fa-tasks icon"></i>
                       
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="email" name="email" placeholder="Email Address" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="password" placeholder="Password" required>
                    </div>
                    <div class="link forget-pass text-left"><a href="forgot-password.php">Forgot password?</a></div>
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="login" value="Login">
                    </div>
                    <div class="link login-link text-center">Not yet a member? <a href="sellerregistration.php">Signup now</a></div>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>