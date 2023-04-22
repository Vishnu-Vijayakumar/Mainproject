<?php require_once "book_functions.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Signup Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">



    
</head>
<body>
    <div class="container bg-img">
        <div class="row">
            <div class="col-md-6 offset-md-4 form">
                <form action="signup-user.php" method="POST" autocomplete="">
                    <h2 class="text-center">Signup Form</h2>
                    <p class="text-center">It's quick and easy.</p>
                    <?php
                    if(count($errors) == 1){
                        ?>
                        <div class="alert alert-danger text-center">
                            <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            ?>
                        </div>
                        <?php
                    }elseif(count($errors) > 1){
                        ?>
                        <div class="alert alert-danger">
                            <?php
                            foreach($errors as $showerror){
                                ?>
                                <li><?php echo $showerror; ?></li>
                                <?php
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="signup-form1-div">
  <div class="form-group">
    <input class="form-control" type="text" id="first_name" onchange="firstNameValidate()" name="first_name" placeholder="First Name" required>
    <span id="empty-first-name"></span>
  </div>
  <div class="form-group">
    <input class="form-control" type="text" id="last_name" onchange="lastNameValidate()" name="last_name" placeholder="Last Name" required>
    <span id="empty-last-name"></span>
  </div>
</div>

                    
                    <div class="signup-form1-div">
                        <div class="form-group">
                            <input class="form-control" type="text" name="name" placeholder="User Name" required>
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="email" onchange="emailValidate()" name="email" placeholder="Email Address" required>
                        </div>
                    </div>
                    
                    <div class="signup-form1-div">
                        <div class="form-group">
                            <input class="form-control" type="password" onchange="passwordValidate()" id="password" name="password" placeholder="Password" required>
                            <span id="empty-password"></span>
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="password" name="cpassword" placeholder="Confirm password" required>
                            <span id="empty-verify-password"></span>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <input id="signin-dob" class="form-control" type="date" name="date" placeholder="Date Of Birth" required>
                    </div>      
                    
                    <div class="form-group">
                        <label class="label">Gender</label>
                        <select style="margin-left: 10px" name="gender">
                            <option value="m">Male</option>
                            <option value="f">Female</option>
                            <option value="o">Other</option>
                        </select>
                    </div>
                    
                    <div class="form-group" style="display: flex; flex-direction: column;">
  <label>Address</label>
  <textarea id="address-input" cols="35" rows="2" name="address" style="margin-left: 10px" value="address"></textarea>
  <span id="address-error"></span>
</div>


<div class="form-group">
  <label for="state">State</label>
  <select class="form-control" id="state" name="state" required>
    <option value="">-- Select State --</option>
    <option value="Andhra Pradesh">Andhra Pradesh</option>
    <option value="Arunachal Pradesh">Arunachal Pradesh</option>
    <option value="Assam">Assam</option>
    <option value="Bihar">Bihar</option>
    <option value="Chhattisgarh">Chhattisgarh</option>
    <option value="Goa">Goa</option>
    <option value="Gujarat">Gujarat</option>
    <option value="Haryana">Haryana</option>
    <option value="Himachal Pradesh">Himachal Pradesh</option>
    <option value="Jharkhand">Jharkhand</option>
    <option value="Karnataka">Karnataka</option>
    <option value="Kerala">Kerala</option>
    <option value="Madhya Pradesh">Madhya Pradesh</option>
    <option value="Maharashtra">Maharashtra</option>
    <option value="Manipur">Manipur</option>
    <option value="Meghalaya">Meghalaya</option>
    <option value="Mizoram">Mizoram</option>
    <option value="Nagaland">Nagaland</option>
    <option value="Odisha">Odisha</option>
    <option value="Punjab">Punjab</option>
    <option value="Rajasthan">Rajasthan</option>
    <option value="Sikkim">Sikkim</option>
    <option value="Tamil Nadu">Tamil Nadu</option>
    <option value="Telangana">Telangana</option>
    <option value="Tripura">Tripura</option>
    <option value="Uttar Pradesh">Uttar Pradesh</option>
    <option value="Uttarakhand">Uttarakhand</option>
    <option value="West Bengal">West Bengal</option>
  </select>
</div>


                <div class="signup-form1-div">
                    <div class="form-group">
                        <input class="form-control" type="number" name="Pin" maxlength="6" placeholder="Pin Code">
                    </div>
                    <div class="form-group" style="display: flex; margin-left: 40px">
                    <input class="form-control" type="text" name="country code" style="width: 50px;" value="+91" size="2"/>   
                    <input class="form-control" type="text" name="phone" placeholder="Phone Number" style="width: 200px;margin-left: 10px" size="10"/>
                    </div>
                </div>
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="signup" value="Signup">
                    </div>
                    <div class="link login-link text-center">Already a member? <a href="login-user.php">Login here</a></div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function firstNameValidate(){
            var letter_regex= /^[A-Za-z]+$/;
            var first_name= document.getElementById("first_name").value;
            if(!letter_regex.test(first_name)){
                alert("Only letters accepted !!");
            }
        }
        function lastNameValidate(){
            var letter_regex= /^[A-Za-z]+$/;
            var first_name= document.getElementById("last_name").value;
            if(!letter_regex.test(last_name)){
                alert("Only letters accepted !!");
            }
        }
        function passwordValidate()
        {
            var regularExpression = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,16}$/;
            var password= document.getElementById("password").value;
            if(!regularExpression.test(password)){
                    alert("Please enter a suitable password");
            }
        }
        function emailValidate()
        {
                 if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(myForm.emailAddr.value))
                     {
                          return (true)
                     }
                     alert("You have entered an invalid email address!")
                  
                          return (false)
                    }
    </script>

<script src="validation.js"></script>
    
</body>
</html>